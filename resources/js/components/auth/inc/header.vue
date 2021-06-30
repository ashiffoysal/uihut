<template>
   <header class="aabbro-header aabbro-headerV3"> 
        <nav class="navbar navbar-expand-lg aabbro-navbar">
            <div class="container-fluid">
                <router-link class="navbar-brand" :to="{name:'home'}">
                    <div class="logo"> 
                        <img src="public/frontend/assets/img/main-logo-2.png" alt="Logo"> 
                    </div>
                </router-link>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> 
                        <li class="nav-item" v-if="check_login">
                            <router-link class="nav-link sign-in-btn bg-purple" :to="{name:'register'}">Sign up</router-link>
                        </li>
                        <li class="nav-item" v-if="!check_login">
                            <router-link class="nav-link sign-in-btn bg-purple" :to="{name:'login'}">Sign in</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</template>
<script>
export default {
    name:"login_header",
     data(){
            return{

                checkloginpath:'',
            }
    },
    mounted(){
        if(this.$route.name =='login'){
            this.checkloginpath='Login';
        }else if(this.$route.name =='register'){
            this.checkloginpath='Register';
        }
         
    },
   
    computed:{
        check_login(){
            
            if(this.$route.name =='login'){
                return true;
            }
        }
    }
}
</script>
