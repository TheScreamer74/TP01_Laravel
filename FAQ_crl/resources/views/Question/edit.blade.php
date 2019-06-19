@extends('template.app')

@section('content')

	<h2>Modifier une question</h2>

	<div class="form">
		{!! Form::open(['url' => route('question.store'), 'class'=> 'form-horizontal']) !!}
		<fieldset>
			<legend>Formulaire de modification de question</legend>

			<!--Nom de la question-->
			<div class="form-group" id="title">
				{!! Form::label('title', 'Titre:', ['class' => 'col-lg-2 control-label']) !!}
				<div class="col-lg-8">
					{!! Form::text('title', $value = $question[0]->title, ['class' => 'form-control', 'placeholder' => 'Le titre de la question', 'required']) !!}
				</div>
			</div>


			<!--Zone de texte pour la démarche-->
			<div class="form-group" id="description">
				{!! Form::label('description', 'Description:', ['class' => 'col-lg-2 control-label']) !!}
				<div class="col-lg-8">
					{!! Form::textarea('description', $value = $question[0]->description, ['class' => 'form-control', 'placeholder' => 'Décrivez la démarche a suivre dans cette zone de texte', 'required']) !!}
				</div>
			</div>

			<!--Zone de séléction de catégorie-->
			<div class="form-group" id="person">
				{!! Form::label('categorie', 'Catégories:', ['class' => 'col-lg-2 control-label']) !!}
				<div class="col-lg-8">
					{!! Form::select('categories', ['Catégories'  => $array], $question[0]->categories_id, ['class' => '', 'required']) !!}
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