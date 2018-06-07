@extends('master')
@section('content')
<main>
        <div id="hero_register">
            <div class="container margin_120_95">           
                <div class="row">
                    <div class="col-lg-6">
                        <h1>It's time to find you!</h1>
                        <p class="lead">Te pri adhuc simul. No eros errem mea. Diam mandamus has ad. Invenire senserit ad has, has ei quis iudico, ad mei nonumes periculis.</p>
                        <div class="box_feat_2">
                            <i class="pe-7s-map-2"></i>
                            <h3>Let patients to Find you!</h3>
                            <p>Ut nam graece accumsan cotidieque. Has voluptua vivendum accusamus cu. Ut per assueverit temporibus dissentiet.</p>
                        </div>
                        <div class="box_feat_2">
                            <i class="pe-7s-date"></i>
                            <h3>Easly manage Bookings</h3>
                            <p>Has voluptua vivendum accusamus cu. Ut per assueverit temporibus dissentiet. Eum no atqui putant democritum, velit nusquam sententiae vis no.</p>
                        </div>
                        <div class="box_feat_2">
                            <i class="pe-7s-phone"></i>
                            <h3>Instantly via Mobile</h3>
                            <p>Eos eu epicuri eleifend suavitate, te primis placerat suavitate his. Nam ut dico intellegat reprehendunt, everti audiam diceret in pri, id has clita consequat suscipiantur.</p>
                        </div>
                    </div>
                    <!-- /col -->
                    <div class="col-lg-5 ml-auto">
                        <div class="box_form">
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
                             <form action="{{route('signinphongkham')}}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                   
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="Ten" placeholder="Mời bạn nhập tên phòng khám" required=""/>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Mời bạn nhập Email" required=""/>
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input class="form-control" name="sdt" placeholder="Mời bạn nhập số điện thoại" required=""/>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" name="diachi" placeholder="Mời bạn nhập địa chỉ phòng khám" required=""/>
                    </div>
                    <div class="form-group">
                        <label>Tỉnh/Thành Phố</label>
                        <select class="form-control" name="idTinhThanh" id="TinhThanh" required="">
                            <option value="">Chọn tỉnh hoặc thành phố</option>
                            @foreach($tinhthanh as $tt)
                            <option value="{{ $tt->matp }}">{{ $tt->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Quận/Huyện</label>
                        <select class="form-control" name="idQuanHuyen" id="QuanHuyen" required="">
                            <option value="">Chọn quận hoặc huyện</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Phường/Xã</label>
                        <select class="form-control" name="idPhuongXa" id="PhuongXa" required="">
                            <option value="">Chọn phường hoặc xã</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" id="password" placeholder="Mời bạn nhập password" required="" />
                    </div>
                    <div class="form-group">
                        <label>Nhập lại Password</label>
                        <input class="form-control" type="password" name="passwordAgain" id="passwordAgain" placeholder="Mời bạn nhập lại password" required="" />
                    </div>
                    <p class="text-center add_top_30"><input type="submit" class="btn_1" value="Submit" /></p>
                                <div class="text-center"><small>Ut nam graece accumsan cotidieque. Has voluptua vivendum accusamus cu. Ut per assueverit temporibus dissentiet.</small></div>
                    </form>
                    </div>
                        </div>
                        <!-- /box_form -->
                    </div>
                    <!-- /col -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /hero_register -->
    </main>
    <!-- /main -->
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