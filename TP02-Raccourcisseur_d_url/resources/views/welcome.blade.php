@extends('layouts.base')

@section('content')
    <h1>raccourcisseur d'URL</h1>




    <form action="" method="POST">
        {{ csrf_field() }}
        <input type="text" name="url" placeholder="Entrez votre url ici">
        <p>{{ $errors->first('url') }}</p>
        <input type="submit" value="Shorten URL">
    </form>
@stop