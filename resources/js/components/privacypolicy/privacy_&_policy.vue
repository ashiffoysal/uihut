<template>
  <div class="col-lg-12">
    <div class="text-center card p-5">
        <h1>
            THis is Privacy Policy
        </h1>
          <p>{{getPrivacyPolicy.details}} </p>
       

        </div>
        

    </div>
  </div>
</template>
<script>
export default {
  name: "privacy",
  mounted(){
    this.$store.dispatch('retrivePrivacypolicy');
    },
  computed:{
    getPrivacyPolicy(){
      return this.$store.getters.getPrivacyPolicy;
    }
  }
  
};
</script>