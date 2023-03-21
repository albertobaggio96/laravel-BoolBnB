//check if user age if > 18
function getAge(ageDiff){
    if(ageDiff < 18){
        return false
    }else{
        return true
    }
}


//check if email is valid
function ValidateEmail(input) {
    const validRegex = /^[a-zA-Z0-9.!#$%&'+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)$/;
  
    if (input.value.match(validRegex)) {
      return true;

    } else {
      return false;
    }
  
  }
  
//function for create a new element 
function createElement(element, content){
    const myElement = document.createElement(element)
    myElement.classList.add('text-danger')
    myElement.textContent = content
    return myElement
}
  
  
const PswElement = document.getElementById('password')
const confirmPswElement = document.getElementById('password-confirm')   
const submitBtn = document.getElementById('submit-form')
const calendar = document.getElementById('date_of_birth')
const userEmail = document.getElementById('email')
let today =  new Date()

//create element error for tag date
let errorElementDate = createElement('div')
calendar.after(errorElementDate)
//create element error for tag email
let errorElementEmail = createElement('div')
userEmail.after(errorElementEmail)
//create element error for tag password
let errorElementPsw = createElement('div')
confirmPswElement.after(errorElementPsw)
 


userEmail.addEventListener('input', function(){
    const validMail = ValidateEmail(userEmail)

    if(validMail !== true){
        userEmail.classList.add('is-invalid')
        const error = "Inserisci una mail valida"
        errorElementEmail.innerHTML = `${error}`
     }else{
        userEmail.classList.remove('is-invalid')
        errorElementEmail.innerHTML = ""
     }
 })


//when user add his age in the input type date this event will retrun a red error when user is < 18
calendar.addEventListener('input', () => {
    let userAge = new Date(calendar.value)
    let ageDiff = today.getFullYear() - userAge.getFullYear()
    let verif = getAge(ageDiff)
    if(verif !== true){
        calendar.classList.add('is-invalid')
        const error = "Devi avere almeno 18 anni per registrarti alla piattaforma"
        errorElementDate.innerHTML = `${error}`
    }else{
        calendar.classList.remove('is-invalid')
        errorElementDate.innerHTML = ""
    }
})

//check if password and confirm password are matched
confirmPswElement.addEventListener('input', () => {
    console.log(PswElement.value)
    console.log(confirmPswElement.value)
    
    if(confirmPswElement.value == PswElement.value){
        confirmPswElement.classList.add('is-valid')
        confirmPswElement.classList.remove('is-invalid')
        errorElementPsw.innerHTML = ""
        
    }else{
        confirmPswElement.classList.remove('is-valid')
        confirmPswElement.classList.add('is-invalid')
        const error = "Attenzione! Le password non coincidono"
        errorElementPsw.innerHTML = `${error}`
    }
})


//on submit check if password are matched if not don't send the form.
submitBtn.addEventListener('click', function(event){
    
    if(confirmPswElement.value !== PswElement.value){
        event.preventDefault()
        return 
    }
})
function formatDate(date, number) {
    return `${date.getFullYear() - number}-${("0" + (date.getMonth() + 1)).slice(-2)}-${("0" + (date.getDate    () + 1)).slice(-2)}`
}

const majorAge = formatDate(new Date(), 18)
const maxAge = formatDate(new Date(), 120)

calendar.setAttribute('max', majorAge)
calendar.setAttribute('min', maxAge)


// function formatDate(date) {
//     return `${date.getFullYear() - 120}-${("0" + (date.getMonth() + 1)).slice(-2)}-${("0" + (date.getMonth() + 1)).slice(-2)}`
// }


