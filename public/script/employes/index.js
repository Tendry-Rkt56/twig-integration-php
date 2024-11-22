const form = document.getElementById('form-search')
const limit = document.getElementById('limit')

form.addEventListener('submit', (e) => {
     if (limit.value == 0 || limit.value < 0) {
          e.preventDefault()
          limit.style.border = "1px solid red"
     }
})