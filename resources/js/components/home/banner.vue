<template>
  <div class="text-center card p-5">
    <h2>This is Banner</h2>
    <ul class="list-group" v-for="(banner, index) in banners" :key="index">
      <li class="list-group-item">{{ banner.heading_text }}</li>
      <li class="list-group-item">{{ banner.sub_text }}</li>
      <li class="list-group-item">{{ banner.video_link }}</li>
    </ul>
  </div>
</template>
<script>
export default {
  name: "Home_Banner",
  props: {
    banners: {
      require: true,
    }
  },
};
</script>