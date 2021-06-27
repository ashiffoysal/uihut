<template>
  <div class="container-fluid">
    <!-- Header Area -->
    <header class="aabbro-header-pop">
      <router-link
        :to="{
          name: 'singleProduct',
          params: { id: product.id, slug: product.slug },
        }"
        ><i class="fa fa-times" aria-hidden="true"></i
      ></router-link>
    </header>
    <!-- /Header Area -->

    <!-- Product Details Area -->
    <div class="product-details-area pd-gallery-details">
      <div class="product-details-head-area">
        <div class="container">
          <div class="pdha-box">
            <div class="row">
              <div class="col-md-6">
                <div class="pdha-title">
                  <h4>{{ product.title }}</h4>
                  <ul>
                    <li><i class="fa fa-eye" aria-hidden="true"></i>246</li>
                    <li>
                      <i class="fa fa-cloud-download" aria-hidden="true"></i>14
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-6">
                <div class="pgallry-thumbs"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="product-details-gallary">
        <div class="pdg-box">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div
                  id="custCarousel"
                  class="product-gallary-carousel carousel slide"
                  data-bs-ride="carousel"
                >
                  <div class="carousel-inner">
                    <div
                      v-for="(image, index) in product.image" class="carousel-item" :class="{'active':index == 0}"
                      :key="index"
                    >
                      <a href="gallery-img-details.html">
                        <img
                          :src="asset('storage/app/public/' + image)"
                          alt="Hills"
                        />
                      </a>
                    </div>
                  </div>
                  <a
                    class="carousel-control-prev"
                    href="#custCarousel"
                    data-bs-slide="prev"
                    ><i class="fa fa-angle-left" aria-hidden="true"></i
                  ></a>
                  <a
                    class="carousel-control-next"
                    href="#custCarousel"
                    data-bs-slide="next"
                    ><i class="fa fa-angle-right" aria-hidden="true"></i
                  ></a>
                  <ol class="carousel-indicators list-inline">




                    <li v-for="(image, index) in product.image" :key="index" class="list-inline-item product_image" :class="{'active':index == 0}">
                      <a
                        :id="`carousel-selector-${index}`"
                        class="carousel-thumb selected"
                        :data-slide-to="index"
                        data-target="#custCarousel"
                      >
                        <img
                         :src="asset('storage/app/public/' + image)"
                          alt="Hills"
                          class="img-fluid"
                        />
                      </a>
                    </li>

                  </ol>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Product Details Area -->
  </div>
</template>
<script>
export default {
  name: "GalleryImage",
  created() {
    var id = this.$route.params.id;
    this.$store.dispatch("retriveProductByID", id);
  },
  computed: {
    product() {
      return this.$store.getters.getSingleProduct;
    },
  },
};
</script>
<style scoped>
    .product_image{
        cursor: pointer;
    }
</style>
