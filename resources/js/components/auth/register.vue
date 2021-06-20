<template>
 <div class="login-register-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="log-reg-img">
                        <img src="public/frontend/assets/img/sign-up.png" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="log-reg-form-wrapper">
                        <div class="login-form">
                            <h2>Sign up to aabbro</h2>
                            <p>Let’s sign in first for enter into Pixefy website.</p>
                            <form @submit.prevent="register">
                                <div class="form-group"> 
                                    <input type="text" v-model.trim="userData.fullname" class="form-control" placeholder="Full Name">
                                     <small class="text-danger" v-if="fullname_err">{{fullname_err}}</small>
                                </div>
                                <div class="form-group"> 
                                    <input type="text" v-model.trim="userData.user_name" class="form-control" placeholder="Username">
                                    <small class="text-danger" v-if="user_name_err">{{user_name_err}}</small>
                                </div>
                                <div class="form-group"> 
                                    <input type="email" v-model.trim="userData.email" class="form-control" placeholder="Email Address">
                                    <small class="text-danger" v-if="email_err">{{email_err}}</small>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            <div class="input-group">
                                               <input type="password" class="form-control"  v-model.trim="userData.password" autocomplete="new-password" minlength="6" placeholder="Password">
                                                <small class="text-danger" v-if="password_err">{{password_err}}</small>
                                               <div class="input-group-append toggle-password">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
        
                                               </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            <div class="input-group">
                                               <input type="password" class="form-control" v-model.trim="userData.password_confirmation" autocomplete="new-password" minlength="6" placeholder="Confirm">
                                               <div class="input-group-append toggle-password">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                               </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <ul class="remember-forget">
                                    <li>
                                        <div class="form-group">
                                            <label for="rememberPass"> <input type="checkbox" name="" id="rememberPass"> Remember Password</label>
                                        </div>
                                    </li>
                                    <li> </li>
                                </ul>
                                <div class="form-group">
                                    <input type="submit" value="Sign Up" class="formSubmitBtn">
                                </div>
                                <span class="orC">or continue with</span>
                                <ul class="google-fb-list">
                                    <li>
                                        <div class="gfl-btn">
                                            <a href="#"><img src="public/frontend/assets/img/icons/g-icon.png" alt=""> Google</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="gfl-btn">
                                            <a href="#"><img src="public/frontend/assets/img/icons/fb.png" alt=""> Facebook</a>
                                        </div>
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
export default {
  name: "Register",
  data() {
    return {
      userData: {
        fullname: "",
        user_name: "",
        email: "",
        password: "",
        password_confirmation: "",
        terms_privacy: "",
      },
    // show errors
        password_err:'',
        fullname_err:'',
        user_name_err:'',
        email_err:'',
    };
  },
  mounted() {},
  computed: {},

  methods: {
    register() {
      axios.post("/user/register",this.userData)
        .then((res) => {
            this.userData = {};
            this.$router.push({ name: 'email_varify', params:{email:res.data.email,id:res.data.id}});
        })
        .catch((error) => {
               
               if(error.response.data.errors.fullname){
                   this.fullname_err = error.response.data.errors.fullname[0];
               }
               if(error.response.data.errors.user_name){
                   this.user_name_err = error.response.data.errors.user_name[0];
               }
               if(error.response.data.errors.email){
                   this.email_err = error.response.data.errors.email[0];
               }

               if(error.response.data.errors.password){
                   this.password_err = error.response.data.errors.password[0];
               }

        });
    },
  },
};
</script>