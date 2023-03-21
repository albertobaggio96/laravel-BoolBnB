const titleProperty = document.getElementById('title');
const descriptionProperty = document.getElementById('description');
const nightPriceProperty = document.getElementById('night-price');
const bedNumberProperty = document.getElementById('beds-number');
const toiletteProperty = document.getElementById('n_toilettes');
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

// function that check number of string charatters
function minAndMaxLength(input, min, max){
  input.addEventListener('input', function(){
    isValid((input.value.length >= min && input.value.length < max), input)
  })
}

// function that check number value
function minAndMaxNumber(input, min, max){
  input.addEventListener('input', function(){
    isValid((input.value >= min && input.value < max), input)
  })
}

// !! string
minAndMaxLength(titleProperty, 5, 100)

minAndMaxLength(descriptionProperty, 50, 65535)

minAndMaxLength(addressProperty, 2, 200)

//!! numeric
minAndMaxNumber(nightPriceProperty, 1, 999999,99)

minAndMaxNumber(bedNumberProperty, 1, 127)

minAndMaxNumber(roomProperty, 1, 127)

minAndMaxNumber(toiletteProperty, 1, 127)

minAndMaxNumber(mqProperty, 1, 65536)
