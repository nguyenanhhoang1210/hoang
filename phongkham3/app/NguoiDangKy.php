<?php

namespace App;

use App\Notifications\NguoiDangKyResetPasswordNotification;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class NguoiDangKy extends Authenticatable {

	use Notifiable;
	protected $table      = "nguoidangky";
	protected $primaryKey = "madangky";
	protected $guard      = "nguoidangky";
	// public $timestamps = false;
	protected $fillable = [
		'hoten', 'email', 'password',
	];

	protected $hidden = [
		'password', 'remember_token',
	];

	public function dangkykhambenh() {
		return $this->hasMany('App\DangKyKhamBenh', 'madangky', 'makhambenh');
	}
	public function phieukhambenh() {
		return $this->hasMany('App\PhieuKhamBenh', 'madangky', 'maphieu');
	}
	public function sendPasswordResetNotification($token) {
		$this->notify(new NguoiDangKyResetPasswordNotification($token));
	}

}
