@extends('template.app')

	@section('content')

		@forelse($categories as $categorie)
			<div class="categories" style="margin-bottom: 5px">
						<div style="margin-left: 5px;">
							<h3>
								<a href="#" onclick="revertClass(this, getElementById('div_{{ $categorie->id }}'))">{{ $categorie->title }} ▸</a>
							</h3>
						</div>
				<div class="hidden" id="div_{{ $categorie->id }}" style="margin-left: 5px; margin-right: 5px;">
					@forelse($categorie->questions as $key => $question)
						<div class="questions col-lg-12" style="margin-bottom: 5px;">
							<div class="titre">
								<h4>{{ $key + 1 }}/ 
									<a  href="#" onclick="revertClass(this, getElementById('desc_{{ $question->	id }}'))">{{ $question->title }} ▸</a>
								</h4>
							</div>
							<div class="hidden question" id="desc_{{ $question->id }}">
								<pre>{{ $question->description }}

	Notes importantes :@forelse($question->notes as $value)

			{{ $value->title }}
			{{ $value->desc }}

									@empty
										pas de notes importantes
									@endforelse
	
	Personnes ratachées :@forelse($question->people as $value)
			
			{{ $value->name }}
			{{ $value->desc }}

									@empty
										pas de personnes ratachées
									@endforelse
								</pre>
							</div>
						</div>
					@empty
						Il n'y a pas de questions pour cette catégorie. Un problème ? <a href="{{ route('contact.index') }}">Nous contacter</a>
					@endforelse
				</div>
			</div>
		@empty
			Il n'y a pas de catégorie. Un problème ? <a href="{{ route('contact.index') }}">Nous contacter</a>
		@endforelse
	@stop