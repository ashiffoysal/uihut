<template>
 <div>
       <!-- Testimonial Area -->
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
                                        <img src="public/frontend/assets/img/testi-2.png" alt="">
                                        <a href="#" id="st-testimonialPlayBtn-1" class="st-play-btn" data-bs-toggle="modal" data-bs-target="#testimonialVideoPopup"><img src="public/frontend/assets/img/icons/play-border.png" alt=""></a>
                                    </div>
                                    <div class="st-text">
                                        <div class="stt-qouts">
                                            <img src="public/frontend/assets/img/icons/comma-alt.png" alt="">
                                            <img src="public/frontend/assets/img/icons/comma-alt.png" alt="">
                                        </div>
                                        <p>Progressively incentivize
                                            leveraged materials through high quality resources. Enthusiastically reconceptualize equity invested</p>
                                        <div class="sts-ci">
                                            <h4>Nuan Pradeep</h4>
                                            <p>CEO, Xlab Agency</p>
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

    <div class="testimonial-video-popup"> 
        <!-- Modal -->
        <div class="testimonial-modal modal fade" id="testimonialVideoPopup" tabindex="-1" aria-labelledby="testimonialVideoPopupLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <video id="testimonial-vid-1" class="aabbro-video-player testimonial-vidplayer" controls>
                        <source src="public/frontend/assets/video/demo-video.mp4" type="video/mp4"> 
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
  props:{
    clientSays:{
      require:true,
    }
  },
  components: { carousel },
  mounted(){
     
  }
};
</script>