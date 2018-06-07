@extends('master')
@section('content')
<main>
		<div id="breadcrumb">
			<div class="container">
				<ul>
					<li><a href="#">Trang chủ</a></li>
					<li><a href="#">Danh sách</a></li>
					<li>Page active</li>
				</ul>
			</div>
		</div>
		<!-- /breadcrumb -->

		<div class="container margin_60">
			<div class="row">
				<div class="col-xl-12 col-lg-12">
					<nav id="secondary_nav">
						<div class="container">
							<ul class="clearfix">
								<li><a href="#section_1" class="active">Thông tin phòng khám</a></li>
								
								<li><a href="#sidebar">Booking</a></li>
							</ul>
						</div>
					</nav>
					<div id="section_1">
						<div class="box_general_3">
							<div class="profile">
								<div class="row">
									
									<div class="col-lg-5 col-md-4">

										<figure>
											<img src="source/img/{{$phongkham->hinhanh}}" alt="" class="img-fluid" />
										</figure>
									</div>

									<div class="col-lg-7 col-md-8">
										
										<h1>{{$phongkham->tenphongkham}}</h1>
										<span class="rating">
											<i class="icon_star voted"></i>
											<i class="icon_star voted"></i>
											<i class="icon_star voted"></i>
											<i class="icon_star voted"></i>
											<i class="icon_star"></i>
											<small>(145)</small>
											<a href="./badges.html" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="./img/badges/badge_1.svg" width="15" height="15" alt="" /></a>
										</span>
										<ul class="statistic">
											<li>854 Views</li>
											<li>124 Patients</li>
										</ul>
										<ul class="contacts">
											<li>
												<h6>Địa chỉ</h6>
												{{$phongkham->diaChiChiTiet}}
												<a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x0:0xa6a9af76b1e2d899!2sAssistance+%E2%80%93+H%C3%B4pitaux+De+Paris!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="_blank"> <strong>View on map</strong></a>
											</li>
											<li>
												<h6>Phone</h6> <a href="tel://000434323342">{{$phongkham->Sdt}}</a> </li>
											
											<a href="page/datkham/{{$phongkham->id}}"  class="btn btn-success  " >Đặt ngay</a>
										</ul>
										@if(session('thongbao'))
                <div class="alert alert-success">
                   {{ session('thongbao') }}
                </div>
                @endif
									</div>
								</div>
								
							</div>
							
							<hr />
							
							<!-- /profile -->
							<div class="indent_title_in">
								<i class="pe-7s-user"></i>
								<h3>Giới thiệu </h3>
								<p>Tổng quát về phòng khám và các chuyên khoa , dịch vụ của phòng khám</p>
							</div>
							<div class="wrapper_indent">
								<p>{{$phongkham->ghichu}} </h6>
								
								<!-- /row-->
							</div>
							<!-- /wrapper indent -->

							<hr />

							<div class="indent_title_in">
								<i class="pe-7s-news-paper"></i>
								<h3>Chuyên khoa</h3>
								
							</div>
							<div class="wrapper_indent">
								
								<h6>Danh mục chuyên khoa :</h6>
								<ul class="list_edu">
									@foreach($chuyenkhoa as $ck)
									<li><strong>{{$ck->Ten}}</strong> </li>@endforeach
									
								</ul>
							</div>
							<!--  End wrapper indent -->

							<hr />

							<div class="indent_title_in">
								<i class="pe-7s-cash"></i>
								<h3>Dịch vụ</h3>
								<p>Các loại dịch vụ của phòng khám</p>
							</div>
							<div class="wrapper_indent">
								
								
								<h6>Danh mục dịch vụ :</h6>
								<br>
								<ul class="list_edu">
									@foreach($dichvu as $dv)
									<li><strong>{{$dv->Ten}}</strong> </li>@endforeach
									
								</ul>
							</div>
							<!--  /wrapper_indent -->
						</div>
						<!-- /section_1 -->
					</div>
					<!-- /box_general -->
					
					<div id="section_2">
						<div class="box_general_3">
							<div class="reviews-container">
								<div class="row">
									<div class="col-lg-3">
										<div id="review_summary">
											<strong>4.7</strong>
											<div class="rating">
												<i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
											</div>
											<small>Based on 4 reviews</small>
										</div>
									</div>
									<div class="col-lg-9">
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong>5 stars</strong></small></div>
										</div>
										<!-- /row -->
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong>4 stars</strong></small></div>
										</div>
										<!-- /row -->
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong>3 stars</strong></small></div>
										</div>
										<!-- /row -->
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong>2 stars</strong></small></div>
										</div>
										<!-- /row -->
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: 0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong>1 stars</strong></small></div>
										</div>
										<!-- /row -->
									</div>
								</div>
								<!-- /row -->

								<hr />

								@if(Auth::guard('nguoidangky')->check())
            <div class="well">
               
   
                <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                <form role="form" action="comment/{{ $phongkham->id }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <textarea class="form-control" name="noidung" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </form>
            </div>
            @endif
            <hr>

            <!-- Posted Comments -->

            <!-- Comment -->
            
								<!-- End review-box -->
									
								<div class="review-box clearfix">
									@foreach($comment as $comment)

										<div class="rev-info">
											<a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" style="padding-right: 15px;" alt="">
                </a>
											{{$comment->hoten}} - {{$comment->created_at}}
											
										</div>
										<div class="rev-text" style="padding-left: 80px;">
											<p>
												{{$comment->noidung}}
											</p>
										</div>
										@endforeach
									</div>
								</div>
								<!-- End review-box -->

								
							</div>
							<!-- End review-container -->
						</div>
					</div>
					<!-- /section_2 -->
				</div>
				<!-- /col -->
				
				<!-- /asdide -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!-- Back to top button -->

	<!-- COMMON SCRIPTS -->
	<script src="assets2/cdn-cgi/scripts/84a23a00/cloudflare-static/email-decode.min.js"></script><script src="assets2/js/jquery-2.2.4.min.js"></script>
	<script src="assets2/js/common_scripts.min.js"></script>
	<script src="assets2/js/functions.js"></script>
   	
	<!-- SPECIFIC SCRIPTS -->
    <script src="assets2/js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
			todayHighlight: true,
			daysOfWeekDisabled: [0],
			weekStart: 1,
			format: "yyyy-mm-dd",
			datesDisabled: ["2017/10/20", "2017/11/21", "2017/12/21", "2018/01/21", "2018/02/21", "2018/03/21"],
		});
	</script>
	</main>
	@endsection
