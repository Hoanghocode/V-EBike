<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $admin = Admin::with('roles')->orderby('admin_id', 'desc')->paginate(5);
        return view('admin.users.all_users', compact('admin'));
    }
    public function add_users(){
        return view('admin.users.add_users');
    }
  
    public function store_users(Request $request){
        $data = $request->all();
        $admin = new Admin();
        $admin->admin_name = $data['admin_name'];
        $admin->admin_phone = $data['admin_phone'];
        $admin->admin_email = $data['admin_email'];
        $admin->admin_password = md5($data['admin_password']);
        $admin->save();
        $admin->roles()->attach(Roles::where('name','user')->first());
        Session()->put('message','Thêm users thành công');
        return Redirect('user');
    }
    public function delete_user_roles($admin_id){
    if(Auth::id() == $admin_id){
        return Redirect('user')->with('message', 'Bạn không được quyền xóa chính mình');
    }
    
    $admin = Admin::find($admin_id);
    if($admin){
        $admin->roles()->detach();  // Corrected the method name to detach()
        $admin->delete();
    }
   
    return Redirect()->back()->with('message', 'Xóa user thành công');
}
public function assign_roles(Request $request){
  
   
        if(Auth::id() == $request->admin_id){
        return Redirect('user')->with('message', 'Bạn không được phân quyền chính mình');
    }
        $data = $request->all();
        $user = Admin::where('admin_email',$data['admin_email'])->first();
        $user->roles()->detach();
        if($request['author_role']){
           $user->roles()->attach(Roles::where('name','author')->first());     
        }
        if($request['user_role']){
           $user->roles()->attach(Roles::where('name','user')->first());     
        }
        if($request['admin_role']){
           $user->roles()->attach(Roles::where('name','admin')->first());     
        }
        return redirect()->back();
    }
}
