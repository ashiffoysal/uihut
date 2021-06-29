<template>
  <div class="col-lg-12">
    <preloader v-if="preloader"></preloader>
    <router-view></router-view>
  </div>
</template>
<script>
import preloader from './preloader'
export default {
  name: "HomeMaster",
};
</script>