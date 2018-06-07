<header class="header_sticky">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-6">
					<div id="logo_home">
						<h1><a href="index.html" title="Findoctor">Findoctor</a></h1>
					</div>
					<ul class="nav navbar-nav pull-right" style="padding-top: 5px;">
        <li>
          <a>
            <script>
             dayName = new Array ("Chủ nhật","Thứ hai","Thứ ba","Thứ tư","Thứ năm","Thứ sáu","Thứ bảy")
                    monName = new Array ("1","2","3","4","5","6","7","8","9","10","11","12")
                    now = new Date
                    document.write("<font color=grey></b>"+now.getHours()+ ":" +now.getMinutes()+ " phút -  " +dayName[now.getDay()]+ ", " +now.getDate()+ "-" +monName[now.getMonth()]+ "-" +now.getFullYear()+ "</b></font>")
           </script>
          </a>
        </li>
    </ul>
				</div>
				<nav class="col-lg-9 col-6">
					<a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="#0"><span>Menu mobile</span></a>
					<ul id="top_access">
					

						@if (Auth::guard('nguoidangky')->check())
						<li><a href=""><b>Chào bạn : </b><span style="font-size: 15px;font-weight: bold;"> {{Auth::guard('nguoidangky')->user()->hoten}}</span></a></li>
						<li><a href="{{route('logout')}}"><b >Đăng xuất</b></a></li>
						<li><a href="{{route('trang-chu')}}"><b >Về trang chủ</b></a></li>
						@else
						<li><a href="{{route('login')}}">Đăng nhập</a></li>
						<li><a href="{{route('signin')}}">Đăng ký</a></li>
						@endif
					</ul>
					<div class="main-menu" style="margin-top: 20px;">
						<ul class="l-inline ov">
							<li><a href="{{route('ndk_quanly')}}">Quản lý thông tin người đăng ký</a></li>
							<li><a href="{{route('bn_quanly')}}">Quản lý bệnh nhân</a></li>
							<li><a href="{{route('qldangkykhambenh')}}">Quản lý đăng ký khám bệnh</a></li>
							
							
					</ul>
					</div>
					<!-- /main-menu -->
				</nav>
			</div>
		</div>
		<!-- /container -->
	</header