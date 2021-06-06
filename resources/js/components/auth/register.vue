<template>
  <div class="col-lg-12">
    <div class="header card m-2 p-5">
      <h2 class="text-center">User Register</h2>
      <form @submit.prevent="register">
        <div class="form-group">
          <label for="exampleInputEmail1">Full Name</label>
          <input
            type="text"
            class="form-control"
            v-model.trim="userData.fullname"
            placeholder="Full Name"
          />
          <small class="text-danger" v-if="fullname_err">{{fullname_err}}</small>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">User Name</label>
          <input
            type="text"
            class="form-control"
            v-model.trim="userData.user_name"
            placeholder="User Name"
          />
          <small class="text-danger" v-if="user_name_err">{{user_name_err}}</small>
        </div>

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

        <div class="form-group">
          <label for="exampleInputPassword1">Confirm</label>
          <input
            type="password"
            class="form-control"
            v-model.trim="userData.password_confirmation"
            placeholder="Confirm Password"
          />
        </div>
        <div class="form-check">
          <input
            type="checkbox"
            class="form-check-input"
            v-model="userData.terms_privacy"
          />
          <label class="form-check-label" for="exampleCheck1"
            >Agree with our terms and privacy policy</label
          >
        </div>
        <button type="submit" class="btn btn-primary mx-auto text-center mt-4">
          Submit
        </button>
      </form>
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