@extends('client.quanlyphongkham.layout.master')
@section('content')


<div id="page-wrapper" style="padding-left: 100px">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Kết quả đăng ký
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
                                <label>Email </label>
                                <input class="form-control" type="email" name="mail" value="{{$ndk->email}}" />
                            </div>
                       <div class="form-group">
                            <label>Subject</label>
                           <input class="form-control" type="text" name="subject" />
                        </div>
                          
                   <div class="form-group">
                            <label>Nội dung</label>
                           <input class="form-control" type="text" name="message" />
                        </div>
                    <button type="submit" class="btn btn-default">Gửi email</button>
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