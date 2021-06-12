<template>
  <div class="col-lg-12">
    <div class="text-center card p-5">
        <h1>
            THis isTerms and con dition page
        </h1>
            <p>{{ termsandcondition.details }}</p>
       

        </div>
        

    </div>
  </div>
</template>
<script>
export default {
  name: "termsandcondition",
  data(){
      return {
          termsandcondition: [],
         
      }
  },
  mounted(){

    this.loadprivacy();
     
    },
  methods:{
      loadprivacy(){
          axios.get('/termsandcondition').then(response=>{
              this.termsandcondition=response.data;
          });
      },
    
  },
  
};
</script>