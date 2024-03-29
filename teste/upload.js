const url = 'process.php'
const form = document.querySelector('form')

form.addEventListener('submit', e => {
  e.preventDefault()

  const files = document.querySelector('[type=file]').files
  const formData = new FormData()
  console.log(files);

  for (let i = 0; i < files.length; i++) {
    let file = files[i]
    console.log(file);

    formData.append('files[]', file)
    console.log(formData);
  }

  fetch(url, {
    method: 'POST',
    body: formData,
  }).then(response => {
    console.log(response)
  })
})