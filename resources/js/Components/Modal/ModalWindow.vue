<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

</script>
<template>
<div class="modal-backdrop fixed top-0 bottom-0 left-0 right-0 flex justify-center items-center bg-black/[0.3]">
    <div class="flex flex-col modal-inner bg-white p-4 rounded-lg border-black[0.3]">
        <button @click="this.$emit('close');" class="bg-gray-800 text-white rounded">X</button>
        <slot name="modalBody">
        </slot>
    </div>
</div>
</template>