<template>
<div class="login-register-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="log-reg-img">
                        <img src="public/frontend/assets/img/sign-in.png" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="log-reg-form-wrapper">
                        <div class="login-form">
                            <h5>Reset Your Password</h5>
                            <form @submit.prevent="passwordReset">
                                <div class="form-group"> 
                                    <input type="password" class="form-control" minlength="6" v-model.trim="userData.password" placeholder="Enter Your Password">
                                     <small class="text-danger" v-if="password_err">{{email_err}}</small>
                                </div>
                                <div class="form-group"> 
                                    <div class="input-group">
                                       <input type="password" class="form-control" v-model="userData.password_confirmation"  minlength="6" placeholder="Confirm Passwords">
                                        <small class="text-danger" v-if="password_err">{{password_err}}</small>
                                       <div class="input-group-append toggle-password" >
                                        <i class="fa fa-eye" aria-hidden="true"></i>

                                       </div>
                                    </div>
                                </div>
                          
                                <div class="form-group">
                                    <input type="submit" value="Sign In" class="formSubmitBtn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</template>

<script>
export default {
  name: "ResetPassword",
  data() {
    return{
        userData:{
            password:'',
            password_confirmation:'',
            token:this.$route.params.remember_token
        }

    }
  },
  mounted() {
      
  },
  methods: {
      passwordReset(){
          this.$store.dispatch('passwordReset',this.userData)
          .then((res)=>{
              console.log(res);
              this.$router.push({name:'login'});
          })
          .catch((err)=>{
              if(err.response.data.errors.password){
                  alert(err.response.data.errors.password[0])
              }
          });
      }
  },
};
</script>
<style scoped>
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
.footer {
  position: absolute;
  background: #ccc;
  margin: 0;
  bottom: 0;
  width: 100%;
}
body {
  margin: 0;
}
</style>