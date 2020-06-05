@extends('layouts.app')

@section("content")
	<div class="container">
      <h2>{{ $recipe->name }}</h2>
      <li>Ingredients - {{ $recipe->ingredients }}</li>
      <li>Category - {{ $recipe->categories->name}}</li>
      <a href="/recipe/{{ $recipe->id }}/edit"> <button class="btn btn-success">Edit</button></a>

      <form method="post" action="/recipe/{{ $recipe->id }}">
        {{ method_field("DELETE") }}
       {{ csrf_field() }}
      <button type="submit" class="btn btn-primary">Delete</button>
      </form>
  </div>
@endsection
