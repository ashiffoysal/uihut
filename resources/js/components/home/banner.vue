<template>
  <div class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12" v-for="banner in banners" :key="banner.id">
                    <div class="hero-content wow slideInUp" data-wow-duration="1s">
                        <h1>	{{ banner.heading_text }} </h1>
                        <p>{{ banner.sub_text }}</p>
                        <router-link class="aabbro-btn-a" :to="{name:'products',params:{cat:getHeaderSubcat.slug,subcat:getHeaderSubcat.subcat,id:getHeaderSubcat.id}}">Explore Resources</router-link>
                    </div>
                    <div class="hero-img-video wow slideInUp" data-wow-duration="1.5s"> 
                         <div class="hero-vid-border">
                            <video class="aabbro-video-player" autoplay loop controls muted>
                                <source :src="banner.video_link" type="video/mp4"> 
                                Your browser does not support the video tag.
                            </video>
                         </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
  name: "Home_Banner",
  props: {
    banners: {
      require: true,
    }
  },
  mounted() {

    this.$store.dispatch('getHeaderSubcat');
  },
  computed:{
          getHeaderSubcat(){
              return this.$store.getters.getSubCategory;
          },
          
      },
  
};
</script>