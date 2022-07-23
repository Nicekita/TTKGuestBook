<script setup>
import { ref } from 'vue';
import BreezeDropdownLink from '@/Components/DropdownLink.vue';
const isMenuHidden = ref(false);
</script>
<template>
<div class="absolute inset-y-0 right-0 flex flex-row items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
  <div class="text-white">{{$page.props.auth.user.name}}</div>
        <div class="ml-3 relative ">    
          <div>
            
            <button type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true" v-on:click="isMenuHidden=!isMenuHidden">
              <span class="sr-only">Open user menu</span>
                <img src="/user-profile.png" class="h-8 w-8 rounded-full">
            </button>
          </div>
          <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" v-if="isMenuHidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <BreezeDropdownLink :href="route('logout')" method="post" as="button">
                                            Log Out
            </BreezeDropdownLink>
          </div>
        </div>
      </div>
</template>