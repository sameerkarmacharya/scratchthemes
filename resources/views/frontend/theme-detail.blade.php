@extends('frontend.layouts.app')
@section('content')
@include('frontend.layouts.header')
@include('frontend.layouts.detail-header')
<!-- banner section end -->
<section id="detail-wrap" class="clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="inner-left">
                    <div class="image-detail">
                        <img src="{{ asset('uploads')}}/{{ $detail->image_name }}">
                    </div>
                    <p class="center">This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit.</p>
                    <div class="view-demo clearfix">
                        <a class="live-demmo" href="#"><i class="fa fa-eye"></i> View Live Demo</a>
                    </div>
                    <div class="service-faciliate">
                        <div class="heading-service">
                            <h4>
                              Services
                          </h4>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                            <div class="icon">
                                <i class="fa fa-support"></i>
                            </div>
                            <div class="message">
                                <h5>Easy to get help</h5>
                                <p>You questions will be handled promptly by our support by team. This is Photoshop's version of Lorem Ipsum.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="icon">
                                <i class="fa fa-thumbs-up"></i>
                            </div>
                            <div class="message">
                                <h5>Easy to get help</h5>
                                <p>You questions will be handled promptly by our support by team. This is Photoshop's version of Lorem Ipsum.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="icon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <div class="message">
                                <h5>Easy to get help</h5>
                                <p>You questions will be handled promptly by our support by team. This is Photoshop's version of Lorem Ipsum.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="icon">
                                <i class="fa fa-comments"></i>
                            </div>
                            <div class="message">
                                <h5>Easy to get help</h5>
                                <p>You questions will be handled promptly by our support by team. This is Photoshop's version of Lorem Ipsum.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="service-faciliate">
                    <div class="heading-service">
                        <h4>
                          Services
                      </h4>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                        <p>Accessibility Ready, Black, Blue, Custom Background, Custom Colors, Custom Header, Custom Menu, Dark, Editor Style, Featured Images, Fixed Layout, Flexible Header, Gray, Light, Microformats, One Column, Post Formats, Red, Responsive Layout, Right Sidebar, RTL Language Support, Sticky Post, Threaded Comments, Translation Ready, Two Columns, White, Yellow</p>
                    </div>
                </div>
            </div>
            <div class="service-faciliate">
                <div class="row">
                    <div class="col-md-12">
                        <h3>
                            Template is also available as:
                        </h3>
                        <ul class="template-available">
                        @foreach ($cats as $cate)
                       @if($cate->id != $detail->category)
                            <li class="active-temp"><i class="fa fa-wordpress"></i> {{$cate->title}} <span class="available-detail"><i class="fa fa-angle-double-right"></i> <a href="#">View Details</a></span>
                            </li>
                            <!-- <li><i class="fa fa-wordpress"></i> Wordpress <span class="available-detail"><i class="fa  fa-angle-double-right"></i> <a href="#">View Details</a></span>
                            </li> -->
                @endif
                             @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="service-faciliate">
                <div class="row">
                    <div class="col-md-12">
                        <div class="related-heading">
                            <h3 class="arrow_box">
                              Related Items
                          </h3>
                      </div>
                      <div class="related-theme">
                        <div class="col-md-6 slider-box-inner">
                            <div class="featured-box">
                                <div class="feature-info clearfix">
                                    <div class="theme-img">
                                        <img src="{{ asset('image')}}/theme/theme1.png" alt="Theme">
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
                                          New Responsive Coorporate Theme
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
                                            Bootstrap
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of featured-box -->
                    </div>
                    <div class="col-md-6 slider-box-inner">
                        <div class="featured-box">
                            <div class="feature-info clearfix">
                                <div class="theme-img">
                                    <img src="{{ asset('image')}}/theme/theme1.png" alt="Theme">
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
                                      New Responsive Coorporate Theme
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
                                        Bootstrap
                                    </p>
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
</div>
<div class="col-md-4 clearfix">
    <div class="regular-div">
        <div class="select">
            <select class="select-box" name="price_tag" id="price_tag">
                <option value="Regular">Regular License</option>
                <option value="Fullcode">Full Code Authentication</option>
            </select>
        </div>
        <span class="pricing" id="price">$ {{ $detail->regular_price }}</span>
    </div>
    <div class="clear"></div>

    <div class="button-click">
        <a href="{{ url('add_to_cart/'.$detail->id)}}" class="button-addcart"><i class="fa fa-cart-plus"></i> Add to Cart</a>
    </div>
    <div class="button-click">
        <a href="#" class="button-buy">Buy Now</a>
    </div>
    <div class="template-describe">
        <ul>
            <li>Template Type <span class="category-right"><a href="#">Corporate/Business</a></span>
            </li>
            <li>Released Date <span class="category-right">{{ str_limit($detail->created_at,$limit= 10, $end=" ") }} </span>
            </li>
            <li>Last Update <span class="category-right">{{ str_limit($detail->updated_at,$limit= 10, $end=" ") }}</span>
            </li>
            <li>Pixel Dimension <span class="category-right">1920x12764</span>
            </li>
            <li>Version <span class="category-right">1.0</span>
            </li>
        </ul>
    </div>
    <div class="rating-detail">
        <div class="rating-heading clearfix">
            <h3>Rating</h3>
            <span class="stars-container star star-right">
              <span class="star star5">
              </span>
          </span>
      </div>
      <ul class="diffrent-rating">
        <li>
            <span class="stars-container star star-left">
              <span class="star star5">
              </span>
          </span>
          <label class="person-rating">21</label>
      </li>
      <li>
        <span class="stars-container star star-left">
          <span class="star star4">
          </span>
      </span>
      <label class="person-rating">14</label>
  </li>
  <li>
    <span class="stars-container star star-left">
      <span class="star star3">
      </span>
  </span>
  <label class="person-rating">11</label>
</li>
<li>
    <span class="stars-container star star-left">
      <span class="star star2">
      </span>
  </span>
  <label class="person-rating">7</label>
</li>
<li>
    <span class="stars-container star star-left">
      <span class="star star1">
      </span>
  </span>
  <label class="person-rating">1</label>
</li>
</ul>
</div>
</div>
</div>
</div>
</section>
<!-- ending of middle section -->
@include('frontend.layouts.footer')

</div>
<script>
    $('#price_tag').on('change', function(e){
        console.log(e);

        var tag = e.target.value;

        //Ajax

        $.get('/fetch_price?val='+ tag, function(data){

            //success data
            console.log(data);
        })
    });
</script>
@endsection

