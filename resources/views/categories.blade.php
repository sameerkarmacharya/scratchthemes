@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-offset-3 col-sm-4">
			@include('common.errors')
			<form action="{{ url('/category') }}" method="post">
				{!! csrf_field() !!}
				<div class="form-group">
					<label for="title">Title :</label>
					<input type="text" name="title" class="form-control">
				</div>
				<div>
					<button type="text" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-plus"></span> &nbsp; <i><b>Add New Category </b> </i></button>
				</div>
			</div>
		</form>
	</div>
	<div>
		@if (count($categories) >0 )
		<h2>Categories</h2>
		<table class="table table-striped table-hover table-bordered table-responsive">
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Option</th>
			</tr>
			@foreach ($categories as $category)
			<tr>
				<td>{{ $category->id }}</td>
				<td>{{ $category->title }}</td>
				<td>
					<form action="{{ url('/category/'.$category->id) }}">
						{!! csrf_field() !!}
						<input type="hidden" name="_method" value="PUT">
						<button type="submit" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span> &nbsp; EDIT</button>
					</form>
					<br>
					<form action="{{ url('/category/'.$category->id) }}" method="post">
						{!! csrf_field() !!}
						<input type="hidden" name="_method" value="DELETE">
						<button type="submit" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> &nbsp; DELETE</button>
					</form>
				</td>
			</tr>
			@endforeach
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Option</th>
			</tr>
		</table>
		@endif
	</div>
</div>
@endsection