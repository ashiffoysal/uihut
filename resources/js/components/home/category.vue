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
                        <a href="#" class="aabbro-btn-a">Explore Resources</a>
                    </div>
                </div>
              
            </div>
            <div class="product-caegory-wrapper">
                <div class="row">
                    <div class="col-md-4 wow slideInUp" data-wow-duration=".33s" v-for="(category, index) in categores" :key="index">
                        <div class="single-category-block">
                            <a href="#">
                                <div class="scb-img">
                                    <img :src="category.image" alt="">
                                </div>
                                <div class="scb-text">
                                    <h4>{{ category.name  }}</h4>
                                    <ul>
                                        <li><div class="scbt-download"><img src="public/frontend/assets/img/icons/download.png" alt=""><span>2360</span></div></li>
                                        <li><div class="scbt-premium"><img src="public/frontend/assets/img/icons/premium-yellow.png" alt=""></div></li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
             
                    <div class="col-md-12">
                        <div class="er-btn er-btn-mobile wow slideInUp" data-wow-duration="1s">
                            <a href="#" class="aabbro-btn-a">Explore Resources</a>
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
};
</script>