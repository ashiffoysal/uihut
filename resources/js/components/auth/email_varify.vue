<template>
  <div class="col-lg-12">
    <div class="header card m-2 p-5">
      <h2 class="text-center">Varify Your Email</h2>
      <form @submit.prevent="varifyemail">
        <div class="form-group">
          <label for="exampleInputEmail1">Varify Email Code</label>
          <input
            type="text"
            class="form-control"
            v-model.trim="varify_code"
            placeholder="Varify Code"
          />
          <small class="text-danger" v-if="varify_code_err">{{varify_code_err}}</small>
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
  name: "EmailVarify",
  data() {
    return {
        varify_code:'',
        varify_code_err:'',
    };
  },
  mounted() {},
  computed: {},

  methods: {
    varifyemail() {
      var id = this.$route.params.id;
      var email = this.$route.params.email;

      axios.post("/user/email/varify",{
        id:id,
        email:email,
        code:this.varify_code,
      }).then((res) => {
          this.$router.push('/');
        })
        .catch((error) => {
          if(error.response.data.error){
                   this.varify_code_err = error.response.data.error;
               }
               if(error.response.data.errors.code){
                   this.varify_code_err = error.response.data.errors.code[0];
               }
        });
    },
  },
};
</script>