<template>
    <div class="dash-board-content-wrapper">
        <div class="sidemenu-toggler">
            <button class="navbar-toggler" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
        </div>
        <div class="dashboard-collections">
            <div class="row">
                    
                <div class="col-md-3" v-for="allcollection in allcollections" :key="allcollection.id">
                    <div class="single-collection">
                        <router-link :to="{ name: 'singleProduct', params: { id: allcollection.id,slug:allcollection.slug } }">
                            <div class="scb-img">
                                <img :src="allcollection.image" alt="">
                                <!-- <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt=""> -->
                            </div>
                            <div class="scb-text">
                                <h4>{{allcollection.name}}</h4>
                                <p>22 Shots</p> 
                            </div>
                        </router-link>
                    </div>
                </div>
               <pagination :data="allcollections">
                    <span slot="prev-nav">&lt; Previous</span>
                    <span slot="next-nav">Next &gt;</span>
                </pagination>
                <!-- <div class="col-md-3">
                    <div class="single-collection">
                        <a href="product-details.html">
                            <div class="scb-img">
                               <img src="public/frontend/assets/img/collection-img/collection-img.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                            </div>
                            <div class="scb-text">
                                <h4>UI Template</h4>
                                <p>22 Shots</p> 
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-collection">
                        <a href="product-details.html">
                          <div class="scb-img">
                             <img src="public/frontend/assets/img/collection-img/collection-img.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                            </div>
                            <div class="scb-text">
                                <h4>UI Template</h4>
                                <p>22 Shots</p> 
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-collection">
                        <a href="product-details.html">
                             <div class="scb-img">
                                   <img src="public/frontend/assets/img/collection-img/collection-img.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                            </div>
                            <div class="scb-text">
                                <h4>UI Template</h4>
                                <p>22 Shots</p> 
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-collection">
                        <a href="product-details.html">
                             <div class="scb-img">
                                  <img src="public/frontend/assets/img/collection-img/collection-img.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                            </div>
                            <div class="scb-text">
                                <h4>UI Template</h4>
                                <p>22 Shots</p> 
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-collection">
                        <a href="product-details.html">
                             <div class="scb-img">
                                     <img src="public/frontend/assets/img/collection-img/collection-img.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                            </div>
                            <div class="scb-text">
                                <h4>UI Template</h4>
                                <p>22 Shots</p> 
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-collection">
                        <a href="product-details.html">
                             <div class="scb-img">
                                   <img src="public/frontend/assets/img/collection-img/collection-img.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                            </div>
                            <div class="scb-text">
                                <h4>UI Template</h4>
                                <p>22 Shots</p> 
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-collection">
                        <a href="product-details.html">
                              <div class="scb-img">
                                 <img src="public/frontend/assets/img/collection-img/collection-img.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                            </div>
                            <div class="scb-text">
                                <h4>UI Template</h4>
                                <p>22 Shots</p> 
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-collection">
                        <a href="product-details.html">
                              <div class="scb-img">
                                     <img src="public/frontend/assets/img/collection-img/collection-img.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                            </div>
                            <div class="scb-text">
                                <h4>UI Template</h4>
                                <p>22 Shots</p> 
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-collection">
                        <a href="product-details.html">
                             <div class="scb-img">
                                 <img src="public/frontend/assets/img/collection-img/collection-img.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                            </div>
                            <div class="scb-text">
                                <h4>UI Template</h4>
                                <p>22 Shots</p> 
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-collection">
                        <a href="product-details.html">
                             <div class="scb-img">
                             <img src="public/frontend/assets/img/collection-img/collection-img.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                            </div>
                            <div class="scb-text">
                                <h4>UI Template</h4>
                                <p>22 Shots</p> 
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-collection">
                        <a href="product-details.html">
                             <div class="scb-img">
                                <img src="public/frontend/assets/img/collection-img/collection-img.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                                <img src="public/frontend/assets/img/category/cat-1.png" alt="">
                            </div>
                            <div class="scb-text">
                                <h4>UI Template</h4>
                                <p>22 Shots</p> 
                            </div>
                        </a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</template>
<script>
export default {
  name: "collection",
    data(){
        return {
            allcollections:[],
        }
    },
  mounted() {
      this.loadcollection();
  },
  methods:{
        loadcollection(){
                axios.get('/user/collection').then(response =>{
                      this.allcollections=response.data.data;
                });
            }
  }
};
</script>