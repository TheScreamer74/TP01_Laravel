@extends('template.app')

@section('content')
	<h1>FAQ</h1>

	<table>
		
	@foreach($categories as $categorie)
		<tr>
			<td>
				<a href="#" onclick="revertClass(getElementById('div_{{ $categorie->id }}'))">{{ $categorie->title }}</a>

				<div class="hidden" id="div_{{ $categorie->id }}">

					<table>

					@forelse($categorie->questions as $question)
					
						<tr>
							<td>
								<a href="#" onclick="revertClass(getElementById('desc_{{ $question->id }}'))">{{ $question->title }}</a>
							</td>
							<td>
								<div class="hidden" id="desc_{{ $question->id }}">
								
									{{ $question->description }}
								</div>
							</td>
						</tr>
					
					@empty
					
						<tr>
							<td>Il n'y a pas de questions pour le moment</td>
						</tr>
					
					@endforelse

				</table>
			</div>
			</td>
		</tr>
		@endforeach
	</table>
@stop