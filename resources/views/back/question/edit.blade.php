@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
<div class="container">
    <h2 class="center-align">Edit Question</h2>
    <h4 class="center-align">{{ $question->title }}</h4>
</div>
<div class="container">
  @if (count($errors) > 0)
  <div class="alert alert-danger">
    <p class="center-align">Une erreur est survenue dans le formulaire</p>
  </div>
  @endif
</div>
<form class="col s12" action="{{ route('question.update', $question->id)}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }} 
    {{ method_field('PUT') }}
    <div class="section">
      <div class="row">
        <div class="input-field">
          <input  id="title" name="title" type="text" value="{{ $question->title }}" class="validate"/>
          <label for="title">Title</label>
        </div>
        <div class="row">
          @if($errors->has('title')) <span>{{$errors->first('title')}}</span>@endif
        </div>
      </div>

      <div class="row">
        <div class="input-field">    
          <input  id="content" name="content" type="text" value="{{ $question->content }}" class="validate"/>
          <label for="content">Question</label>
        </div>

        <div class="row">
          @if($errors->has('content')) <span>{{$errors->first('content')}}</span>@endif
        </div>
      </div>
      
      <div class="row">
        <div class="input-field">    
          <input  id="resume" name="abstract" type="text" value="{{ $question->abstract }}" class="validate"/>
          <label for="resume">Resume</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field">
            <select class="ben" name="category_id">
              <option value="0" {{$question->category? '' : 'selected'}}>Choose your robot category</option>
              @foreach ($categories as $id => $name)
              <option value="{{$id}}" {{ ($question->category? $question->category->id == $id : false)? 'selected' : '' }}> {{ $name}} </option>
              @endforeach
            </select>
            <label>Category</label>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="switch">
        <!-- <h4>Publication </h4> -->
        <label>
          Unpublished
          <input type="checkbox" name="status" value="published" {{ ($question->status == 'published')? 'checked' : '' }} >
          <span class="lever"></span>
          Published
        </label>
      </div>
      <p>
        <input type="hidden" id="date" name="date" value="on" />
        <label for="date"></label>
      </p>
    </div>
  
    <div class="row">
      <button class="btn waves-effect waves-light" type="submit" name="action">Edit
        <i class="material-icons right">send</i>
      </button>
    </div>
</form>
@endsection