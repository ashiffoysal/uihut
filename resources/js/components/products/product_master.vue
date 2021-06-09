<template>
  <div class="col-lg-12">
    <HeaderComponent />
    <router-view></router-view>
    <FooterComponent />
  </div>
</template>
<script>
import HeaderComponent from "./inc/header";
import FooterComponent from "./inc/footer";
export default {
  name: "HomeMaster",
  components: {
    HeaderComponent,
    FooterComponent,
  },
};
</script>