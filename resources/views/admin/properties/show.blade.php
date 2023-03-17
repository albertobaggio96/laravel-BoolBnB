@extends('layouts.app')

@section('content')

<div class="container">
   <div class="row">
      <div class="col-12">
         <div class="card p-2 m-5 ">
            {{-- TODO INSERIRE IMG COVER --}}
            <img src="{{asset('storage/' . $property->cover_img)}}" class="card-img-top" alt="...">
            <div class="card-body">
               <h1 class="text-center">
                  {{$property->title}}
               </h1>
               <p class="card-text">{{$property->description}}</p>
               <div class="card-info d-flex">
                  <h4 class="m-3">
                     Prezzo per notte: {{$property->night_price}}&euro;
                  </h4>
                  <h4 class="m-3">
                     Numero di letti: {{$property->n_beds}}
                  </h4>
                  <h4 class="m-3">
                     Numero di stanze: {{$property->n_rooms}}
                  </h4>
                  <h4 class="m-3">
                     Dimension of room: {{$property->mq}}mq
                  </h4>
               </div>
               <div class="card-info d-flex ">
                  <div class="row">
                     <div class="col-3">
                        <h3 class="m-3">
                           Services available:
                        </h3>
                     </div>

                     @foreach ($property->services as $service)
                        <div class="col-3 d-flex flex-wrap services">
                           <h5 class="m-3">
                              {{$service->title}}
                           </h5>
                        </div>
                     @endforeach
                  </div>
               </div>
            </div>
            <div class="container-btn d-flex justify-content-between">
               <div class="prev">
                  @isset($prevProperty)
                  <a href="{{route('admin.properties.show', $prevProperty)}}" class="btn btn-danger">Prev</a>
                  @endisset
               </div>
      
               <div class="home">
                  <a href="{{route('admin.properties.index')}}" class="btn btn-warning">Go to Home</a>
               </div>
      
               <div class="next">
                  @isset($nextProperty)
                  <a href="{{route('admin.properties.show', $nextProperty)}}" class="btn btn-success ">Next</a>
                  @endisset
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection