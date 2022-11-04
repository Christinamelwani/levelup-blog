export default (data) => {
  const formData = new FormData()

  Object.keys(data).forEach((key) => {
    const value = data[key]

    if (!Array.isArray(value)) {
      formData.append(key, value)
      return
    }

    value.forEach((val) => {
      formData.append(`${key}[]`, val)
    })
  })

  return formData
}
