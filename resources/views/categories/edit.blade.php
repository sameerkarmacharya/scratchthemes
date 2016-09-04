@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-offset-3 col-sm-4">
			<form action="{{ url('update/'.$category->id) }}" method="post" enctype="multipart/form-data">
				{!! csrf_field() !!}
				<div class="form-group">
					<label for="title">Title : </label>
					<input type="text" name="title" value="{{ $category->title }}" class="form-control">
				</div>
				<div class="form-group">
					<button class="btn btn-sm btn-success"><span class="glyphicon glyphicon-upload"></span>&nbsp;
					Update
					</button>

				</div>
			</form>
		</div>
	</div>
</div>
@endsection