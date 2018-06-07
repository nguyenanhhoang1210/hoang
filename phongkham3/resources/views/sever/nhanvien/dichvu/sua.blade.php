@extends('sever.nhanvien.layout.index')

@section('content')
<!-- Main Container -->
<main id="main-container">
  <!-- Page Content -->
  <div class="content">
    <h2 class="content-heading">Dịch Vụ</h2>
    <div class="row">
        <div class="col-md-9">
            <!-- Normal Form -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Form Sửa</h3>
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
                    <form action="sever/nhanvien/dichvu/sua/{{ $dichvu->id }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>Loại Dịch Vụ</label>
                            <select class="form-control" name='idLoai' required="">
                                @foreach($loaidichvu as $ldv)
                                <option

                                value="{{ $ldv->id }}"
                                @if($dichvu->idLoai == $ldv->id)
                                {{ "selected" }}
                                @endif
                                >{{ $ldv->Ten }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tên Dịch Vụ</label>
                            <input class="form-control" name="Ten" placeholder="Điền thông tin cần sửa " value="{{ $dichvu->Ten }}" required=""/>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-alt-primary">Sửa</button>
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