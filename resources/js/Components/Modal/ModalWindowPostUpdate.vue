<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeLabel from '@/Components/Label.vue';
import {useForm } from '@inertiajs/inertia-vue3';
import { inject } from 'vue'
const postInitialText = inject('text')
const postID = inject('postid')
 const form = useForm({
    text: postInitialText,
});


</script>
<script>
export default {
    methods: {
        submit(postid){
    this.form.post(route('updateauthorpost',postid), {
        onSuccess: (data) => {
            this.$emit('close')
        }
         })
        }
        }

}
</script>
<template>
<form @submit.prevent="submit(postID)">
            <div>
                <BreezeLabel for="text" value="Ваше сообщение:" />
                <textarea сlass="ml-2" v-model="form.text"></textarea>
            </div>
            <div class="flex items-center justify-end mt-4">
                <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Сохранить изменения 
                </BreezeButton>
            </div>
        </form>
</template>