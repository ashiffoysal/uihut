<template>
  <div class="col-lg-12">
    <Banner-component :banners="getBanner"/>
    <Category-component :categores="getCategores"/>
    <Explore-component :explores="getExplores"/>
    <Client-say-component :clientSays="getClientSay"/>
    <Pricing-component :prices="getPrice"/>
    <Service-banner-component />
  </div>
</template>
<script>
import BannerComponent from "./banner";
import CategoryComponent from "./category";
import ExploreComponent from "./explore";
import ClientSayComponent from "./clientsay";
import PricingComponent from "./pricing";
import ServiceBannerComponent from "./service-banner";

import { mapGetters } from 'vuex'
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
  mounted() {
    this.$store.dispatch("retriveHomeBanner");
    this.$store.dispatch('retriveCategory');
    this.$store.dispatch("retriveClientSay");
    this.$store.dispatch("retriveExplore");
    this.$store.dispatch("retrivePrice");
  },
  computed: {
    ...mapGetters([
        'getBanner',
        'getCategores',
        'getClientSay',
        'getExplores',
        'getPrice',
    ])
  },
};
</script>