<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script type="text/javascript">
            function revertClass(cat, item){
                if(item.className == "hidden"){
                    item.className = "show";
                    cat.innerHTML = cat.innerHTML.replace('▸', '▾');
                }
                else{
                    item.className = "hidden";
                    cat.innerHTML = cat.innerHTML.replace('▾', '▸');   
                }

            }
        </script>
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
        <h1>FAQ</h1>
        @yield('content')

        <h2>NOUS CONTACTER</h2>
        <p>Si vous rencontrez le moindre problème lors de vos démarches vous pouvez <a href="{{ route('contact.index') }}" >nous contacter</a></p>
    </body>
</html>
