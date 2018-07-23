<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1" maximum-scale=1, user-scalable="no">

        <meta name="csrf-token" content="<?= csrf_token() ?>">
        <link rel="icon" href="{!!asset('image/logo-biotrop.png')!!}"/>
        <title>Herbarium @yield('title')</title>
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css2/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="panel panel-default">
        @include('user.layouts.menu')
        @yield('user.content')
        @include('user.layouts.footer')

        <script sc="/js2/popover.min.js" type="text/javascript"></script>
        <script src="/js2/app.js" type="text/javascript"></script>
        <script src="//code.jquery.com/jquery.js"></script>

        </div>

    </body>

</html>
