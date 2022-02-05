@extends('layouts.shopping.master')
@section('titleName')
    Search Product
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->
                            @foreach ($category as $item)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="{{ url('category/product/'.$item->id) }}">{{ $item->category_name }}</a></h4>
                                    </div>
                                </div>
                            @endforeach

                        </div><!--/category-products-->

                        <div class="price-range"><!--price-range-->
                            <h2>Price Range</h2>
                            <div class="well text-center">
                                <form action="{{ url('product/searchPrice') }}" method="get">
                                    <input type="text" class="span2" name="searchPrice" value="" data-slider-min="0" data-slider-max="3000" data-slider-step="5" data-slider-value="[100,500]" id="sl2" ><br />
                                    <b class="pull-left">0</b> <b class="pull-right"> 3000</b>
                                    <input type="submit" class="btn btn-primary" value="ค้นหา">
                                </form>
                            </div>
                        </div><!--/price-range-->
                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Features Items</h2>
                        @forelse ($products as $item)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ asset($item->product_image) }}" width="200px" alt="" />
                                        <h2>{{ number_format($item->product_price,2) }}</h2>
                                        <p>{{ $item->product_name }}</p>
                                        <a href="{{ url('cart/addItem/'.$item->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>{{ number_format($item->product_price,2) }}</h2>
                                            <p>{{ $item->product_name }}</p>
                                            <a href="{{ url('cart/addItem/'.$item->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="choose">
                                     <ul class="nav nav-pills nav-justified">
                                        <li><a href="{{ url('product/productDetail/'.$item->id) }}"><i class="fa fa-info-circle"></i>Product Detail</a></li>
                                        <li><a href="{{ url('cart/addItem/'.$item->id) }}"><i class="fa fa-shopping-cart"></i>Add to cart</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="alert alert-danger text-center">
                            <p>ไม่พบสินค้าที่ค้นหา</p>
                        </div>
                        @endforelse
                    </div><!--features_items-->
                    {{ $products->appends(['search' => request()->query('search')])->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
