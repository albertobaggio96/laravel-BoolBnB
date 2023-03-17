@extends('layouts.app')

@section('content')
  <section id="trashed" class="container">
    @if (session('message'))
      <div class="alert alert-{{ session('alert-type') }} mb-5">
      {{ session('message') }}
      </div>
    @endif

    <table class="table table-striped table-hover">
      <thead>
        <th scope="col">title</th>
        <th scope="col" class="text-center">options</th>
      </thead>
      <tbody class="table-group-divider">
        @foreach ($trashProperties as $property)
          <tr>
            <td>{{ $property->title }}</td>
            <td class="text-center">
              <a href="{{ route('admin.properties.restore', $property->slug) }}" class="btn btn-warning">Restore</a>
              <form class="d-inline force-delete-element"action="{{ route('admin.properties.force-delete', $property->slug) }}" method="POST"data-element-name="{{ $property->title }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" value="delete">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </section>
@endsection
{{-- todo popup --}}

{{-- @section('js')
  @vite('resources/js/deleteConfirm.js')
@endsection --}}
