<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
const props = defineProps({
    modalType:String
})
const localModalType=ref('')
const emit = defineEmits(['close','success','failure'])
const vLoadModal = {
  created: (el) => {
    useModal(props.modalType);
  }
}
function close(){
    emit('close')
}
function failure(){
    emit('failure')
}
function success(){
    emit('success')
}
function useModal(modalType){
  import(`./${modalType}.vue`).then(val => {
      localModalType.value = val.default
    })
}
</script>
<template>
<div v-load-modal class="modal-backdrop fixed top-0 bottom-0 left-0 right-0 flex justify-center items-center bg-black/[0.3]">
    <div class="flex flex-col modal-inner bg-white p-4 rounded-lg border-black[0.3]">
        <button @click="close" class="bg-gray-800 text-white rounded">X</button>
        <component v-if="localModalType" :is="localModalType" @close="close" @success="success" @failure="failure"></component>
    </div>
</div>
</template>