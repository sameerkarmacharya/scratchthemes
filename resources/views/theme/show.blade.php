@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="copl-md-3">
			<a href="/admin_index" class="btn btn-md btn-info"> <span class="glyphicon glyphicon-list"></span>&nbsp;Theme Listing Page</a>
			<a href="/theme" class="btn btn-md btn-info"> <span class="glyphicon glyphicon-plus"></span>&nbsp;Add New Theme</a>
		</div>
	</div>
	<br><br>
<?php $category = App\Categories::find($show->category);?>
	<table class="table table-responsive table-stripped table-hover table-bordered">
		<tr>
			<th>ID</th>
			<td>{{ $show->id}}</td>
		</tr>
		<tr>
			<th>Image</th>
			<td> <img src="uploads/{{$show->image_name }}" alt="not found" width="72px"></td>
		</tr>
		<tr>
			<th>Category</th>
			<td>{{ $category->title}}</td>
		</tr>	<tr>
		<th>Title</th>
		<td>{{ $show->title}}</td>
	</tr>
	<tr>
		<th>Price Tag</th>
		<td>{{ $show->price_tag}}</td>
	</tr>
	<tr>
		<th>Regular Priuce</th>
		<td>{{ $show->regular_price}}</td>
	</tr>
	<tr>
		<th>Full Code Authentication Price</th>
		<td>{{ $show->full_price}}</td>
	</tr>
	<tr>
		<th>Short Description</th>
		<td>{{ $show->short_description}}</td>
	</tr>
	<tr>
		<th>Description</th>
		<td>{{ $show->description}}</td>
	</tr>
	<tr>
		<th>Seo Title</th>
		<td>{{ $show->seo_title}}</td>
	</tr>
	<tr>
		<th>Seo Keyword</th>
		<td>{{ $show->seo_keyword}}</td>
	</tr>
	<tr>
		<th>Metadata</th>
		<td>{{ $show->metadata}}</td>
	</tr>
	<tr>
		<th>Theme ZIP</th>
		<td>{{ $show->theme_name}}</td>
	</tr>
	<tr>
		<th>Feature</th>
		<td>{{ $show->feature}}</td>
	</tr>
	<tr>
		<th>Popular</th>
		<td>{{ $show->popolar}}</td>
	</tr>
	<tr>
		<th>Tag</th>
		<td>{{ $show->tag}}</td>
	</tr>

</table>
</div>
@endsection