<template>
  <div class="row">
    <header-component />
    <router-view></router-view>
    <footer-component/>
  </div>
</template>
<script>

import headerComponent from "./inc/header";
import footerComponent from "./inc/footer";
export default {
  name: "master",
  components: {
    headerComponent,
    footerComponent
  },
};
</script>