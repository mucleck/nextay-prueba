/**
 * Devuelve un array con objetos con par de claves position y value
*/

export default function calculateFibonacciRecursive(n) {
  const result = []

  let a = 0n
  let b = 1n

  for (let i = 0; i <= n; i++) {
    result.push({
      position: i,
      value: a
    })

    const next = a + b
    a = b
    b = next
  }

  return result
}