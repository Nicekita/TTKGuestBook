<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import NavBar from '@/Components/NavBar.vue'
import PostContainer from '@/Components/PostContainer.vue';
import ModalWindow from '@/Components/Modal/ModalWindow.vue'
const show = ref(false);
const modalType=ref('');

function update(){
  
}
function closeModal(){
    show.value=false;
}
function showModal(modalString){
  modalType.value=modalString;
  import(`../Components/Modal/${modalType.value}.vue`).then(val => {
      modalType.value = val.default
    })
  show.value=true;
}
</script> 
<template>
<ModalWindow v-if="show" @close="closeModal();" >
      <template #modalBody>
                <component :is="modalType" @close="closeModal();" > </component>
      </template>
</ModalWindow>
<Head title="TTK Guest book" />
<NavBar @openModal="showModal"></NavBar>
<div class="container">

    <div class="flex flex-col flex-wrap bd-highlight mb-3">
<PostContainer/>

</div>
</div>
</template>