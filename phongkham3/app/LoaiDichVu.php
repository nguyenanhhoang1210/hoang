<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiDichVu extends Model {
	protected $table = "LoaiDichVu";

	public function dichvu() {
		return $this->hasMany('App\DichVu', 'idLoai', 'id');
	}
}