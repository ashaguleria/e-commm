<!doctype html>
<html>

<head>
    <link href="admin/css/app.css" rel="stylesheet">
    <script src="admin/js/app.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="wrapper">
        @include('Include.sidebar')
        <div class="main">
            <main class="content">
                @yield('content')
            </main>
        </div>
        <!-- <footer class="row">
            @include('Include.footer')
        </footer> -->
    </div>
</body>

</html>