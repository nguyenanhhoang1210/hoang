@extends('client.quanlyphongkham.layout.master')
@section('content')


<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Phòng khám
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST"  enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Tên phòng khám</label>
                        <input class="form-control" name="name" value="{{$pk->tenphongkham}}" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" disabled="true" value="{{$pk->email}}" />
                    </div>
                    <div class="form-group">
                        <label>SĐT</label>
                        <input class="form-control" name="sdt" value="{{$pk->Sdt}}" />
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" name="diachi" value="{{$pk->diaChiChiTiet}}" />
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="changePassword" id="changePassword">
                        <label>Đổi Password</label>
                        <input class="form-control" type="password" name="passwordnew" id="password" placeholder="Mời bạn nhập password" disabled="" required=""/>
                    </div>
                    <div class="form-group">
                        <label>Nhập lại Password</label>
                        <input class="form-control" type="password" name="passwordnewAgain" id="passwordAgain" placeholder="Mời bạn nhập lại password" disabled="" required=""/>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <img width="400px" src="source/img/{{$pk->hinhanh}}">
                        <input type="file" name="Hinh" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Ghi chú</label>
                        <input class="form-control" name="ghichu" value="{{$pk->ghichu}}" style="height: 50px;" />
                    </div>
                <button type="submit" class="btn btn-default">Edit Category</button>
                <button type="reset" class="btn btn-default">Reset</button>
                <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <hr>

    @endsection
    @section('script')
    <script>
        $(document).ready(function() {
            $("#changePassword").change(function() {
                if ($(this).is(":checked"))
                {
                    $("#password").removeAttr('disabled');
                    $("#passwordAgain").removeAttr('disabled');
                }
                else
                {
                    $("#password").attr('disabled','');
                    $("#passwordAgain").attr('disabled','');
                }
            });
        });
    </script>
    @endsection