@extends('layouts.app')

@section("content")
  <div class="container">
   <h2>Add New Recipe</h2>

     @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <!-- <form method="post" action="/recipe"> -->
  <form method="POST" action="/recipe" enctype="multipart/form-data">
   {{ csrf_field() }}
    <div class="form-group">
      <label>Recipe Name</label>
      <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>
    <div class="form-group">
      <label>Ingredients</label>
      <input type="text" name="ingredients" class="form-control" value="{{ old('ingredients') }}" required>
    </div>
    <div class="form-group">
      <select class="form-control" name="category">
        @foreach($category as $value)
          <option value="{{ $value->id }}">{{ $value->name }}</option>
        @endforeach
      </select>
    </div>

   <div class="form-group">
        <label for=""> Recipe Image</label><br>
        <input type="file" name="rimage">
      </div>
       <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>
@endsection
