@extends('template.app')

@section('content')

	<h2>Fiche de contact</h2>

		<div class="form">
		{!! Form::open(['url' => route('contact.store'), 'class'=> 'form-horizontal']) !!}
		<fieldset>
			<legend>Formulaire de contact</legend>

			<!--Email de l'utilisateur-->
			<div class="form-group" id="email">
				{!! Form::label('email', 'Votre email:', ['class' => 'col-lg-2 control-label']) !!}
				<div class="col-lg-8">
					{!! Form::email('email', $value = null, ['class' => 'form-control', 'placeholder' => 'Entrez votre email', 'required']) !!}
				</div>
			</div>


			<!--Titre du problème-->
			<div class="form-group" id="title">
				{!! Form::label('title', 'Votre problème:', ['class' => 'col-lg-2 control-label']) !!}
				<div class="col-lg-8">
					{!! Form::text('title', $value = null, ['class' => 'form-control', 'placeholder' => 'Quel est votre problème', 'required']) !!}
				</div>
			</div>

			<!--Zone de texte pour le problème-->
			<div class="form-group" id="description">
				{!! Form::label('description', 'Description:', ['class' => 'col-lg-2 control-label']) !!}
				<div class="col-lg-8">
					{!! Form::textarea('description', $value = null, ['class' => 'form-control', 'placeholder' => 'Décrivez votre problème dans cette zone de texte', 'required']) !!}
				</div>
			</div>

			<!--Submit-->
			<div class="form-group">
				<div class="col-lg-10">
					{!! Form::submit('Soumettre', ['class' => 'btn-lg btn-info pull-right']) !!}
				</div>
			</div>

		</fieldset>
		
	</div>
		

@stop