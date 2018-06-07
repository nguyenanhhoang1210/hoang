<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinhThanh extends Model {
	protected $table = "devvn_tinhthanhpho";

	public function quanhuyen() {
		return $this->hasMany('App\QuanHuyen', 'matp', 'maqh');
	}
	public function phuongxa() {
		return $this->hasManyThrough('App\PhuongXa', 'App\QuanHuyen', 'matp', 'maqh', 'xaid');
	}
	public function tkphongkham() {
		return $this->hasManyThrough('App\TKPhongKham', 'App\PhuongXa', 'App\QuanHuyen', 'matp', 'maqh', 'xaid', 'id');
	}
}
