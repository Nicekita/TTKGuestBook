<script setup>
import ModalWindow from './Modal/ModalWindow.vue';
import { ref, provide } from 'vue';
import axios from 'axios';
const show = ref(false);
const ModalType=ref('');
const props = defineProps({
    text: String,
    username: String,
    timedate: Date,
    user_id:Number,
    post_id:Number
});
provide('text', props.text)
provide('postid', props.post_id)
function closeModal(){
    ModalType.value=false;
}
function showModal(modalType){
    ModalType.value=modalType
}
function deletePost(){
      axios.delete(route('deleteauthorpost',props.post_id));
      closeModal();
}
</script>
<template>
<div>
<ModalWindow v-if="ModalType" :modalType="ModalType" @close="closeModal" @success="deletePost" >
</ModalWindow>
        <div class="max-w-md py-4 px-8 bg-white shadow-lg rounded-lg my-20">
    <template  v-if="$page.props.auth.user">
    <button class= "p-1 rounded-lg float-right bg-gray-800 text-white" @click="showModal('ModalWindowDelete')"  v-if="$page.props.auth.user.is_admin||$page.props.auth.user.id==user_id">X</button>
    </template>
    <h2 class="text-gray-800 text-3xl font-semibold">{{username}}</h2>
    <p class="mt-2 text-gray-600">{{text}}</p>
      <div class="flex justify-end mt-4">
    <a href="#" class="text-xl font-medium text-indigo-500">{{timedate}}</a>
      
        <template  v-if="$page.props.auth.user">
    <button class= "p-1 rounded-lg float-right bg-gray-800 text-white" @click="showModal('ModalWindowPostUpdate')"  v-if="$page.props.auth.user.is_admin||$page.props.auth.user.id==user_id">R</button>
    </template>
    </div>
  </div>

</div>
</template>