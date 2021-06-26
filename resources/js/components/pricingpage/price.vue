<template>
    <!-- Pricing Area -->
    <!-- Pricing Area -->
    <div class="aabbro-pricing-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pricing-section-head wow slideInUp" data-wow-duration="1s">
                        <h2>Simple, Cheap Pricing</h2>
                    </div>
                </div>
            </div>
            <div class="countdown-area-wrapper">
                <div class="row">
                    <div class="col-md-5">
                        <div class="aabbro-countdown-area">
                            <p>Get Your Access Immedietly</p>
                            <div data-countdown="2021/12/12"></div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="lifetime-deal-box">
                            <ul>
                                <li>
                                    <h4>Lifetime Deal</h4>
                                    <p>Per day 50 Download</p>
                                </li>
                                <li>
                                    <h4>$100</h4>
                                    <p>One Time Payment</p>
                                </li>
                                <li>
                                    <a href="#" class="buy-plan-btn">BUY YOUR PLANS</a>
                                </li>
                            </ul>
                        </div>
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
    <!-- /Pricing Area -->
</template>
<script>
export default {
  name: "PriceComponent",
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