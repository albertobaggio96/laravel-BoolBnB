@extends('layouts.app')
@section('content')
    <div class="text-center">
        <h1>Benvenuto {{Auth::user()->name ?? 'user'}}</h1>
    </div>
@endsection