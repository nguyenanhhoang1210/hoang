@extends('sever.nhanvien.layout.index')

@section('content')
<!-- Main Container -->
<main id="main-container">
  <!-- Page Content -->
  <div class="content">
    <h2 class="content-heading">Hợp Đồng</h2>
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
                    <form action="sever/nhanvien/hopdong/them/{{ $phongkham->id }}" method="POST">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <div class="form-group">
                            <label>Mã Hợp Đồng</label>
                            <input class="form-control" name="maHD" placeholder="Mời bạn nhập mã hợp đồng" required=""/>
                        </div>
                        <div class="form-group">
                            <label>Mã Phòng Khám</label>
                            <input class="form-control" name="idPhongKham" disabled="" required="" value="{{ $phongkham->id }}" />
                        </div>
                        <div class="form-group">
                            <label>Giá Trị</label>
                            <input class="form-control" name="giatri" placeholder="Mời bạn nhập giá trị hợp đồng" required=""/>
                        </div>
                        <div class="form-group">
                            <label>Thời Gian Hiệu Lực</label>

                            <div class="input-daterange input-group" data-date-format="yyyy/mm/dd" data-week-start="1" data-autoclose="true" data-today-highlight="true">
                                <input type="text" class="form-control" name="ngayBD" placeholder="Ngày Bắt Đầu" data-week-start="1" data-autoclose="true" data-today-highlight="true" required="">
                                <div class="input-group-prepend input-group-append">
                                    <span class="input-group-text font-w600">đến</span>
                                </div>
                                <input type="text" class="form-control" name="ngayKT" placeholder="Ngày Kết Thúc" data-week-start="1" data-autoclose="true" data-today-highlight="true" required="">
                            </div>
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
<script src="assets/js/core/jquery.min.js"></script>
<script src="assets/js/core/jquery.slimscroll.min.js"></script>
<script src="assets/js/core/jquery.scrollLock.min.js"></script>
<script src="assets/js/core/jquery.appear.min.js"></script>
<script src="assets/js/core/jquery.countTo.min.js"></script>
<script src="assets/js/core/js.cookie.min.js"></script>
<script src="assets/js/codebase.js"></script>
<script src="assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="assets/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="assets/js/plugins/select2/select2.full.min.js"></script>
<script src="assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>
<script src="assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.js"></script>
<script src="assets/js/plugins/masked-inputs/jquery.maskedinput.min.js"></script>
<script src="assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="assets/js/plugins/dropzonejs/min/dropzone.min.js"></script>
<script src="assets/js/pages/be_forms_plugins.js"></script>
<script>
    jQuery(function () {
            // Init page helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs plugins)
            Codebase.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs']);
        });
    </script>
    @endsection