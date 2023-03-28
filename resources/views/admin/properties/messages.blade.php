@extends('layouts.app')

@section('content')

<div class="container-fluid show-container">
   <div class="row justify-content-center">
      <div class="col-sm-12 col-lg-8">
         @foreach ($messages as $message)
         <div class="card my-card my-2 m-md-4 p-2 m-lg-5 ">
            <h5>Nome Mittente:</h5>
            <p>{{$message['name']}}</p>
            <h5>IndirizzoMittente:</h5>
            <p>{{$message['mail_from']}}</p>
            <h5>Oggetto:</h5>
            <p>{{$message['subject']}}</p>
            <h5>Testo Messaggio:</h5>
            <p>{{$message['body_message']}}</p>
         </div>
         @endforeach
      </div>
   </div>
</div>

@endsection