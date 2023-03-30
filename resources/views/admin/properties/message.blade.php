@extends('layouts.app')

@section('content')
    <section>
      <div class="return">
        <a href="{{ route("admin.messages.index") }}" class="btn btn-primary m-2"><i class="fa-solid fa-arrow-left-long"></i></a>
      </div>
      <h1> Proprietà: {{ $message->property->title }}</h1>
      <div> nome: {{ $message->name }}</div>
      <div> email: {{ $message->mail_from }}</div>
      <div> oggetto: {{ $message->subject }} </div>
      <div> testo: {{ $message->body_message }}</div>
    </section>
@endsection