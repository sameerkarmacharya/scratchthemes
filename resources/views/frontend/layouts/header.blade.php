<div id="wrapper">
    <div class="top-section">
      <div class="container clearfix">
        <div class="row">
          <div class="col-md-12">
            <ul class="login-top">
              <li class="border-l-r">
              @if(Session::has('name'))
               {{ Session::get('name') }}
                    <i class="fa fa-sign-in icon-design"></i>
                    <a href="{{ url('/user_logout') }}">Logout</a>
                  @else

                    <a href="/user_login"><i class="fa fa-sign-in icon-design"></i>
                  <span class="login">

                    Login
                  </span></a>
                    @endif
                </li>
                <li class="cart-added">
                  <i class="fa fa-cart-plus icon-cart">
                  </i>
                  <span class="amount">
                    ${{ Session::has('cart') ? Session::get('cart')->total_price : '0' }}
                  </span>

                  <span class="added-item">
                    <span class="badge"> {{ Session::has('cart') ? Session::get('cart')->total_qty : '' }}</span> Items
                  </span>
                </li>
              </ul>

            </div>
          </div>
        </div>
      </div>

      <!-- Page Content -->
      <div id="page-content-wrapper">

        <div class="container clearfix">
          <h1 id="logo">
            <a href="/index" title="Home">
              Theme Bank
            </a>
          </h1>
          <nav id="main-menu" class="navbar">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">
                    Toggle navigation
                  </span>
                  <span class="icon-bar">
                  </span>
                  <span class="icon-bar">
                  </span>
                  <span class="icon-bar">
                  </span>
                </button>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="navbar-nav">
                  @foreach ($cats as $cat)
                  <li>
                    <a href="{{ url('category-list/'.$cat->id)}}" title="wordpress">
                      {{ $cat->title}}
                    </span>
                  </a>
                </li>
                @endforeach

           <li class="last-p-m">
            <a href="#" title="psd" class="dropdown-toggle last-p-m" data-toggle="dropdown">
              Categories
              <i class="fa fa-angle-down drop-arow">
              </i>
            </a>
            <ul class="dropdown-menu category-drop">
              <li>
                <a href="#">
                  Art & Culture
                  <span class="category-detail">
                    lorem ipsum here
                  </span>
                </a>
              </li>
              <li>
                <a href="#">
                  Education & Books
                  <span class="category-detail">
                    lorem ipsum here
                  </span>

                </a>
              </li>
              <li>
                <a href="#">
                  Fashion & Beauty
                  <span class="category-detail">
                   lorem ipsum here
                 </span>
               </a>
             </li>
             <li>
              <a href="#">
                Computers & Internet
                <span class="category-detail">
                  lorem ipsum here
                </span>
              </a>
            </li>
            <li>
              <a href="#">
                Food & Restaurant
                <span class="category-detail">
                  lorem ipsum here
                </span>
              </a>
            </li>
            <li>
              <a href="#">
                Design & Photography
                <span class="category-detail">
                  lorem ipsum here
                </span>
              </a>
            </li>
            <li>
              <a href="#">
                Sports, Outdoors & Travel
                <span class="category-detail">
                  lorem ipsum here
                </span>
              </a>
            </li>
            <li>
              <a href="#">
                Food & Restaurant
                <span class="category-detail">
                  lorem ipsum here
                </span>
              </a>
            </li>
          </ul>

        </li>

      </ul>
    </div>
    <!-- end of navbar-collapse -->
  </div>
  <!-- end of container-fluid -->
</nav>
</div>


</div>
<!-- banner section start -->
