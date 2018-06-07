<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaKham extends Model
{
    protected $table = "cakham";
    protected $primaryKey = "maca";
    public $timestamps = false;

    public function dangkykhambenh(){
        return $this->hasMany('App\DangKyKhamBenh','maca','makhambenh');
    }
    public function lichnghikham(){
        return $this->belongsTo('App\CaKham','maca','malich');
    }
    
}