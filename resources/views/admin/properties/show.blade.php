@extends('layouts.app')

@section('content')

<div class="container">
   <div class="row">
      <div class="col-12">
         <div class="card p-2 m-5 ">
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
                     Dimensione della camera: {{$property->mq}}mq
                  </h4>
               </div>
               <div class="card-info d-flex ">
                  <div class="container-fluid">
                  <div class="row justify-content-center">
                     <div class="col-12 text-center">
                        <h3 class="m-3">
                           Services available:
                        </h3>
                     </div>

                     @foreach ($property->services as $service)
                        <div class="col-2 text-center services">
                           <i class="{{$service->icon}}"></i>
                           <h6>
                              {{$service->title}}
                           </h6>
                        </div>
                     @endforeach
                  </div>
               </div>
            </div>
            </div>
            <div class="container-btn d-flex justify-content-between">
               <div class="prev m-2">
                  @isset($prevProperty)
                  <a href="{{route('admin.properties.show', $prevProperty)}}" class="btn btn-danger">Indietro</a>
                  @endisset
               </div>
               
               <div class="container d-flex justify-content-center">
                  <div class="home m-2">
                     <a href="{{route('admin.properties.edit', $property->slug)}}" class="btn btn-info">Modifica</a>
                  </div>
   
                  <div class="home m-2">
                     <a href="{{route('admin.properties.index')}}" class="btn btn-warning">Vai alla home</a>
                  </div>
               </div>

               <div class="next m-2">
                  @isset($nextProperty)
                  <a href="{{route('admin.properties.show', $nextProperty)}}" class="btn btn-success ">Avanti</a>
                  @endisset
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection