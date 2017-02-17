@extends('layouts.master')

@section('title', 'Page Title')

@section('content')

	<div class="row">
		<h3 class="center">Latest Questions</h3>
	</div>

	{{ $questions->links() }}

	<div class="row">
		@foreach ($questions as $question)
		<div class="col s4">
	  		<p><a href="{{ route('question', $question->id) }}"><h6>{{ $question->title }}<h6></a><p>
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

		@if(!empty($question->category))
		<div class="col s2">
	 		<p><a href="{{ route('category', [$question->category->id, $question->category->slug]) }}">{{ $question->category->name }}</a><p>
		</div>
	 	@endif
		@endforeach
	</div>

	{{ $questions->links() }}

@endsection