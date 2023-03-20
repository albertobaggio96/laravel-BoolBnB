const titleProperty = document.getElementById('title');
const descriptionProperty = document.getElementById('description');
const nightPriceProperty = document.getElementById('night-price');
const bedNumberProperty = document.getElementById('beds-number');
const ToiletteProperty = document.getElementById('n_toilettes');
const roomProperty = document.getElementById('rooms-number');
const visibleProperty = document.getElementById('visible');
const coverProperty = document.getElementById('cover_img');
const mqProperty = document.getElementById('mq');
const addressProperty = document.getElementById('address');
const servicesProperty = document.querySelectorAll('input.service')

// console.log(titleProperty,
//   descriptionProperty,
//   nightPriceProperty,
//   bedNumberProperty,
//   ToiletteProperty,
//   roomProperty,
//   visibleProperty,
//   coverProperty,
//   mqProperty,
//   addressProperty,
//   servicesProperty,
//   nightPriceProperty
// )

function isValid(validation, input){
    if(validation){
      return input.classList.remove('is-invalid')
    } else {
      return input.classList.add('is-invalid')
    }
}

function minAndMax(input, min, max){
  isValid((input.value.length >= min && input.value.length < max), input)
}

titleProperty.addEventListener('input', function(){
  minAndMax(titleProperty, 5, 100)
})



