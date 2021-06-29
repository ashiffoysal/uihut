<template>
  <div class="login-register-area">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="log-reg-img">
            <img src="public/frontend/assets/img/sign-in.png" alt="" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="log-reg-form-wrapper">
            <div class="login-form">
              <h2 class="pb-4">Forgot Password</h2>
              <form @submit.prevent="forgotPassword">
                <div class="form-group">
                  <input
                    type="email"
                    v-model.trim="email"
                    class="form-control"
                    placeholder="Enter Your Email"
                  />
                  <small class="text-danger" v-if="email_err">{{
                    email_err
                  }}</small>
                </div>
                <div class="form-group">
                  <input
                    type="submit"
                    value="Send Token"
                    class="formSubmitBtn"
                  />
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
  name: "ForgotPassword",
  data() {
    return {
      email: "",
      email_err: "",
    };
  },
  mounted() {},
  methods: {
    forgotPassword() {
      this.$store
        .dispatch("forgotPassword", { email: this.email })
        .then((res) => {
          if (res.data.msg) {
            this.email_err = res.data.msg;
          } else {
            var token = res.data.token;
             this.$router.push({ name: 'forgot_email_varify', params:{token:token}});
            this.$notify({
              text: "Varify Token!",
            });
            
          }
        })
        .catch((error) => {
          if (error.response.data.msg) {
            this.email_err = error.response.data.msg;
          }
        });
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