@extends('layouts.app')

@section('content')
<section  class="container mt-5">

  @if (session("message"))
    <div class="alert alert-{{ session('alert-type') }}">
      {{ session("message") }}
    </div>
  @endif

  <div class="text-center pb-4">
    <a href="{{ route("admin.properties.create") }}" class="btn btn-primary">Add new property</a>
    {{-- todo cestrino--}}
    <a href="{{ route("admin.properties.trashed") }}" class="btn btn-secondary">trash</a>
    {{-- todo ricerca--}}
    {{-- <form class="d-flex ms-auto d-inline w-25" action="{{ route("admin.properties.search") }}" method="POST">
      @csrf
      <input class="form-control me-2" name="title">
      <button class="btn btn-success" type="submit">Search</button>
    </form> --}}
  </div>
  <table class="table table-dark table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Night Price</th>
        <th scope="col">Beds</th>
        <th scope="col">Rooms</th>
        <th scope="col">MQ</th>
        <th scope="col">Visible</th>
        <th scope="col">Address</th>
        <th scope="col">Options</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @foreach ($properties as $property)
        <tr>
            <td>{{ $property->title }}</td>
            <td>{{ $property->night_price }}</td>
            <td>{{ $property->n_beds }}</td>
            <td>{{ $property->n_rooms }}</td>
            <td>{{ $property->mq }}</td>
            <td>{{ $property->visible }}</td>
            <td>{{ $property->address }}</td>
            <td>
              <a href="{{ route("admin.properties.show", $property->slug) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
              <a href="{{ route("admin.properties.edit", $property->slug) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
              <form class="d-inline delete-element" action="{{ route("admin.properties.destroy", $property->slug) }}" method="POST" data-element-name="{{ $property->title }}">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger" value="delete"><i class="fa-solid fa-trash-can-arrow-up"></i><span>Delete</span></button>
              </form>
            </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{-- todo paginazione--}}
  {{-- {{ $properties->links() }} --}}
</section>
@endsection

{{-- todo popup --}}
{{-- @section("js")
  @vite('resources/js/deleteConfirm.js')
@endsection --}}