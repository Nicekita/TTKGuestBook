<script setup>
import BreezeButton from '@/Components/Button.vue';

</script>
<template>
<div class="grid grid-cols-1">
<div>Вы уверены в своем решении?</div>
<BreezeButton class="justify-self-center"  @click="this.$emit('success');">Подтвердить</BreezeButton>
</div>
</template>