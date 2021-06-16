<template>
  <div class="product_details">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            <div class="col-lg-12">
              <div class="product_title card p-4">
                <h2>{{ getSingleProduct.title }}</h2>
              </div>
            </div>

            <div
              class="col-12 mt-4"
              v-if="getSingleProduct && getSingleProduct.image"
            >
              <div class="product_img card p-4">
                <carousel :items="1">
                  <div
                    v-for="(image, index) in getSingleProduct.image"
                    :key="index"
                  >
                    <img :src="'storage/app/public/' + image" />
                  </div>
                </carousel>
              </div>
            </div>

            <div class="col-12 mt-4">
              <div class="product_details card p-4">
                <h4>Overview</h4>
                <p>{{ getSingleProduct.description }}</p>
              </div>
            </div>
            <div class="col-12 mt-4">
              <div class="product_details card p-4">
                <h4>Tags</h4>
                <p
                  class="btn btn-secondary d-line p-2 m-2"
                  v-for="(tag, index) in getSingleProduct.tag"
                  :key="index"
                >
                  {{ tag }}
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="download_area">
            <div class="card">
              <div class="card-header">Download</div>
              <div class="card-body">
                <table class="table table-bordered">
                  <tbody class="text-center">
                    <tr v-for="(item,index) in getSingleProduct.software" :key="index">
                      <td>{{index}}</td>
                      <td>
                          <button type="button" class="btn btn-warning" @click="checkDownload">Download</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import carousel from "vue-owl-carousel";
export default {
  components: { carousel },
  mounted() {
    var id = this.$route.params.id;
    this.$store.dispatch("retriveProductByID", id);
  },
   watch: {
    $route(to, from) {
        var id = this.$route.params.id;
      this.$store.dispatch("retriveProductByID", id);
    },
  },
  computed: {
    getSingleProduct() {
      return this.$store.getters.getSingleProduct;
    },
    isLogin(){

    }
  },
  methods:{
    checkDownload(){
      if(this.$store.getters.isLogin){
        alert('login');
      }else{
        this.$router.push({name:'login'});
      }
    }
  }
};
</script>