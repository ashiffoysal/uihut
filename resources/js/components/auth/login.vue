<template>
  <div class="col-lg-12">
    <div class="header card m-2 p-5">
      <h2 class="text-center">User Register</h2>
      <form @submit.prevent="login">

        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input
            type="email"
            class="form-control"
            v-model.trim="userData.email"
            placeholder="Email"
          />
        <small class="text-danger" v-if="email_err">{{email_err}}</small>
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input
            type="password"
            class="form-control"
            v-model.trim="userData.password"
            placeholder="Password"
          />
          <small class="text-danger" v-if="password_err">{{password_err}}</small>
        </div>
        <button type="submit" class="btn btn-primary mx-auto text-center mt-4">
          Login
        </button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "Login",
  data() {
    return {
        userData:{
            email:'',
            password:'',
        },
        email_err:'',
        password_err:'',

    };
  },
  mounted() {},
  computed: {},

  methods: {
      login(){
          this.$store.dispatch('retriveToken',this.userData)
          .then((res)=>{
            this.$notify({
              text: "Login Success!",
            });
            this.$router.push({ name: 'dashboard'});
          })
          .catch((error)=>{
            if(error.response.data.message){
              var item = error.response.data.message;
               this.$notify({
                 type: 'error',
                title:'Wrong credentials',
                text: item,
            });
            this.userData.password = '';
            }
          });
      }
  },
};
</script>