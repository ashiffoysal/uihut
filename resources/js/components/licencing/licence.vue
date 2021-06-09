<template>
  <div class="col-lg-12">
    <div class="text-center card p-5">
            <h1>
                THis is Licence Page 
            </h1>
            <p>{{ licence.subtext }}</p>
            <p>{{ licence.aggrement }}</p>
            <p>{{ licence.you_can }}</p>
            <p>{{ licence.you_cannot}}</p>
            <p>{{ licence.details}}</p>
       

        </div>
        

    </div>
  </div>
</template>
<script>
export default {
  name: "privacy",
  data(){
      return {
          licence: [],
         
      }
  },
  mounted(){

    this.loadlicence();
     
    },
  methods:{
      loadlicence(){
          axios.get('/licence').then(response=>{
              this.licence=response.data;
          });
      },
    
  },
  
};
</script>