<template>
      <div class="col-lg-12">
          <Banner-component/>
          <Category-component/>
          <Explore-component/>
          <Client-say-component/>
          <Pricing-component/>
          <Service-banner-component/>
      </div>
</template>
<script>
import BannerComponent from './banner';
import CategoryComponent from './category'
import ExploreComponent from './explore'
import ClientSayComponent from './clientsay'
import PricingComponent from './pricing'
import ServiceBannerComponent from './service-banner'
export default {
  name: "MainComponent",
  components: {
      BannerComponent,
      CategoryComponent,
      ExploreComponent,
      ClientSayComponent,
      PricingComponent,
      ServiceBannerComponent,
  },
};
</script>