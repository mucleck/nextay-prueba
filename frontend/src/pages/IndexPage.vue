<template>
  <q-page class="page row no-wrap">
    <div class="col">
      <FibonacciPage />
    </div>

    <div class="col bg-red">
      hola
    </div>
  </q-page>
</template>

<script setup>
import FibonacciPage from '@/components/FibonacciPage.vue'
</script>

<style scoped>
.page {
  height: 100%;
  min-height: 0 !important;
}
</style>