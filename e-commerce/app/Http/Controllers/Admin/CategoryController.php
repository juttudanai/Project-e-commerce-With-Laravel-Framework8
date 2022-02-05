<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function CategoryDashboard(){
        return view('admin.category.category')
        ->with('category',Category::all());
    }

    public function FormInsertCategory(){
        return view('admin.category.insertCategory');
    }
    public function addCategory(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories'
        ],[
            'category_name.required' => "* กรุณากรอกชื่อประเภทสินค้า",
            'category_name.unique' => "มีประเภทสินค้านี้ในระบบเเล้ว"
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('admin.category')->with('success', "เพิ่มประเภทสินค้าสำเร็จ");
    }

    public function editCategory($id){
        return view('admin.category.editCategory')
        ->with('category',Category::find($id));
    }
    public function updateCategory(Request $request,$id){
        $request->validate([
            'category_name' => 'required'
        ],[
            'category_name.required' => "* กรุณากรอกชื่อประเภทสินค้า"
        ]);
        Category::find($id)->update([
            'category_name' => $request->category_name
        ]);
        return redirect()->route('admin.category')->with('success',"อัพเดตข้อมูลสำเร็จ");
    }
    public function deleteCategory($id){
        $category = Category::find($id);
        if ($category->product->count() > 0) {
            return redirect()->back()->with('error',"ไม่สามารถลบข้อมูลได้ เนื่องจากมีสินค้าอยู่ภายในประเภทนี้ !");
        }else{
            Category::find($id)->forceDelete();
            return redirect()->back()->with('success', "ลบข้อมูลสำเร็จ");
        }
    }
}
