@extends('template.app')

@section('content')


		
	@forelse($categories as $categorie)
				<div class="col-lg-8 categories">

					<div class="inline">
						<div>
						
							<h3>
								<a href="#" onclick="revertClass(this, getElementById('div_{{ $categorie->id }}'))">{{ $categorie->title }} ▸</a>
							</h3>

						</div>
						
						<div class="buttoncontrol">

							<form action="{{ route('category.edit', $categorie->id) }}" method="POST">
								{{ csrf_field() }}
								{{ method_field('PUT') }}
								<input type="submit" name="" value="Modifier" class="btn-lg btn-info">
							</form>
						
							<form action="{{ route('category.destroy', $categorie->id) }}" method="POST">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<input type="submit" name="" value="Supprimer" onclick="return confirm('Voulez vous vraiment supprimer cette categorie ?')" class="btn-lg btn-info">
							</form>

						</div>

					</div>

					<div class="hidden" id="div_{{ $categorie->id }}">

						@forelse($categorie->questions as $key => $question)
									
									<div class="question col-lg-12">
										<div class="titre">
											<h4>{{ $key + 1 }}/ 
											<a href="#" onclick="revertClass(this, getElementById('desc_{{ $question->	id }}'))">{{ $question->title }} ▸</a>
											</h4>
										</div>

									<div class="hidden questions" id="desc_{{ $question->id }}">
									
										<pre>{{ $question->description }}</pre>
									</div>

									<div class="buttoncontrol">

										<form action="{{ route('question.edit', $question->id) }}" method="POST">
											{{ csrf_field() }}
											{{ method_field('PUT') }}
											<input type="submit" name="" value="Modifier" class="btn-lg btn-info">
										</form>

										<form action="{{ route('question.destroy', $question->id) }}" method="POST">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<input type="submit" name="" value="Supprimer" class="btn-lg btn-info" onclick="return confirm('Voulez vous vraiment supprimer cette categorie ?')">
										</form>

									</div>
								</div>
						@empty
							
							Il n'y a pas de questions pour cette catégorie. Un problème ? <a href="{{ route('contact.index') }}">Nous contacter</a>
						
						@endforelse
							<form action="{{ route('question.create', $categorie->id) }}" method="POST">
								{{ csrf_field() }}
								{{ method_field('GET') }}
								<input type="submit" name="" value="Ajouter une question" class="btn-lg btn-info pull-right">
							</form>
				</div>


	</div>
			
		@empty
			Il n'y a pas de catégorie. Un problème ? <a href="{{ route('contact.index') }}">Nous contacter</a>
		@endforelse


	<form action="{{ route('category.create') }}" method="POST">
		{{ csrf_field() }}
		{{ method_field('GET') }}
		<input type="submit" name="" value="Ajouter une catégorie" class="btn-lg btn-info">
	</form>

	
@stop