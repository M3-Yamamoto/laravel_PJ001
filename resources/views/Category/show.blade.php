@extends('layouts.app')

@section("content")
	<div class="container">

      <li>Category Name - {{ $category->name }}</li>
      <li>Description - {{ $category->description}}</li>
      <a href="/category/{{$category->id}}/edit"> <button class="btn btn-success">Edit</button></a>

      <form method="post" action="/category/{{ $category->id }}">
        {{ method_field("DELETE") }}
       {{ csrf_field() }}
      <button type="submit" class="btn btn-primary">Delete</button>
      </form>
  </div>
@endsection
