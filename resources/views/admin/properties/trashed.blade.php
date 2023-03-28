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
        <th scope="col">Titolo</th>
        <th scope="col" class="text-center">Azioni utente</th>
      </thead>
      <tbody class="table-group-divider">
        @foreach ($trashProperties as $property)
          <tr>
            <td>{{ $property->title }}</td>
            <td class="text-center">
              <a href="{{ route('admin.properties.restore', $property->slug) }}" class="btn btn-warning">Ripristina</a>
              <form class="d-inline force-delete-element"action="{{ route('admin.properties.force-delete', $property->slug) }}" method="POST"data-element-name="{{ $property->title }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" value="delete">Elimina</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </section>
@endsection

@section('js')
{{-- popup --}}
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @vite('resources/js/deleteConfirm.js')
@endsection
