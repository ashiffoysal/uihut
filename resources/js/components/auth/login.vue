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
                            <h2>Sign In to aabbro </h2>
                            
                            <p>Let’s sign in first for enter into Pixefy website.</p>
                            <form @submit.prevent="login">
                                <div class="form-group"> 
                                    <input type="email" v-model.trim="userData.email" class="form-control" placeholder="Enter username or email">
                                     <small class="text-danger" v-if="email_err">{{email_err}}</small>
                                </div>
                                <div class="form-group"> 
                                    <div class="input-group">
                                       <input type="password" class="form-control" v-model.trim="userData.password"  minlength="6" placeholder="Enter Password">
                                        <small class="text-danger" v-if="password_err">{{password_err}}</small>
                                       <div class="input-group-append toggle-password" >
                                        <i class="fa fa-eye" aria-hidden="true"></i>

                                       </div>
                                    </div>
                                </div>
                                <ul class="remember-forget">
                                    <li>
                                        <div class="form-group">
                                            <label for="rememberPass"> <input type="checkbox" name="" id="rememberPass"> Remember Password</label>

                                        </div>
                                    </li>
                                    <li>
                                        <a href="#" class="forget-pass-btn">Forgot Password? </a>
                                    </li>
                                </ul>
                                <div class="form-group">
                                    <input type="submit" value="Sign In" class="formSubmitBtn">
                                </div>
                                <span class="orC">or continue with</span>
                                <ul class="google-fb-list">
                                    <li>
                                        <div class="gfl-btn">
                                            <a href="#"><img src="public/frontend/assets/img/icons/g-icon.png" alt=""> Google</a>
                                        </div>
                                    </li>
                                    <li>
                                        <facebookLogin class="button" appId="196647462367533" @login="onLogin" @logout="onLogout" @sdk-loaded="sdkLoaded"></facebookLogin>
                                            <!-- <a href="#"><img src="public/frontend/assets/img/icons/fb.png" alt=""> Facebook</a> -->
                                           
                                      
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</template>

<script>
import facebookLogin from 'facebook-login-vuejs'
export default {
  name: "Login",
  components: {
    facebookLogin:facebookLogin
  },
  data() {
    return {
        userData:{
            email:'',
            password:'',
        },
        email_err:'',
        password_err:'',

        // idImage, loginImage, mailImage, faceImage,
        isConnected: false,
        name: '',
        email: '',
        personalID: '',
        FB: undefined,
    };
  },
  mounted() {},
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
      },
      // fb login
      getUserData() {
      this.FB.api('/me', 'GET', { fields: 'id,name,email' },
        userInformation => {
          this.$router.push({ name: 'dashboard'});
          console.warn("data api",userInformation)
          this.personalID = userInformation.id;
          this.email = userInformation.email;
          this.name = userInformation.name;
        }
      )
    },
    sdkLoaded(payload) {
      this.isConnected = payload.isConnected
      this.FB = payload.FB
      if (this.isConnected) this.getUserData()
    },
    onLogin() {
      this.isConnected = true
      this.getUserData()
    },
    onLogout() {
      this.isConnected = false;
    },
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