<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiNhanVien extends Model
{
    protected $table = "loainhanvien";
    protected $primaryKey = "maloai";
    public $timestamps = false;

    public function nhanvienphongkham(){
        return $this->hasMany('App\NhanVienPhongKham','maloai','manv');
    }
    
}