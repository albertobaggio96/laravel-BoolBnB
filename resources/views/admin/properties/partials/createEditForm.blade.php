<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <form action="{{ route($routeName, $property) }}" method="POST" enctype="multipart/form-data" class="py-3">
                @csrf
                @method($method)

                <div class="card px-4 px-md-5 py-3 mb-3">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <h4 class="text-muted">I campi contrassegnati da <i class="fa-solid fa-asterisk"></i> sono obbligatori</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <p>Seleziona i servizi offerti dal tuo appartamento (almeno uno) <span class="fs-4 align-top">*</span></p>
                        </div>
                            @foreach ($services as $service)
                                <div class="form-check form-switch col-sm-12 col-lg-6">
                                    <input class="form-check-input service" role="switch" type="checkbox" name="services[]" value="{{$service->id}}" @checked($property->services->contains($service->id))>
                                    <label for="{{$service->id}}">{{$service->title}}</label>
                                </div>
                            @endforeach 
                            @error('services')
                                <div class="text-danger">
                                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                                </div>
                            @enderror
                            <div id="error-box" class="text-danger"></div>                  
                    </div>
                    <div class="row">
                        <div class="form-outline mb-3 col-12">
                            <label for="title" class="form-label @error('title') is-invalid @enderror">Titolo: <span class="fs-4 align-top">*</span></label>
                            <input type="text" class="form-control" id="title" placeholder="Inserisci titolo (minimo 5 carattteri)" name="title" value="{{old('title', $property->title)}}" required>
                            @error('title')
                                <div class="invalid-feedback px-2">
                                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                                </div>
                            @enderror                  
                        </div>
                    </div>

                    <div class="form-outline mb-3 col-12">
                        <label for="description" class="form-label @error('description') is-invalid @enderror">Descrizione: <span class="fs-4 align-top">*</span></label>            
                        <textarea class="d-block form-control" name="description" id="description" placeholder="Inserisci descrizione (minimo 50 carattteri)" required>{{old('description', $property->description)}}</textarea>
                        @error('description')
                            <div class="invalid-feedback px-2">
                                <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                            </div>
                        @enderror               
                    </div>
                    <div class="row">

                    {{-- night-price input --}}

                        <div class="form-outline mb-3 col-sm-12 col-md-6">
                            <label for="night-price" class="form-label @error('night_price') is-invalid @enderror">Prezzo per notte: <span class="fs-4 align-top">*</span></label>
                            <input type="number" class="form-control" id="night-price" placeholder="Inserisci il costo per notte" name="night_price" value="{{old('night_price', $property->night_price)}}" required>               
                            @error('night_price')
                                <div class="invalid-feedback px-2">
                                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                                </div>
                            @enderror               
                        </div>
    
                    {{-- beds input --}}

                        <div class="form-outline mb-3 col-sm-12 col-md-6">
                            <label for="beds-number" class="form-label @error('n_beds') is-invalid @enderror">Numero di letti: <span class="fs-4 align-top">*</span></label>
                            <input type="number" class="form-control" id="beds-number" placeholder="Inserisci il numero di letti" name="n_beds" value="{{old('n_beds', $property->n_beds)}}" required>
                            @error('n_beds')
                                <div class="invalid-feedback px-2">
                                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                                </div>
                            @enderror               
                        </div>
    
                    {{-- toilettes input --}}

                        <div class="form-outline mb-3 col-sm-12 col-md-6">
                            <label for="n_toilettes" class="form-label @error('n_beds') is-invalid @enderror">Numero di bagni: <span class="fs-4 align-top">*</span></label>
                            <input type="number" class="form-control" id="n_toilettes" placeholder="Inserisci il numero di bagni" name="n_toilettes" value="{{old('n_toilettes', $property->n_toilettes)}}" required>
                            @error('n_toilettes')
                                <div class="invalid-feedback px-2">
                                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                                </div>
                            @enderror               
                        </div>
    
                    {{-- rooms input --}}

                        <div class="form-outline mb-3 col-sm-12 col-md-6">
                            <label for="rooms-number" class="form-label @error('n_rooms') is-invalid @enderror">Numero di stanze: <span class="fs-4 align-top">*</span></label>
                            <input type="number" class="form-control" id="rooms-number" placeholder="Inserisci il numero di stanze" name="n_rooms" value="{{old('n_rooms', $property->n_rooms)}}" required>
                            @error('n_rooms')
                                <div class="invalid-feedback px-2">
                                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                                </div>
                            @enderror               
                        </div>

                    {{-- visible input --}}

                        <div class="form-outline mb-3 col-sm-12 col-md-6">
                            <label for="mq" class="form-label @error('mq') is-invalid @enderror">Superficie proprietà: <span class="fs-4 align-top">*</span></label>
                            <input type="number" class="form-control" id="mq" placeholder="Inserisci la superficie della proprietà (in metri quadrati)" name="mq" value="{{old('mq', $property->mq)}}" required>
                            @error('mq')
                                <div class="invalid-feedback px-2">
                                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                                </div>
                            @enderror               
                        </div>
                        <div class="form-outline mb-3 col-sm-12 col-md-6" id="div-address">
                            <label for="address" id="address-label" class="form-label @error('address') is-invalid @enderror">Indirizzo <span class="fs-4 align-top">*</span></label>
                            <span id="address-span" class="d-none"> {{old('address', $property->address)}} </span>
                            @error('address')
                                <div class="invalid-feedback px-2">
                                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                                </div>
                            @enderror              
                        </div>
                        <div class="form-check form-switch col-12 mb-2 mt-2">
                            <label for="visible" class="form-label @error('visible') is-invalid @enderror">Rendi visibile l'appartamento</label>
                            <input type="checkbox" class="form-check-input" role="switch" id="visible" placeholder="Inserisci visibilità" name="visible"  value="{{old('visible', 1)}}"  @checked($property->visible)>
                            @error('visible')
                                <div class="invalid-feedback px-2">
                                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                                </div>
                            @enderror               
                        </div>
                    </div>

                    @if (Route::is('admin.properties.edit'))
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
                    @endif

                    

                    {{-- imgages input --}}

                    <div class="form-outline w-50 my-3">
                        <label for="images" class="form-label @error('images') is-invalid @enderror">Aggiungi altre immagini al tuo annuncio</label>
                        <input type="file" class="form-control" id="images" name="images[]" multiple>
                        @error('images')
                            <div class="invalid-feedback px-2">
                                <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                            </div>
                        @enderror               
                    </div>    
                    
                    {{-- cover input --}}
                    
                    <div class="form-outline my-3 col-12">
                        @if (Route::is('admin.properties.edit'))
                            <img src="{{asset('storage/' . $property->cover_img)}}" alt="cover image" class="d-block w-25">
                        @endif
                        <label for="cover_img" class="form-label @error('cover_img') is-invalid @enderror">Imgagine di copertina <span class="fs-4 align-top">*</span></label>
                        <input type="file" class="form-control" id="cover_img" placeholder="Inserisci immagine di copertina" name="cover_img" value="{{old('cover_img', $property->cover_img)}}"  @if (Route::is('admin.properties.create')) required @endif>
                        @error('cover_img')
                            <div class="invalid-feedback px-2">
                                <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                            </div>
                        @enderror               
                    </div>
                    {{-- address input --}}
                </div>

                <div class="card-footer text-end pb-4 d-flex justify-content-between">
                    <a href="{{ route('admin.properties.index')}}" class="btn btn-dark rounded-circle"><i class="fa-solid fa-angles-left"></i></a>
                    <button type="submit" class="btn btn-success rounded-circle" id="btn-submit"><i class="fa-solid fa-plus"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
@vite(['resources/js/AutocompleteForm.js'])