<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\BaiViet;
use App\TheLoai;

class PageController extends Controller
{
    //
    public function trangchu()
    {
    	$theloai = TheLoai::all();
    	$baiviet = BaiViet::orderBy('id','DESC')->paginate(3);
    	return view('pages.baiviet',['baiviet'=>$baiviet,'theloai'=>$theloai]);
    }
    public function chitietbaiviet($id)
    {
    	$theloai = TheLoai::all();
    	$baiviet = BaiViet::find($id);
    	return view('pages.chitiet',['baiviet'=>$baiviet,'theloai'=>$theloai]);
    }

    public function theloai($id)
    {   
        $theloai = TheLoai::all();
        $baiviet = BaiViet::orderBy('id','DESC')->where('idTheLoai','=',$id)->paginate(3);
        return view('pages.baiviet',['baiviet'=>$baiviet,'theloai'=>$theloai]);
    }

}
