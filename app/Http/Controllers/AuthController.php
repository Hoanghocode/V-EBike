<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use App\Roles;

class AuthController extends Controller
{
    public function register_auth(){
        return view('admin.auth.register');
    }
    public function register(Request $request){
        $this->validation($request);
        $data = $request->all();
         $admin = new Admin();
         $admin->admin_name = $data['admin_name'];
         $admin->admin_email = $data['admin_email'];
         $admin->admin_password = md5($data['admin_password']);
         $admin->admin_phone = $data['admin_phone'];
         $admin->save();
         return redirect('register-auth')->with('message', 'Đăng ký tài khoản quản trị thành công   ');
         


        
    }
    public function validation($request){
        return $this->validate($request,[
            'admin_name' => 'required|max:255',
            'admin_password' => 'required|max:255',
            'admin_email' => 'required|email|max:255',
            'admin_phone' => 'required|max:255',
            ]);
    }
    public function login_auth(){
        return view('admin.auth.login_auth');
    }
    public function login(Request $request){
        $this->validate($request,[

            'admin_password' => 'required|max:255',
            'admin_email' => 'required|email|max:255',
         
            ]);
            
            if(Auth::attempt(['admin_email'=>$request->admin_email , 'admin_password' => $request->admin_password])){
return  redirect('dashboard');

            }else{
                return redirect('login-auth')->with('message','lỗi đăng nhập xin kiểm tra lại nhé');
            }
        return view('admin.auth.login_auth');
    }
}
