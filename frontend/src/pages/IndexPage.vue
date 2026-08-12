<template>
  <q-page class="row page">
    <div class="col-6">
      <FibonacciPage />
    </div>

    <div class="col-6 bg-red">
      ali
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
  overflow: hidden;
}
</style>