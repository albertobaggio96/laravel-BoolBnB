@extends('layouts.app')

@section('content')

<div class="container-fluid show-container">
   <div class="row justify-content-center">
      <div class="col-sm-12 col-lg-8">
         <div class="card my-card my-2 m-md-4 p-2 m-lg-5 ">
            <img src="{{asset('storage/' . $property->cover_img)}}" class="card-img-top" alt="...">
            <div class="card-body">
               <h1 class="text-center p-2">
                  {{$property->title}}
               </h1>
               <p class="card-text p-4">{{$property->description}}</p>
               <div class="row gy-1">
                  <div class="col-12 col-lg-3 justify-content-center card-info d-flex align-items-center card-text border border-3 border-white">
                     <h5 class="py-2">  
                        Prezzo per notte: {{$property->night_price}}&euro;
                     </h5>
                  </div>
                  <div class="col-12 col-lg-3 justify-content-center card-info d-flex align-items-center card-text border border-3 border-white">
                     <h5 class="py-2">
                        Numero di letti:
                        5
                     </h5>
                  </div>
                  <div class="col-12 col-lg-3 justify-content-center card-info d-flex align-items-center card-text border border-3 border-white">
                     <h5 class="py-2">
                        Numero di stanze: {{$property->n_rooms}}
                     </h5>
                  </div>
                  <div class="col-12 col-lg-3 justify-content-center card-info d-flex align-items-center card-text border border-3 border-white">
                     <h5 class="py-2">
                        Superficie: {{$property->mq}}mq
                     </h5>
                  </div>
               </div>
               <div class="card-info d-flex ">
                  <div class="container-fluid">
                  <div class="row justify-content-center">
                     <div class="col-12 text-center">
                        <h3 class="m-4">
                           Servizi disponibili:
                        </h3>
                     </div>

                        <div class="row service-box p-3">
                           @foreach ($property->services as $service)
                           <div class="col-sm-12 col-md-4 col-lg-3 text-md-center d-flex d-md-block services">
                              <i class="{{$service->icon}}"></i>
                              <h6 class="ms-4 m-md-0 align-content-center">
                                 {{$service->title}}
                              </h6>
                           </div>
                           @endforeach
                        </div>
                  </div>
               </div>
            </div>
            </div>
            <div class="container-btn d-flex justify-content-between">
               <div class="prev m-2">
                  @isset($prevProperty)
                  <a href="{{route('admin.properties.show', $prevProperty)}}" class="btn btn-danger"><span class="custom-responsive-sm">Indietro</span> <i class="fa-solid fa-arrow-left text-white d-md-none"></i></a>
                  @endisset
               </div>
               
               <div class="container d-flex justify-content-center">
                  <div class="home m-2">
                     <a href="{{route('admin.properties.edit', $property->slug)}}" class="btn btn-info"><span class="custom-responsive-sm">Modifica</span> <i class="fa-solid fa-pen-to-square text-white d-md-none"></i></a>
                  </div>
   
                  <div class="home m-2">
                     <a href="{{route('admin.properties.index')}}" class="btn btn-warning"><span class="custom-responsive-sm">Vai alla home</span> <i class="fa-solid fa-house text-white d-md-none"></i></a>
                  </div>
               </div>

               <div class="next m-2">
                  @isset($nextProperty)
                  <a href="{{route('admin.properties.show', $nextProperty)}}" class="btn btn-success"><span class="custom-responsive-sm">Avanti</span> <i class="fa-sharp fa-solid fa-arrow-right text-white d-md-none"></i></a>
                  @endisset
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection