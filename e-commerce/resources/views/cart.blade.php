@extends('layouts.shopping.master')
@section('titleName')
    Cart
@endsection
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description">Product Name</td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItem->item as $cart)
                        <tr>
                            <td class="cart_product">
                                <a href="{{ url('product/productDetail/'.$cart['data']['id']) }}"><img src="{{ asset($cart['data']['product_image']) }}" width="70px" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="{{ url('product/productDetail/'.$cart['data']['id']) }}">{{ $cart['data']['product_name'] }}</a></h4>
                                <p>{{ Str::limit($cart['data']['product_description'], 30, '...') }}</p>
                            </td>
                            <td class="cart_price">
                                <p>{{ number_format($cart['data']['product_price'],2) }}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href="{{ url('cart/cartIncrement/'.$cart['data']['id']) }}"> + </a>
                                    <input class="cart_quantity_input" type="text" name="quantity" value="{{ $cart['quantity'] }}" autocomplete="off" size="2">
                                    <a class="cart_quantity_down" href="{{ url('cart/cartDecrement/'.$cart['data']['id']) }}"> - </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{ number_format($cart['price']) }}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{ url('cart/deleteProduct/'.$cart['data']['id']) }}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <section id="do_action">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="total_area">
                        <ul>
                            <li>Total Quantity <span>{{ $cartItem->totalQuantity }}</span></li>
                            <li>Total Price <span>{{ number_format($cartItem->totalPrice,2) }}</span></li>
                        </ul>
                            <a class="btn btn-default check_out" href="{{ url('createOrder/checkout/') }}">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
