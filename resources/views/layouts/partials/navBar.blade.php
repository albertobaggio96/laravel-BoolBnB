{{-- <nav class="navbar  navbar-light bg-white shadow-sm flex-column"> --}}
    {{-- <div class="container">
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse show" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/') }}">{{ __('Home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.properties.index') }}">{{ __('Properties') }}</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('dashboard') }}">{{__('Dashboard')}}</a>
                        {{-- <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a> --}}
                        {{-- <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li> --}}
                {{-- @endguest
            </ul>
        </div>
    </div>  --}}
{{-- </nav>  --}}


<div class="container-fluid g-0">
    <div class="row g-0">
        <div class="col-12">
            <nav class="navbar navbar-expand align-items-baseline" id="navEl">
                <div class="collapse navbar-collapse flex-column h-100" id="navbarSupportedContent">
                    <div class="user my-5">
                        <div class="img text-center">
                            <img class="img-fluid w-50" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ficons.iconarchive.com%2Ficons%2Fpapirus-team%2Fpapirus-status%2F512%2Favatar-default-icon.png&f=1&nofb=1&ipt=0454014d5a4ae760d26044d98115846d139490e9b23e27eb17fde3eac9a53ba8&ipo=images" alt="">
                        </div>
                        <div class="user-info text-center text-white">
                            <p>{{(Auth::user()->name ?? '')}} {{(Auth::user()->surname ?? '')}}</p>
                        </div>
                    </div>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 flex-column h-100 my-5">
                        <li class="nav-item d-flex align-items-center mx-4">
                            <a class="nav-link text-white" href="{{route('home') }}">
                                <i class="fa-solid fa-house text-white"></i>
                                {{ __('Home') }}
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center mx-4">
                            <a class="nav-link text-white" href="{{route('admin.properties.index') }}">
                                <i class="fa-solid fa-network-wired text-white"></i>
                                {{ __('Properties') }}
                            </a>
                        </li>
                    </ul>
                    <div class="bottom-navbar d-flex align-items-center mx-5">
                        <a class="dropdown-item text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}
                            <i class="fa-solid fa-door-open text-white"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
@section('js')
@vite(['resources/js/styleAnimation.js'])
@endsection