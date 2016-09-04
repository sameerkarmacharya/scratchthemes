@extends('frontend.layouts.app')
@section('content')
@include('frontend.layouts.header')
<!-- banner section start -->
<div id="detail-heading">
	<div class="container clearfix">
		<div class="row">
			<div class="col-md-7">
				<ol class="breadcrumb">
					<li><a href="#">Home</a>
				</li>
				<li class="activ-breadcum"> Bootstrap </li>
			</ol>
			<h2>Bootstrap <span class="total-info">(50 Templates)</span></h2>
		</div>
		<div class="col-md-5">
			<div class="search-innerpage">
				<div class="search-block">
					<form action="/search" method="get">
						<input type="text" placeholder="Search theme, template, bootstrap more.." name="search" class="border-input">
						<button class="btn-search inner-serch" type="submit">
						<i class="fa fa-search">
						</i>
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- banner section end -->
<section id="category-listing" class="clearfix section-container">
<div class="container clearfix">
	<div class="filter-section">
		<h3 class="content-title">Recent Searches</h3>
		<ul class="category-filter searches">
			<li><a href="#">Fashion templates</a></li>
			<li><a href="#">Ecommerce themes</a></li>
			<li><a href="#">Sports templates</a></li>
			<li><a href="#">Travel</a></li>
			<li><a href="#">Design & Photography</a></li>
			<li><a href="#">Real Estate</a></li>
		</ul>
		<h3 class="content-title">Categories</h3>
		<ul class="category-filter">
			<li><a href="#">Art & Culture</a></li>
			<li><a href="#">Fashion & Beauty</a></li>
			<li><a href="#">Food & Restaurant</a></li>
			<li><a href="#">Sports, Outdoors & Travel</a></li>
			<li><a href="#">Education & Books</a></li>
			<li><a href="#">Computer & Internet</a></li>
			<li><a href="#">Design & Photography</a></li>
			<li><a href="#">Real Estate</a></li>
		</ul>
		<h3 class="content-title">Types</h3>
		<ul class="type-filter">
			<li>
				<div class="form-group">
					<label for="psd">
						<div class="check-box">
							<input type="checkbox" id="psd">
							<span class="checked"></span>
						</div>
						PSD
					</label>
				</div>
			</li>
			<li>
				<div class="form-group">
					<label for="bootstrap">
						<div class="check-box">
							<input type="checkbox" id="bootstrap">
							<span class="checked"></span>
						</div>
						Bootstrap
					</label>
				</div>
			</li>
			<li>
				<div class="form-group">
					<label for="wordpress">
						<div class="check-box">
							<input type="checkbox" id="wordpress">
							<span class="checked"></span>
						</div>
						Wordpress
					</label>
				</div>
			</li>
		</ul>
	</div>
	<div class="listing-section">
		<div class="listing-block">
			<h3 class="content-title">Search Results "{{$search}}"</h3>
			<p>We all know that building a website can be quite daunting, so we are here to simplify the process and ensure that your amazing website will be a success. Here you will find a template that will satisfy both technical (W3C validation) and esthetical (your visitors) requirements.</p>
		</div>
		<div class="row">
			@if($find)
			@foreach($find as $find )
<?php $category = App\Categories::find($find->category);?>
			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="featured-box">
					<div class="feature-info clearfix">
						<div class="theme-img">
							<img src="uploads/{{ $find->image_name}}" alt="Theme">
							<div class="selling-category">
								<span>
									New
								</span>
							</div>
							<div class="pricing-tag">
								<p>
									Free
								</p>
							</div>
						</div>
						<div class="theme-intro">
							<h4>
							{{ $find->title }}
							</h4>
							<div class="rating">
								<span class="stars-container star">
									<span class="star star4">
									</span>
								</span>
								<span class="number-of-rating">
									(10 Reviews)
								</span>
							</div>
							<div class="category">
								<p class="category-txt left">
									{{ $category->title}}
								</p>
							</div>
						</div>
					</div>
					<!-- End of feature-info -->
					<div class="hover-box">
						<div class="feature-info clearfix">
							<div class="theme-img2">
								<img src="uploads/{{ $find->image_name}}" alt="Theme">
								<div class="selling-category">
									<span>
										New
									</span>
								</div>
								<div class="pricing-tag">
									<p>
										Paid
									</p>
								</div>
							</div>
							<div class="theme-intro">
								<h4>
								{{ $find->title}}
								</h4>
								<div class="rating">
									<span class="stars-container star">
										<span class="star star4">
										</span>
									</span>
									<span class="number-of-rating">
										(10 Reviews)
									</span>
								</div>
								<div class="category">
									<p class="category-txt left">
										{{ $category->title}}
									</p>
								</div>
								<div class="detail-demo">
									<a href="#" class="view-info left-side">Live Demo</a>
									<a href="#" class="view-info right-side">View detail</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End of featured-box -->
			</div>
			<!-- End of featured-box -->
			@endforeach
			@else
			<h1>Not Found!!</h1>
			@endif
		</div>
	</div>
	<!-- End of row -->
</div>
</div>
</section>
<!-- ending of middle section -->
@include('frontend.layouts.footer')
</div>
@endsection