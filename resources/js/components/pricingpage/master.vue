<template>
    <div class="container-fluid">
        <div class="col-md-12 p-0 m-0">
        <Breadcam-component></Breadcam-component>
        <Price-Component :prices="getPrice"></Price-Component>
        <Exclusive-Component></Exclusive-Component>
        <Service-Component></Service-Component>
        </div>
    </div>
</template>
<script>
import BreadcamComponent from '../breadcam/breadcum';
import PriceComponent from '../pricingpage/price';
import ExclusiveComponent from '../pricingpage/exclusive';
import ServiceComponent from '../home/service-banner';
export default {
    name:'PricingComponent',
    components:{
        BreadcamComponent,
        PriceComponent,
        ExclusiveComponent,
        ServiceComponent,
    },
    created() {
          this.$store.dispatch("retrivePrice");
    },
    computed: {
        getPrice(){
            return this.$store.getters.getPrice;
        }
    }

    
}
</script>