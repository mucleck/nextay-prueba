<template>
  <div class="column q-pa-md fit fibonacci-container">

    <q-input
      v-model.number="number"
      rounded
      outlined
      label="Ingresa el número!"
    />

    <q-table
      class="col q-mt-md"
      title="Secuencia de Fibonacci"
      :rows="rows"
      :columns="columns"
      row-key="position"
      :pagination="{ rowsPerPage: 20 }"
    />

  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import calculateFibonacci from '@/utils/fibonacci'

const number = ref(null)

const columns = [
  {
    name: 'position',
    required: true,
    label: 'Posición',
    align: 'left',
    field: 'position',
    sortable: true
  },
  {
    name: 'value',
    label: 'Fibonacci',
    align: 'right',
    field: 'value',
    sortable: true
  }
]

const rows = computed(() => {
  return calculateFibonacci(number.value)
})
</script>

<style scoped>
.fibonacci-container {
  min-height: 0;
}
</style>