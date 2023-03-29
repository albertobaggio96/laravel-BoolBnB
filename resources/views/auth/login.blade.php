@extends('layouts.app')

@section('content')
<section class=" login-form">
    <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://greenweddingshoes.com/wp-content/uploads/2021/01/7aff083b-2e59-4233-8c25-a3f70e4c7484.jpg"
            class="img-fluid w-100" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form method="POST" action="{{ route('login') }}">
    @csrf

            <div class="form-outline mb-4">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

            <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                    </span>
                    @enderror
            </div>
            </div>



            <div class="form-outline mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                        <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
            </div>

            <div class="d-flex justify-content-between align-items-center">
            <div class="form-check mb-0">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Ricordami') }}
                    </label>
            </div>
            </div>

            <div>
                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Password dimenticata?') }}
                </a>
                @endif
            </div>
            
            <div class="text-center text-lg-start mt-4 pt-2">
                <button type="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem; background-color: #574ff2;">{{ __('Accedi') }}</button>

            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
                    <h6>Non hai un account? Creane subito uno!</h6>
                    @if (Route::has('register'))
                        <a class="btn btn-primary" style="background-color: #574ff2;" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                    @endif
            </div>

        </form>
        </div>
    </div>
    </div>
</section>
@endsection
