@extends('layouts.base')

@section('content')
    <h1>raccourcisseur d'URL</h1>

    <form action="" method="POST">
        {{ csrf_field() }}
        <input type="text" placeholder="Entrez votre url ici">
        <input type="submit" value="Shorten URL">
    </form>
@stop