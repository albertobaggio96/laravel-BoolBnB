const deleteElementConfirm = document.querySelectorAll("form.delete-element")


deleteElementConfirm.forEach((formElement)=>{
  formElement.addEventListener("submit", function(event){
    event.preventDefault();
    const formElementName= formElement.getAttribute("data-element-name")
    Swal.fire({
      title: `Sei sicuro di voler eliminare questo elemento "${formElementName}"?`,
      text: "L'elemento sara' spostato nel cestino",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Annulla',
      confirmButtonText: 'Procedi',
      title: 'Sei sicuro di voler eliminare questo elemento',
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
         'Fatto'
        )
        formElement.submit()
      }
    })
  })
})

const forceDeleteElementConfirm = document.querySelectorAll("form.force-delete-element")

forceDeleteElementConfirm.forEach((formElement)=>{
  formElement.addEventListener("submit", function(event){
    event.preventDefault();
    const formElementName= formElement.getAttribute("data-element-name")
    Swal.fire({
      title:  `Sei sicuro di voler eliminare "${formElementName}"?`,
      text: "Una volta eliminato dal cestino non sara' piu' possibile recuperarlo",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Annulla',
      confirmButtonText: 'Si!, Conferma'
    }).then((result) => {
      if (result.value) {
        Swal.fire({
          title: 'Confirm request',
          html: "Please type <b>CONFIRM</b>",
          input: 'text',
          type: 'warning',
          inputPlaceholder: 'CONFIRM',
          showCancelButton: true,
          confirmButtonText: 'Confirm',
          cancelButtonText: 'Cancel',
          showLoaderOnConfirm: true,
          allowOutsideClick: () => !Swal.isLoading(),
          preConfirm: (txt) => {
            return (txt === "CONFIRM");
          },

        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire(
              'Deleted!',
              `Your project "${formElementName}" has been deleted.`,
              'success'
            )
            formElement.submit()
          }
        })
      }
    });
  });
});