<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script type="text/javascript">
            function revertClass(item){
                console.log(item);
                if(item.className == "hidden"){
                    item.className = "show";
                }
                else{
                    item.className = "hidden";   
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
        @yield('content')
    </body>
</html>
