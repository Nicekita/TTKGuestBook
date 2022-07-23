<script setup>
import BreezeButton from '@/Components/Button.vue';

</script>
<template>
<div>Вы уверены в своем решении?</div>
<BreezeButton class="ml-4"  @click="this.$emit('confirm');">Подтвердить</BreezeButton>
</template>