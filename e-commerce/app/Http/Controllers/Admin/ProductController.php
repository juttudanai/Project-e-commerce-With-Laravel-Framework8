<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkCategory')->only(['FormInsertProduct']);
    }

    public function ProductDashboard(){
        return view('admin.product.product')
        ->with('products',Product::all());
    }

    public function FormInsertProduct(){
        return view('admin.product.insertProduct')
        ->with('category',Category::all());
    }

    public function addProduct(Request $request){
        $request->validate([
            'product_name' => "required|unique:products",
            'product_description' => "required",
            'product_price' => 'required|integer',
            'category_id'   => "required",
            'product_image' => "required|mimes:jpg,png,jpeg"
        ],[
            'product_name.required' => "* กรุณากรอกชื่อสินค้า",
            'product_name.unique' => "* มีสินค้านี้ในระบบเเล้ว",
            'product_description.required' => "* กรุณากรอกคำอธิบายสินค้า",
            'product_price.required' => "* กรุณากรอกราคาสินค้า",
            'product_price.integer' => "* ราคาต้องเป็นตัวเลขเท่านั้น",
            'category_id.required' => "กรุณาเลือกประเภทสินค้า",
            'product_image.required' => "กรุณาอัพโหลดรูปภาพสินค้า",
            'product_image.mimes' => "ชนิดของรูปภาพต้องมีนามสกุลเป็น JPG, PNG, JPEG เท่านั้น"
        ]);
        $product_image = $request->file('product_image');
        $image_encode = hexdec(uniqid());
        $image_extension = strtolower($product_image->getClientOriginalExtension());
        $fullname_image = $image_encode.'.'.$image_extension;
        $path_location = 'images/products/';
        $fullpath_location = $path_location.$fullname_image;
        Product::insert([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            'category_id' => $request->category_id,
            'product_image' => $fullpath_location
        ]);
        $product_image->move($path_location, $fullname_image);
        return redirect()->route('admin.product')->with('success', "บันทึกข้อมูลสินค้าสำเร็จ");
    }

    public function editProduct($id){
        return view('admin.product.editProduct')
        ->with('product',Product::find($id))
        ->with('category',Category::all());
    }

    public function updateProduct(Request $request, $id){
        if ($request->product_image) {
            $request->validate([
                'product_name' => "required",
                'product_description' => "required",
                'product_price' => 'required',
                'category_id'   => "required",
                'product_image' => "required|mimes:jpg,png,jpeg"
            ],[
                'product_name.required' => "* กรุณากรอกชื่อสินค้า",
                'product_description.required' => "* กรุณากรอกคำอธิบายสินค้า",
                'product_price.required' => "* กรุณากรอกราคาสินค้า",
                'category_id.required' => "กรุณาเลือกประเภทสินค้า",
                'product_image.required' => "กรุณาอัพโหลดรูปภาพสินค้า",
                'product_image.mimes' => "ชนิดของรูปภาพต้องมีนามสกุลเป็น JPG, PNG, JPEG เท่านั้น"
            ]);
            $product_image = $request->file('product_image');
            $image_encode = hexdec(uniqid());
            $image_extension = strtolower($product_image->getClientOriginalExtension());
            $fullname_image = $image_encode.'.'.$image_extension;
            $path_location = 'images/products/';
            $fullpath_location = $path_location.$fullname_image;
            Product::find($id)->update([
                'product_name' => $request->product_name,
                'product_description' => $request->product_description,
                'product_price' => $request->product_price,
                'category_id' => $request->category_id,
                'product_image' => $fullpath_location,
                'updated_at' => Carbon::now()
            ]);
            unlink($request->old_image);
            $product_image->move($path_location, $fullname_image);
            return redirect()->route('admin.product')->with('success', "อัพเดตข้อมูลสินค้าสำเร็จ");
        }else{
            $request->validate([
                'product_name' => "required",
                'product_description' => "required",
                'product_price' => 'required',
                'category_id'   => "required"
            ],[
                'product_name.required' => "* กรุณากรอกชื่อสินค้า",
                'product_description.required' => "* กรุณากรอกคำอธิบายสินค้า",
                'product_price.required' => "* กรุณากรอกราคาสินค้า",
                'category_id.required' => "กรุณาเลือกประเภทสินค้า"
            ]);
            Product::find($id)->update([
                'product_name' => $request->product_name,
                'product_description' => $request->product_description,
                'product_price' => $request->product_price,
                'category_id' => $request->category_id,
                'updated_at' => Carbon::now()
            ]);
            return redirect()->route('admin.product')->with('success', "อัพเดตข้อมูลสินค้าสำเร็จ");
        }
    }

    public function deleteProduct($id){
        $product_image = Product::find($id)->product_image;
        unlink($product_image);

        Product::find($id)->forceDelete();
        return redirect()->back()->with('success',"ลบสินค้าสำเร็จ");
    }
}

