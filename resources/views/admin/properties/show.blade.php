@extends('layouts.app')

@section('content')

<div class="container">

   <div class="card p-2 m-5 bg-primary" >
      {{-- TODO INSERIRE IMG COVER --}}
      {{-- <img src="{{$property->cover_img}}" class="card-img-top" alt="..."> --}}
      <div class="card-body">
         <h1 class="text-center">
            {{$property->title}}
         </h1>
         <p class="card-text">{{$property->description}}</p>
         <div class="card-info d-flex">
            <h4 class="m-3">
               Price for night: {{$property->night_price}}&euro;
            </h4>
            <h4 class="m-3">
               Numbers of beds: {{$property->n_beds}}
            </h4>
            <h4 class="m-3">
               Numbers of rooms: {{$property->n_rooms}}
            </h4>
            <h4 class="m-3">
               Dimension of room: {{$property->mq}}mq
            </h4>
         </div>
      </div>
   </div>
</div>

@endsection