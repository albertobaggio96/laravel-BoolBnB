@extends('layouts.app')

@section('content')
   <div class="container-fluid mt-5">
      <div class="row">
         <div class="col-12">
            <h2 class="text-center">Seleziona il pacchetto pi&ugrave; adatto per promuovere la tua propriet&agrave;</h2>
         </div>
      </div>
      <div class="row justify-content-center mt-5">
         @foreach ($sponsorships as $sponsorship)
            <div class="col-sm-9 col-lg-3">
               <div class="card my-card my-2 p-4 pb-2">
                  <div class="card-title text-center">
                     <h3>{{$sponsorship['type']}}</h3>
                  </div>
                  <hr>
                  <div class="card-body ps-4">
                     <h5 class="text-decoration-underline">Durata</h5>
                     <p>{{$sponsorship['period']}} ore</p>
                     <h5 class="text-decoration-underline">Prezzo</h5>
                     <p>&euro; {{$sponsorship['price']}}</p>
                  </div>
                  <form class="text-end me-2" action="{{ route("admin.properties.sponsorshipsPay", $property->slug) }}" method="POST" >
                     @csrf
                     @method("POST")
                     <button type="submit" class="btn btn-bg-purple text-white m-2" name="planSelected" value="{{$sponsorship['id']}}">Seleziona</button>
                  </form>
               </div>
            </div>
         @endforeach
      </div>
   </div>
   @endsection