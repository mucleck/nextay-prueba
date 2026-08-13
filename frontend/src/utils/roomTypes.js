import { API_URL } from '@/config/api'

async function fetchJson(endpoint) {
  const response = await fetch(`${API_URL}/${endpoint}`)

  if (!response.ok) {
    throw new Error(`HTTP error: ${response.status}`)
  }

  return response.json()
}

export function getRoomTypesLastPrice() {
  return fetchJson('room-types-last-price')
}

export function getRoomTypesCountAvg() {
  return fetchJson('room-types-count-avg')
}