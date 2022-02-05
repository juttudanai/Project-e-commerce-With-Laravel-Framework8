@extends('layouts.shopping.master')
@section('titleName')
    Product Detail
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
                <div class="product-details"><!--product-details-->
                <div class="col-sm-5">
                    <div class="view-product">
                    <img src="{{ asset($product_detail->product_image) }}" alt="" />
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="product-information"><!--/product-information-->
                    <img src="{{ asset('images/product-details/new.jpg') }}" class="newarrival" alt="" />
                    <h2>{{ $product_detail->product_name }}</h2>
                    <p>{{ $product_detail->product_description }}</p>
                    <img src="{{ asset('images/product-details/rating.png') }}" alt="" />
                    <span>
                        <form action="{{ url('product/addQuantityToCart') }}" method="post">
                            @csrf
                            <span>{{ $product_detail->product_price }}</span>
                            <label>Quantity:</label>
                            <input type="hidden" name="_id" value="{{ $product_detail->id }}">
                            <input type="number" name="product_quantity" value="1" />
                            <button type="submit" class="btn btn-fefault cart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </button>
                        </form>
                    </span>
                    <p><b>Category :</b> <a href="{{ url('category/product/'.$product_detail->category_id) }}" class="">{{ $product_detail->category->category_name }}</a></p>
                    <p><b>Condition:</b> New</p>
                    <p><b>Brand:</b> E-SHOPPER</p>
                    <a href=""><img src="{{ asset('images/product-details/share.png') }}" class="share img-responsive"  alt="" /></a>
                    </div><!--/product-information-->
                </div>
                </div><!--/product-details-->
            </div>
        </div>
    </div>
</section>

@endsection
