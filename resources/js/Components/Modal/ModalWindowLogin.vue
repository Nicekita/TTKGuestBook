<script setup>

import BreezeButton from '@/Components/Button.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import BreezeCheckbox from '@/Components/Checkbox.vue'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
const form = useForm({
    email: '',
    password: '',
    remember: false
});


</script>
<script>
export default {
    methods: {
        submit(){
    this.form.post(route('login'), {
        onFinish: () => {this.form.reset('password')},
        onSuccess: (data) => {
            this.$emit('close')
        }
         })
        }
        }

}
</script>
<template>
    <form @submit.prevent="submit"> 
    <div class="">
        <BreezeLabel for="email">Your email</BreezeLabel>
        <BreezeInput type="email" id="email" v-model="form.email"  placeholder="name@flowbite.com" required />
    </div>
    <div class="mb-6">
        <BreezeLabel for="password" >Your password</BreezeLabel>
        <BreezeInput type="password" id="password" v-model="form.password"  required />
    </div>
    <div class="flex items-start mb-6">
        <div class="flex items-center h-5">
        <BreezeCheckbox id="remember" type="checkbox" value="" v-model="form.remember"  required />
        </div>
        <BreezeLabel for="remember" >Remember me</BreezeLabel>
    </div>     
    <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" >Submit</BreezeButton>
    </form>
</template>