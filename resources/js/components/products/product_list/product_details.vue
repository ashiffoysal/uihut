<template>
  <div class="product_details">
    <!-- Header Area -->
    <header class="aabbro-header-pop">
      <router-link
        :to="{
          name: 'products',
          params: {
            cat: getSingleProduct.cat_slug,
            subcat: getSingleProduct.subcat_slug,
          },
        }"
        ><i class="fa fa-times" aria-hidden="true"></i
      ></router-link>
    </header>
    <!-- /Header Area -->

    <!-- Product Details Area -->
    <div class="product-details-area">
      <div class="schedule-meeting">
        <div class="container">
          <div class="schedule-banner">
            <div class="row">
              <div class="col-md-9">
                <h3>If you need custom service schedule a meeting</h3>
              </div>
              <div class="col-md-3">
                <div class="sch-btn">
                  <a href="#" class="aabbro-btn-a">Schedule A Meeting</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="product-details-head-area">
        <div class="container">
          <div class="pdha-box">
            <div class="row">
              <div class="col-md-6">
                <div class="pdha-title">
                  <h4>{{ getSingleProduct.title }}</h4>
                  <ul>
                    <li><i class="fa fa-eye" aria-hidden="true"></i>246</li>
                    <li>
                      <i class="fa fa-cloud-download" aria-hidden="true"></i>14
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-6">
                <div class="pdha-btn">
                  <ul>
                    <li>
                      <a :class="addSavedClass" @click="productSave">Save</a>
                    </li>

                    <li>
                      <a
                        href="#"
                        class="save-share-btn product-share"
                        data-bs-toggle="modal"
                        data-bs-target="#shareModal"
                        >Share</a
                      >
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="product-details-gallary">
        <productCarousel :images="getSingleProduct.image"></productCarousel>
        <div class="download-wrapper">
          <h4>Download File</h4>
          <ul class="download-list" v-if="getSingleProduct.software">
            <li v-for="(item, index) in getSingleProduct.software" :key="index">
              <span class="dl-format">
                <img src="assets/img/icons/figma.png" alt="" />{{ index }}
              </span>
              <router-link
                :to="{
                  name: 'downloadFile',
                  params: {
                    name: index,
                    file: item,
                    product_id: getSingleProduct.id,
                  },
                }"
                class="product-dl-btn btn-clr-1"
                >Download</router-link
              >
            </li>
          </ul>
        </div>
      </div>
      <div class="product-details-text">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h4>Overview</h4>
              <p>{{ getSingleProduct.description }}</p>
            </div>
            <div class="col-md-12">
              <div class="tags-wrapper">
                <h5>Tags</h5>
                <ul class="taglist" v-if="getSingleProduct.tag">
                  <li v-for="(tag, index) in getSingleProduct.tag" :key="index">
                    <a href="#" class="tag-btn">{{ tag }}</a>
                  </li>

                  <li><a href="#" class="tag-btn tseemore">See More</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Product Details Area -->

    <!-- Product Details Similar Area -->
    <div class="product-details-similar-product-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-head">
              <h2>You Might Also Like</h2>
            </div>
          </div>
        </div>
        <div class="product-caegory-wrapper">
          <div class="row">

            <div class="col-md-4" v-for="(product,index) in getSimilerProduct" :key="index">
              <div class="single-category-block">
                <router-link :to="{ name: 'singleProduct', params: { id: product.id,slug:product.slug } }">
                  <div class="scb-img">
                    <img :src="product.image" :alt="product.title" />
                  </div>
                  <div class="scb-text">
                    <h4>{{product.title}}</h4>
                    <ul>
                      <li>
                        <div class="scbt-download">
                          <img
                            :src="asset('public/frontend/assets/img/icons/download.png')"
                            alt="download"
                          /><span>2360</span>
                        </div>
                      </li>
                      <li>
                        <div class="scbt-premium">
                          <img
                            src="assets/img/icons/premium-yellow.png"
                            alt=""
                          />
                        </div>
                      </li>
                    </ul>
                  </div>
                </router-link>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <!-- /Product Details Similar Area -->

    <!-- Modal Area -->
    <!-- Share Modal -->
    <div
      class="shareModal modal fade"
      id="shareModal"
      tabindex="-1"
      aria-labelledby="shareModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body share-box-content">
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
            <div class="pimg">
              <img src="assets/img/product-details-img/1.png" alt="" />
            </div>
            <h3>Share this with your social comminity</h3>
            <ul class="share-icons">
              <li>
                <a href="#">
                  <img
                    :src="
                      asset(
                        'public/frontend/assets/img/icons/social/instagram.png'
                      )
                    "
                    alt="instagram"
                  />
                </a>
              </li>
              <li>
                <a href="#">
                  <img
                    :src="
                      asset(
                        'public/frontend/assets/img/icons/social/facebook-sq.png'
                      )
                    "
                    alt="facebook-sq"
                  />
                </a>
              </li>
              <li>
                <a href="#">
                  <img
                    :src="
                      asset(
                        'public/frontend/assets/img/icons/social/linkedin.png'
                      )
                    "
                    alt="linkedin"
                  />
                </a>
              </li>
              <li>
                <a href="#">
                  <img
                    :src="
                      asset(
                        'public/frontend/assets/img/icons/social/twitter.png'
                      )
                    "
                    alt="twitter"
                  />
                </a>
              </li>
            </ul>
            <span class="orcpy">Or copy link</span>

            <div class="copy-url-share">
              <form action="">
                <div class="copy-url-box">
                  <input
                    type="text"
                    name=""
                    id=""
                    placeholder="Url"
                    :value="getUrlLink"
                  />
                  <button class="urlcopy-btn">Copy</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Save Modal -->
    <div
      class="saveModal modal fade"
      id="saveModal"
      tabindex="-1"
      aria-labelledby="saveModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body share-box-content">
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
            <div class="save-collection-box">
              <h4>Add this shot to a collection</h4>
              <form action="">
                <div class="collection-filter">
                  <input
                    type="text"
                    v-model="save_product_search"
                    placeholder="Filter Collections"
                  />
                </div>
              </form>

              <div class="scollection-lists">
                <div
                  class="single-saved-collection"
                  v-for="item in getSaveProduct"
                  :key="item.id"
                >
                  <img :src="item.image" alt="item.name" />
                  <h5>{{ item.name }}</h5>
                  <!-- <p>15 Shots</p>
                                <p>15 Shots</p> -->
                </div>
              </div>
              <ul class="savec-btns">
                <li><a href="#" class="save-btn">Save</a></li>
                <li>
                  <a
                    href="#"
                    class="nc-btn"
                    data-bs-toggle="modal"
                    data-bs-target="#newcollectionModal"
                    data-bs-dismiss="modal"
                    >New Collection Board</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- New Collection Modal -->
    <div
      class="newcollectionModal modal fade"
      id="newcollectionModal"
      tabindex="-1"
      aria-labelledby="newcollectionModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body share-box-content">
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
            <div class="save-collection-box createcollection">
              <h4>Create New Collection</h4>
              <form action="">
                <div class="collection-filter">
                  <label for="">Title</label>
                  <input
                    type="text"
                    name=""
                    id=""
                    placeholder="Collection Name"
                  />
                </div>
                <div class="collection-filter">
                  <label for="">Description (Optional)</label>
                  <textarea
                    name=""
                    id=""
                    cols="30"
                    rows="10"
                    placeholder="Description"
                  ></textarea>
                </div>
              </form>
              <ul class="savec-btns createcolle">
                <li><a href="#" class="save-btn">Save</a></li>
                <li><a href="#" class="nc-btn">Cancel</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import productCarousel from "./details/product_details_carousel";
export default {
  data() {
    return {
      save_product_search: "",
    };
  },
  components: { productCarousel },
  mounted() {
    var id = this.$route.params.id;
    this.$store.dispatch("retriveProductByID", id);
    this.$store.dispatch("retriveSavedProduct");
    this.$store.dispatch("savedProduct", id);
    if (this.$store.getters.logedIn) {
      this.$store.dispatch("checkSubscriber");
    }

    this.$store.dispatch('similerProduct',id);
  },
  watch: {
    $route(to, from) {
      var id = this.$route.params.id;
      this.$store.dispatch("retriveProductByID", id);
      if (this.$store.getters.logedIn) {
        this.$store.dispatch("checkSubscriber");
      }
      this.$store.dispatch('similerProduct',id);
    },
  },
  computed: {
    getSingleProduct() {
      return this.$store.getters.getSingleProduct;
    },
    getSaveProduct() {
      return this.$store.getters.getSaveProduct;
    },
    getUrlLink() {
      return window.location.href;
    },
    checkSavedProduct() {},
    addSavedClass() {
      var product = this.$store.getters.checkSavedProduct;
      if (product.length > 0) {
        return "save-share-btn product-save product-dl-btn btn-clr-1";
      } else {
        return "save-share-btn product-save";
      }
    },
    getSimilerProduct(){
      return this.$store.getters.getSimilerProduct;
    }
  },
  methods: {
    productSave() {
      if (this.$store.getters.logedIn) {
        axios.defaults.headers.common["Authorization"] =
          "Bearer " + localStorage.getItem("access_token");
        var id = this.getSingleProduct.id;
        this.$store.dispatch("SavedProduct", id).then((res) => {
          this.$notify({
            text: res.data.msg,
          });
        });
        this.$store.dispatch("retriveSavedProduct");
        $("#saveModal").modal("show");
      } else {
        this.$router.push({ name: "login" });
      }
    },
  },
};
</script>
<style scoped>
.product-save {
  cursor: pointer;
}
</style>