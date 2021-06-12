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
                  v-for="cat in categores"
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
          v-for="subcat in subcategores"
          :key="subcat.id"
        >
          <button
            type="button"
            class="btn btn-secondary border-right border-info"
            @click="selectSubCategory(subcat.slug)"
          >
            {{ subcat.name }}
          </button>
        </div>

        <ul class="list-group m-4">
          <li
            class="list-group-item"
            v-for="resub in resubcategores"
            :key="resub.id"
          >
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                id="defaultCheck1"
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
          <div class="col-lg-6">
            <div class="card mt-4" style="width: 18rem">
              <!-- <img class="card-img-top" src="..." alt="Card image cap" /> -->
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up
                  the bulk of the card's content.
                </p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="card mt-4" style="width: 18rem">
              <!-- <img class="card-img-top" src="..." alt="Card image cap" /> -->
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up
                  the bulk of the card's content.
                </p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="card mt-4" style="width: 18rem">
              <!-- <img class="card-img-top" src="..." alt="Card image cap" /> -->
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up
                  the bulk of the card's content.
                </p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="card mt-4" style="width: 18rem">
              <!-- <img class="card-img-top" src="..." alt="Card image cap" /> -->
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up
                  the bulk of the card's content.
                </p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="card mt-4" style="width: 18rem">
              <!-- <img class="card-img-top" src="..." alt="Card image cap" /> -->
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up
                  the bulk of the card's content.
                </p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="card mt-4" style="width: 18rem">
              <!-- <img class="card-img-top" src="..." alt="Card image cap" /> -->
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up
                  the bulk of the card's content.
                </p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
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
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
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
      categores: [],
      subcategores: [],
      resubcategores: [],
      products: [],
    };
  },
  created() {
    this.retriveCategores();
    this.retriveSubCategores();
    this.retriveReSubCategores();
    this.retriveProduct();
  },
  watch: {
    $route(to, from) {
      this.retriveCategores();
      this.retriveSubCategores();
      this.retriveReSubCategores();
      this.retriveProduct();
    },
  },
  methods: {
    // retrive category menu
    retriveCategores() {
      axios
        .get("/get/product/categores")
        .then((res) => {
          this.categores = res.data.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },

    // retrive sub category
    retriveSubCategores() {
      var cat = this.$route.params.cat;
      axios
        .get(`/get/product/subcategores/${cat}`)
        .then((res) => {
          this.subcategores = res.data.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },

    // retrive resub category
    retriveReSubCategores() {
      var cat = this.$route.params.cat;
      var subcat = this.$route.params.subcat;
      axios
        .get(`/get/product/resubcategores/${cat}/${subcat}`)
        .then((res) => {
          this.resubcategores = res.data.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },

    // get data click on sub category
    selectSubCategory($slug) {
      var cat = this.$route.params.cat;
      var subcat = $slug;
      axios
        .get(`/get/product/resubcategores/${cat}/${subcat}`)
        .then((res) => {
          this.resubcategores = res.data.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },

    // Retrive product
    retriveProduct() {
      var cat = this.$route.params.cat;
      var subcat = this.$route.params.subcat;
      axios
        .get(`/get/product/${cat}/${subcat}`)
        .then((res) => {
          this.products = res.data.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>