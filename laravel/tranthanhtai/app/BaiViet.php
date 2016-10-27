<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    //
    protected $table="BaiViet";
    public $timestamps = true;

    public function theloai()
    {
    	return $this->belongsTo('App\TheLoai','idTheLoai','id');
    }
}
