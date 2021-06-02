<template>
      <div class="col-lg-12">
          <Banner-component/>
          <Category-component/>
      </div>
</template>
<script>
import BannerComponent from './banner';
import CategoryComponent from './category'
export default {
  name: "MainComponent",
  components: {
      BannerComponent,
      CategoryComponent,
  },
};
</script>