@extends('template.app')

@section('content')
	<script type="text/javascript">
		@foreach($question[0]->notes as $value)
			incrementNotes();
		@endforeach

		@foreach($question[0]->people as $value)
			incrementPeople();
		@endforeach
	</script>

	<h2>Modifier une question</h2>

	<div class="form">
		{!! Form::open(['url' => route('question.update', $question[0]->id), 'class'=> 'form-horizontal']) !!}
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

			<!--Zone d'ajout des personnes concernées-->
			<div class="form-group" id="person">
				{!! Form::label('personnes', 'Personnes concernées:', ['class' => 'col-lg-2 control-label']) !!}
				<div class="col-lg-8">
					{!! Form::button('Ajouter une personne', ['onclick' => 'addField(this)', 'class' => 'btn-info btn-lg']) !!}
					@if(!empty($question[0]->people[0]))
						{!! Form::button('Supprimer une personne', ['onclick' => 'removeField("personne")', 'class' => 'btn-info btn-lg', 'id' => 'btnpersonsuppr']) !!}
					@else
						{!! Form::button('Supprimer une personne', ['onclick' => 'removeField("personne")', 'class' => 'btn-info btn-lg', 'id' => 'btnpersonsuppr', 'disabled', 'hidden']) !!}
					@endif

			@foreach($question[0]->people as $key => $person)
				<span>
					<div class="form-group flexColumn" id="personne{{$key}}">
						<label class="col-lg-2">Personne {{$key+1}} : </label>
						<div class="col-lg-10">
							<label class="col-lg-1 control-label">Nom: </label>
							<input type="text" class="form-control" name="personne[{{$key}}][name]" placeholder="Note importante" required="" style="margin-top: 5px;" value="{{$person->name}}">
						</div>
						<div class="col-lg-10">
							<label class="col-lg-1 control-label">Description: </label>
							<textarea class="form-control" name="personne[{{$key}}][desc] placeholder=" description="" required="" style="margin-top: 5px;">{{$person->desc}}
							</textarea>
						</div>
					</div>
				</span>
			@endforeach

				</div>
			</div>


			<!--Zone d'ajout des notes importantes-->
			<div class="form-group" id="notes">
				{!! Form::label('notes', 'Notes importantes:', ['class' => 'col-lg-2 control-label']) !!}
				<div class="col-lg-8">
					{!! Form::button('Ajouter une note importante', ['onclick' => 'addField(this)', 'class' => 'btn-info btn-lg']) !!}
					@if(!empty($question[0]->notes[0]))
						{!! Form::button('Supprimer une note importante', ['onclick' => 'removeField("notes")', 'class' => 'btn-info btn-lg', 'id' => 'btnnotesuppr']) !!}
					@else
						{!! Form::button('Supprimer une note importante', ['onclick' => 'removeField("notes")', 'class' => 'btn-info btn-lg', 'id' => 'btnnotesuppr', 'disabled', 'hidden']) !!}
					@endif

			@foreach($question[0]->notes as $key => $note)
				<span>
					<div class="form-group flexColumn" id="notes{{$key}}">
						<label class="col-lg-2">Note importante {{$key+1}} : </label>
						<div class="col-lg-10">
							<label class="col-lg-1 control-label">Titre: </label>
							<input type="text" class="form-control" name="notes[{{$key}}][titre]" placeholder="Note importante" required="" style="margin-top: 5px;" value="{{$note->title}}">
						</div>
						<div class="col-lg-10">
							<label class="col-lg-1 control-label">Description: </label>
							<textarea class="form-control" name="notes[{{$key}}][desc] placeholder=" description="" required="" style="margin-top: 5px;">{{$note->desc}}
							</textarea>
						</div>
					</div>
				</span>
			@endforeach

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