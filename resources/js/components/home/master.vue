<template>
  <div class="row">
    <HeaderComponent :getLogo='getLogo'/>
    <router-view></router-view>
    <FooterComponent :getLogo='getLogo'/>
  </div>
</template>
<script>
import HeaderComponent from "../inc/header";
import FooterComponent from "../inc/footer";
export default {

  name: "HomeMaster",
  components: {
    HeaderComponent,
    FooterComponent,
  },
    mounted(){

        this.$store.dispatch('retriveLogo');
    },
    computed:{
        getLogo(){
        return this.$store.getters.getLogo.data;
        },
    },

};
</script>