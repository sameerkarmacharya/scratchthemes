@extends('layouts.app')
@section('content')
<div class="success">
	<div class="row">
		<div class="col-sm-offset-4 col-md-6">
			<h2>Add New Theme </h2>
		</div>
	</div>
</div>
<form action="{{ url('/theme') }}" method="POST" id="theme_form" enctype="multipart/form-data">
	{!! csrf_field() !!}
	<div class="row">
		<div class="col-md-offset-3 col-md-4">
			<div class="form-group">
				<select name="category" id="category" class="form-control">
					@foreach ($categories as $category)
					<option value="{{ $category->id }}"> {{ $category->title }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
				<label for="title">Title :</label>
				<input type="text" name="title" class="form-control"  value="{{ old('title') }}">
				 @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
			</div>
			<div class="form-group">
				<label for="title">Price Tag :</label>
				<select name="price_tag" id="" class="form-control">
					<option value="free">Free</option>
					<option value="paid">Paid</option>
				</select>
			</div>
			<div class="form-group{{ $errors->has('regular_price') ? ' has-error' : '' }}">
				<label for="price">Regular Licence Price :</label>
				<input type="text" name="regular_price" class="form-control"  value="{{ old('regular_price') }}">
			 @if ($errors->has('regular_price'))
                            <span class="help-block">
                                <strong>{{ $errors->first('regular_price') }}</strong>
                            </span>
                            @endif
			</div>
			<div class="form-group{{ $errors->has('full_code_price') ? ' has-error' : '' }}">
				<label for="price">Full Code Authentication Price :</label>
				<input type="text" name="full_code_price" class="form-control"  value="{{ old('full_code_price') }}">
				 @if ($errors->has('full_code_price'))
                            <span class="help-block">
                                <strong>{{ $errors->first('full_code_price') }}</strong>
                            </span>
                            @endif
			</div>
			<div class="form-group{{ $errors->has('short_description') ? ' has-error' : '' }}">
				<label for="short-description">Short Description :</label>
				<input type="text" name="short_description" class="form-control"  value="{{ old('short_description') }}">
				 @if ($errors->has('short_description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('short_description') }}</strong>
                            </span>
                            @endif

			</div>
			<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
				<label for="description">Description :</label>
				<textarea name="description" id="" cols="30" rows="10" class="form-control"  value="{{ old('descrption') }}"></textarea>
					 @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
			</div>
			<div class="form-group{{ $errors->has('seo_title') ? ' has-error' : '' }}">
				<label for="seo-title">Seo Title :</label>
				<input type="text" name="seo_title" class="form-control"  value="{{ old('seo_title') }}">
					 @if ($errors->has('seo_title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('seo_title') }}</strong>
                            </span>
                            @endif
			</div>
			<div class="form-group{{ $errors->has('seo_keyword') ? ' has-error' : '' }}">
				<label for="seo-keyword">Seo Keyword :</label>
				<input type="text" name="seo_keyword" class="form-control"  value="{{ old('seo_keyword') }}">
					 @if ($errors->has('seo_keyword'))
                            <span class="help-block">
                                <strong>{{ $errors->first('seo_keyword') }}</strong>
                            </span>
                            @endif
			</div>
			<div class="form-group{{ $errors->has('metadata') ? ' has-error' : '' }}">
				<label for="metadata">Metadata :</label>
				<input type="text" name="metadata" class="form-control"  value="{{ old('metadata') }}">
					 @if ($errors->has('metadata'))
                            <span class="help-block">
                                <strong>{{ $errors->first('metadata') }}</strong>
                            </span>
                            @endif
			</div>
			<div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
				<label for="theme">Theme :</label>
				<input type="file" name="file" class="form-control" >
					 @if ($errors->has('file'))
                            <span class="help-block">
                                <strong>{{ $errors->first('file') }}</strong>
                            </span>
                            @endif
			</div>

			<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
				<label for="image">Image :</label>
				<input type="file" name="image"   id="jobSelector">
					 @if ($errors->has('image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                            @endif
			</div>
			<div class="row">
				<div class="form-group">
					<div class="col-md-2">
						<label for="feature">Feature:</label>
					</div>
					<div class="col-md-4">
						<input type="checkbox" name="feature" class="form-control">
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="form-group">
					<div class="col-md-2">
						<label for="popular">Popular:</label>
					</div>
					<div class="col-md-4">
						<input type="checkbox" name="popular" class="form-control">
					</div>
				</div>
			</div>
			<br>
			<div class="form-group{{ $errors->has('tag') ? ' has-error' : '' }}">
				<label for="tag">Tag:</label>
				<input type="text" name="tag" class="form-control">
					 @if ($errors->has('tag'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tag') }}</strong>
                            </span>
                            @endif
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-plus
				glyphicon "></span> &nbsp; Add New Theme</button>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			</div>
		</div>
	</div>
</form>
@endsection