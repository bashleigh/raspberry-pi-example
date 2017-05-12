<!DOCTYPE html>

<html>

<head lang="en">

    <title>{{config('app.name')}}</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="{{asset("img/favicon.ico")}}" type="image/x-icon">


    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>

<body>

    <div class="container">

        @yield('content')

    </div>

    <script src="{{asset('js/app.js')}}"></script>

    @stack('scripts')

</body>

</html>
