@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')

<div class="section">

	<div class="col s8">
		{{$questions->links()}}
	</div>
	
	<div class="col s4">
		<p>Add question <a class="btn-floating btn waves-effect waves-light #42a5f5 blue lighten-1" href="{{ route('question.create')}}"><i class="material-icons">add</i></a><p>
	</div>
	
	<div class="col s12">


		<table class="responsive-table">
		<thead>
		  <tr>
		      <th data-field="titlee">Title</th>
		      <th data-field="status">Status</th>
		      <th data-field="category">Category</th>
		      <th data-field="date">Date</th>
		      <th data-field="action">Action</th>
		      <th data-field="action">Publication</th>
		  </tr>
		</thead>
		
		<tbody>
		@foreach ($questions as $question)
		  <tr id="question-{{ $question->id }}">
		    <td><a href="{{ route('question', $question->id) }}">{{ $question->title }}</a></td>
		   	<td>{{ $question->status }}</td>
		   	<td><a href="{{ route('category', $question->id) }}" class="waves-effect waves-light btn-flat">{{ ($question->category!= null)? $question->category->name : ''}}</a></td>
		   	<td>{{ $question->date}}</td>
		   	<td>
		   		<a class="waves-effect waves-light btn-small " href="{{ route('question.edit', $question->id) }}"><i class="material-icons">edit</i></a>
		   		<a class="waves-effect waves-light btn-small supr" href="#modal2" data-id="{{ $question->id }}" data-href="{{route('question.destroy', $question->id)}}"><i class="material-icons">delete</i></a>
		   	</td>
		   	<td>
			  @if($question->status != 'published')
		      <p>
	            <input class="filled-in" type="checkbox" name="status" value="{{  $question->id  }}" id="{{  $question->id  }}"/>
	            <label for="{{  $question->id  }}"></label>
	          </p>
			  @endif
		   	</td>
		  </tr>
		@endforeach
		</tbody>
		</table>
	{{$questions->links()}}
	</div>
</div>

<div id="modal2" class="modal">
	<div class="modal-content">
  		<h5>Voulez-vous supprimer la question {{$question->title }} ?</h5>
	</div>
	<div class="modal-footer">
		<a type="submit" name="action" class="modal-action modal-close waves-effect btn-flat dlt">oui</a>
		<button type="button" name="non" class="modal-action modal-close waves-effect waves-green btn-flat">non</a></button>
	</div>
</div>
@endsection

