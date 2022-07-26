<script setup>
import ModalWindow from './Modal/ModalWindow.vue';
import { ref } from 'vue';
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
function closeModal(){
    show.value=false;
}
function showModal(modalType){
    ModalType.value=modalType
    show.value=true;
}
function deletePost(){
      axios.delete(route('deleteauthorpost',props.post_id));
      closeModal();
}
</script>
<template>
<div>
<ModalWindow v-if="show" :modalType="ModalType" @close="closeModal" @success="deletePost">
</ModalWindow>
        <div class="max-w-md py-4 px-8 bg-white shadow-lg rounded-lg my-20">
  <div>
    <template  v-if="$page.props.auth.user">
    <button class= "p-1 rounded-lg float-right bg-gray-800 text-white" @click="showModal('ModalWindowDelete')"  v-if="$page.props.auth.user.is_admin||$page.props.auth.user.id==user_id">X</button>
    </template>
    <h2 class="text-gray-800 text-3xl font-semibold">{{username}}</h2>
    <p class="mt-2 text-gray-600">{{text}}</p>
  </div>
  <div class="flex justify-end mt-4">
    <a href="#" class="text-xl font-medium text-indigo-500">{{timedate}}</a>
  </div>
</div>
</div>
</template>