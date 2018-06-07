<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuongKham extends Model
{
    protected $table = "buongkham";
    protected $primaryKey = "mabuongkham";
    public $timestamps = false;

    public function nguoidangky(){
        return $this->hasMany('App\NguoiDangKy','mabuongkham','madangky');
    }
    public function phongkham()
	{
		return $this->belongsTo('App\PhongKham','id','mabuongkham');
	}
      public function phieukhambenh(){
        return $this->hasMany('App\PhieuKhamBenh','madangky','maphieu');
    }
}