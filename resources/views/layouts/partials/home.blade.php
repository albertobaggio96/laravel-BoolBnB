@extends('layouts.app')


@section('content-home')
   
    <div class="user-btn d-flex justify-content-end m-4">
        <a href="{{ route("admin.properties.create") }}" class="btn btn-bg-purple text-white"><i class="fa-regular fa-square-plus"></i> Crea Appartamento</a>
    </div>

    <section class="container-fluid show-container">
        <div class="row justify-content-center">
           <div class="col-sm-12 col-lg-8">
              <h1 class="m-2 text-center">
                 Ecco tutti i messaggi ricevuti
              </h1>
              <h2>Messaggi non letti : {{ $unreadMessages }}</h2>
              @foreach ($messages as $message)
              <article class="card my-card my-2 m-md-4 p-2 m-lg-5 {{ $message->displayed ? 'bg-secondary' : '' }}">
                          
                 <a href="{{ route('admin.messages.displayed', $message->id) }}" class="card-info text-decoration-none text-black">
                    <div class="mb-3">
                        <h2 class="fs-5 d-inline">Nome :</h2>
                        <span>{{$message->name}}</span>   
                    </div>
                    <div>
                        <h3 class="fs-5 d-inline">Proprietà: </h3>
                        <span>{{ $message->property->title }}</span>
                    </div>
                 </a>
         
                 <form class="d-flex delete-element justify-content-end" action="{{ route('admin.messages.destroy', [$message['id'],'index']) }}" method="POST" data-element-name="">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger" value="delete"><i class="fa-solid fa-trash-can-arrow-up"></i></button>
                 </form>
              </article>
              @endforeach
           </div>
        </div>
    </section>
@endsection