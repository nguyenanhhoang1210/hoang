<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhuongXa extends Model {
	protected $table = "devvn_xaphuongthitran";

	public function quanhuyen() {
		return $this->belongsTo('App\QuanHuyen', 'maqh', 'maqh');
	}
	public function tkphongkham() {
		return $this->hasMany('App\TKPhongKham', 'xaid', 'id');
	}
}