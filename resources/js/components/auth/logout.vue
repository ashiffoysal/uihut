<template>
    
</template>
<script>
export default {
    name:'logedOut',
    mounted(){
        this.$store.dispatch('destroyToken',this.userData)
          .then((res)=>{
              var massage = res.data.message;
               this.$notify({
              text: massage,
            });
            this.$router.push({ name: 'login'});
          });
    }
}
</script>