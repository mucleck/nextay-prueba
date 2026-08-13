<template>
  <div class="row items-center justify-center q-gutter-x-md q-pa-md rates-container">

    <q-table
      title="Último precio por tipo de habitación"
      :rows="lastPriceRows"
      :columns="lastPriceColumns"
      row-key="name"
      flat
      bordered
      hide-pagination
      :rows-per-page-options="[0]"
    />

    <q-table
      title="Estadísticas de precios"
      :rows="countAvgRows"
      :columns="countAvgColumns"
      row-key="name"
      flat
      bordered
      hide-pagination
      :rows-per-page-options="[0]"
    />

  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import {
  getRoomTypesLastPrice,
  getRoomTypesCountAvg
} from '@/utils/roomTypes'

const lastPriceRows = ref([])
const countAvgRows = ref([])

const lastPriceColumns = [
  {
    name: 'name',
    label: 'Habitación',
    field: 'name',
    align: 'left'
  },
  {
    name: 'valid_from',
    label: 'Válido desde',
    field: 'valid_from',
    align: 'left'
  },
  {
    name: 'price',
    label: 'Precio',
    field: 'price',
    align: 'right'
  }
]

const countAvgColumns = [
  {
    name: 'name',
    label: 'Habitación',
    field: 'name',
    align: 'left'
  },
  {
    name: 'rates_count',
    label: 'Número de tarifas',
    field: 'rates_count',
    align: 'right'
  },
  {
    name: 'rates_avg_price',
    label: 'Precio medio',
    field: 'rates_avg_price',
    align: 'right'
  }
]

onMounted(async () => {
  lastPriceRows.value = await getRoomTypesLastPrice()
  countAvgRows.value = await getRoomTypesCountAvg()
})
</script>

<style scoped>
.rates-container {
    height: 100%;
}
</style>