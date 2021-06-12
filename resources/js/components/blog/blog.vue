<template>
  <div class="col-lg-12">
    <div class="text-center card p-5">
        <h1>
            THis is category 
        </h1>
        <tr v-for="categoris in category" :key="categoris.id">
            <td>{{ categoris.name }} {{ categoris.blog_count }}</td>
        </tr>
        <h3>All Blog</h3>
        <div class="blogelement" v-if="blogdata.length > 0">
            <tr v-for="(blog,index) in blogdata" :key="index">
            <td>{{ blog.title }}</td>
            <td>{{ blog.category_id }}</td>
            <td>{{ blog.details }}</td>
            <td>{{ blog.tags }}</td>
            <td> <img :src="blog.image" alt=""></td>
        </tr>
        <pagination :data="blogdata">
            <span slot="prev-nav">&lt; Previous</span>
            <span slot="next-nav">Next &gt;</span>
        </pagination>

        </div>
        

    </div>
  </div>
</template>
<script>
export default {
  name: "blog",
  data(){
      return {
          category: [],
          blogdata: [],
      }
  },
  mounted(){

    this.loadCategory();
     this.loadallblog();
    },
  methods:{
      loadCategory(){
          axios.get('/blog/category').then(response=>{
              this.category=response.data.data;
          });
      },
       async loadallblog(){
          await axios.get('/allblog/').then(response=>{

              this.blogdata=response.data.data;
              
          });
      }
  },
  
};
</script>