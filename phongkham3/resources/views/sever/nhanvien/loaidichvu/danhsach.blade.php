@extends('sever.nhanvien.layout.index')

@section('content')
<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading"> Loại Dịch Vụ</h2>
        @if(session('thongbao'))
        <div class="alert alert-success">
            {{ session('thongbao') }}
        </div>
        @endif
        @if(session('thongbaoloi'))
        <div class="alert alert-danger">
            {{ session('thongbaoloi') }}
        </div>
        @endif
        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Danh Sách <small>Full</small></h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter table-hover js-dataTable-full">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($loaidichvu as $ldv)
                        <tr class="odd gradeX" align="center">
                            <td>{{$ldv->id}}</td>
                            <td>{{$ldv->Ten}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirmAction()" href="sever/nhanvien/loaidichvu/xoa/{{$ldv->id}}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="sever/nhanvien/loaidichvu/sua/{{$ldv->id}}">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full -->

    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->
@endsection
@section('script')
<script>
    function confirmAction() {
      return confirm("Bạn thực sự muốn xoá không?")
  }
</script>
@endsection