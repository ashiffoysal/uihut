<template>
  <div class="text-center card p-5">
    <h2>This is Explore</h2>
    <ul
      class="list-group mt-2"
      v-for="(explore, index) in explores"
      :key="index"
    >
      <li class="list-group-item">{{ explore.title }}</li>
      <li class="list-group-item">{{ explore.details }}</li>
      <li class="list-group-item">{{ explore.button_text }}</li>
      <li class="list-group-item">{{ explore.button_link }}</li>
      <li class="list-group-item">
        <video width="320" height="240" controls>
          <source :src="explore.video" type="video/mp4" />
          Your browser does not support the video tag.
        </video>
      </li>
    </ul>
  </div>
</template>
<script>
export default {
  name: "HomeCategory",
  props: {
    explores: {
      require: true,
    },
  },
};
</script>