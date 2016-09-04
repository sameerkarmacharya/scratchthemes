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
					<input type="text" name="title" class="form-control" value="{{ old('title') }}">
				</div>
				<div>
					<button type="text" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-plus"></span> &nbsp; <i><b>Add New Category </b> </i></button>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				</div>
			</div>
		</form>
	</div>
</div>
@endsection