@extends('layouts.app')

@section('content')
   <div class="container-fluid "> {{-- ho rimosso la classe show-container --}}
      <div class="row">
         <div class="col-12">
            <h1>Pianso selezionato: {{$sponsorship['type']}}</h1>
            <div id="dropin-container"></div>
            <button id="submit-button" class="button button--small button--green">Purchase</button>
            <script>
               var button = document.querySelector('#submit-button');
                  braintree.dropin.create({
                     authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
                     selector: '#dropin-container'
                  }, function (err, instance) {
                     button.addEventListener('click', function () {
                        instance.requestPaymentMethod(function (err, payload) {
                           // Submit payload.nonce to your server
                           console.log(err)
                           console.log(payload)
                           if(err == null){
                              alert('pagamento effettuato')
                           }else{
                              alert('qualcosa e\'\ andato storto')
                           }
                        });
                     })
                  });
            </script>
         </div>
      </div>
   </div>
@endsection