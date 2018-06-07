@extends('sever.nhanvien.layout.index')

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
                    <form action="sever/nhanvien/sua/{{ $user->id }}" method="POST">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <div class="form-group">
                            <label>Họ Tên</label>
                            <input class="form-control" name="name" placeholder="Mời bạn nhập họ tên" value="{{ $user->name }}" required=""/>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" readonly="" placeholder="Mời bạn nhập Email" value="{{ $user->email }}" required=""/>
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