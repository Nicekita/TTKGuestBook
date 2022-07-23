<script>
export default {
  data() {
    return {
      posts:{},
      response:{},
      currentPage:1
    }
  },
  
    mounted(){
            setInterval(() => this.list(this.currentPage), 2000)
            
    },
    methods:{
        async list(page=1){
            await axios.get(route('getallposts')+'?page='+page).then(response=>{
    this.posts=response.data.data;
    this.response=response.data;
    this.currentPage=page;
            })
        }
    }
    
}
  
    
</script>
<script setup>
import pagination from 'laravel-vue-pagination'
import axios from 'axios';
import Post from '@/Components/Post.vue'


</script>
<template>
<div class="container mx-auto grid grid-cols-3">
    <Post class="grow" v-for="post in posts" :text="post.text" :username=post.username :user_id=post.user_id :post_id=post.id > </Post>
</div> 
<pagination class="bg-gray-800 fixed bottom-0 w-full justify-around flex flex-row" align="center" :data="response" @pagination-change-page="list"></pagination>
</template>
<style>
.page-item{
    border:1px solid gray;
    flex-grow:1;
    text-align: center;
}
.page-link{
    color:white;
}
.active{
    background-color:gray;
}
</style>