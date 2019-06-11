@extends('layouts.base')

@section('content')
    <h1>raccourcisseur d'URL</h1>

    <form action="" method="POST">
        {{ csrf_field() }}
        <input type="text" name="url" placeholder="Entrez votre url ici" value="{{ old('url') }}">
        {!! $errors->first('url', '<p class="error-msg">:message</p>') !!}
        <input type="submit" value="Shorten URL">
    </form>
@stop