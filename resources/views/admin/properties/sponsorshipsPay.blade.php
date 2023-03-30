@extends('layouts.app')

@section('content')
   <div class="container-fluid "> {{-- ho rimosso la classe show-container --}}
      <div class="row">
         <div class="col-12">
            <h2>Pianso selezionato: {{$sponsorship['type']}}</h2>
            <h3>Importo da pagare: {{$sponsorship['price']}}€</h3>
         </div>
         <div class="col-12">
            <div id="dropin-container"></div>
         </div>
         <div class="row">
            <div class="col-6">
               <button id="submit-button" class="button button--small button--green">Compleata Pagamento</button>
            </div>
            <div id="buttons" class="col-6">
               <form id="form-procedi" class="" action="{{ route("admin.properties.sponsorshipsConferm", [$property->slug, $sponsorship->slug]) }}" method="POST" >
                  @csrf
                  @method("POST")
               </form>
            </div>
         </div>
         <script>
            var button = document.querySelector('#submit-button');
            var form = document.getElementById('form-procedi');
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
                           let procedi = document.createElement('button')
                           procedi.setAttribute('type','submit')
                           procedi.innerText= 'PROCEDI >'
                           form.appendChild(procedi)
                        }else{
                           alert('qualcosa e\'\ andato storto')
                        }
                     });
                  })
               });
         </script>
      </div>
   </div>
@endsection