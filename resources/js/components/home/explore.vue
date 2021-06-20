<template>
<div>
    <div class="aabbro-text-image-area" v-for="(explore, index) in explores"
      :key="index">
        <div class="container-fluid" v-if="index % 2 ==0">
            <div class="row">
                <div class="col-md-6">
                    <div class="atia-img wow slideInUp" data-wow-duration="1s">
                        <video class="aabbro-video-player" autoplay loop controls muted>
                            <source :src="explore.video" type="video/mp4"> 
                             Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="atia-text wow slideInUp" data-wow-duration="1s">
                        <h2>{{ explore.title }}</h2>
                        <p>{{ explore.details }}</p>

                        <ul class="atia-list" v-for="(details_more, index) in explore.details_more" :key="index">

                            <li><img src="public/frontend/assets/img/icons/check-purple.png" alt="">{{details_more}}</li>
                            
                        </ul>
                        <a href="#" class="aabbro-btn-b">Explore More</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid" v-else>
            <div class="row">
                <div class="col-md-6 abbro-mb-order-2">
                    <div class="atia-text wow slideInUp" data-wow-duration="1s">
                        <h2>{{ explore.title }}</h2>
                        <p>{{ explore.details }}</p>

                        <ul class="atia-list" v-for="(details_more, index) in explore.details_more" :key="index">
                            <li><img src="public/frontend/assets/img/icons/check-orange.png" alt="">{{details_more}}</li>
                           
                        </ul>
                        <div class="atiat-btn">
                            <a href="#" class="aabbro-btn-a">Explore More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 abbro-mb-order-1">
                    <div class="atia-img wow slideInUp" data-wow-duration="1s">
                        <video class="aabbro-video-player" autoplay loop controls muted>
                            <source :src="explore.video" type="video/mp4"> 
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
  name: "HomeCategory",
  props: {
    explores: {
      require: true,
    },
  },
};
</script>