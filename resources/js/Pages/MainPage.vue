<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import NavBar from '@/Components/NavBar.vue'
import PostContainer from '@/Components/PostContainer.vue';
import ModalWindow from '@/Components/Modal/ModalWindow.vue'
const ModalType=ref('');
function closeModal(){
    ModalType.value=false;
};
function showModal(modalType){
    ModalType.value=modalType

}
</script>

<template>
<ModalWindow v-if="ModalType" :modalType="ModalType" @close="closeModal">
</ModalWindow>
<Head title="TTK Guest book" />
<NavBar @openModal="showModal"></NavBar>
    <div class="flex flex-col flex-wrap bd-highlight mb-3">
<PostContainer/>
</div>
</template>