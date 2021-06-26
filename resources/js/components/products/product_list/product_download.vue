<template></template>
<script>
export default {
  mounted() {
    var data = {
      name: this.$route.params.name,
      file: this.$route.params.file,
      product_id: this.$route.params.product_id,
    };
    this.getDownLoadLink(data);
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
        })
        .catch((error) => {
          console.log(error);
        });
    },

    // download software
    downloadSoftware(link) {
      axios({
        url: link,
        methods: "GET",
        responseType: "blob",
      })
        .then((res) => {
          const url = window.URL.createObjectURL(new Blob([res.data]));
          const link = document.createElement("a");
          link.href = link;
          link.setAttribute("download", "image.zip");
          document.body.appendChild(link);
          link.click();
          this.$router.push({ name: "home" });
        })
        .catch((error) => {
          
          this.$notify({
            type: "error",
            title: "Not Download! Something Went Wrong",
          });
          this.$router.push({ name: "home" });
        });
    },
  },
};
</script>