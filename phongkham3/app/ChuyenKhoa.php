<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuyenKhoa extends Model {
	protected $table = "ChuyenKhoa";

	public function dichvu() {
		return $this->hasMany('App\DichVu', 'idKhoa', 'id');
	}
	public function chuyenkhoaphongkham() {
		return $this->hasMany('App\ChuyenKhoaPhongKham', 'id', 'id');
	}
}