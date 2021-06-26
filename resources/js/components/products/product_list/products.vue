<template>
  <div class="product_area">
    <!-- Header Area -->
    <header class="aabbro-header aabbro-headerV2">
      <nav class="navbar navbar-expand-lg aabbro-navbar">
        <div class="container-fluid">
          <router-link v-if="getLogo" class="navbar-brand" to="/">
            <div class="logo">
              <img :src="getLogo.logo" alt="Logo" class="main-logo" />
              <img :src="getLogo.logo" alt="Logo" class="sticky-logo" />
            </div>
          </router-link>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="search-form-header">
            <form class="d-flex">
              <input
                class="form-control me-2"
                type="search"
                placeholder="Search"
                aria-label="Search"
                v-model="selected.search"
                @keyup="fillterproduct"
              />
              <button class="btn btn-outline-success" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
          </div>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Resources</a
                >
              </li>
              <li class="nav-item">
               <router-link class="nav-link" :to="{name:'pricing'}">Pricing</router-link >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Coustom Service</a>
              </li>
              <li class="nav-item" v-if="!logedIn">
                <router-link
                  class="nav-link sign-in-btn"
                  :to="{ name: 'login' }"
                  >Sign In</router-link
                >
              </li>
              <li class="nav-item" v-if="logedIn">
                <router-link
                  class="nav-link sign-in-btn"
                  :to="{ name: 'dashboard' }"
                  >Dashboard</router-link
                >
              </li>

              <li>
                <div class="search-form-header">
                  <form class="d-flex">
                    <input
                      class="form-control me-2"
                      type="search"
                      placeholder="Search"
                      aria-label="Search"
                    />
                    <button class="btn btn-outline-success" type="submit">
                      <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                  </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- /Header Area -->

    <!-- Category Area -->
    <div class="aabbro-category-area">
      <div class="mobile-cat-filter-btn">
        <div class="container-fluid">
          <ul class="mcatfilter-btn">
            <li>
              <div class="mcat-btn">
                <span class="mobilecategorybtn" @click="mobileCatbtn"
                  ><i class="fa fa-bars" aria-hidden="true"></i
                ></span>
              </div>
            </li>
            <li>
              <div class="m-filter">
                <span class="mobilefilter-btn" v-if="getLogo"
                  >Menu<img :src="getLogo.logo" alt=""
                /></span>
              </div>
            </li>
          </ul>
        </div>
        <div class="closeMobileCatFilter" @click="mobileCatbtnClose">
          <i class="fa fa-times" aria-hidden="true"></i>
        </div>
      </div>
      <div class="container-fluid mt-3">
        <div class="row">
          <div class="col-md-9">
            <div class="aabbro-category">
              <ul class="aabbro-category-lists">
                <li
                  v-for="cat in getProductCategores"
                  :key="cat.id"
                  :class="getCatslug == cat.slug ? 'active' : ''"
                >
                  <router-link
                    :to="{
                      name: 'products',
                      params: { cat: cat.slug, subcat: cat.subcate },
                    }"
                  >
                    {{ cat.name }}
                  </router-link>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-3">
            <div class="category-promo-name">
              <p>
                Flash Sale For <a href="#">Illustration</a><span>25%Off</span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Category Area -->

    <!-- Resources Area -->
    <div class="aabbro-main-resources-area">
      <div class="aabro-resource-filter-area">
        <div class="aabro-resource-filter-tab">
          <ul>
            <li v-for="subcat in getProductSubCategores" :key="subcat.id">
              <span
                ><router-link
                  :class="getSubCatslug == subcat.slug ? 'active' : ' '"
                  :to="{
                    name: 'products',
                    params: { cat: getCategerySlug, subcat: subcat.slug },
                  }"
                  >{{ subcat.name }}</router-link
                ></span
              >
            </li>
          </ul>
        </div>
        <div class="filter-search">
          <div class="search-form-header">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
              v-model="resubcatsearch"
              @keyup="searchResubCategory"
            />
            <button class="btn btn-outline-success" type="submit">
              <i class="fa fa-search" aria-hidden="true"></i>
            </button>
          </div>
        </div>
        <div class="aabbro-filter-sidebar">
          <ul class="aabbro-filter-lists">
            <li>
              <div class="aabbro-checkbox-default">
                <label class="aabbro-checkbox-wrapper">
                  <input
                    type="checkbox"
                    class="aabbro-checkbox-input"
                    value="007"
                    v-model="showall"
                    @click="showAll"
                  />

                  <span class="aabbro-filterCategory-Text"
                    >All
                    <span class="filterPcount">{{
                      countItem.countProduct
                    }}</span></span
                  >
                </label>
              </div>
            </li>
            <li>
              <div class="aabbro-checkbox-default">
                <label class="aabbro-checkbox-wrapper">
                  <input
                    type="checkbox"
                    class="aabbro-checkbox-input"
                    value="2"
                    v-model="selected.free"
                    @click="fillterproduct"
                  />

                  <span class="aabbro-filterCategory-Text"
                    >Free
                    <span class="filterPcount">{{
                      countItem.countFreeItem
                    }}</span></span
                  >
                </label>
              </div>
            </li>

            <li v-for="resub in getProductReSubCategores" :key="resub.id">
              <div class="aabbro-checkbox-default">
                <label class="aabbro-checkbox-wrapper">
                  <input
                    type="checkbox"
                    class="aabbro-checkbox-input"
                    :value="resub.id"
                    :id="'id' + resub.id"
                    v-model="selected.resubcat"
                    @click="fillterproduct"
                  />

                  <span class="aabbro-filterCategory-Text"
                    >{{ resub.name }}
                    <span class="filterPcount">{{
                      resub.products_count
                    }}</span></span
                  ></label
                >
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="aabbro-resources-area">
        <div class="filtered-result-box">
          <p>
            {{ this.$route.params.cat.toUpperCase() }} :
            <span>{{ countItem.countProduct }}</span>
          </p>
          <ul>
            <li v-for="item in getTagResubCategores" :key="item.id">
              {{ item.name }}
              <span class="remove" @click="removeTagResubcategores(item)"
                ><i class="fa fa-times" aria-hidden="true"></i
              ></span>
            </li>
          </ul>
          <span
            class="clear-all-btn"
            @click="resubcatClear"
            v-if="getTagResubCategores.length > 0"
            >Clear All</span
          >
          <div class="filterd-btn-box">
            <button @click="fillterItem" class="filter-submit-btn">
              Filter Resources
              <img
                :src="asset('public/frontend/assets/img/icons/manu-bar.png')"
              />
            </button>
            <ul class="filter-lists hide">
              <li>
                <label for="filterCheck-0">
                  <input type="checkbox" id="filterCheck-0" />Newest
                </label>
              </li>
              <li class="fl-border-bottom">
                <label for="filterCheck-1">
                  <input type="checkbox" id="filterCheck-1" />Popular
                </label>
              </li>

              <li v-for="software in getSoftwares" :key="software.id">
                <label for="filterCheck-2">
                  <input
                    type="checkbox"
                    @click="fillterproduct"
                    :value="software.id"
                    v-model="selected.filter"
                    :id="'filterCheck' + software.id"
                  />{{ software.name }}
                </label>
              </li>
            </ul>
          </div>
        </div>
        <div class="container-fluid" v-if="getMainProducts.length > 0">
          <div class="row">
            <div
              class="col-md-3"
              v-for="product in getMainProducts"
              :key="product.id"
            >
              <div class="single-category-block">
                <router-link
                  :to="{ name: 'singleProduct', params: { id: product.id,slug:product.slug } }"
                >
                  <div class="scb-img">
                    <img :src="product.image" alt="" />
                  </div>
                  <div class="scb-text">
                    <h4>{{ product.title }}</h4>
                    <ul>
                      <li>
                        <div class="scbt-download">
                          <img
                            :src="
                              asset(
                                'public/frontend/assets/img/icons/download.png'
                              )
                            "
                          /><span>2360</span>
                        </div>
                      </li>
                      <li>
                        <div class="scbt-premium">
                          <img
                            :src="
                              asset(
                                'public/frontend/assets/img/icons/premium-yellow.png'
                              )
                            "
                          />
                        </div>
                      </li>
                    </ul>
                  </div>
                </router-link>
              </div>
            </div>

            <div class="col-md-12">
              <div class="er-btn text-center" v-if="productLink.next">
                <a
                  class="aabbro-btn-a"
                  @click="loadMoreProduct(productLink.next)"
                  >Load More</a
                >
              </div>
            </div>
          </div>
        </div>
        <div class="notfound" v-else>
          <h4 class="text-center">No Data Found!</h4>
        </div>
      </div>
    </div>
    <!-- /Resources Area -->
  </div>
</template>

<script>
import $ from "jquery";
export default {
  name: "ProductsComponent",
  data() {
    return {
      countItem: {},
      showall: [],
      resubcatsearch: "",
      selected: {
        resubcat: [],
        filter: [],
        search: "",
        free: [],
      },
    };
  },
  created() {
    var cat = this.$route.params.cat;
    var subcat = this.$route.params.subcat;
    this.$store.dispatch("retriveProduct", { cat: cat, subcat: subcat });
    this.$store.dispatch("retriveCategores");
    this.$store.dispatch("retriveSubCategores", cat);
    this.$store.dispatch("retriveReSubCategores", { cat: cat, subcat: subcat });
    this.$store.dispatch("retriveLogo");
    this.$store.dispatch("retriveSoftware");
    this.countProductItem();
  },

  watch: {
    $route(to, from) {
      var cat = this.$route.params.cat;
      var subcat = this.$route.params.subcat;
      this.$store.dispatch("retriveProduct", { cat: cat, subcat: subcat });
      this.$store.dispatch("retriveCategores");
      this.$store.dispatch("retriveSubCategores", cat);
      this.$store.dispatch("retriveReSubCategores", {
        cat: cat,
        subcat: subcat,
      });
      this.selected.resubcat = [];
      this.selected.filter = [];
      this.selected.search = "";
      this.countProductItem();
    },
  },

  computed: {
    getMainProducts() {
      return this.$store.getters.getMainProducts;
    },
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

    getCatslug() {
      return this.$route.params.cat;
    },
    getSubCatslug() {
      return this.$route.params.subcat;
    },
    getLogo() {
      return this.$store.getters.getLogo.data;
    },
    getSoftwares() {
      return this.$store.getters.getSoftwares;
    },
    getTagResubCategores() {
      return this.$store.getters.getTagResubCategores;
    },
    productLink() {
      return this.$store.getters.productLink;
    },
    logedIn() {
      return this.$store.getters.logedIn;
    },
  },

  methods: {
    // count all  and free item
    countProductItem() {
      var cat = this.$route.params.cat;
      var subcat = this.$route.params.subcat;
      axios
        .get(`/count/item/${cat}/${subcat}`)
        .then((res) => {
          this.countItem = res.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },

    // collopes filter item
    fillterItem() {
      $("ul.filter-lists").toggleClass("hide");
    },

    // retrive fillter product
    fillterproduct() {
      var vm = this;
      setTimeout(function () {
        vm.$store.dispatch("retriveTagResuCategores", vm.selected.resubcat);
        var cat = vm.$route.params.cat;
        var subcat = vm.$route.params.subcat;
        vm.$store.dispatch("retriveFilterProduct", {
          cat: cat,
          subcat: subcat,
          items: vm.selected,
        });
      }, 500);
      this.showall = [];
    },

    // Remove Tag Resubcategory
    removeTagResubcategores(item) {
      var resubcatItem = this.selected.resubcat.filter(function (data) {
        return data != item.id;
      });
      this.selected.resubcat = [];
      resubcatItem.forEach((element) => {
        this.selected.resubcat.push(element);
      });
      this.$store.dispatch("retriveTagResuCategores", this.selected.resubcat);
      var cat = this.$route.params.cat;
      var subcat = this.$route.params.subcat;
      this.$store.dispatch("retriveFilterProduct", {
        cat: cat,
        subcat: subcat,
        items: this.selected,
      });
    },

    // ResubCat Clear
    resubcatClear() {
      this.selected.resubcat = [];
      this.$store.dispatch("retriveTagResuCategores", this.selected.resubcat);
      var cat = this.$route.params.cat;
      var subcat = this.$route.params.subcat;
      this.$store.dispatch("retriveFilterProduct", {
        cat: cat,
        subcat: subcat,
        items: this.selected,
      });
    },

    // Checkout Free Checkbox
    showAll() {
      this.selected.free = [];
      this.resubcatClear();
    },

    // Mobile category btn
    mobileCatbtn() {
      $(".aabro-resource-filter-area").addClass("showMobileCat");
      $(".closeMobileCatFilter").addClass("showMobileCatCloseIcon");
    },

    // mobile btn close
    mobileCatbtnClose() {
      $(".aabro-resource-filter-area").removeClass("showMobileCat");
      $(".aabbro-category").removeClass("showMobileCat");
      $(".closeMobileCatFilter").removeClass("showMobileCatCloseIcon");
    },

    // Load More Product
    loadMoreProduct(link) {
      axios
        .get(link)
        .then((res) => {
          var data = res.data.data;
          var links = res.data.links;
          this.$store.dispatch("loadMoreProduct", data);
          this.$store.dispatch("loadMoreProductLinks", links);
        })
        .catch((error) => {
          console.log(error);
        });
    },

    // search Resub Category
    searchResubCategory() {
      var cat = this.$route.params.cat;
      var subcat = this.$route.params.subcat;
      var search = this.resubcatsearch;
      var data = {
        cat: cat,
        subcat: subcat,
        search: search,
      };
      this.$store.dispatch("searchResubCat", data);
    },
  },
};
</script>

<style scoped>
.remove,
.clear-all-btn,
aabbro-btn-a {
  cursor: pointer;
}
</style>