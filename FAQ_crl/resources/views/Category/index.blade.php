@extends('template.app')

@section('content')

	<table>
		
	@forelse($categories as $categorie)
		<tr>
			<td>
				<a href="#" onclick="revertClass(this, getElementById('div_{{ $categorie->id }}'))">{{ $categorie->title }} ▸</a>
				<form action="{{ route('category.destroy', $categorie->id) }}" method="POST">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<input type="submit" name="" value="Supprimer">
					
				</form>
				<form action="{{ route('category.edit', $categorie->id) }}" method="POST">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<input type="submit" name="" value="Modifier">
				</form>

				<div class="hidden" id="div_{{ $categorie->id }}">

					<table>

					@forelse($categorie->questions as $key => $question)
					
						<tr>
							<td>
								{{ $key + 1 }}/ 
								<a href="#" onclick="revertClass(this, getElementById('desc_{{ $question->id }}'))">{{ $question->title }} ▸</a>
							</td>
							<td>
								<div class="hidden" id="desc_{{ $question->id }}">
								
									{{ $question->description }}
								</div>
								<div>
									<form action="{{ route('question.destroy', $question->id) }}" method="POST">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<input type="submit" name="" value="Supprimer">
									</form>
									<form action="{{ route('question.edit', $question->id) }}" method="POST">
										{{ csrf_field() }}
										{{ method_field('PUT') }}
										<input type="submit" name="" value="Modifier">
									</form>
								</div>
							</td>
						</tr>
					
					@empty
					
						<tr>
							<td>Il n'y a pas de questions pour cette catégorie. Un problème ? <a href="#">Nous contacter</a></td>
						</tr>
					
					@endforelse

				</table>
			</div>
			</td>
		</tr>
		@empty
			<tr>
				<td>Il n'y a pas de catégorie. Un problème ? <a href="#">Nous contacter</a></td>
			</tr>
		@endforelse
	</table>
@stop