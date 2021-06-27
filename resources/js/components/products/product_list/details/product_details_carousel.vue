<template>
  <div class="pdg-box">
    <div class="container">
      <div class="row">
        <div class="col-md-12" v-if="getSingleProduct.image.length >0">
          <div
            id="custCarousel"
            class="product-gallary-carousel carousel slide"
            data-bs-ride="carousel"
          >
            <div class="carousel-inner">
              <div class="carousel-item" v-for="(image,index) in getSingleProduct.image" :key="index" :class="{'active':index == 0}">
                <router-link :to="{name:'galleryImage',params:{slug:getSingleProduct.slug,id:getSingleProduct.id,product:getSingleProduct}}">
                  <img
                    :src="
                      asset(
                        'storage/app/public/'+image
                      )
                    "
                    alt="Hills"
                  />
                </router-link>
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

              <li class="list-inline-item" v-for="(image,index) in getSingleProduct.image" :key="index" :class="{'active':index == 0}">
                <a
                  :id="`carousel-selector-${index}`"
                  class="carousel-thumb selected"
                  :data-slide-to="index"
                  data-target="#custCarousel"
                >
                  <img
                    :src="
                      asset(
                        'storage/app/public/'+image
                      )
                    "
                    alt="Hills"
                  />
                </a>
              </li>
             

            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name:'ProductDetailsCarousel',
    props:{
        getSingleProduct:{
            require:true,
        }
    }
}
</script>