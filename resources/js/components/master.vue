<template>
  <div class="container-fluid p-0">
      <div class="col-md-12 p-0 m-0">
        <notifications/>
        <router-view></router-view>
       </div>
  </div>
</template>
<script>
export default {
  name:'MasterComponent',
}
</script>