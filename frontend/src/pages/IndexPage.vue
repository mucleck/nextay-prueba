<template>
  <q-page class="page row no-wrap">
    <div class="col">
      <FibonacciPage />
    </div>

    <div class="col bg-cian">
      <TablasDatos />
    </div>
  </q-page>
</template>

<script setup>
import FibonacciPage from '@/components/FibonacciPage.vue'
import TablasDatos from '@/components/LlamadasApi.vue'
</script>

<style scoped>
.page {
  height: 100%;
  min-height: 0 !important;
}
</style>