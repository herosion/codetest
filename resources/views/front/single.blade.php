@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
	<div class="row">
		<div class="row">
			<h5 class="center">{{ $question->title }}</h5>
		</div>
  		
       	<div class="row">
       		<p>Question : {{ $question->content }}</p>
       	</div>
 		
		<div class="row">
		    <form class="col s12" action="{{ route('home') }}" method="post">
		      <div class="row">
		        <div class="input-field">
		          <i class="material-icons prefix">mode_edit</i>
		          <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
		          <label for="icon_prefix2">Votre réponse</label>
		        </div>
		      </div>
		    </form>
		</div>
		
		<div class="row">
			<button class="btn waves-effect waves-light" type="submit" name="action">Envoyer
	    		<i class="material-icons right">send</i>
	  		</button>
		</div>
		
	</div>
@endsection