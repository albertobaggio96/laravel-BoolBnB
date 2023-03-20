@extends('layouts.app')

@section('content')

    @include('admin.properties.partials.createEditForm', ['method' => 'PUT', 'routeName' => 'admin.properties.update'])
    
@endsection

@section("js")
  @vite('resources/js/formValidation.js')
@endsection