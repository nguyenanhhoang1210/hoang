<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuyenKhoaPhongKham extends Model {
	protected $table      = "chuyenkhoaphongkham";
	protected $primaryKey = "idckpk";
	public $timestamps    = false;

	public function phongkham() {
		return $this->belongsTo('App\PhongKham', 'idPhongKham', 'id');
	}
	public function chuyenkhoa() {
		return $this->belongsTo('App\ChuyenKhoa', 'idKhoa', 'id');
	}

}