<template>
     <header class="aabbro-header"> 
        <nav class="navbar navbar-expand-lg aabbro-navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <div class="logo">
                        <img src="assets/img/main-logo.png" alt="Logo" class="main-logo">
                        <img src="assets/img/main-logo-2.png" alt="Logo" class="sticky-logo">

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
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Coustom Service</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link sign-in-btn" href="#">Sign In</a>
                        </li>
                    </ul>
    
                </div>
            </div>
        </nav>
    
    </header>
</template>

<script>
export default {
    name:'Header_Part',
    computed:{
        logedIn(){
            return this.$store.getters.logedIn;
        },
        getHeaderSubcat(){
            return this.$store.getters.getSubCategory;
        },
    },
    mounted(){
        this.$store.dispatch('getHeaderSubcat');
    }
}
</script>