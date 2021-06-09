<template>
  <div class="col-lg-12">
    <div class="text-center card p-5">
        <h1>
            THis is Privacy Policy 
        </h1>
            <p>{{ privacy.details }}</p>
       

        </div>
        

    </div>
  </div>
</template>
<script>
export default {
  name: "privacy",
  data(){
      return {
          privacy: [],
         
      }
  },
  mounted(){

    this.loadprivacy();
     
    },
  methods:{
      loadprivacy(){
          axios.get('/privacypolicy').then(response=>{
              this.privacy=response.data;
          });
      },
    
  },
  
};
</script>