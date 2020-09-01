@extends('layouts.app')

@section('content')

<div class="container mt-5">
	<h2>Edit Receipe</h2>

	<!-- Validation errors showing -->
	@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

	<form method="POST" action="/receipe/{{$receipe->id}}" enctype="multipart/form-data">
		{{method_field("PATCH")}}
		{{csrf_field()}}
		<div class="form-group">
			<label for="receipeName">Receipe Name</label>
			<input type="text" name="name" class="form-control" value="{{$receipe->name}}" required="">
		</div>

		<div class="form-group">
			<label for="ingredients">Ingredients</label>
			<input type="text" name="ingredients" class="form-control" value="{{$receipe->ingredients}}" required="">
		</div> 

		<div class="form-group">
			<select class="form-control" name="category">
				@foreach($category as $value)
					<option value="{{$value->id}}" {{ $receipe->categories->id == $value->id ? "selected" : "" }}> 
						{{$value->name}}
					</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<label for="rimage">Receipe Image</label><br>
			<input type="file" name="rimage">
			<img src="{{'/images/'.$receipe->image}}" width="150" height="150">
		</div>

		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
	

@endsection