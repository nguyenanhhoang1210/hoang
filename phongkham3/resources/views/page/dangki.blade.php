@extends('master')
@section('content')
		<main>
		<div class="bg_color_2">
			<div class="container margin_60_35">
				<div id="register">
					<h1>Please register to Findoctor!</h1>
					<div class="row justify-content-center">
						<div class="col-md-5">
							@if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                    {{ $err }}<br>
                    @endforeach
                </div>
                @endif
                             @if (session('thanhcong'))
                <div class="alert alert-success">
                    {{ session('thanhcong') }}
                </div>
                @endif
							<form  action="{{route('signin')}}" method="post" />
							<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
								<div class="box_form">
									<div class="form-group">
										<div class="form-group">
										<label>Email</label>
										<input type="email" name="email" required class="form-control" placeholder="Your email address" />
										</div>

										<label>Fullname</label>
										<input type="text" class="form-control"  name="fullname" required placeholder="Your name" />
									</div>


									<div class="form-group">
										<label>Address</label>
										<input type="text" class="form-control" name="address"  required />
									</div>
									<div class="form-group">
										<label>Phone</label>
										<input type="text" class="form-control" name="phone" required  />
									</div>
									<div class="form-group">
										<label>Password</label>
										<input type="password" class="form-control" name="password" required placeholder="Your password" />
									</div>
									<div class="form-group">
										<label>Confirm password</label>
										<input type="password" class="form-control" name="re_password" required placeholder="Confirm password" />
									</div>
									<div id="pass-info" class="clearfix"></div>
									<div class="checkbox-holder text-left">
										<div class="checkbox_2">
											<input type="checkbox" value="accept_2" id="check_2" name="check_2" checked="" />
											<label for="check_2"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>
										</div>
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
			</div>
		</div>
	</main>
@endsection