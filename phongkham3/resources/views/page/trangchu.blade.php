@extends('master')
@section('content')
	<main>
		<div class="hero_home version_3">
			<div class="content">
				<h3>Tìm phòng khám !</h3>
				<p>
					Nhập tên phòng khám mà bạn cần tìm vào ô phía dưới .
				</p>
				<a href="{{route('danhsachphongkham')}}" class="btn_1 medium">Xem tất cả phòng khám</a>
				<br>
				<br>
				<form role="search" method="get" id="searchform" action="{{route('search')}}" />
						<div id="custom-search-input">
							<div class="input-group">
								<input type="text" name="key" class=" search-query" placeholder="Ex. Name, Specialization ...." />
								<input type="submit" class="btn_search" value="Search" />
							</div>
							
						</div>
					</form>
			</div>
		</div>
		<!-- /Hero -->

		<div class="container margin_120_95">
			<div class="main_title">
				<h2>Ứng dụng đặt lịch khám  <strong> online </strong> !</h2>
				<p>Ứng dụng giúp bạn có thể đặt lịch khám mọi lúc , mọi nơi , nhanh chóng , tiện lợi</p>
			</div>
			<div class="row add_bottom_30">
				<div class="col-lg-4">
					<div class="box_feat" id="icon_1">
						<span></span>
						<h3>Tìm phòng khám</h3>
						<p>Bạn có thể tìm kiếm phòng khám ở dòng phía trên website hoặc tìm theo menu phía dưới website</p>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="box_feat" id="icon_2">
						<span></span>
						<h3>Xem thông tin phòng khám</h3>
						<p>Bạn có thể xem thông tin phòng khám mà mình muốn đặt lịch </p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="box_feat" id="icon_3">
						<h3>Đặt lịch khám</h3>
						<p>Lưu ý : Cần phải đăng nhập trước khi đặt lịch khám .</p>
					</div>
				</div>
			</div>
			<!-- /row -->
			<p class="text-center"><a href="{{route('danhsachphongkham')}}" class="btn_1 medium">Tìm phòng khám</a></p>

		</div>
		<!-- /container -->

		<div class="bg_color_1">
			<div class="container margin_120_95">
				<div class="main_title">
					<h2>Danh sách phòng khám</h2>
					<p>Một vài phòng khám tiêu biểu của hệ thống </p>
				</div>
				<div class="row">
					@foreach($phongkham as $pk)
					<div class="col-lg-4 col-md-6">
						<div class="box_list home">
							<a href="#0" data-toggle="tooltip" data-placement="top" title="Add to wishlist" class="wish_bt"></a>
							<figure>

								<a href="{{route('chitietphongkham',$pk->id)}}"><img src="source/img/{{$pk->hinhanh}}" class="img-fluid" alt="" style="height: 250px; width: 700px;" /></a>
								<div class="preview"><a href="{{route('chitietphongkham',$pk->id)}}"><span>Read more</span></a></div>
							</figure>
							<div class="wrapper">
								
								<h3>{{$pk->tenphongkham}}</h3>
								<br>
								<p style="font-size: 13px;">Số điện thoại :{{$pk->Sdt}}</p>
								<p style="font-size: 13px;">Địa chỉ : {{$pk->diaChiChiTiet}}</p>
								<p><small>{{$pk->ghichu}}</small></p>
								<span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></span>
								<a href="#0" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="assets2/img/badges/badge_1.svg" width="15" height="15" alt="" /></a>
							</div>
							<ul>
								<li><i class="icon-eye-7"></i> 854 Views</li>
								<li><a href="{{route('chitietphongkham',$pk->id)}}">Đặt ngay</a></li>
							</ul>
						</div>
					</div>
                    @endforeach
					
				</div>
				<!-- /row -->
				<p class="text-center add_top_30"><a href="{{route('danhsachphongkham')}}" class="btn_1 medium">Xem danh sách tất cả phòng khám</a></p>
			</div>
			<!-- /container -->
		</div>
		<!-- /white_bg -->

		<div class="container margin_120_95">
			<div class="main_title">
				<h2>Tìm phòng khám</h2>
				<p>Quý khách có thể tìm phòng khám theo khu vực của mình hoặc tìm theo chuyên khoa cần khám</p>
			</div>
			<div class="row justify-content-center">
				<div class="col-xl-4 col-lg-5 col-md-6">
					<div class="list_home">
						<div class="list_title">
							<i class="icon_pin_alt"></i>
							<h3>Tìm theo khu vực</h3>
						</div>
						<br>
						<br>
						
						  <form action="{{route('search')}}" method="POST">
						
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
						<div class="form-group">
                        <label>Tỉnh/Thành Phố</label>
                        <br>
                        <select class="form-control" name="idTinhThanh" id="TinhThanh" required="">
                            <option value="">Chọn tỉnh hoặc thành phố</option>
                            @foreach($tinhthanh as $tt)
                            <option value="{{ $tt->matp }}">{{ $tt->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                  
                    <div class="form-group">
                        <label>Quận/Huyện</label>
                        <br>
                        <select class="form-control" name="idQuanHuyen" id="QuanHuyen" required="">
                            <option value="">Chọn quận hoặc huyện</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Phường/Xã</label>
                        <select class="form-control" name="idPhuongXa" id="PhuongXa" required="">
                            <option value="">Chọn phường hoặc xã</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Tìm kiếm</button>
					</div>
				</div>
				<div class="col-xl-4 col-lg-5 col-md-6">
					<div class="list_home">
						<div class="list_title">
							<i class="icon_archive_alt"></i>
							<h3>Tìm theo chuyên khoa</h3>
						</div>
						<ul>
							@foreach($chuyenkhoa as $chuyenkhoa)
							<li><a href="page/timkiem/{{$chuyenkhoa->id}}"><strong>{{$chuyenkhoa->id}}</strong>{{$chuyenkhoa->Ten}}</a></li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->

		<div id="app_section">
			<div class="container">
				<div class="row justify-content-around">
					<div class="col-md-5">
						<p><img src="assets2/img/app_img.svg" alt="" class="img-fluid" width="500" height="433" /></p>
					</div>
					<div class="col-md-6">
						<small>Application</small>
						<h3>Download <strong>Findoctor App</strong> Now!</h3>
						<p class="lead">Tota omittantur necessitatibus mei ei. Quo paulo perfecto eu, errem percipit ponderum no eos. Has eu mazim sensibus. Ad nonumes dissentiunt qui, ei menandri electram eos. Nam iisque consequuntur cu.</p>
						<div class="app_buttons wow" data-wow-offset="100">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 43.1 85.9" style="enable-background:new 0 0 43.1 85.9;" xml:space="preserve">
							<path stroke-linecap="round" stroke-linejoin="round" class="st0 draw-arrow" d="M11.3,2.5c-5.8,5-8.7,12.7-9,20.3s2,15.1,5.3,22c6.7,14,18,25.8,31.7,33.1"></path>
							<path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-1" d="M40.6,78.1C39,71.3,37.2,64.6,35.2,58"></path>
							<path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-2" d="M39.8,78.5c-7.2,1.7-14.3,3.3-21.5,4.9"></path>
						</svg>
							<a href="#0" class="fadeIn"><img src="assets2/img/apple_app.png" alt="" width="150" height="50" data-retina="true" /></a>
							<a href="#0" class="fadeIn"><img src="assets2/img/google_play_app.png" alt="" width="150" height="50" data-retina="true" /></a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /app_section -->
	</main>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $("#TinhThanh").change(function(){
                var matp = $(this).val();
                $.get("ajax/quanhuyen/"+matp,function(data){
                    $("#QuanHuyen").html(data);
                });
            });
        });
        $(document).ready(function(){
            $("#QuanHuyen").change(function(){
                var maqh = $(this).val();
                $.get("ajax/phuongxa/"+maqh,function(data){
                    $("#PhuongXa").html(data);
                });
            });
        });
    </script>
@endsection