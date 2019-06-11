@extends('layouts.base')



@section('content')
    <h1>Resultats</h1>

    <p>Voici votre url raccourcie : </p>

    <a href="{{ config('app.url') }}/{{ $shortened }}">
        {{ config('app.url') }}/{{ $shortened }}
    </a>
@stop