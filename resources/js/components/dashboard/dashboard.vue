<template>
  <div class="col-lg-12 mt-5">
    <div class="text-center card p-5">
      <h2>This is Dashboard</h2>
      <h2>This is Dashboard
      
       <router-link class="btn btn-success" :to="{name:'logout'}">Logout</router-link>
      </h2>
      
    </div>
  </div>
</template>
<script>
export default {
  name: "Dashboard",
  mounted() {
    
  },
};
</script>