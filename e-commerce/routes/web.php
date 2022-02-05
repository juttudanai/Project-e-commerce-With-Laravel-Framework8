<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ShoppingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

    //index
    Route::get('/',[ShoppingController::class,'showShopping']);                                                                    //หน้าเเรก

    Route::get('product/productDetail/{id}',[ShoppingController::class, 'productDetail']);                                         //หน้าเเสดงรายละเอียดสินค้า
    Route::get('category/product/{id}',[ShoppingController::class,'listCategory']);                                                //หน้ารายการประเภทสินค้า
    Route::get('product/Search',[ShoppingController::class,'searchProduct']);                                                      //ค้นหาสินค้าจาก text box
    Route::get('product/searchPrice',[ShoppingController::class,'searchPrice']);                                                  //ค้นหาสินค้าจาก price range

    //cart & user
    Route::middleware(['auth'])->group(function(){
        // user
        Route::get('ProfileUser',[App\Http\Controllers\User\ProfileController::class,'index'])->name('user.profile');               //หน้าเเสดง profile user หลังจาก login
        Route::get('ProfileUser/editProfile/',[App\Http\Controllers\User\ProfileController::class,'editProfile']);                  //หน้าแบบฟอรืมเเก้ไขข้อมูล user
        Route::post('ProfileUser/updateProfile/{id}',[App\Http\Controllers\User\ProfileController::class,'updateProfile']);         //อัพเดตข้อมูล user
        Route::get('history/Payment',[App\Http\Controllers\User\ProfileController::class,'paymentUser']);                           //ไปยังประวัติการสั่งซื้อสินค้า
        route::get('history/Payment/detail/{id}',[App\Http\Controllers\User\ProfileController::class,'detailPaymentUser']);         //ไปยังหน้ารายละเอียดประวัติการซื้อสินค้า

        Route::get('showCart',[CartController::class,'showCart'])->name('showCart');                                                //ไปหน้า cart
        Route::get('cart/addItem/{id}',[CartController::class, 'insertCart']);                                                      //เพิ่มสินค้าลงตะกร้า
        Route::get('cart/cartIncrement/{id}',[CartController::class,'increment']);                                                  //กด + เพิ่มสินค้าหน้า Cart
        Route::get('cart/cartDecrement/{id}',[CartController::class,'decrement']);                                                  //กด - ลดสินค้าหน้า Cart
        Route::get('cart/deleteProduct/{id}',[CartController::class,'deleteProductFormCart']);                                      //ลบสินค้าจากตะกร้า
        Route::post('product/addQuantityToCart',[CartController::class,'insertQuantityToCart']);                                    //เพิ่มสินค้าหน้า productDetail แบบเพิ่มจำนวน
        Route::get('createOrder/checkout/',[CartController::class,'checkOut']);                                                     //หน้าแบบฟอร์มบันทึกข้อมูลลูกค้าก่อนสั่งซื้อสินค้า
        Route::post('createOrder/checkout/insertData',[CartController::class,'insertCheckout']);                                    //บันทึกข้อมูลการสั่งซื้อ
        Route::get('showPayment',[CartController::class,'showPayment']);                                                            //หน้าเเสดงข้อมูลการสั่งซื้อ

        Route::get('paymentreciept/{orderID}/{payerID}',[PaymentController::class, 'insertPayment']);                               //บันทึกข้อมูลการชำระเงินลงฐานข้อมูล
    });


//admin
Route::middleware(['isAdmin','auth'])->group(function(){
    Route::get('admin/dashboard',[DashboardController::class,'adminDashboard'])->name('admin.dashboard');                       //หน้าเเรก Admin
    // category
    Route::get('admin/category',[CategoryController::class,'CategoryDashboard'])->name('admin.category');                       //หน้า Category
    Route::get('admin/category/InsertCategory',[CategoryController::class,'FormInsertCategory'])->name('formInsertCategory');   //หน้าแบบฟอร์มเพิ่ม Category
    Route::post('admin/category/addcategory',[CategoryController::class,'addCategory'])->name('addCategory');                   //เพิ่มประเภทสินค้า
    Route::get('admin/category/editCategory/{id}',[CategoryController::class,'editCategory']);                                  //ส่งค่าเก่ากลับไปเเสดงผลก่อนอัพเดต
    Route::post('admin/category/update/{id}',[CategoryController::class,'updateCategory']);                                     //อัพเดต category
    Route::get('admin/category/delete/{id}',[CategoryController::class,'deleteCategory']);                                      //ลบ Category
    // product
    Route::get('admin/product',[ProductController::class,'ProductDashboard'])->name('admin.product');                           //หน้าเเรก product
    Route::get('admin/product/InsertProduct',[ProductController::class,'FormInsertProduct']);                                   //หน้าแบบฟอร์มเพิ่ม product
    Route::post('admin/product/addProduct',[ProductController::class,'addProduct'])->name('addProduct');                        //เพิ่มสืนค้า
    Route::get('admin/product/editProduct/{id}',[ProductController::class,'editProduct']);                                      //ส่งข้อมูลสินค้าเก่าไปเเสดงก่อนอัพเดต
    Route::post('admin/product/updateProduct/{id}',[ProductController::class,'updateProduct']);                                 //อัพเดตสินค้า
    Route::get('admin/product/delete/{id}',[ProductController::class,'deleteProduct']);                                         //ลบสินค้า
    // order
    Route::get('admin/order',[OrderController::class,'orderDashboard'])->name('admin.order');                                   //หน้ารายการสั่งซื้อ
    Route::get('admin/order/orderDetailProduct/{id}',[OrderController::class,'orderDetailProduct']);                            //เเสดงรายละเอียดสินค้าที่สั่งซื้อ
    Route::get('admin/order/orderDetailUser/{id}',[OrderController::class,'orderDetailUser']);                                    //เเสดงรายละเอียดลูกค้าที่สั่งสินค้า
    // payment
    Route::get('admin/payment',[PaymentController::class,'paymentDashboard'])->name('admin.payment');                           //หน้ารายการชำระเงิน
    // profile
    Route::get('admin/profile',[ProfileController::class,'profileAdmin'])->name('admin.profile');                                //หน้าprofile
    Route::get('admin/profile/editProfile',[ProfileController::class,'editProfile'])->name('admin.editProfile');                //หน้าแบบฟอร์มเเก้ไขข้อมูล admin
    Route::post('admin/profile/updateProfile/{id}',[ProfileController::class,'updateProfile']);
    // member
    Route::get('admin/member',[MemberController::class,'showMember'])->name('admin.member');                                                          //เเสดงรายการสมาชิก
});



