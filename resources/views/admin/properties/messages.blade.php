@extends('layouts.app')

@section('content')

<div class="container-fluid show-container">
   <div class="row justify-content-center">
      <div class="col-sm-12 col-lg-8">
         <h1 class="m-2 text-center">
            Ecco i messaggi della attuale proprietà
         </h1>
         @foreach ($messages as $message)
         <div class="card my-card my-2 m-md-4 p-2 m-lg-5 ">
            <div class="return">
               <a href="{{ route("admin.properties.index") }}" class="btn btn-primary m-2"><i class="fa-solid fa-arrow-left-long"></i></a>
            </div>

            <div class="card-info text-center">
               <h5>Nome</h5>
               <p>{{$message['name']}}</p>
               <h5>Indirizzo del Mittente</h5>
               <p>{{$message['mail_from']}}</p>
               <h5>Oggetto del messaggio</h5>
               <p>{{$message['subject']}}</p>
               <h5>Testo del Messaggio:</h5>
               <p>{{$message['body_message']}}</p>

            </div>

            <form class="d-flex delete-element justify-content-end" action="{{ route('admin.messages.destroy', $message['id']) }}" method="POST" data-element-name="">
               @csrf
               @method("DELETE")
               <button type="submit" class="btn btn-danger" value="delete"><i class="fa-solid fa-trash-can-arrow-up"></i></button>
            </form>
         </div>
         @endforeach
      </div>
   </div>
</div>

@endsection