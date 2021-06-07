<template>
  <div class="text-center card p-5">
    <h2>This is Pricing</h2>
    <div class="row">
      <div class="col-lg-4" v-for="(price, index) in getPrice" :key="price.id">
        <div class="prising_area">
          <ul class="list-group">
            <li class="list-group-item"><b>Title :</b>{{ price.title }}</li>
            <li class="list-group-item">
              <b>Access :</b>{{ price.access_time_text }}
            </li>
            <li class="list-group-item"><b>Price :</b>{{ price.price }}</li>
            <li class="list-group-item">
              <b>Old Price :</b>{{ price.old_price }}
            </li>
            <li class="list-group-item">
              <ul class="list-group">
                <li
                  class="list-group-item"
                  v-for="(feature, index) in price.feature"
                  :key="index"
                >
                  {{ feature }}
                </li>
              </ul>
            </li>
            <li :class="getColor(index)">Buy Plane</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "PricingComponent",
  data() {
    return {
      existClass: "list-group-item text-white",
      conClass: "bg-primary",
    };
  },
  methods: {
    getColor(index) {
      if(index % 2 != 0){
          return 'list-group-item text-white bg-primary'
      }else{
           return 'list-group-item text-white bg-success'
      }
    },
  },
  mounted() {
    this.$store.dispatch("retrivePrice");
  },
  computed: {
    getPrice() {
      return this.$store.getters.getPrice;
    },
  },
};
</script>