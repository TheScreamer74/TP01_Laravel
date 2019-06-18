<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script type="text/javascript" src="{{'js/functions.js'}}"></script>
        <title>FAQ_crl</title>

        <!-- Fonts -->

        <!-- Styles -->
        <style>
            .hidden{
                display: none;
            }
        </style>
    </head>
    <body>
        @include('flash::message')
        <h1>FAQ</h1>
        @yield('content')

        <h2>NOUS CONTACTER</h2>
        <p>Si vous rencontrez le moindre problème lors de vos démarches vous pouvez <a href="{{ route('contact.index') }}" >nous contacter</a></p>
    </body>
</html>
