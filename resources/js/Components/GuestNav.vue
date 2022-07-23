<script setup>
import { ref } from 'vue';
import BreezeButton from '@/Components/Button.vue';
</script>
<template>
<div class="absolute inset-y-0 right-0 flex flex-row items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <div class="ml-3 relative">    
          <BreezeButton @click="this.$emit('open-reg');" >Регистрация </BreezeButton>
            <BreezeButton @click="this.$emit('open-login');"> Авторизация </BreezeButton>
        </div>
      </div>
</template>