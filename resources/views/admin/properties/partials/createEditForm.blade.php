<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <form action="{{ route($routeName, $property) }}" method="POST" enctype="multipart/form-data" class="py-3">
                @csrf
                @method($method)

                <div class="card px-5 py-3 mb-3">

                    <div class="row">
                            <h5>Seleziona i Servizi offerti dal tuo appartamento</h5>
                            @foreach ($services as $service)
                                <div class="form-check form-switch col-6">
                                    <input class="form-check-input service" role="switch" type="checkbox" name="services[]" value="{{$service->id}}" @checked($property->services->contains($service->id))>
                                    <label for="{{$service->id}}">{{$service->title}}</label>
                                </div>
                                @error('service')
                                    <div class="invalid-feedback px-2">
                                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                                    </div>
                                @enderror                  
                            @endforeach 
                    </div>

                    {{-- title input --}}

                    <div class="form-outline w-100 mb-3">
                        <label for="title" class="form-label @error('title') is-invalid @enderror">Titolo</label>
                        <input type="text" class="form-control" id="title" placeholder="Inserisci un titolo" name="title" value="{{old('title', $property->title)}}">
                        @error('title')
                            <div class="invalid-feedback px-2">
                                <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                            </div>
                        @enderror                  
                    </div>

                    {{-- descrition imput --}}

                    <div class="form-outline w-100 mb-3">
                        <label for="description" class="form-label @error('description') is-invalid @enderror">Descrizione</label>            
                        <textarea class="d-block form-control" name="description" id="description" placeholder="Inserisci una descrizione">{{old('description', $property->description)}}</textarea>
                        @error('description')
                            <div class="invalid-feedback px-2">
                                <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                            </div>
                        @enderror               
                    </div>

                    {{-- night-price input --}}

                    <div class="form-outline w-25 mb-3">
                        <label for="night-price" class="form-label @error('night_price') is-invalid @enderror">Prezzo per notte</label>
                        <input type="text" class="form-control" id="night-price" placeholder="Inserisci il costo per notte" name="night_price" value="{{old('night_price', $property->night_price)}}">               
                        @error('night_price')
                            <div class="invalid-feedback px-2">
                                <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                            </div>
                        @enderror               
                    </div>

                    {{-- beds input --}}

                    <div class="form-outline w-25 mb-3">
                        <label for="beds-number" class="form-label @error('n_beds') is-invalid @enderror">Numero di letti</label>
                        <input type="text" class="form-control" id="beds-number" placeholder="Inserisci il numero di letti" name="n_beds" value="{{old('n_beds', $property->n_beds)}}">
                        @error('n_beds')
                            <div class="invalid-feedback px-2">
                                <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                            </div>
                        @enderror               
                    </div>

                    {{-- toilettes input --}}

                    <div class="form-outline w-25 mb-3">
                        <label for="n_toilettes" class="form-label @error('n_beds') is-invalid @enderror">Numero di Toilettes</label>
                        <input type="text" class="form-control" id="n_toilettes" placeholder="Inserisci il numero di bagni" name="n_toilettes" value="{{old('n_toilettes', $property->n_toilettes)}}">
                        @error('n_toilettes')
                            <div class="invalid-feedback px-2">
                                <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                            </div>
                        @enderror               
                    </div>

                    {{-- rooms input --}}

                    <div class="form-outline w-25 mb-3">
                        <label for="rooms-number" class="form-label @error('n_rooms') is-invalid @enderror">Numero di stanze</label>
                        <input type="text" class="form-control" id="rooms-number" placeholder="Inserisci il numero di stanze" name="n_rooms" value="{{old('n_rooms', $property->n_rooms)}}">
                        @error('n_rooms')
                            <div class="invalid-feedback px-2">
                                <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                            </div>
                        @enderror               
                    </div>

                    {{-- visible input --}}

                    <div class="form-check form-switch col-6 w-25 mb-2 mt-2">
                        <label for="visible" class="form-label @error('visible') is-invalid @enderror">Visibile</label>
                        <input type="checkbox" class="form-check-input" role="switch" id="visible" placeholder="Inserisci visibilità" name="visible"  value="{{old('visible', 1)}}  @checked($property->visible)">
                        @error('visible')
                            <div class="invalid-feedback px-2">
                                <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                            </div>
                        @enderror               
                    </div>

                    <div class="form-check form-switch col-12 mb-2 mt-2">
                        <div class="row">
                            @foreach ($property->images as $image)
                            <div class="col-3 mb-2">
                                <input class="text-center w-100" role="switch" type="checkbox" name="images_table[]" value="{{$image->id}}" checked>
                                <label for="{{$image->id}}"><img class="img-fluid" src="{{ asset('storage/' . $image->path) }}" alt="{{ $image }}"></label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    

                    {{-- imgages input --}}

                    <div class="form-outline w-50 my-3">
                    <label for="images" class="form-label @error('images') is-invalid @enderror">Aggiungi altre immagini al tuo annuncio</label>
                    <input type="file" id="images" name="images[]" multiple>
                        @error('images')
                            <div class="invalid-feedback px-2">
                                <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                            </div>
                        @enderror               
                    </div>    
                    
                    {{-- cover input --}}
                    
                    <div class="form-outline w-50 my-3">
                        <label for="cover_img" class="form-label @error('cover_img') is-invalid @enderror">Imgagine di copertina </label>
                        <input type="file" class="form-control" id="cover_img" placeholder="Inserisci immagine di copertina" name="cover_img" value="{{old('cover_img', $property->cover_img)}}">
                        @error('cover_img')
                            <div class="invalid-feedback px-2">
                                <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                            </div>
                        @enderror               
                    </div>

                    {{-- mq input --}}

                    <div class="form-outline w-50 mb-3">
                        <label for="mq" class="form-label @error('mq') is-invalid @enderror">Superfie proprietà</label>
                        <input type="text" class="form-control" id="mq" placeholder="Inserisci la superfice della proprietà in mq" name="mq" value="{{old('mq', $property->mq)}}">
                        @error('mq')
                            <div class="invalid-feedback px-2">
                                <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                            </div>
                        @enderror               
                    </div>

                    {{-- address input --}}


                    <div class="form-outline w-50 mb-3" id="div-address">
                        <label for="address" id="address-label" class="form-label @error('address') is-invalid @enderror">Indirizzo</label>


                        @error('address')
                            <div class="invalid-feedback px-2">
                                <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                            </div>
                        @enderror               
                    </div>
                </div>

                <div class="card-footer text-end pb-4 d-flex justify-content-between">
                    <a href="{{ route('admin.properties.index')}}" class="btn btn-dark rounded-circle"><i class="fa-solid fa-angles-left"></i></a>
                    <button type="submit" class="btn btn-success rounded-circle"><i class="fa-solid fa-plus"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
@vite(['resources/js/AutocompleteForm.js'])



