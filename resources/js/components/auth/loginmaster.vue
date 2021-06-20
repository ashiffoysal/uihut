<template>
  <div class="col-lg-12">
    <HeaderComponent />
    <router-view></router-view>
   
  </div>
</template>
<script>
import HeaderComponent from "./inc/header";

export default {
  name: "LoginMaster",
  components: {
    HeaderComponent,
  },
  
};
</script>