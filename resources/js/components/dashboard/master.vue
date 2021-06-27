<template>
    <div class="dashboard-main-wrapper">
          <FooterComponent/>
        <div class="dashboard-body">
            <HeaderComponent />
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
import HeaderComponent from "./include/header";
import FooterComponent from "./include/footer";
export default {

  name: "DashboardMaster",
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