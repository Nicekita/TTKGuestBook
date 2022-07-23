<script setup>
import PageLogo from '@/Components/ApplicationLogo.vue'
import UserNav from '@/Components/UserNav.vue'
import GuestNav from './GuestNav.vue'
import BreezeButton from '@/Components/Button.vue';
</script>
<template>
<nav class="bg-gray-800">
  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="relative flex items-center justify-between h-16">
      <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex-shrink-0 flex items-center">
          <PageLogo class="block"/>
          <BreezeButton @click="$emit('openModal','ModalWindowPost')">+</BreezeButton>
        </div>
      </div>
      <UserNav v-if="$page.props.auth.user" />
      <GuestNav @open-login="$emit('openModal','ModalWindowLogin')" @open-reg="$emit('openModal','ModalWindowRegister')" v-else/>
    </div>
  </div>
</nav>
</template>