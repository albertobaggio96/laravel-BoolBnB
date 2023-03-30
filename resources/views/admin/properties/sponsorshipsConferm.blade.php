@extends('layouts.app')

@section('content')
   <div class="container-fluid "> {{-- ho rimosso la classe show-container --}}
      <div class="row justify-content-center">
         @foreach ($sponsorships as $sponsorship)
            <div class="col-sm-12 col-lg-4">
               <div class="card my-card my-2  p-2 ">
                  <h3>{{$sponsorship['type']}}</h3>
                  <h5>Durata: </h5>
                  <p>{{$sponsorship['period']}}</p>
                  <h5>Prezzo: </h5>
                  <p>{{$sponsorship['price']}}</p>
                  <form class="" action="{{ route("admin.properties.sponsorshipsPay", $property->slug) }}" method="POST" >
                     @csrf
                     @method("POST")
                     <button type="submit" class="btn btn-primary m-2" name="planSelected" value="{{$sponsorship['id']}}">Seleziona</button>
                  </form>
               </div>
            </div>
         @endforeach
      </div>
   </div>
   @endsection