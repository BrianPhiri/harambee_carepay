<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="Carepay"/>
    <meta property="og:description" content="Contribution Link"/>
    <meta property="og:url" content="CarePay Contribution Link"/>
    <meta property="og:image" content="https://www.carepay.co.ke/sites/all/themes/habahaba_01/favicon.ico"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Carepay</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/one-page-wonder.css') }}" rel="stylesheet">
    <style>
        #footer {
            position: fixed;
            left: 0px;
            bottom: 0px;
            height: 30px;
            width: 100%;
            background: #999;
        }

        #bg-carepay {
            background: #394d5d;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: #394d5d;">
    <div class="container">
        <img src="{{asset('img/logo.png')}}" alt="" style="height: 50px;">
        {{--<a class="navbar-brand" href="#">Carepay</a>--}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="nav-item"><a class="text-white" href="{{ route('login') }}">Login</a></li>&nbsp;&nbsp;
                    <li class="nav-item"><a class="text-white" href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="color: #f7f7f9;" href="#" id="navbarDropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink"
                             style="min-width: 0rem !important;">
                            <a href="{{ route('logout') }}" class="dropdown-item"
                               onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
@yield('header')
<div class="container">
    @if(Session::has('success_message'))
        <br>
        @include('layouts.alerts')
    @endif
<!-- Navigation -->
    <br>
    @yield('content')
</div>

<br>
<!-- Footer -->
<footer id="footer" style="background: #394d5d;">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Carepay Kenya 2017</p>
    </div>
</footer>
<!-- Scripts -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@yield('scripts')
</body>
</html>
