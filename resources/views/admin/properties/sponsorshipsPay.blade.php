@extends('layouts.app')

@section('content')
   <div class="container-lg mt-5">
      <div class="row">
         <div class="col-12" id="plan-info">
            <h2>Hai selezionato il piano <span class="fw-bold">{{$sponsorship['type']}}</span></h2>
            <h3>Importo da pagare: &euro; {{$sponsorship['price']}}, procedi inserendo i dati di pagamento</h3>
         </div>
         <div class="col-12">
            <div id="dropin-container"></div>
         </div>
         <div class="row">
            <div class="col-6" id="method-btn">
               <button id="submit-button" class="btn btn-bg-purp-light text-white mt-3">scegli metodo di pagamento</button>
            </div>
            <div id="buttons" class="col-12">
               <form id="form-procedi"action="{{ route("admin.properties.sponsorshipsConferm", [$property->slug, $sponsorship->slug]) }}" method="POST" >
                  @csrf
                  @method("POST")
               </form>
            </div>
         </div>
         <script>
            const button = document.querySelector('#submit-button');
            const form = document.getElementById('form-procedi');
            const info = document.getElementById('plan-info');
            const btn = document.getElementById('method-btn')
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
                           // alert('pagamento effettuato')
                           info.innerText = " "
                           btn.innerText = " "
                           let confermationMex = document.createElement('h2')
                           confermationMex.innerText = 'Clicca il bottone \'conferma\' per confermare il pagamento, oppure seleziona un altro metodo di pagamento'
                           let procedi = document.createElement('button')
                           procedi.setAttribute('type','submit')
                           procedi.classList.add('btn', 'btn-bg-purple', 'text-white', 'm-3')
                           procedi.innerText = 'conferma'
                           info.appendChild(confermationMex)
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