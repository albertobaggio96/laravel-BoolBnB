const titleProperty = document.getElementById('title');
const descriptionProperty = document.getElementById('description');
const nightPriceProperty = document.getElementById('night-price');
const bedNumberProperty = document.getElementById('beds-number');
const ToiletteProperty = document.getElementById('n_toilettes');
const roomProperty = document.getElementById('rooms-number');
const coverProperty = document.getElementById('cover_img');
const mqProperty = document.getElementById('mq');
const addressProperty = document.getElementById('address');
const visibleProperty = document.getElementById('visible');
const servicesProperty = document.querySelectorAll('input.service')

//function add or remove is-invalid class
function isValid(validation, input){
    if(validation){
      return input.classList.remove('is-invalid')
    } else {
      return input.classList.add('is-invalid')
    }
}

// function that check number of charatters of string
function minAndMaxLength(input, min, max){
  isValid((input.value.length >= min && input.value.length < max), input)
}

titleProperty.addEventListener('input', function(){
  minAndMaxLength(titleProperty, 5, 100)
})

descriptionProperty.addEventListener('input', function(){
  minAndMaxLength(descriptionProperty, 50, 500)
})

addressProperty.addEventListener('input', function(){
  minAndMaxLength(addressProperty, 2, 200)
})

