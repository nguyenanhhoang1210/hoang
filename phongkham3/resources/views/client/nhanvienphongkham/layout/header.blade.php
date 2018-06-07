<header class="header_sticky">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-6">
					<div id="logo_home">
						<h1><a href="index.html" title="Findoctor">Findoctor</a></h1>
					</div>
				</div>
				<nav class="col-lg-9 col-6">
					<a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="#0"><span>Menu mobile</span></a>
					<ul id="top_access">
					

						@if (Auth::guard('nhanvienphongkham')->check())
						<li><a href="{{route('thongtinnv')}}"><b>Chào bạn : </b><span style="font-size: 22px;font-weight: bold;"> {{Auth::guard('nhanvienphongkham')->user()->tennhanvien}}</span></a>
						</li>
						<li><a href="{{route('thongtinnv')}}"><b>Quản lý thông tin </b></a></li>
						<li><a href="{{route('logout')}}"><b>Đăng xuất</b></a></li>
						
						@else
						<li><a href="{{route('login')}}">Đăng nhập</a></li>
						<li><a href="{{route('signin')}}">Đăng ký</a></li>
						@endif
					</ul>

					<!-- /main-menu -->
				</nav>
			</div>
		</div>
		<!-- /container -->
	</header