<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function profileAdmin(){
        return view('admin.profile.profileAdmin');
    }
    public function editProfile(){
        return view('admin.profile.formUpdateProfile');
    }
    public function updateProfile(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
            'againpassword' => 'required|min:8'
        ],[
            'name.required' => "* กรุณากรอกชื่อ",
            'email.required' => "* กรุณากรอกอีเมล",
            'password.required' => "* กรุณากรอกรหัสผ่าน",
            'password.min' => "* รหัสผ่านต้องมีความยาว 8 ตัวอักษร",
            'againpassword.required' => "* กรุณากรอกรหัสผ่าน",
            'againpassword.min' =>  "* รหัสผ่านต้องมีความยาว 8 ตัวอักษร"
        ]);

        if ($request->password == $request->againpassword) {
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->againpassword),
                'updated_at' => Carbon::now()
            ]);

            return redirect()->route('admin.profile')->with('success', "อัพเดทข้อมูลสำเร็จ");
        }else{
            return redirect()->back()->with('error' ,"รหัสผ่านไม่ตรงกัน");
        }
    }
}
