<template>
  <div class="text-center card p-5">
    <h2>This is Category</h2>
    <ul class="list-group mt-2" v-for="(category,index) in getCategores" :key="index">
      <li class="list-group-item">{{category.name}}</li>
      <li class="list-group-item">
          <img :src="category.image" alt="" width="5%"/>
      </li>
      <li class="list-group-item">{{category.icon}}</li>
    </ul>
  </div>
</template>

<script>
export default {
    name:"HomeCategory",
    mounted(){
        this.$store.dispatch('retriveCategory');
    },
    computed:{
        getCategores(){
            return this.$store.getters.getCategores;
        }
    }
}
</script>