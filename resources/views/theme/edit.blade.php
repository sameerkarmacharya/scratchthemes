@extends('layouts.app')
@section('content')
<div class="container">
	@include('common.errors')
	<div>
		<a href="{{ url('/index')}}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-list"></span>&nbsp; <b>Theme Listing Page </b> </a>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-offset-3 col-md-6">
				<form action="{{ url('theme_update/'.$theme->id)}}" class="form-horizontal" method="post" enctype="multipart/form-data">
					{!! csrf_field() !!}
					<div class="form-group">
						<label for="category">Category :</label>
						<select name="category" id="category" class="form-control">
							@foreach ($cat as $cat)
							<option  value="{{$cat->id}}" <?php if ($theme->category == $cat->id):?> selected="selected" <?php endif;?>>{{ $cat->title }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="title">Title:</label>
						<input type="text" name="title" class="form-control" value="{{ $theme->title }}">
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
					<div class="form-group">
						<label for="short_description">Short Description:</label>
						<input type="text" name="short_description" class="form-control" value="{{ $theme->short_description }}">
					</div>
					<div class="form-group">
						<label for="description">Description:</label>
						<textarea name="description" id="description" cols="30" rows="10" class="form-control"> {{ $theme->description}}
						</textarea>
					</div>
					<div class="form-group">
						<label for="seo_title">Seo Title :</label>
						<input type="text" name="seo_title" class="form-control" value="{{ $theme->seo_title}}">
					</div>
					<div class="form-group">
						<label for="seo_keyword">Seo Keyword :</label>
						<input type="text" name="seo_keyword" class="form-control" value="{{ $theme->seo_keyword}}">
					</div>
					<div class="form-group">
						<label for="metadata">Metadata :</label>
						<input type="text" name="metadata" class="form-control" value="{{ $theme->metadata}}">
					</div>
					<div class="row">
				<div class="form-group">
					<div class="col-md-2">
						<label for="feature">Feature:</label>
					</div>
					<div class="col-md-4">
						<input type="checkbox" name="feature" <?php if ($theme->feature == 1) {?> checked="checked" <?php }?> class="form-control">
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
						<input type="checkbox" name="popular" <?php if ($theme->popolur == 1) {?> checked="checked" <?php }?> class="form-control">
					</div>
				</div>
			</div>
			<br>
			<div class="form-group">
				<label for="tag">Tag:</label>
				<input type="text" name="tag" class="form-control"  value="{{ $theme->tag }}">
			</div>
					<div class="form-group">
						<button type="submit" class="btn btn-sm btn-success">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection