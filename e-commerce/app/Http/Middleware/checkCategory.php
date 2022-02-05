<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Category;
class checkCategory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Category::all()->count() == 0){
            return redirect('admin/category/InsertCategory/')->with('error',"กรุณาเพิ่มประเภทสินค้าอย่างน้อย 1 รายการ");
        }else{
            return $next($request);
        }
    }
}
