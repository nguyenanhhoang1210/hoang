<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LichNghiKham extends Model
{
    protected $table = "lichnghikham";
    protected $primaryKey = "malich";
    public $timestamps = false;

    public function cakham(){
        return $this->hasMany('App\CaKham','malich','maca');
    }
    
}