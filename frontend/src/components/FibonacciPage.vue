<template>
  <div class="column q-pa-md fit fibonacci-container">
    <q-input
      v-model.number="number"
      type="number"
      rounded
      outlined
      label="Introduce un numero"
      :rules="[
          val => val !== null || 'Introduce un numero',
          val => val >= 0 || 'Introduce un numero mayor que 0',
          val => Number.isInteger(val) || 'Introduce un numero entero'
        ]"
    />

    <q-table
      class="col q-mt-md fibonacci-table"
      title="Secuencia de Fibonacci"
      :rows="rows"
      :columns="columns"
      row-key="position"
      :pagination="{ rowsPerPage: 50 }"
      wrap-cells
    />

  </div>
</template>


<script setup>
import { ref, computed } from 'vue'
import calculateFibonacciRecursive from '@/utils/fibonacci'

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
    sortable: true,
    classes: 'fibonacci-value-cell'
  }
]

const rows = computed(() => {
  return calculateFibonacciRecursive(number.value)
})
</script>

<style scoped>
.fibonacci-container {
  min-height: 0;
}

.fibonacci-table {
  min-height: 0;
}

.fibonacci-table :deep(.q-table__middle) {
  min-height: 0;
}

.fibonacci-table :deep(.fibonacci-value-cell) {
  word-break: break-all;
}
</style>