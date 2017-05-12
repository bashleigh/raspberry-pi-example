<!DOCTYPE html>

<html>

<head lang="en">

    <title>{{config('app.name')}}</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css"/>

</head>

<body>

    <div class="container">

        @yield('content')

    </div>

    @stack('scripts')

</body>

</html>
