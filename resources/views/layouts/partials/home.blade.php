@extends('layouts.app')


@section('content-home')
   
    <div class="user-btn d-flex justify-content-end m-4">
        <a href="{{ route("admin.properties.create") }}" class="btn btn-bg-purple text-white"><i class="fa-regular fa-square-plus"></i> Crea Appartamento</a>
    </div>
@endsection