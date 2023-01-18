<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Service Electronic</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="icon" href="asset/gambar/download (2).jpg">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    {{-- <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css"> --}}
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--GRAFIK PENGGUNA TERDAFTAR PERBULAN-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/styleku.css')}}" type="text/css"/>
	<link rel="stylesheet" href="{{asset('css/dark.css')}}" type="text/css"/>
	<link rel="stylesheet" href="{{asset('css/font-icons.css')}}" type="text/css"/>
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" type="text/css"/>
	<link rel="stylesheet" href="{{asset('css/animate.css')}}" type="text/css"/>
	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/responsive.css')}}" type="text/css"/>
	<link rel="stylesheet" href="{{asset('css/toastr.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/proyek.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/loginLanding.css')}}" type="text/css" />

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
            <span class='brand-name'><a href='{{ url('/') }}' style='font-family: Lobster; font-weight: bold; font-size:25px; color: green; text-decoration:none;'>Service<span style='font-family: Lobster; font-weight: bold; font-size:30px; color: #276678'>Electronic <img src='asset/gambar/download (2).jpg' width='30px' alt='' style='padding-bottom:13px'></span></a></span>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            @can('role-create')
                            <li><a class="nav-link" href="{{ route('users.index') }}">Daftar User</a></li>
                            <li><a class="nav-link" href="{{ route('roles.index') }}">Role</a></li>
                            @endcan
                            @can('service-list')
                            <li><a class="nav-link" href="{{ route('service.index') }}">Service</a></li>
                            <li><a class="nav-link" href="{{ route('transaksi.index') }}">Transaksi</a></li>
                            @endcan
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>


                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4">
            <div class="container">
            @yield('content')
            @yield('modal')
            </div>
        </main>
    </div>
    <script src="{{asset('js/chart.js')}}"></script>
    <script src="{{asset('js/chart-utils.js')}}"></script>
    <script src="{{asset('js/toastr.js')}}"></script>
    <script src="{{asset('js/swa2.js')}}"></script>
    <script src="{{asset('js/plugin.js')}}"></script>
    <script src="{{asset('js/routes.js')}}"></script>
    <script src="{{asset('js/alert.js')}}"></script>
    <script src="{{asset('js/jquery.js')}}"></script>
	<script src="{{asset('js/functions.js')}}"></script>
    @yield('custom_js')
    @yield('scripts')

</body>
</html>
