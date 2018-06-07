<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BenhNhan extends Model
{
    protected $table = "benhnhan";
    protected $primaryKey = "mabenhnhan";
     public $timestamps = false;
   
    public function dangkykhambenh(){
        return $this->hasMany('App\DangKyKhamBenh','mabenhnhan','makhambenh');
    }
    
}
