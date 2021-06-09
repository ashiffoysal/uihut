<template>
      <div class="col-lg-12">
          <div class="header card m-2 p-5 text-center">
              <h2>Header and Menu Area</h2>
              <router-link class="btn btn-primary" to="/">Home</router-link>
              <router-link class="btn btn-primary mt-4" to="/blogs">Blog</router-link>
              <router-link class="btn btn-primary mt-4" v-if="!logedIn" :to="{name:'register'}">Register</router-link>
              <router-link class="btn btn-primary mt-4" v-if="!logedIn" :to="{name:'login'}">Login</router-link>
              <router-link class="btn btn-primary mt-4" v-if="logedIn" :to="{name:'dashboard'}">Dashboard</router-link>
              <router-link class="btn btn-primary mt-4" v-if="logedIn" :to="{name:'logout'}">Logout</router-link>
          </div>
      </div>
</template>

<script>
export default {
    name:'Header_Part',
    computed:{
        logedIn(){
            return this.$store.getters.logedIn;
        }
    }
}
</script>