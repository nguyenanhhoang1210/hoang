@extends('client.nhanvienphongkham.layout.master')
@section('content')


<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Nhan vien
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input class="form-control" name="name" value="{{$nvpk->tennhanvien}}" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" value="{{$nvpk->email}}" />
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
                       <label>Loại nhân viên</label>
                       <select class="form-control" name="loainv" id="loainv" disabled="true">
                        @foreach($loainv as $loainv)
                        <option value="{{ $loainv->maloai }}">{{ $loainv->tenloai }}</option>
                        @endforeach
                    </select>
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