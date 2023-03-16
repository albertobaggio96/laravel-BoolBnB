@extends('layouts.app')

@section('content')
<form action="{{ route($routeName, $property) }}" method="POST" enctype="multipart/form-data" class="py-3">
    @csrf
    @method($method)

    <div class="card px-5 py-3 mb-3">

        <div class="form-outline w-100 mb-3">
            <label for="title<" class="form-label @error('title') is-invalid @enderror">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Insert title" name="title" value="{{old('title', $property->title)}}">
            @error('title')
                <div class="invalid-feedback px-2">
                    {{ $message }}
                </div>
            @enderror                  
        </div>

        <div class="form-outline w-100 mb-3">
            <label for="description" class="form-label @error('description') is-invalid @enderror">Description</label>            
            <textarea name="description" id="description" cols="30" rows="10" placeholder="Insert description">
                {{old('description', $property->description)}}
            </textarea>
            @error('description')
                <div class="invalid-feedback px-2">
                    {{ $message }}
                </div>
            @enderror               
        </div>

        <div class="form-outline w-100 mb-3">
            <label for="night-price" class="form-label @error('night_price') is-invalid @enderror">Night price</label>
            <input type="text" class="form-control" id="night-price" placeholder="Insert price per night" name="night_price" value="{{old('night_price', $property->night_price)}}">               
            @error('night_price')
                <div class="invalid-feedback px-2">
                    {{ $message }}
                </div>
            @enderror               
        </div>

        <div class="form-outline w-25 mb-3">
            <label for="beds-number" class="form-label @error('n_beds') is-invalid @enderror">Beds number</label>
            <input type="text" class="form-control" id="beds-number" placeholder="Insert number of beds" name="n_beds" value="{{old('n_beds', $property->n_beds)}}">
            @error('n_beds')
                <div class="invalid-feedback px-2">
                    {{ $message }}
                </div>
            @enderror               
        </div>

        <div class="form-outline w-25 mb-3">
            <label for="rooms-number" class="form-label @error('n_rooms') is-invalid @enderror">Rooms number</label>
            <input type="text" class="form-control" id="rooms-number" placeholder="Insert number of rooms" name="n_rooms" value="{{old('n_rooms', $property->n_rooms)}}">
            @error('n_rooms')
                <div class="invalid-feedback px-2">
                    {{ $message }}
                </div>
            @enderror               
        </div>

        <div class="form-outline w-25 mb-3">
            <label for="cover_img" class="form-label @error('cover_img') is-invalid @enderror">Cover Image</label>
            <input type="file" class="form-control" id="cover_img" placeholder="Insert cover image" name="cover_img" value="{{old('cover_img', $property->cover_img)}}">
            @error('cover_img')
                <div class="invalid-feedback px-2">
                    {{ $message }}
                </div>
            @enderror               
        </div>

        <div class="form-outline w-25 mb-3">
            <label for="mq" class="form-label @error('mq') is-invalid @enderror">Property area</label>
            <input type="text" class="form-control" id="mq" placeholder="Insert property surface in square meters" name="mq" value="{{old('mq', $property->mq)}}">
            @error('mq')
                <div class="invalid-feedback px-2">
                    {{ $message }}
                </div>
            @enderror               
        </div>

        <div class="form-outline w-25 mb-3">
            <label for="address" class="form-label @error('address') is-invalid @enderror">Address</label>
            <input type="text" class="form-control" id="address" placeholder="Insert property address" name="address" value="{{old('address', $property->address)}}">
            @error('address')
                <div class="invalid-feedback px-2">
                    {{ $message }}
                </div>
            @enderror               
        </div>
    </div>

    <div class="card-footer text-end py-4 d-flex justify-content-between">
        <a href="{{ route('admin.properties.index')}}" class="btn btn-dark rounded-circle">go back</a>
        <button type="submit" class="btn btn-success rounded-circle">submit</button>
    </div>

</form>
@endsection