<template>
  <div class="dash-board-content-wrapper">
                <div class="sidemenu-toggler">
                    <button class="navbar-toggler" type="button">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                </div>
                <div class="dashboard-collections">
                    <div class="row">
                         
                        <div class="col-md-3" v-for="alldownload in alldownloads" :key="alldownload.id" >
                            <div class="single-download">
                                <router-link :to="{ name: 'singleProduct', params: { id: alldownload.id,slug:alldownload.slug } }">
                                    <div class="sdb-img">
                                        <img :src="asset('public/uploads/products/thumbnail/'+alldownload.thumbnail_img)" alt=""> 
                                    </div>
                                    <div class="sdb-text">
                                        <h4>{{alldownload.title}}</h4> 
                                    </div>
                               </router-link> 
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
</template>
<script>
export default {
  name: "downloads",
    data(){
        return {
             alldownloads:[],
        }
    },
  mounted() {
      this.loaddownloads();
  },
  methods:{
        loaddownloads(){
                axios.get('/user/product/downloads').then(response =>{
                     this.alldownloads=response.data;
                });
            }
  }
};
</script>