<template>
  <footer class="aabbro-footer">
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="sf-widget sf-logo-text"  v-if="getLogo">
                           
                         <router-link to="/"><img :src="getLogo.logo" alt="logo"></router-link>  
                            <p>{{ getLogo.company_motto }}</p>
                            <ul class="footer-social" v-if="Soicals">
                               
                                <li>
                                    <a v-bind:href="Soicals.facebook" target="_blank" class="social-facebook">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a v-bind:href="Soicals.twitter" target="_blank" class="social-twitter">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                </li>
                              
                                <li>
                                    <a v-bind:href="Soicals.linkend" target="_blank" class="social-linkedin">
                                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="sf-widget pad-left-40">
                                    <h4>Support</h4>
                                    <ul class="sf-links">
                                        <li><router-link to="/termsandcondition">Terms And Condition</router-link></li>
                                        <li><router-link to="/privacy_&_policy">Privacy Policy</router-link></li>
                                        <li><router-link to="/licence">Licencing</router-link></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="sf-widget pad-left-40">
                                    <h4>Pages</h4>
                                    <ul class="sf-links">
                                        <li><a href="#">Custom Service</a></li>
                                        <li><a href="#">Resources</a></li>
                                        <li><a href="#">Pricing</a></li>
                                        <li><a href="#">Blog</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="sf-widget sf-nl">
                                    <h4>Subscribe</h4>
                                    <p>Subscribe our newslettter</p>
                                    <div class="nl-form"> 
                                        <form action="">
                                            <div class="nlip-field">
                                                <input type="email" name="" id="" placeholder="Your Email">
                                            <button type="submit"><img src="public/frontend/assets/img/icons/arrow-right.png" alt=""></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2021, aabbro Allright reserved.</p> 
        </div>
    </footer>
</template>

<script>
export default {
    name:'FooterCompnents',
       props:{
            getLogo:{
                required:true,
            }
        },
    data(){
        return {
              Soicals:[],
          }        
    },
 
     mounted(){
         this.loadSocial();
      },
    
      methods:{
          loadSocial(){
             axios.get('/social').then(response=>{
                 this.Soicals = response.data;
             })
          }
      },
    

    
}
</script>






