export default function calculateFibonacci(n) {
  const result = []

  let a = 0
  let b = 1

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