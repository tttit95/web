<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use App\TheLoai;
Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix'=>'admin','middleware'=>'adminlogin'],function(){
	Route::group(['prefix'=>'theloai'],function(){
		Route::get('danhsach','TheLoaiController@getDanhSach');

		Route::get('them','TheLoaiController@getThem');
		Route::post('them','TheLoaiController@postThem');

		Route::get('sua/{id}','TheLoaiController@getSua');
		Route::post('sua/{id}','TheLoaiController@postSua');

		Route::get('xoa/{id}','TheLoaiController@getXoa');
		Route::post('xoa/{id}','TheLoaiController@postXoa');
	});
});

Route::group(['prefix'=>'admin','middleware'=>'adminlogin'],function(){
	Route::group(['prefix'=>'baiviet'],function(){
		Route::get('danhsach','BaiVietController@getDanhSach');

		Route::get('them','BaiVietController@getThem');
		Route::post('them','BaiVietController@postThem');

		Route::get('sua/{id}','BaiVietController@getSua');
		Route::post('sua/{id}','BaiVietController@postSua');

		Route::get('xoa/{id}','BaiVietController@getXoa');
		Route::post('xoa/{id}','BaiVietController@postXoa');
	});
});

Route::get('admin/dangnhap','UserController@getDangNhapAdmin');
Route::post('admin/dangnhap','UserController@postDangNhapAdmin');
Route::get('admin/dangxuat','UserController@getDangXuatAdmin');

Route::group(['prefix'=>'admin','middleware'=>'adminlogin'],function(){
	Route::group(['prefix'=>'user'],function(){
		Route::get('them','UserController@getThem');
		Route::post('them','UserController@postThem');
	});
});
Route::group(['prefix'=>'trangchu'],function(){
	Route::get('/','PageController@trangchu');
	route::get('theloai/{id}/{TenKhongDau}','PageController@theloai');
});
Route::get('baiviet/chitiet/{id}/{TenKhongDau}','PageController@chitietbaiviet');

