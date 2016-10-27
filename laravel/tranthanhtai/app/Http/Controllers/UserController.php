<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    public function getDangNhapAdmin()
    {
    	return view('admin.login');
    }

    public function postDangNhapAdmin(Request $request)
    {
    	$this->validate($request,
    		 [
                'email' =>  'required',
                'password'  =>  'required|min:3|max:32'
            ],
            [
                'email.required'    =>  'Bạn chưa nhập email',
                'password.required' =>  'Bạn chưa nhập password',
                'password.min'      =>  'Mật khẩu không được nhỏ hơn 3 ký tự.',
                'password.max'      =>  'Mật khẩu không được lớn hơn 32 ký tự',
            ]);
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
	        {
	            return redirect('admin/baiviet/danhsach');
	        }
	        else
	        {
	            return redirect('admin/dangnhap')->with('thongbao','Đăng nhập không thành công');
	        }
    }

    public function getDangXuatAdmin()
    {
        Auth::logout();
        return redirect('admin/dangnhap');
    }

    public function getThem()
    {
        return view('admin.user.them');
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'Name'          => 'required',
                'Email'         => 'required|min:3|max:100|unique:TheLoai,Ten',
                'Password'      => 'required|min:3'
            ],
            [
                'Name.required'     => 'Bạn chưa nhập tên',
                'Email.required'  =>  'Bạn chưa nhập email',
                'Email.min'       =>  'Tên email phải có độ dài từ 3 đến 100 ký tự',
                'Email.max'       =>  'Tên email phải có độ dài từ 3 đến 100 ký tự',
                'Email.unique'    =>  'Tên email đã tồn tại',
                'Password.required' =>'Bạn chưa nhập password',
                'Password.min'      =>'Password ít nhất 3 ký tự'
            ]);

       $user = new User();
       $user->name = $request->Name;
       $user->email = $request->Email;
       $user->password = bcrypt($request->Password);
       $user->save();

        return redirect('admin/user/them')->with('thongbao','Thêm Thành Công');
    }
}
