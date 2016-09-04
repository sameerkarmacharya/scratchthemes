@extends('frontend.layouts.app')
@section('content')
@include('frontend.layouts.header')


<div id="banner">
  <div class="container clearfix">
    <div class="row">
      <div class="col-md-7">
        <h2 class="heading">
          Buy templates and themes as per your Business need
        </h2>
        <p class="sliding-text">
          For HTML, Email, WordPress, PSD, and more
        </p>
        <div id="search-box" class="search-line">
          <form action="/search" method="get">
            <div class="search-block">
              <input class="border-input"  name="search" type="text" placeholder="Search theme, template, bootstrap more..">

              <button type="submit" class="btn-search">
                <i class="fa fa-search">
                </i>
              </button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-5" id="banner-theme">
        <div class="banner-theme">
          <img src="image/banner-image.png" alt="banner-image" />
        </div>
      </div>
    </div>
  </div>
</div>
<!-- banner section end -->
<section id="featured-wrap" class="clearfix">
  <div class="container">
    <div class="theme-heading">
      <div class="left-side">
        <h3>
          Featured Theme
        </h3>
      </div>
      <div class="right-side">
        <p class="feature-right">
          <a href="#">
            <i class="fa fa-angle-double-right">
            </i>
            &nbsp; Browse all Featured Items
          </a>
        </p>
      </div>
    </div>
    <div class="row">
      @foreach($features as $feat)

<?php $category = App\Categories::find($feat->category);?>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="featured-box">
          <div class="feature-info clearfix">
            <div class="theme-img">
              <img src="uploads/{{ $feat->image_name }}" alt="Theme">
              <div class="selling-category">
                <span>
                  {{ $feat->tag}}
                </span>
              </div>
              <div class="pricing-tag">
                <p>
                  {{ $feat->price_tag}}
                </p>
              </div>
            </div>
            <div class="theme-intro">
              <h4>
                {{ $feat->title }}
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
                <img src="uploads/{{ $feat->image_name }}" alt="Theme">
                <div class="selling-category">
                  <span>
                    {{ $feat->tag}}
                  </span>
                </div>
                <div class="pricing-tag">
                  <p>
                    {{ $feat->price_tag}}
                  </p>
                </div>
              </div>
              <div class="theme-intro">
                <h4>
                  {{ $feat->title }}
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
                  <a href="{{ url('/theme-detail/'.$feat->id)}}" class="view-info right-side">View detail</a>
                </div>
              </div>
            </div>
          </div>
          <!-- End of featured-box -->
        </div>
      </div>

      @endforeach

    </div>
  </div>
</section>
<!-- div  close of feature items-->

<!-- div open of popular items   -->
<section id="popular-wrap" class="clearfix">
  <div class="container">
    <div class="theme-heading">
      <div class="left-side">
        <h3>
          Popular Items
        </h3>
      </div>
      <div class="right-side">
        <p class="feature-right">
          <a href="#">
            <i class="fa fa-angle-double-right">
            </i>
            &nbsp Browse all Popular Items
          </a>
        </p>
      </div>
    </div>

    <div class="row">

      @foreach($populars as $popular)

      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="featured-box">
          <div class="feature-info clearfix">
            <div class="theme-img">
              <img src="uploads/{{$popular->image_name}}" alt="Theme">
              <div class="selling-category">
                <span>
                  {{$popular->tag}}
                </span>
              </div>
              <div class="pricing-tag">
                <p>
                  {{ $popular->price_tag}}
                </p>
              </div>
            </div>
            <div class="theme-intro">
              <h4>
                {{ $popular->title}}
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
                <img src="uploads/{{$popular->image_name}}" alt="Theme">
                <div class="selling-category">
                  <span>
                    {{ $popular->tag}}
                  </span>
                </div>
                <div class="pricing-tag">
                  <p>
                    {{ $popular->price_tag}}
                  </p>
                </div>
              </div>
              <div class="theme-intro">
                <h4>
                  {{ $popular->title}}
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

      @endforeach

    </div>
    <!-- End of featured-box -->

  </div>
</div>
</div>
</section>

<!-- div close for popular items -->

<section id="our-standard" class="clearfix">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="methodology">
          <div class="slide-slick">
            <h5>
              Creative  design and <span class="code">Code</span>
            </h5>
            <img src="image/design-and-code.png" alt="Design and coding Standared" class="image-style" />
            <p>
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
            </p>
          </div>
          <div class="slide-slick">
            <h5>
              Creative  design and <span class="code">Code</span>
            </h5>
            <img src="image/design-and-code.png" alt="Design and coding Standared" class="image-style" />
            <p>
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
            </p>
          </div>
          <div class="slide-slick">
            <h5>
              Creative  design and <span class="code">Code</span>
            </h5>
            <img src="image/design-and-code.png" alt="Design and coding Standared" class="image-style" />
            <p>
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="subscribe-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h4>Email address for Newsletter</h4>
        <p>You can submit your email to get latest updates.</p>
      </div>
      <div class="col-md-6">
        <div class="subscrib-block">
          <input type="text" placeholder="Email Address for News Letter" class="subscribe-input">
          <a class="btn-subscribe">
            Subscribe
          </i>
        </a>
      </div>
    </div>
  </div>
</div>
</section>

@include('frontend.layouts.footer')

</div>

@endsection