<template>
   <header class="aabbro-header aabbro-headerV3"> 
        <nav class="navbar navbar-expand-lg aabbro-navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <div class="logo"> 
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
                            <router-link class="nav-link sign-in-btn bg-purple" :to="{name:'register'}">Sign Up</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</template>
