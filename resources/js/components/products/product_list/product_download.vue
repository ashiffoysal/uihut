<template></template>
<script>
import fileDownload from "js-file-download";
export default {
  mounted() {
    var data = {
      name: this.$route.params.name,
      file: this.$route.params.file,
      product_id: this.$route.params.product_id,
    };
    this.$store.dispatch("checkSubscriber");
    if (this.$store.getters.isSubscriber) {
      this.getDownLoadLink(data);
    } else {
      this.$store.dispatch("checkfreeItem", data).then((res) => {
        if (res.data) {
          this.getDownLoadLink(data);
        } else {
          this.$notify({
            type: "error",
            title: "You need to Subscription!",
          });
          this.$router.push({ name: "pricing" });
        }
      });
    }
  },
  methods: {
    getDownLoadLink(data) {
      axios
        .post("/get/download/link", {
          name: data.name,
          file: data.file,
          product_id: data.product_id,
        })
        .then((res) => {
          console.log(res);
          this.downloadSoftware(res.data);
          this.redirectTo(res.data);
        })
        .catch((error) => {
           this.$notify({
            type: "error",
            title: `Error!${error.response.data.message}`,
          });
           this.$notify({
            type: "error",
            title: "Sorry! Something went wrong",
          });
         
          console.log(error.response.data.message);
          this.$router.push({ name: "home" });
        });
    },

    // download software
    downloadSoftware(link) {
      var link = link;
      axios({
        url: link.link,
        methods: "GET",
        responseType: "blob",
      })
        .then((res) => {
          console.log(link);
          var randomstring = Math.random().toString(36).substring(2);
          fileDownload(res.data, randomstring + "." + link.ext);
        })
        .catch((error) => {
          this.$notify({
            type: "error",
            title: "Not Download! Something Went Wrong",
          });
          // this.$router.push({ name: "home" });
          this.$router.go(-1);
        });
    },
    redirectTo(data) {
      this.$router.push({
        name: "singleProduct",
        params: { id: data.product.id },
      });
    },
  },
};
</script>