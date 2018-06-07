<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DichVu extends Model {
	protected $table = "DichVu";
	   protected $primaryKey = "id";
	public function loaidichvu() {
		return $this->belongsTo('App\LoaiDichVu', 'idLoai', 'id');
	}
   public function dichvuphongkham() {
		return $this->hasMany('App\DichVuPhongKham', 'id', 'madichvu');
	}
}