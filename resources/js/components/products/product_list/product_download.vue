<template></template>
<script>
import fileDownload from 'js-file-download';
export default {
  mounted() {
    var data = {
      name: this.$route.params.name,
      file: this.$route.params.file,
      product_id: this.$route.params.product_id,
    };
    if(this.$store.getters.isSubscriber){
      this.getDownLoadLink(data);
    }else{
      this.$router.push({name:'pricing'})
    }

     this.$router.go(-1);
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
          this.downloadSoftware(res.data);
          this.redirectTo(res.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },

    // download software
    downloadSoftware(link) {
      axios({
        url: link.link,
        methods: "GET",
        responseType: "blob",
      })
        .then((res) => {
          console.log(res);
            var randomstring = Math.random().toString(36).substring(2);
             fileDownload(res.data, randomstring+'.zip');
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
    redirectTo(data){
      this.$router.push({ name:"singleProduct",params:{id:data.product.id}});
    }
  },
};
</script>