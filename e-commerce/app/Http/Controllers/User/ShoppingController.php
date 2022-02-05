<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ShoppingController extends Controller
{
    public function showShopping(){
        $cart = Session::get('Cart');
        return view('index')
        ->with('cartItem',$cart)
        ->with('category',Category::all()->sortBy('category_name'))
        ->with('products',Product::orderBy('product_price')->paginate(6));
    }

    public function productDetail($id){
        $cart = Session::get('Cart');
        return view('product_detail')
        ->with('cartItem',$cart)
        ->with('category',Category::all())
        ->with('product_detail',Product::find($id));
    }

    public function listCategory($id){
        $cart = Session::get('Cart');
        $category = Category::find($id);
        return view('category_detail')
        ->with('cartItem',$cart)
        ->with('category',Category::all()->sortBy('category_name'))
        ->with('products',$category->product()->paginate(3))
        ->with('category_name',Category::find($id));
    }
    public function searchProduct(Request $request){
        $cart = Session::get('Cart');
        $search = $request->search;
        $products = Product::where('product_name',"LIKE","%{$search}%")->orderBy('product_price');
        return view('searchProduct')
        ->with('cartItem',$cart)
        ->with('category',Category::all()->sortBy('category_name'))
        ->with('products',$products->paginate(3));
    }
    public function searchPrice(Request $request){
        $cart = Session::get('Cart');
        $searchPrice = explode(",",$request->searchPrice);
        // print_r($searchPrice);
        $search = Product::whereBetween('product_price',$searchPrice)->orderBy('product_price');
        return view('index')
        ->with('cartItem',$cart)
        ->with('category',Category::all())
        ->with('products',$search->paginate(3));
    }
}
