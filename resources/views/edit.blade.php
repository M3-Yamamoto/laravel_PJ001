@extends('layouts.app')

@section("content")
  <div class="container">
   <h2>Edit Recipe</h2>

     @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <form method="post" action="/recipe/{{ $recipe->id }}">
  <form method="POST" action="/recipe/{{ $recipe->id }}" enctype="multipart/form-data">
    {{ method_field("PATCH") }}
   {{ csrf_field() }}
    <div class="form-group">
      <label>Recipe Name</label>
      <input type="text" name="name" class="form-control" value="{{ $recipe->name }}" required>
    </div>
    <div class="form-group">
      <label>Ingredients</label>
      <input type="text" name="ingredients" class="form-control" value="{{ $recipe->ingredients }}" required>
    </div>
    <div class="form-group">
      <select class="form-control" name="category">
        @foreach($category as $value)
          <option value="{{ $value->id }}"
          {{ $recipe->categories->id == $value->id ? "selected" : "" }}>{{ $value->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
        <label for=""> Recipe Image</label><br>
        <input type="file" name="rimage"><br><br>
        <img src="{{'/images/'.$recipe->image}}" width="150" height="150">
      </div>
       <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  </div>
@endsection
