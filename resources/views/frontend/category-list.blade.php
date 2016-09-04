@extends('frontend.layouts.app')
@section('content')
@include('frontend.layouts.header')
@include('frontend.layouts.category_header')
<!-- banner section end -->
<section id="category-listing" class="clearfix section-container">
  <div class="container clearfix">
    <div class="filter-section">
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
      <form action="" method="post" id="category-list">
        @foreach ($cats as $c)

        <li>
          <div class="form-group">
            <label for="{{ $c->title}}">
              <div class="check-box">
                <input type="checkbox" id="{{ $c->title}}" name="category" value="{{ $c->id}}">
                <span class="checked"></span>
              </div>
              {{$c->title}}
            </label>
          </div>
        </li>
        @endforeach
      </form>
      </ul>
    </div>
    <div id="catogory" class="listing-section">
      <div class="listing-block">
        <h3 class="catogoty-heading">{{ $cat->title}} Themes</h3>
      </div>
      <div class="row">
        @foreach($themes as $theme)
        @if($theme->category == $cat->id)
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="featured-box">
            <div class="feature-info clearfix">
              <div class="theme-img">
                <img src="{{ asset('uploads')}}/{{ $theme->image_name }}" alt="Theme">
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
                {{$theme->title}}
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
                    {{ $cat->title }}
                  </p>
                </div>
              </div>
            </div>
            <!-- End of feature-info -->
            <div class="hover-box">
              <div class="feature-info clearfix">
                <div class="theme-img2">
                  <img src="{{ asset('uploads')}}/{{ $theme->image_name }}" alt="Theme">
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
                  {{ $theme->title }}
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
                     {{$cat->title}}
                    </p>
                  </div>
                  <div class="detail-demo">
                    <a href="#" class="view-info left-side">Live Demo</a>
                    <a href="{{ url('/theme-detail/'.$theme->id)}}" class="view-info right-side">View detail</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- End of featured-box -->
          </div>
        </div>
        @endif
        @endforeach
        <div id="categorybox">
          <div class="col-lg-4 col-md-4 col-sm-6" >
            <div class="featured-box">
              <div class="feature-info clearfix">
                <div class="theme-img">
                  <img src="{{ asset('uploads')}}/{{ $theme->image_name }}" alt="Theme">
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
                    {{$theme->title}}
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
                      {{ $cat->title }}
                    </p>
                  </div>
                </div>
              </div>
              <!-- End of feature-info -->
              <div class="hover-box">
                <div class="feature-info clearfix">
                  <div class="theme-img2">
                    <img src="{{ asset('uploads')}}/{{ $theme->image_name }}" alt="Theme">
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
                      {{ $theme->title }}
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
                       {{$cat->title}}
                     </p>
                   </div>
                   <div class="detail-demo">
                    <a href="#" class="view-info left-side">Live Demo</a>
                    <a href="{{ url('/theme-detail/'.$theme->id)}}" class="view-info right-side">View detail</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- End of featured-box -->
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
  <!-- End of row -->
</div>
</section>
<!-- ending of middle section -->
@include('frontend.layouts.footer')

 <!-- ajax for category   -->
<script>
    $(document).ready(function() {
      $("#category-form").submit(function(event) {
            event.preventDefault();
        });
        $("input[name=category]").click( function() {
            var category = $(this).val();

            $.ajax({
                    type: "POST",
                    url: "{{ url('fetch_data') }}",
                    data: {
                        'category': category
                    }
                })
                .done(function(response) {
                    if (response) {
                        var rData = JSON.parse(response);
                        var theme = rData.category_theme;
dd(theme);
                        // if (total) {
                        //     $('#placeTotalPoints').html(total);
                        // }
                        // if (billValue) {
                        //     $('#placeBillValue').html(billValue);
                        // }

                    }
                });
        });
    });



</script>
@endsection