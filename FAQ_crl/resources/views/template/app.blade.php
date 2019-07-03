<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script type="text/javascript" src="{{URL::asset('js/functions.js')}}"></script>
        <title>FAQ_crl</title>

        <!-- Fonts -->

        <!-- Styles -->
        <style>
            .flexColumn{
                display: flex;
                flex-direction: column;
            }
            #faq_contact p{
                color: #fff;
            }
            #faq_contact h2{
                color: #fff;
            }
            .hidden{
                display: none;
            }
            .main{
                display: flex;
                flex-direction: column;
                margin: 0 auto;
            }
            .categories{
                display: flex;
                flex-direction: column;
                border: 2px solid;
                margin-left: 17em;
                width: 66.67%;
            }
            .buttoncontrol{
                display: flex;
                flex-direction: row;
                padding-bottom: 20px;
            }
            .inline{
                display: inline;
            }
            .questions{
                display: flex;
                flex-direction: column;
                border: 2px solid;
            }
            .container{
                max-width: 1004px;
                margin: auto auto;
                padding-bottom: 20px;
            }
            #logo {
                float: left;
                margin-left: 105px;
                padding-top: 31px;
            }
            #logo img{
                width: 250px;
                height: auto;
            }
            h1{
                padding-top: 5px;
                padding-bottom: 12px;
            }
            .btn-info{
                background-color: #a62428;
                border-color: #a62428;
            }
            .btn-info:focus{
                background-color: #a62428;
                border-color: #a62428;
            }
            .btn-info:hover{
                background-color: #c7d306;
                border-color: #c7d306;   
            }
            #faq_content{
                background-color: rgb(200,211,0);
                padding-bottom: 20px;
                border: solid 3px;
            }
            #faq_contact{
                background-color: #a62428;
                margin-top: 10px;
                border: solid 3px;
            }
            .btnadd{
                margin-top: 5px;
                margin-left: 58em;
            }
            .décalage{
                margin-left: 5px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <a id="logo" href="/" title="Accueuil" rel="home">
                <img src="https://www.seinesaintdenishabitat.fr/sites/www.seinesaintdenishabitat.fr/files/logo_0.png">
            </a>
            @if(Auth::check())
                <div class="card-body pull-right" style="margin-top: 15px;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                             {{ session('status') }}
                         </div>
                    @endif
                    Vous etes connectés en tant 
                    @if(Auth::user()->isAdmin == 0)
                        que Moderateur
                    @else
                        qu'Administrateur
                    @endif
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        {!! Form::submit('Se déconnecter', ['class' => 'btn-lg btn-info']) !!}
                    </form>

                    <form id="logout-form" action="{{ route('category.moderation') }}" method="POST">
                        @csrf
                        {{ method_field('GET') }}
                        {!! Form::submit('Aller a la page de moderation', ['class' => 'btn-lg btn-info']) !!}
                    </form>
                </div>
            @endif
        </div>


        @include('flash::message')

        <div class="main">
                <section id="faq_content">
                    <h1 >FAQ</h1>
                    <div class="contenu">
                        @yield('content')
                    </div>
            </section>
            <section id="faq_contact">
                <div class="contenu">
                    <h2>NOUS CONTACTER</h2>
                    <p>Si vous rencontrez le moindre problème lors de vos démarches vous pouvez <a href="{{ route('contact.index') }}" >nous contacter</a></p>
                </div>
            </section>
        </div>

    </body>
</html>
