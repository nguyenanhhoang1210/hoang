<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HopDong extends Model {
	protected $table      = "hopdong";
	protected $primaryKey = "maHD";
	protected $keyType    = "String";
	public function phongkham() {
		return $this->belongsTo('App\PhongKham', 'idPhongKham', 'id');
	}
	public function giahanhopdong() {
		return $this->hasMany('App\GiaHanHopDong', 'maHD', 'maGH');
	}

}
