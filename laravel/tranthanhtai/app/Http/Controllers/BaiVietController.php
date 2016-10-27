<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\BaiViet;
use App\TheLoai;

class BaiVietController extends Controller
{
    //
    public function getDanhSach()
    {
    	$baiviet = BaiViet::orderBy('id','DESC')->paginate(10);

    	return view('admin.baiviet.danhsach',['baiviet'=>$baiviet]);
    }

    public function getThem()
    {
    	$theloai = TheLoai::all();
    	return view('admin.baiviet.them',['theloai'=>$theloai]);
    }

    public function postThem(Request $request)
    {
    	$this->validate($request,
    		[
    			'TieuDe' => 'required|unique:BaiViet,TieuDe',
    			'TomTat' => 'required',
    			'NoiDung'=> 'required',
    			'TheLoai'=>	'required'

    		],
    		[
    			'TieuDe.required'		=>	'Bạn chưa nhập tiêu đề',
    			'TieuDe.unique'			=>	'Tiêu đề bị trùng',
    			'TomTat.required'		=>	'Bạn chưa nhập tóm tắt',
    			'NoiDung.required'		=>	'Bạn chưa nhập nội dung',
    			'TheLoai.required'		=>	'Bạn chưa chọn thể loại'
    		]);

    	$baiviet = new BaiViet();
    	$baiviet->TieuDe = $request->TieuDe;
    	$baiviet->TieuDeKhongDau = changeTitle($request->TieuDe);
    	$baiviet->idTheLoai = $request->TheLoai;
    	$baiviet->TomTat = $request->TomTat;
    	$baiviet->NoiDung= $request->NoiDung;

    	if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');

            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect("admin/baiviet/them")->with('thongbao','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }

            $name = $file->getClientOriginalName();

            $Hinh = str_random(4)."_".$name;

            while (file_exists("upload/baiviet/".$name)) {
                # code...
                $Hinh = str_random(4)."_".$name;
            }
            $file->move('upload/baiviet',$Hinh);
            $baiviet->Hinh = $Hinh;

        }
        else
        {
            $baiviet->Hinh = "";
        }
        
        $baiviet->save();

        return redirect('admin/baiviet/them')->with('thongbao','Thêm Bài Viết Thành Công');
    }

    public function getSua($id)
    {
        $theloai = TheLoai::all();
        $baiviet = BaiViet::find($id);
        return view('admin.baiviet.sua',['baiviet'=>$baiviet,'theloai'=>$theloai]);
    }

    public function postSua(Request $request,$id)
    {
        $baiviet = BaiViet::find($id);
        $this->validate($request,
            [
                'TieuDe' => 'required|unique:BaiViet,TieuDe',
                'TomTat' => 'required',
                'NoiDung'=> 'required',
                'TheLoai'=> 'required'

            ],
            [
                'TieuDe.required'       =>  'Bạn chưa nhập tiêu đề',
                'TieuDe.unique'         =>  'Tiêu đề bị trùng',
                'TomTat.required'       =>  'Bạn chưa nhập tóm tắt',
                'NoiDung.required'      =>  'Bạn chưa nhập nội dung',
                'TheLoai.required'      =>  'Bạn chưa chọn thể loại'
            ]);

        $baiviet->TieuDe = $request->TieuDe;
        $baiviet->TieuDeKhongDau = changeTitle($request->TieuDe);
        $baiviet->idTheLoai = $request->TheLoai;
        $baiviet->TomTat = $request->TomTat;
        $baiviet->NoiDung = $request->NoiDung;

        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');

            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect("admin/baiviet/sua")->with('thongbao','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }

            $name = $file->getClientOriginalName();

            $Hinh = str_random(4)."_".$name;

            while (file_exists("upload/baiviet/".$name)) {
                # code...
                $Hinh = str_random(4)."_".$name;
            }
            $file->move('upload/baiviet',$Hinh);
            if ($baiviet->Hinh != null) {
                unlink("upload/baiviet/".$baiviet->Hinh);
            }
            
            $baiviet->Hinh = $Hinh;

        }
        $baiviet->save();

        return redirect('admin/baiviet/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {
        $baiviet = BaiViet::find($id);
        $theloai = TheLoai::all();
        return view('admin.baiviet.xoa',['baiviet'=>$baiviet,'theloai'=>$theloai]);
    }

    public function postXoa($id)
    {
        $baiviet = BaiViet::find($id);
        $baiviet->delete();
        return redirect('admin/baiviet/danhsach')->with('thongbao','Xóa Thành Công');
    }
}
