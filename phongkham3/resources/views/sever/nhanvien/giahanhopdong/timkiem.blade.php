@extends('sever.nhanvien.layout.index')

@section('content')
<!-- Main Container -->
<main id="main-container">
  <!-- Page Content -->
  <div class="content">
    <h2 class="content-heading">Gia Hạn Hợp Đồng</h2>
    @if(session('thongbao'))
    <div class="alert alert-success">
      {{ session('thongbao') }}
    </div>
    @endif
    <!-- Dynamic Table Full -->
    <div class="block">
      <div class="block-header block-header-default">
        <h3 class="block-title">Tìm Kiếm</h3>
      </div>
      @if(count($giahan)==0)
      <h3 class="block-title"><i>Không tìm thấy kết quả - "{{ $tukhoa }}"</i></h3>
      @else
      <div class="block-header block-header-default">
        <h3 class="block-title"><i>Từ Khoá : "{{ $tukhoa }}" - Cho ra {{ $dem }} kết quả</i></h3>
      </div>
      @endif
      <div class="block-content block-content-full">
        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter table-hover js-dataTable-full">
          <thead>
            <tr align="center">
              <th>Mã GH</th>
              <th>Mã HĐ</th>
              <th>Tên PK</th>
              <th>Giá Trị</th>
              <th>Ngày Bắt Đầu</th>
              <th>Ngày Kết Thúc</th>
              <th>Trạng Thái</th>
              <th>Delete</th>
              <th>Edit</th>
            </tr>
          </thead>
          <tbody>
            @foreach($giahan as $gh)
            <tr class="odd gradeX" align="center">
              <td>{{$gh->maGH}}</td>
              <td>{{$gh->maHD}}</td>
              <td>{{$gh->hopdong->phongkham->tenphongkham}}</td>
              <td>{{$gh->giatri}}</td>
              <td>{{$gh->ngayBD}}</td>
              <td>{{$gh->ngayKT}}</td>
              <td>
                @if ($gh->trangthai=="Chưa Hiệu Lực")
                  <span class="badge badge-primary">{{$gh->trangthai}}</span>
                @endif
                @if ($gh->trangthai=="Hiệu Lực")
                  <span class="badge badge-success">{{$gh->trangthai}}</span>
                @endif
                @if ($gh->trangthai=="Gần Hết Hiệu Lực")
                  <span class="badge badge-warning">{{$gh->trangthai}}</span>
                @endif
                @if ($gh->trangthai=="Trễ Gia Hạn")
                  <span class="badge badge-info">{{$gh->trangthai}}</span>
                @endif
                @if ($gh->trangthai=="Hết Hiệu Lực")
                  <span class="badge alert-warning">{{$gh->trangthai}}</span>
                @endif
                @if ($gh->trangthai=="Chấm Dứt")
                  <span class="badge badge-danger">{{$gh->trangthai}}</span>
                @endif
              </td>
              <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirmAction()" href="sever/nhanvien/giahan/xoa/{{$gh->maGH}}"> Delete</a></td>
              <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="sever/nhanvien/giahan/sua/{{$gh->maGH}}">Edit</a></td>
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

