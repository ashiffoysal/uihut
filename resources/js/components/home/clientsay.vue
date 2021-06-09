<template>
  <div class="text-center card p-5">
    <h2>This is Client Say</h2>
    <ul class="list-group mt-2" v-for="(review,index) in clientSays" :key="index">
      <li class="list-group-item">{{review.name}}</li>
      <li class="list-group-item">{{review.designation}}</li>
      <li class="list-group-item">{{review.review}}</li>
    </ul>
  </div>
</template>
<script>
export default {
  name: "ClientSay",
  props:{
    clientSays:{
      require:true,
    }
  }
};
</script>