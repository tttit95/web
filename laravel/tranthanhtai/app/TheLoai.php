<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    //
    protected $table = "TheLoai";
    public $timestamps = true;

    public function baiviet()
    {
    	return $this->hasMany('App\BaiViet','idTheLoai','id');
    }
}
