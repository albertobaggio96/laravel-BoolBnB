@extends('layouts.app')

@section('content')
<section  class="container mt-5">

  @if (session("message"))
    <div class="alert alert-{{ session('alert-type') }}">
      {{ session("message") }}
    </div>
  @endif

  <div class="text-center pb-4 d-flex">
    
    {{-- todo cestrino--}}
    <a href="{{ route("admin.properties.trashed") }}" class="btn btn-bg-purp-light text-white">Cestino</a>
    {{-- todo ricerca--}}
    <form class="d-flex ms-auto d-inline" action="{{ route("admin.properties.search") }}" method="POST">
      @csrf
      <input class="form-control me-2" name="title" placeholder="cerca">
      <button class="btn btn-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
  </div>
  <div class="table-responsive-sm">
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">Titolo</th>
        <th scope="col" class="custom-responsive-sm">Prezzo a notte</th>
        <th scope="col" class="custom-responsive-sm">N letti</th>
        <th scope="col" class="custom-responsive-sm">N stanze</th>
        <th scope="col" class="custom-responsive-sm">Mq</th>
        <th scope="col" class="custom-responsive-sm">Visible</th>
        <th scope="col" class="custom-responsive-sm">Indirizzo</th>
        <th scope="col">Azioni utente</th>
    </thead>
    <tbody class="table-group-divider">
      @foreach ($properties as $property)
        <tr>
            <td>{{ $property->title }}</td>
            <td class="custom-responsive-sm">{{ $property->night_price }}</td>
            <td class="custom-responsive-sm">{{ $property->n_beds }}</td>
            <td class="custom-responsive-sm">{{ $property->n_rooms }}</td>
            <td class="custom-responsive-sm">{{ $property->mq }}</td>
            <td class="custom-responsive-sm">@if($property->visible) <i class="fa-solid fa-check text-success"></i> @else <i class="fa-solid fa-xmark text-danger"></i> @endif</td>
            <td class="custom-responsive-sm w-25">{{ $property->address }}</td>
            <td>
              <a href="{{ route("admin.properties.show", $property->slug) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
              <a href="{{ route("admin.properties.edit", $property->slug) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
              <form class="d-inline delete-element" action="{{ route("admin.properties.destroy", $property->slug) }}" method="POST" data-element-name="{{ $property->title }}">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger" value="delete"><i class="fa-solid fa-trash-can-arrow-up"></i><span class="d-none d-lg-inline">Delete</span></button>
              </form>
            </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
  {{-- todo paginazione--}}
  {{-- {{ $properties->links() }} --}}
</section>
@endsection


@section("js")
  {{-- popup --}}
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @vite('resources/js/deleteConfirm.js')
@endsection