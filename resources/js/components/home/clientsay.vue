<template>
 <div>
  
    <div class="testimonial-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tsec-head wow slideInUp" data-wow-duration="1s">
                        <h2>What Says Client’s About Us</h2>
                    </div>
                </div>

                <div class="col-md-12" v-if="clientSays.length >0">
                    <div class="testimonial-slider wow slideInUp" data-wow-duration="1s">
                      <carousel :autoplay="true" :items="2" :nav="true">
                        
                            <div class="item" v-for="(review,index) in clientSays" :key="index">
                                <div class="single-testimonial">
                                    <div class="st-img">
                                        <img :src="review.image" alt="">
                                        <a href="#" id="st-testimonialPlayBtn-1" @click="showVideo(review)" class="st-play-btn" data-bs-toggle="modal" data-bs-target="#testimonialVideoPopup"><img src="public/frontend/assets/img/icons/play-border.png" alt=""></a>
                                    </div>
                                    <div class="st-text">
                                        <div class="stt-qouts">
                                            <img src="public/frontend/assets/img/icons/comma-alt.png" alt="">
                                            <img src="public/frontend/assets/img/icons/comma-alt.png" alt="">
                                        </div>
                                        <p>{{ review.review }}</p>
                                        <div class="sts-ci">
                                            <h4>{{ review.name }}</h4>
                                            <p>{{ review.designation }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </carousel>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="testimonial-video-popup" v-if="video"> 
        <!-- Modal -->
        <div class="testimonial-modal modal fade" id="testimonialVideoPopup" tabindex="-1" aria-labelledby="testimonialVideoPopupLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <video id="testimonial-vid-1" class="aabbro-video-player testimonial-vidplayer" autoplay controls>
                        <source :src="video" type="video/mp4"> 
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>
    <!-- /Testimonial Area -->

 </div>
 
  
</template>
<script>
import carousel from 'vue-owl-carousel'
export default {
  name: "ClientSay",
  data(){
      return{
          video:'',
      }
  },
  props:{
    clientSays:{
      require:true,
    }
  },
  components: { carousel },
  mounted(){
     
  },
  methods:{
      showVideo(review){
          this.video = review.video;
      }
  }
};
</script>
<style >
.single-testimonial .st-img a.st-play-btn {
    position: absolute;
    width: 20px;
    height: 27px;
    top: calc(50% - 13px);
    left: calc(50% - 10px);
    z-index: 1;
}
.owl-theme .owl-nav [class*='owl-']:hover {
  background-color: #6235E5;
color: #fff;
}
.owl-theme .owl-nav [class*='owl-'] {
    color: #6235E5;
    border: 1px solid #6235E5;
    background-color: #fff;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    font-size: 30px;
    padding-top: 8px;
    font-size: 14px;
}
.owl-theme .owl-nav [class*=owl-]:hover {
    background: #6235E5;
    color: #FFF;
    text-decoration: none;
}


.owl-nav {
    position: relative !important;
    margin: 0px auto !important;
    float: right !important;
    z-index: 1 !important;
}


.owl-dots .owl-dot.active span {
    background-color: #6235E5 !important;
}

.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span {
    background: #869791 !important;
}

.owl-dots {
    text-align: left !important;
    position: relative !important;
    margin: 10px auto !important;
}

.owl-dots .owl-dot span {
    width: 24px !important;
    background-color: #D9D9D9 !important;
    height: 3px !important;
    border-radius: 3px !important;
}

.owl-dots .owl-dot.active span{
    background-color: #6235E5 !important;
}
.owl-dots .owl-dot.active span {
    background-color: #6235E5!important;
}

</style>