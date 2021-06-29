<template>
  <div class="product-category-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="section-head wow slideInUp" data-wow-duration="1s">
                        <h2>Product Categories</h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="er-btn wow slideInUp" data-wow-duration="1s">
                        <router-link class="aabbro-btn-a" :to="{name:'products',params:{cat:getHeaderSubcat.slug,subcat:getHeaderSubcat.subcat,id:getHeaderSubcat.id}}">Explore Resources</router-link>
                    </div>
                </div>
              
            </div>
            <div class="product-caegory-wrapper">
                <div class="row">
                    <div class="col-md-4 wow slideInUp" data-wow-duration=".33s" v-for="(category, index) in categores" :key="index">
                        <div class="single-category-block">
                            <router-link :to="{name:'products',params:{cat:getHeaderSubcat.slug,subcat:getHeaderSubcat.subcat,id:getHeaderSubcat.id}}">
                                <div class="scb-img">
                                    <img :src="category.image" alt="">
                                </div>
                                <div class="scb-text">
                                    <h4>{{ category.name }}</h4>
                                    <ul>
                                        <li><div class="scbt-download"><img src="public/frontend/assets/img/icons/download.png" alt=""><span>10</span></div></li>
                                        <li><div class="scbt-premium"><img src="public/frontend/assets/img/icons/premium-yellow.png" alt=""></div></li>
                                    </ul>
                                </div>
                            </router-link>
                        </div>
                    </div>
             
                    <div class="col-md-12">
                        <div class="er-btn er-btn-mobile wow slideInUp" data-wow-duration="1s">
                            <router-link class="aabbro-btn-a" :to="{name:'products',params:{cat:getHeaderSubcat.slug,subcat:getHeaderSubcat.subcat,id:getHeaderSubcat.id}}">Explore Resources</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

</template>

<script>
export default {
  name: "HomeCategory",
  props: {
    categores: {
      require: true,
    },
  },
 mounted() {

    this.$store.dispatch('getHeaderSubcat');
  },
  computed:{
          getHeaderSubcat(){
              return this.$store.getters.getSubCategory;
          },
          
      },
};
</script>