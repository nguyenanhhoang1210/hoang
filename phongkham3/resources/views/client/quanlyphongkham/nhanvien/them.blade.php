@extends('client.quanlyphongkham.layout.master')
@section('content')

<div id="page-wrapper" style="padding-left: 100px">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Nhân viên
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->


            <div class="col-lg-7" style="padding-bottom:120px">
                <div>
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
                </div>
                <form action="" method="POST">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <div class="form-group">
                        <label>Tên nhân viên</label>
                        <input class="form-control" name="name" placeholder="Mời bạn nhập họ tên" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Mời bạn nhập Email" />
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input class="form-control" type="password" name="password" placeholder="Mời bạn nhập password" />
                    </div>
                    <div class="form-group">
                        <label>Nhập lại Password</label>
                        <input class="form-control" type="password" name="passwordAgain" placeholder="Mời bạn nhập lại password" />
                    </div>
                    <div class="form-group">
                        <label>Loại nhân viên</label>
                        <select class="form-control" name="loainv" id="loainv">
                            @foreach($loainv as $loainv)
                            <option value="{{ $loainv->maloai }}">{{ $loainv->tenloai }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                    <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

       
<hr>

@endsection