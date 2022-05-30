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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>
    <!-- jQuery Custom Scroller CDN -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js">
    </script>

</head>
<style>
.w3-bar-item:hover {
    color: #000 !important;
    background-color: #ccc !important;
}

button.w3-bar-item.w3-button.w3-large {
    margin-left: 79%;
    background-color: #9dbdd9;

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

    <link href="{{ asset('css/w3.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class="w3-sidebar w3-bar-block w3-card " style="width:18%" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">&#9776;</button>
        <hr><br>

        <a href="#homeSubmenu" class="w3-bar-item w3-button dropdown-toggle" data-toggle="collapse"
            aria-expanded="false"><i class="fa fa-list-alt" aria-hidden="true"></i> Category </a>
        <ul class="collapse list-unstyled" id="homeSubmenu">
            <li style="margin-left: 10%;">
                <a href="{{url('categoryproduct')}}" class="w3-bar-item w3-button"><i
                        class='fa fa-angle-double-right'></i> Category </a>
            </li>
        </ul>

        <a href="#productSubmenu" class="w3-bar-item w3-button dropdown-toggle" data-toggle="collapse"
            aria-expanded="false"><i class="fa fa-product-hunt"></i> Product</a>
        <ul class="collapse list-unstyled" id="productSubmenu">
            <li style="margin-left: 10%;">
                <a href=" {{ url('admin/home') }}" class="w3-bar-item w3-button"><i
                        class='fa fa-angle-double-right'></i> Product </a>
            </li>
        </ul>

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