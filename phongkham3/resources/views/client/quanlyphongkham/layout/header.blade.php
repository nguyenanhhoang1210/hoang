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


					@if (Auth::guard('phongkham')->check())
					<li><a href=""><b>Chào bạn : </b><span style="font-size: 15px;font-weight: bold;"> {{Auth::guard('phongkham')->user()->tenphongkham}}</span></a></li>
					<li><a href="{{route('logout')}}"><b >Đăng xuất</b></a></li>
					<li><a href="{{route('trang-chu')}}"><b >Về trang chủ</b></a></li>
					@else
					<li><a href="{{route('login')}}">Đăng nhập</a></li>
					<li><a href="{{route('signin')}}">Đăng ký</a></li>
					@endif
				</ul>
				<div class="main-menu" style="margin-top: 20px ; padding-left: 150px;">
					<ul class="l-inline ov">
						<li><a href="{{route('danhsachchuyenkhoa')}}">Danh Sách Chuyên Khoa</a></li>
						<li><a href="{{route('danhsachdichvu')}}">Danh Sách Dịch Vụ</a></li>
						<li><a href="{{route('thongtinphongkham')}}">Quản lý thông tin </a></li>
						<li><a href="{{route('nvphongkham_quanly')}}">Quản lý nhân viên </a>
							<ul class="sub-menu">
								<li><a href="client/quanlyphongkham/nhanvien/them">Thêm nhân viên</a></li>
							</ul></li>
							<li><a href="{{route('thongtinbenhnhan')}}">Quản lý bệnh nhân </a></li>
							<li><a href="{{route('thongtincakham')}}">Quản lý lịch khám </a>
								<ul class="sub-menu">
									<li><a href="{{route('thongtincakham')}}">Xem ca khám</a>

									</li>
									<li><a href="{{route('thongtinlichnghi')}}">Quản lý lịch nghỉ khám</a>
										<ul class="sub-menu">
											<li><a href="client/quanlyphongkham/lichnghikham/them">Thêm lịch nghỉ khám</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li><a href="{{route('pkqlkhambenh')}}">Quản lý đăng ký khám bénh </a></li>
							<li><a href="{{route('thongtinbuongkham')}}">Quản lý buồng khám </a>
								<ul class="sub-menu">
									<li><a href="client/quanlyphongkham/buongkham/them">Thêm buồng khám</a></li>
								</ul>
							</li>
						</ul>
					</div>
					<!-- /main-menu -->
				</nav>
			</div>
		</div>
		<!-- /container -->
		</header