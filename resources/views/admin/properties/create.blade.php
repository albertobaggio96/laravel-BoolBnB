@extends('layouts.app')

@section('content')
    @include('admin.properties.partials.createEditForm', ['method' => 'POST', 'routeName' => 'admin.properties.store'])
@endsection

@section("js")
  @vite('resources/js/formValidation.js')
@endsection