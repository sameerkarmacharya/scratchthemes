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
		<a href="{{ url('/category/add') }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-plus"></span> &nbsp; Add New Category</a>
		@if (count($categories) >0 )
		<h2>Categories</h2>
		<table class="table table-striped table-hover table-bordered table-responsive">
			<tr class="success">
				<th>ID</th>
				<th>Title</th>
				<th>Option</th>
			</tr>
			@foreach ($categories as $category)
			<tr>
				<td>{{ $category->id }}</td>
				<td>{{ $category->title }}</td>
				<td>
					<a href="{{ url('/edit/'.$category->id) }}" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit"></span> &nbsp;  Edit</a>
					<a href="{{ url('/delete/'.$category->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure, ypu want to delete?');"><span class="glyphicon glyphicon-trash"></span> &nbsp; DELETE</a>
				</td>
			</tr>
			@endforeach
			<tr class="success">
				<th>ID</th>
				<th>Title</th>
				<th>Option</th>
			</tr>
		</table>
		@endif
	</div>
	@endsection