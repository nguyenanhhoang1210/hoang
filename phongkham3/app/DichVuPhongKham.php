<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DichVuPhongKham extends Model {
	protected $table      = "dichvuphongkham";
	protected $primaryKey = "iddvpk";
	public $timestamps    = false;

	public function phongkham() {
		return $this->belongsTo('App\PhongKham', 'maphongkham', 'id');
	}
	public function dichvu() {
		return $this->belongsTo('App\DichVu', 'id', 'iddvpk');
	}

}