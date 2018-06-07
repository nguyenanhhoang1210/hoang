@extends('sever.nhanvien.layout.index')

@section('content')
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Chuyên Khoa</h2>
        @if(session('thongbao'))
        <div class="alert alert-success">
            {{ session('thongbao') }}
        </div>
        @endif
        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Tìm Kiếm</h3>
            </div class="block-header block-header-default">
            @if(count($chuyenkhoa)==0)
            <h3 class="block-title"><i>Không tìm thấy kết quả - "{{ $tukhoa }}"</i></h3>
            @else
            <div class="block-header block-header-default">
                <h3 class="block-title"><i>Từ Khoá : "{{ $tukhoa }}" - Cho ra {{ $dem }} kết quả</i></h3>
            </div>
            @endif
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter table-hover js-dataTable-simple">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($chuyenkhoa as $ck)
                        <tr class="odd gradeX" align="center">
                            <td>{{$ck->id}}</td>
                            <td>{{$ck->Ten}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirmAction()" href="sever/nhanvien/chuyenkhoa/xoa/{{$ck->id}}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="sever/nhanvien/chuyenkhoa/sua/{{$ck->id}}">Edit</a></td>
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
 @endsection
 @section('script')
 <script>
    function confirmAction() {
      return confirm("Bạn thực sự muốn xoá không?")
  }
</script>
@endsection

