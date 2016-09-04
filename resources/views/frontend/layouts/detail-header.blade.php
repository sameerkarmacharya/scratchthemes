<!-- banner section start -->
<div id="detail-heading">
<div class="container clearfix">
<div class="row">
  <div class="col-md-7">
    <ol class="breadcrumb">
      <li><a href="#">Home</a>
    </li>
    <li><a href="#">PSD</a>
  </li>
  <li class="activ-breadcum"> Business Template </li>
</ol>
<h2>{{ $detail->title}}</h2>
<ul class="list-item-info clearfix">
  <li class="list-item-rating">
    <div class="rating">
      <span class="stars-container star">
        <span class="star star5">
        </span>
      </span>
      <span class="number-of-rating gren">
        (10 Reviews)
      </span>
    </div>
  </li>
<?php $category = App\Categories::find($detail->category);?>

  <li>Type: <span>{{ $category->title}}</span>
</li>
<li>Item ID: <span>{{ $detail->id}}</span>
</li>
<li> Downloads: <span class="gren">247</span>
</ul>
</div>
<div class="col-md-5">
<div class="search-innerpage">
<div class="search-block">
<input type="text" placeholder="Search theme, template, bootstrap more.." class="border-input">
<a class="btn-search inner-serch">
<i class="fa fa-search">
</i>
</a>
</div>
</div>
</div>
</div>
</div>
</div>