@extends('template.app')

@section('content')
	<p>Nous appeler : 06000000</p>
	<form method="post" action="{{ route('contact.store') }}">
		@csrf

		<div class="email">
			<label>Votre e-mail:</label>
			<input type="text" name="email">
		</div>

		<div class="object">
			<label>Votre problème/question:</label>
			<input type="text" name="object">
		</div>

		<div class="text">
			<label>Décrivez votre problème:</label>
			<br>
			<textarea rows="4" cols="50" name="text" placeholder="Default"></textarea>
		</div>
		<input type="submit" name="submit" value="Envoyer">
	</form>
@stop