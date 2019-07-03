@extends('template.app')

@section('content')

	<h2>Créer une question</h2>

	<div class="form">
		{!! Form::open(['url' => route('question.store'), 'class'=> 'form-horizontal']) !!}
		<fieldset>
			<legend>Formulaire de création de question</legend>

			<!--Nom de la question-->
			<div class="form-group" id="title">
				{!! Form::label('title', 'Titre:', ['class' => 'col-lg-2 control-label']) !!}
				<div class="col-lg-8">
					{!! Form::text('title', $value = null, ['class' => 'form-control', 'placeholder' => 'Le titre de la question', 'required']) !!}
				</div>
			</div>


			<!--Zone de texte pour la démarche-->
			<div class="form-group" id="description">
				{!! Form::label('description', 'Description:', ['class' => 'col-lg-2 control-label']) !!}
				<div class="col-lg-8">
					{!! Form::textarea('description', $value = null, ['cols' => '118', 'wrap' => 'hard', 'class' => 'form-control', 'placeholder' => 'Décrivez la démarche a suivre dans cette zone de texte', 'required']) !!}
				</div>
			</div>

			<!--Zone d'ajout des personnes concernées-->
			<div class="form-group" id="person">
				{!! Form::label('personnes', 'Personnes concernées:', ['class' => 'col-lg-2 control-label']) !!}
				<div class="col-lg-8">
					{!! Form::button('Ajouter une personne', ['onclick' => 'addField(this)', 'class' => 'btn-info btn-lg']) !!}
					{!! Form::button('Supprimer une personne', ['onclick' => 'removeField("personne")', 'class' => 'btn-info btn-lg', 'id' => 'btnpersonsuppr', 'disabled', 'hidden']) !!}
				</div>
			</div>


			<!--Zone d'ajout des notes importantes-->
			<div class="form-group" id="notes">
				{!! Form::label('notes', 'Notes importantes:', ['class' => 'col-lg-2 control-label']) !!}
				<div class="col-lg-8">
					{!! Form::button('Ajouter une note importante', ['onclick' => 'addField(this)', 'class' => 'btn-info btn-lg']) !!}
					{!! Form::button('Supprimer une note importante', ['onclick' => 'removeField("notes")', 'class' => 'btn-info btn-lg', 'id' => 'btnnotesuppr', 'disabled', 'hidden']) !!}
				</div>
			</div>

			<!--Zone de séléction de catégorie-->
			<div class="form-group" id="person">
				{!! Form::label('categorie', 'Catégories:', ['class' => 'col-lg-2 control-label']) !!}
				<div class="col-lg-8">
					{!! Form::select('categories', ['Catégories'  => $array], ['class' => '', 'required', 'selected' => ($id - 1)]) !!}
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