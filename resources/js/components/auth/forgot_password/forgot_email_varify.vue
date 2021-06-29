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
              <h5 class="pb-4">Enter Your Varification Token</h5>
              <form @submit.prevent="forgotPassword">
                <div class="form-group">
                  <input
                    type="token"
                    v-model.trim="token"
                    class="form-control"
                    placeholder="Enter Your Token"
                  />
                  <small class="text-danger" v-if="token_err">{{
                    token_err
                  }}</small>
                </div>
                <div class="form-group">
                  <input
                    type="submit"
                    value="Varify Token"
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
      token: "",
      token_err: "",
    };
  },
  mounted() {

  },
  methods: {
    forgotPassword() {
      this.$store
        .dispatch("forgotPasswordVarify", { remember_token: this.$route.params.token, token:this.token})
        .then((res) => {
          console.log(res);
          if (res.data.msg) {
            this.email_err = res.data.msg;
          } else {
            var remember_token_data= res.data.remember_token;
            
             this.$router.push({ name: 'forgotPasswordReset', params:{remember_token:remember_token_data}});
            
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