<template>
     <div class="dashboard-header">
                <nav class="navbar navbar-expand-lg aabbro-navbar">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <div class="logo mobile-logo">
                                
                                <img src="public/frontend/assets/img/main-logo-2.png" alt="Logo">
                            </div>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                       
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                   <router-link class="nav-link active" aria-current="page" :to="{name:'products',params:{cat:getHeaderSubcat.slug,subcat:getHeaderSubcat.subcat,id:getHeaderSubcat.id}}">Resources</router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link class="nav-link" :to="{name:'pricing'}">Pricing</router-link >
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="#">Coustom Service</a>
                                </li>
                                -->
                                  <li class="nav-item dropdown profile-loggedin-btn">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <img :src="asset('public/uploads/user/'+uset.image)" alt=""> {{ uset.full_name}}
                                        <!-- <i class="fa fa-angle-down" aria-hidden="true"></i> -->
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li>
                                            <div class="user-logged-box">
                                                <img :src="asset('public/uploads/user/'+uset.image)" alt="">
                                                <h4>{{ uset.full_name}}</h4>
                                                <p>{{ uset.email}}</p>
                                            </div>
                                        </li>
                                        <li><router-link class="dropdown-item" to="dashboard">Edit Profile</router-link></li> 
                                        <!-- <li><a class="dropdown-item" href="#">Settings</a></li>  -->
                                        <li>
                                             <router-link class="dropdown-item" to="billingplan">Plan & Billing</router-link>
                                            
                                            </li> 
                                        <li> <router-link class="dropdown-item" to="collection">Collection</router-link></li> 
                                        <li><a class="dropdown-item" href="#">Support</a></li> 
                                        <li><router-link class="dropdown-item" :to="{name:'logout'}">Logout</router-link></li> 
                                    </ul>
                                </li>
                              
                            </ul>
                            
                        </div>

                        <div class="dash-board-mobile-menu">
                            <span class="close-dm">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </span>
                            <div class="usr-info">
                                <h4>{{ uset.full_name}}</h4>
                                <p>Designer</p>
                                <a href="#" class="aabbro-btn-b">Edit Profile</a>
                            </div>
                            <ul class="mobile-menu-list">
                                <li><a href="#">Resource</a></li>
                                <li><a href="#">Pricing</a></li>
                                <li><a href="#">Custom Services</a></li>
                            </ul>
                            <div class="search-form-header">
                                <form class="d-flex">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>
                            <a href="#" class="mobile-logout-btn">Logout</a>
                        </div>
                    </div>
                </nav>
            </div>    
</template>
<script>
export default {
    data(){
        return {
            uset:[],
        }
    },
  mounted() {
      this.loadprofile();
      this.$store.dispatch('getHeaderSubcat');
  },
  methods:{
        loadprofile(){
            axios.defaults.headers.common['Authorization'] = 'Bearer ' +localStorage.getItem('access_token');
                axios.get('/user/profile').then(response =>{
                    // console.log(response.data);
                      this.uset=response.data;
                });
            }
  },
computed:{

        getHeaderSubcat(){
            return this.$store.getters.getSubCategory;
        },
        
    },
};
</script>
