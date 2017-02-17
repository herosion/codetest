@extends('layouts.master')

@section('title', 'Page Title')

@section('content')

	<div class="row">
		<h2 class="center">{{ $category->name }}</h2>
	</div>

	{{ $questions->links() }}

	<div class="row">
		@foreach ($questions as $question)
		<div class="col s4">
	  		<a href="{{ route('question', $question->id) }}"><p>{{ $question->title }}</p></a>
		</div>
		
		@if(!empty($question->abstract))
		<div class="col s6">        
	 		<p>{{ $question->abstract }}... <a href="{{ route('question', $question->id) }}">(Lire la suite)</a><p>
	 	</div>
	 	@else
	 	<div class="col s6">        
	 		<p>None</p>
	 	</div>
		@endif

	 	<div class="col s2">
	 		<p>{{ $category->name }}</p>
		</div>
		@endforeach
	</div>

	{{ $questions->links() }}

@endsection