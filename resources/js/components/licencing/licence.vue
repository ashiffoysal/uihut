<template>
  <div class="col-lg-12">
        <div class="text-center card p-5">
            <h1>
                THis is Licence Page 
            </h1>
            <p>{{ getLicencing.subtext }}</p>
            <p>{{ getLicencing.aggrement }}</p>
            <p>{{ getLicencing.you_can }}</p>
            <p>{{ getLicencing.you_cannot}}</p>
            <p>{{ getLicencing.details}}</p>
       

        </div>
    </div>
  
</template>
<script>

export default {
  name: "licencing",
  mounted(){
    this.$store.dispatch('retriveLicencing');
    },
  computed:{
    getLicencing(){
      return this.$store.getters.getLicencing;
    }
  }
  
};

</script>