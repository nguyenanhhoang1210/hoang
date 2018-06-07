@extends('sever.admin.layout.index')

@section('content')
<!-- Main Container -->
<main id="main-container">
  <!-- Page Content -->
  <div class="content">
    <h2 class="content-heading">User</h2>
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
                    <form action="sever/admin/user/them" method="POST">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <div class="form-group">
                            <label>Họ Tên</label>
                            <input class="form-control" name="name" placeholder="Mời bạn nhập họ tên" required=""/>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" placeholder="Mời bạn nhập Email" required=""/>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password" placeholder="Mời bạn nhập password" required=""/>
                        </div>
                        <div class="form-group">
                            <label>Nhập lại Password</label>
                            <input class="form-control" type="password" name="passwordAgain" placeholder="Mời bạn nhập lại password" required=""/>
                        </div>
                        <div class="form-group">
                            <label>Phân quyền</label>
                            <label class="radio-inline">
                                <input name="quyen" value="0" checked type="radio">Thường
                            </label>
                            <label class="radio-inline">
                                <input name="quyen" value="1" type="radio">Admin
                            </label>
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