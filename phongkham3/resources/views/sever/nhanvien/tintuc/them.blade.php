@extends('sever.nhanvien.layout.index')

@section('content')
<!-- Main Container -->
<main id="main-container">
  <!-- Page Content -->
  <div class="content">
    <h2 class="content-heading">Tin Tức</h2>
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Form Thêm</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option">
                    <i class="si si-wrench"></i>
                </button>
            </div>
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
            <form action="sever/nhanvien/tintuc/them" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="form-group">
                        <label>Danh Mục</label>
                        <select class="form-control" name="idDanhMuc" required="">
                            <option value="">Chọn danh mục</option>
                            @foreach($danhmuctintuc as $dmtt)
                            <option value="{{ $dmtt->id }}">{{ $dmtt->Ten }}</option>
                            @endforeach
                        </select>
                    </div>
                <div class="form-group">
                    <label>Tiêu Đề</label>
                    <input class="form-control" name="TieuDe" placeholder="Mời bạn nhập tên phòng khám" required=""/>
                </div>
                <div class="form-group">
                    <label>Tóm Tắt</label>
                    <div class="form-group row">
                        <div class="col-12">
                            <!-- CKEditor Container -->
                            <textarea class="form-control" name="TomTat" placeholder="Mời bạn nhập nội dung" required="" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Nội Dung</label>
                    <div class="form-group row">
                        <div class="col-12">
                            <!-- CKEditor Container -->
                            <textarea id="js-ckeditor" name="NoiDung" placeholder="Mời bạn nhập nội dung" required=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Hình Ảnh</label>
                    <input type="file" name="Hinh" class="form-control" required="">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-alt-primary">Thêm</button>
                    <button type="reset" class="btn btn-alt-primary">Làm mới</button>
                </div>
            </form>
        </div>
    </div>
    <!-- END CKEditor -->
</div>
<!-- END Page Content -->
</main>
<!-- END Main Container -->
@endsection
@section('script')
<script>
    jQuery(function () {
                // Init page helpers (Summernote + CKEditor + SimpleMDE plugins)
                Codebase.helpers(['summernote', 'ckeditor', 'simplemde']);
            });
        </script>

        @endsection


