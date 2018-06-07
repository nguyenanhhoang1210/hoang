<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuanHuyen extends Model {
	protected $table = "devvn_quanhuyen";

	public function tinhthanh() {
		return $this->belongsTo('App\TinhThanh', 'matp', 'matp');
	}
	public function phuongxa() {
		return $this->hasMany('App\PhuongXa', 'maqh', 'xaid');
	}
	public function tkphongkham() {
		return $this->hasManyThrough('App\TKPhongKham', 'App\PhuongXa', 'maqh', 'xaid', 'id');
	}
}
