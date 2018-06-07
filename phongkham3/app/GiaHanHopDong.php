<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaHanHopDong extends Model {
	protected $table      = "giahanhopdong";
	protected $primaryKey = "maGH";
	protected $keyType    = "String";
	public $timestamps    = false;
	public function hopdong() {
		return $this->belongsTo('App\HopDong', 'maHD', 'maHD');
	}

}