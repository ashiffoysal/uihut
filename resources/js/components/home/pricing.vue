<template>
  
    <div class="aabbro-pricing-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pricing-section-head wow slideInUp" data-wow-duration="1s">
                        <h2>Simple, Cheap Pricing</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div v-for="(price, index) in prices" :key="price.id" class="col-md-4 wow slideInUp" data-wow-duration=".33s">
                    <div class="single-pricing">
                        <div class="sprice-head">
                            <ul>
                                <li>
                                    <img :src="getIcon[index]" alt="">
                                </li>
                                <li>
                                    <h5>{{ price.title }}</h5>
                                    <p>{{ price.access_time_text }}</p>
                                </li>
                                <li>
                                    <h4>{{ price.price }} $</h4>
                                </li>
                            </ul>
                        </div>
                        <div class="sprice-features">
                            <ul class="atia-list">
                                <li v-for="(feature, index) in price.feature" :key="index"><img src="public/frontend/assets/img/icons/check-green.png" alt="">{{ feature }}</li>
                            </ul>
                        </div>
                        <div class="sprice-bottom" v-if="getColor.length > 0">
                            <a :href="paymentLink" :class="getColor[index]">
                                BUY PLANS
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
  name: "PricingComponent",
  props:{
    prices:{
      require:true,
    }
  },
  computed:{
      getColor(){
          return[
              'pricing-btn pbtn-1 bg-secondery','pricing-btn pbtn-2','pricing-btn pbtn-3'
          ]
      },
      getIcon(){
          return[
              'public/frontend/assets/img/icons/pricing/free.png',
              'public/frontend/assets/img/icons/pricing/monthly.png',
              'public/frontend/assets/img/icons/pricing/quarterly.png'
          ]
      },
      paymentLink(){
          return this.$store.getters.paymentLink;
      }
  },
  mounted() {
      this.$store.dispatch('retrivePaymentLink');
  }
};
</script>