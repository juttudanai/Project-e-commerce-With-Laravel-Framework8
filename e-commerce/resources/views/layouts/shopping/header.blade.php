<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{ url('/') }}"><img src="{{ asset('images/home/logo.png') }}" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            @if (Auth::User())
                                @if (Auth::User()->is_admin == 1)
                                    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-user"></i> Account</a></li>
                                    <li><a href="{{ route('showCart') }}"><i class="fa fa-shopping-cart"></i> Cart
                                        @if (isset($cartItem))
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="background-color: red">
                                            {{ $cartItem->totalQuantity }}
                                          </span>
                                        @endif
                                    </a></li>
                                @else
                                    <li><a href="{{ route('user.profile') }}"><i class="fa fa-user"></i> Account</a></li>
                                    <li><a href="{{ route('showCart') }}"><i class="fa fa-shopping-cart"></i> Cart
                                        @if (isset($cartItem))
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="background-color: red">
                                            {{ $cartItem->totalQuantity }}
                                          </span>
                                        @endif
                                    </a></li>
                                @endif
                            @else
                                <li><a href="{{ route('login') }}"><i class="fa fa-lock"></i> Login</a></li>
                                <li><a href="{{ route('register') }}"><i class="fa fa-lock"></i> Register</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ url('/') }}" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="#">Products</a></li>
                                    <li><a href="#">Product Details</a></li>
                                    <li><a href="#">Checkout</a></li>
                                    <li><a href="#">Cart</a></li>
                                    <li><a href="{{ url('login') }}">Login</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="#">Blog List</a></li>
                                    <li><a href="#">Blog Single</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <form action="{{ url('product/Search') }}" method="get">
                        <div class="search_box pull-right">
                            <input type="text" name="search" placeholder="search..."/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->
