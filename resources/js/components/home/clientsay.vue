<template>
  <div class="text-center card p-5">
    <h2>This is Client Say</h2>
    <ul class="list-group mt-2" v-for="(review,index) in getClientSay" :key="index">
      <li class="list-group-item">{{review.name}}</li>
      <li class="list-group-item">{{review.designation}}</li>
      <li class="list-group-item">{{review.review}}</li>
    </ul>
  </div>
</template>
<script>
export default {
  name: "ClientSay",
  mounted() {
    this.$store.dispatch("retriveClientSay");
  },
  computed: {
    getClientSay() {
      return this.$store.getters.getClientSay;
    },
  },
};
</script>