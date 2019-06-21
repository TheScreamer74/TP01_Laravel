@extends('template.app')

@section('content')

	<h2>Créer une catégorie</h2>

	<div class="form">
		{!! Form::open(['url' => route('category.store'), 'class'=> 'form-horizontal']) !!}
		<fieldset>
			<legend>Formulaire de création de catégorie</legend>

			<!--Nom de la catégorie-->
			<div class="form-group" id="title">
				{!! Form::label('title', 'Titre:', ['class' => 'col-lg-2 control-label']) !!}
				<div class="col-lg-8">
					{!! Form::text('title', $value = null, ['class' => 'form-control', 'placeholder' => 'Le titre de la categorie', 'required']) !!}
				</div>
			</div>


			<!--Zone de texte pour décrire la catégorie-->
			<div class="form-group" id="description">
				{!! Form::label('description', 'Description:', ['class' => 'col-lg-2 control-label']) !!}
				<div class="col-lg-8">
					{!! Form::textarea('description', $value = null, ['class' => 'form-control', 'placeholder' => 'Décrivez brièvement la catégorie', 'required']) !!}
				</div>
			</div>

			<!--Submit-->
			<div class="form-group">
				<div class="col-lg-10">
					{!! Form::submit('Créer', ['class' => 'btn-lg btn-info pull-right']) !!}
				</div>
			</div>

		</fieldset>
		
	</div>
		

@stop