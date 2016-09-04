@extends('layouts.app')
@section('content')
<div class="container">
	@if (Session::has('message'))
	<div class="alert alert-success">{{ Session::get('message') }}</div>
	@endif
	@if (Session::has('delete'))
	<div class="alert alert-danger">{{ Session::get('delete') }}</div>
	@endif
	<div>
		<br><br>
		<a href="{{ url('/theme') }}" class="btn btn-sm btn-info"> <span class="glyphicon glyphicon-plus
		glyphicon "></span> &nbsp;Add New Theme</a>
		<br><br>
	</div>
	<div>
		<table class="table table-striped table-hover table-bordered table-responsive">
			<tr class="success">
				<th>ID</th>
				<th>Title</th>
				<th>Category</th>
				<th>Price Tag</th>
				<th>Feature</th>
				<th>Popular</th>
				<th>Tag</th>
				<th>Image</th>
				<th>MOdify</th>
			</tr>
			@foreach ($themes as $theme)
			 <!-- <?php $category = App\Categories::find($theme->category);?> -->
			<tr>
				<td> {{ $theme->id}}</td>
				<td> {{ $theme->title}}</td>
				<td>{{ $category->title }} </td>
				<td>{{ $theme->price_tag}} </td>
				<td>
				 	@if($theme->feature==1)
				 	 Yes
				 	 @else
				 	 No
				 	 @endif
				 </td>
				<td>
				 	@if($theme->popolar==1)
				 	 Yes
				 	 @else
				 	 No
				 	 @endif </td>
				<td>{{ $theme->tag}} </td>
				<td> <img src="uploads/{{$theme->image_name}}" alt="not found" width="150px"></td>

				<td>
					<a href="{{ url('/theme_edit/'.$theme->id) }}" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit"></span> &nbsp;  Edit</a>
					<a href="{{ url('/show/'.$theme->id) }}" class="btn btn-xs btn-primary"> <span class="glyphicon glyphicon-expand"></span>&nbsp; Show </a>
					<a href="{{ url('/theme_del/'.$theme->id) }}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure, ypu want to delete?');"><span class="glyphicon glyphicon-trash"></span>&nbsp;
 DELETE</a>
				</td>
			</tr>
			@endforeach
			<tr class="success">
				<th>ID</th>
				<th>Title</th>
				<th>Category</th>
				<th>Price</th>
				<th>Feature</th>
				<th>Popular</th>
				<th>Tag</th>
				<th>Image</th>
				<th>MOdify</th>
			</tr>
		</table>
	</div>
</div>
@endsection