@extends('sever.nhanvien.layout.index')

@section('content')
<!-- Main Container -->
<main id="main-container">
  <!-- Page Content -->
  <div class="content">
    <h2 class="content-heading">Phòng Khám</h2>
    <div class="row">
        <div class="col-md-9">
            <!-- Normal Form -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Form Thêm</h3>
                </div>
                <div class="block-content">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err)
                        {{ $err }}<br>
                        @endforeach
                    </div>
                    @endif
                    @if (session('thongbao'))
                    <div class="alert alert-success">
                        {{ session('thongbao') }}
                    </div>
                    @endif
                    <form action="sever/nhanvien/phongkham/them" method="POST">

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
                            <label>Số Điện Thoại</label>
                            <input class="form-control" name="Sdt" placeholder="Mời bạn nhập số điện thoại" required=""/>
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
                            <label>Địa Chỉ Chi Tiết</label>
                            <input class="form-control" name="diaChiChiTiet" placeholder="Mời bạn nhập địa chỉ chi tiết" required=""/>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Mời bạn nhập password" required="" />
                        </div>
                        <div class="form-group">
                            <label>Nhập lại Password</label>
                            <input class="form-control" type="password" name="passwordAgain" id="passwordAgain" placeholder="Mời bạn nhập lại password" required="" />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-alt-primary">Thêm</button>
                            <button type="reset" class="btn btn-alt-primary">Làm mới</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Normal Form -->
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- END Page Content -->
</main>
<!-- END Main Container -->

@endsection
@section('script')
<script>
    $(document).ready(function(){
        $("#TinhThanh").change(function(){
            var matp = $(this).val();
            $.get("sever/nhanvien/ajax/quanhuyen/"+matp,function(data){
                $("#QuanHuyen").html(data);
            });
        });
    });
    $(document).ready(function(){
        $("#QuanHuyen").change(function(){
            var maqh = $(this).val();
            $.get("sever/nhanvien/ajax/phuongxa/"+maqh,function(data){
                $("#PhuongXa").html(data);
            });
        });
    });
</script>
@endsection