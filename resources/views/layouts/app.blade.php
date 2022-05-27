<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
.w3-bar-item:hover {
    color: #000 !important;
    background-color: #ccc !important;
}

button.w3-bar-item.w3-button.w3-large {
    margin-left: 79%;
    background-color: cadetblue;
}

div#mySidebar {
    background-color: #9dbdd9;
}

.w3-teal,
.w3-hover-teal:hover {
    color: #fff !important;
    background-color: cadetblue !important;
}
</style>

<body>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class="w3-sidebar w3-bar-block w3-card " style="width:18%" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">&#9776;</button>
        <hr><br>

        <a href="{{ url('categoryproduct') }}" class="w3-bar-item w3-button"><i class="fa fa-list-alt"></i> Category</a>
        <a href=" {{ url('admin/home') }}" class="w3-bar-item w3-button"><i class="fa fa-product-hunt"></i> Product</a>
        <a href="{{ url('user') }}" class="w3-bar-item w3-button"><i class="fa fa-user fa-lg"></i> User</a>
        <a href="{{ url('adminorder') }}" class="w3-bar-item w3-button"><i class="fa fa-first-order"></i> Orders</a>
    </div>

    <div id="main" style="margin-left: 18%;">
        <div class="w3-container">

            <div id="app">
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div class="container">
                        <button id="openNav" class="w3-button w3-teal w3-xlarge" style="display: none;"
                            onclick="w3_open()">&#9776;</button>&nbsp;&nbsp;
                        <a class="navbar-brand" href="#">E-Commerce </a>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ms-auto">
                                <!-- Authentication Links -->
                                @guest
                                @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @endif
                                @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                                @endif
                                @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
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
                    @yield('content')
                </main>
            </div>
        </div>

    </div>

    <script>
    function w3_open() {
        document.getElementById("main").style.marginLeft = "18%";
        document.getElementById("mySidebar").style.width = "18%";
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("openNav").style.display = "none";

    }

    function w3_close() {
        document.getElementById("main").style.marginLeft = "0%";
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("openNav").style.display = "inline-block";
    }
    </script>

</body>

</html>