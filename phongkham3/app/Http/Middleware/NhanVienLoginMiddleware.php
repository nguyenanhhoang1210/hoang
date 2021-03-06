<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class NhanVienLoginMiddleware {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		if (Auth::check()) {
			view()->share('user_login', Auth::user());
		}
		if (Auth::check()) {
			$user = Auth::user();
			if ($user->quyen == 0) {
				return $next($request);
			} else {
				return redirect('sever/dangnhap');
			}
		} else {

			return redirect('sever/dangnhap');

		}
	}
}
