@extends('master')
@section('content')
<main>
	<div class="col-xl-9 col-lg-8">
		<div class="tabs_styled_2">
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="book-tab" data-toggle="tab" href="#book" role="tab" aria-controls="book">Book an appointment</a>
				</li>
				@if (session('thongbao'))
				<div class="alert alert-success">
					{{ session('thongbao') }}
				</div>
				@endif
			</ul>
			<!--/nav-tabs -->

			<div class="tab-content">

				<div class="tab-pane fade show active" id="book" role="tabpanel" aria-labelledby="book-tab">
					<form  action="page/datkham/{{$phongkham->id}}" method="post" />
						<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
						<div class="main_title_3">
										<h3><strong>1</strong>Chọn Ngày Khám</h3>
									</div>
									<div class="form-group add_bottom_45" id="calendar" >
										<input type="hidden" name="ngaykham"  value="2018-05-01"" required class="form-control"  />
									</div>
									<ul class="legend">
										<li><strong></strong>Available</li>
										<li><strong></strong>Not available</li>
									</ul>
						<div class="main_title_3">
							<h3><strong>2</strong>Nhập thông tin đăng ký</h3>
						</div>
						<div class="row justify-content-center">



							<div class="box_form">
								<div class="form-group">

									<div class="form-group">


										<label>Fullname</label>
										<input type="text" class="form-control"  name="hoten" required  />
									</div>


									<div class="form-group">
										<label>Address</label>
										<input type="text" class="form-control" name="diachi"  required />
									</div>
									<div class="form-group">
										<label>Phone</label>
										<input type="text" class="form-control" name="sdt" required  />
									</div>
									<div class="form-group">
										<label>Giới tính</label>
										<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
										<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
									</div>


									<div class="form-group">
										<label>Ca khám</label>
										@foreach($cakham  as $cakham)
										<input id="cakham" type="radio" class="input-radio" name="cakham" value="{{$cakham->maca}}"  style="width: 10%"><span style="margin-right: 10%">{{$cakham->tenca}}</span>
										@endforeach
									</div>
									<div class="form-group">
										<label>Lý do khám</label>
										<input type="text" class="form-control" name="lydokham" required  />
									</div>
									<div class="form-group text-center add_top_30">
										<button type="submit" class="btn btn-primary">Register</button>
									</div>
								</div>
								<p class="text-center"><small>Has voluptua vivendum accusamus cu. Ut per assueverit temporibus dissentiet. Eum no atqui putant democritum, velit nusquam sententiae vis no.</small></p>
							</form>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /register -->


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