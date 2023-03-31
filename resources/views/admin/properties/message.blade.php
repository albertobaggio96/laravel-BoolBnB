@extends('layouts.app')

@section('content')
    <section>
      
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="return">
              <a href="{{ route($redirect === 'index' ? 'admin.messages.index' : 'admin.properties.messages', $propertySlug) }}" class="btn btn-bg-purp-light m-2"><i class="fa-solid fa-arrow-left-long text-white"></i></a>
            </div>
          </div>
          <div class="col-sm-12 col-lg-8">
            <div class="card my-card my-2 m-md-4 p-2 m-lg-5">
              <div class="card-header ms_bg-violet">
                <p class="text-white fs-5">Messaggio da: {{ $message->name }}</p>
              </div>
              <div class="card-body">
                <h3 class="mb-4">{{ $message->subject }}</h3>
                <div class="card-text p-1">
                  {{ $message->body_message }}
                </div>
              </div>
              <div class="card-footer">
                <p>L'ospite vuole essere ricontattato alla seguente e-mail {{ $message->mail_from }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection