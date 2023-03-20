//check if user age if > 18
function getAge(ageDiff){
    if(ageDiff < 18){
        return false
    }else{
        return true
    }
}

function ValidateEmail(input) {
    const validRegex = /^[a-zA-Z0-9.!#$%&'+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)$/;
  
    if (input.value.match(validRegex)) {
      return true;

    } else {
      return false;
    }
  
  }
  
  
  
  const PswElement = document.getElementById('password')
  const confirmPswElement = document.getElementById('password-confirm')   
  const submitBtn = document.getElementById('submit-form')
  const calendar = document.getElementById('date_of_birth')
  const userEmail = document.getElementById('email')
  let today =  new Date()
  
 


userEmail.addEventListener('input', function(){
    const validMail = ValidateEmail(userEmail)

    if(validMail !== true){
        userEmail.classList.add('is-invalid')
     }else{
        userEmail.classList.remove('is-invalid')
     }
 })


//when user add his age in the input type date this event will retrun a red error when user is < 18
calendar.addEventListener('input', () => {
    let userAge = new Date(calendar.value)
    let ageDiff = today.getFullYear() - userAge.getFullYear()
    let verif = getAge(ageDiff)
    if(verif !== true){
        calendar.classList.add('is-invalid')
    }else{
        calendar.classList.remove('is-invalid')
    }
})

//check if password and confirm password are matched
confirmPswElement.addEventListener('input', () => {
    console.log(PswElement.value)
    console.log(confirmPswElement.value)
    
    if(confirmPswElement.value == PswElement.value){
        confirmPswElement.classList.add('is-valid')
        confirmPswElement.classList.remove('is-invalid')
        
    }else{
        confirmPswElement.classList.remove('is-valid')
        confirmPswElement.classList.add('is-invalid')
    }
})


//on submit check if password are matched if not don't send the form.
submitBtn.addEventListener('click', function(event){
    
    if(confirmPswElement.value !== PswElement.value){
        event.preventDefault()
        return 
    }
    
})
