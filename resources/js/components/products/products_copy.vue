<template>
  <div class="col-lg-12 m-4 d-block card">
    <div class="row">
      <div class="col-lg-12 p-0">
        <div class="header_menue border p-4">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li
                  class="nav-item btn btn-sm btn-warning m-1"
                  v-for="cat in getProductCategores"
                  :key="cat.id"
                >
                  <router-link
                    :to="{
                      name: 'products',
                      params: { cat: cat.slug, subcat: cat.subcate },
                    }"
                    class="nav-link"
                    >{{ cat.name }}<span class="sr-only">(current)</span>
                  </router-link>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0">
                <input
                  class="form-control mr-sm-2"
                  type="search"
                  placeholder="Search"
                  aria-label="Search"
                  v-model="selected.search"
                />
                <button
                  class="btn btn-outline-success my-2 my-sm-0"
                  type="submit"
                >
                  Search
                </button>
              </form>
            </div>
          </nav>
        </div>
      </div>
      <div class="col-lg-4 border">
        <div
          class="btn-group ml-4 mt-4"
          role="group"
          aria-label="Basic example"
          v-for="subcat in getProductSubCategores"
          :key="subcat.id"
        >
          <router-link
            :to="{
              name: 'products',
              params: { cat: getCategerySlug, subcat: subcat.slug },
            }"
            class="btn btn-primary"
            >{{ subcat.name }}<span class="sr-only">(current)</span>
          </router-link>
        </div>

        <ul class="list-group m-4">
          <li
            class="list-group-item"
            v-for="resub in getProductReSubCategores"
            :key="resub.id"
          >
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                :id="'id' + resub.id"
                :value="resub.id"
                v-model="selected.resubcat"
              />
              <label class="form-check-label" for="defaultCheck1">
                {{ resub.name
                }}<small class="text-right">({{ resub.products_count }})</small>
              </label>
            </div>
          </li>
        </ul>
      </div>
      <div class="col-lg-7">
        <div class="row">
          <div
            class="col-lg-6"
            v-for="product in getMainProducts"
            :key="product.id"
          >
            <router-link
              class="nav-link"
              :to="{ name: 'singleProduct', params: { id: product.id } }"
            >
              <div class="card mt-4" style="width: 18rem">
                <img
                  class="card-img-top"
                  :src="product.image"
                  alt="Card image cap"
                />
                <div class="card-body">
                  <h5 class="card-title">{{ product.title }}</h5>
                </div>
              </div>
            </router-link>
          </div>

          <button
            type="button"
            @click="loadMoreProduct"
            class="btn btn-primary text-center m-4"
            v-if="showLoadMoreButton"
          >
            Load More
          </button>

          <!-- <a  :href="http://localhost/uihut/uihut613/api/get/product/category-2/SubCategory-4?page=2">dfdas</a> -->
        </div>
      </div>

      <div class="col-lg-1">
        <div class="dropdown mt-4">
          <button
            class="btn btn-secondary dropdown-toggle"
            type="button"
            id="dropdownMenuButton"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          ></button>

          <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton">
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value="1"
                id="flexCheckDefault"
                v-model="selected.filter"
              />
              <label class="form-check-label" for="flexCheckDefault">
                Default checkbox
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "ProductsComponent",
  data() {
    return {
      page: 2,
      selected: {
        resubcat: [],
        filter: [],
        search: "",
      },
    };
  },
  created() {
    var cat = this.$route.params.cat;
    var subcat = this.$route.params.subcat;
    this.$store.dispatch("retriveCategores");
    this.$store.dispatch("retriveSubCategores", cat);
    this.$store.dispatch("retriveReSubCategores", { cat: cat, subcat: subcat });
    this.$store.dispatch("retriveProduct", { cat: cat, subcat: subcat });
  },

  computed: {
    getCategerySlug() {
      return this.$route.params.cat;
    },
    getProductCategores() {
      return this.$store.getters.getProductCategores;
    },
    getProductSubCategores() {
      return this.$store.getters.getProductSubCategores;
    },
    getProductReSubCategores() {
      return this.$store.getters.getProductReSubCategores;
    },
    getMainProducts() {
      return this.$store.getters.getMainProducts;
    },
    showLoadMoreButton(){
      return this.$store.getters.nextPageLink;
    }
  },

  watch: {
    $route(to, from) {
      var cat = this.$route.params.cat;
      var subcat = this.$route.params.subcat;
      this.$store.dispatch("retriveCategores");
      this.$store.dispatch("retriveSubCategores", cat);
      this.$store.dispatch("retriveReSubCategores", {
        cat: cat,
        subcat: subcat,
      });

      this.$store.dispatch("retriveProduct", { cat: cat, subcat: subcat });
      this.selected.resubcat = [];
      this.selected.filter = [];
      this.selected.search = "";
    },
    selected: {
      handler: function () {
        var cat = this.$route.params.cat;
        var subcat = this.$route.params.subcat;
        this.$store.dispatch("retriveFilterProduct", {
          cat: cat,
          subcat: subcat,
          items: this.selected,
        });
      },
      deep: true,
    },
  },

  methods: {

    // product pagination
    loadMoreProduct() {
      var cat = this.$route.params.cat;
      var subcat = this.$route.params.subcat;
      axios
        .get(`get/filter/product/${cat}/${subcat}?page=${this.page}`)
        .then((res) => {
          var data = res.data.data;
          this.$store.dispatch('storeLoadMoreProduct',data)
          this.page += 1;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>