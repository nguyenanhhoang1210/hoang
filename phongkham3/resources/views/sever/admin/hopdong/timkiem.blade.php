@extends('sever.admin.layout.index')

@section('content')
<!-- Main Container -->
<main id="main-container">
  <!-- Page Content -->
  <div class="content">
    <h2 class="content-heading">Hợp Đồng</h2>
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
        <h3 class="block-title">Tìm Kiếm</h3>
      </div>
      @if(count($hopdong)==0)
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
              <th>Mã HĐ</th>
              <th>Tên PK</th>
              <th>Giá Trị</th>
              <th>Ngày Bắt Đầu</th>
              <th>Ngày Kết Thúc</th>
              <th>Trạng Thái</th>
              <th>Delete</th>
              <th>Edit</th>
              <th>Gia Hạn</th>
            </tr>
          </thead>
          <tbody>
            @foreach($hopdong as $hd)
            <tr class="odd gradeX" align="center">
              <td>{{$hd->maHD}}</td>
              <td>{{$hd->phongkham->tenphongkham}}</td>
              <td>{{$hd->giatri}}</td>
              <td>{{$hd->ngayBD}}</td>
              <td>{{$hd->ngayKT}}</td>
              <td>
                @if ($hd->trangthai=="Chưa Hiệu Lực")
                <span class="badge badge-primary">{{$hd->trangthai}}</span>
                @endif
                @if ($hd->trangthai=="Hiệu Lực")
                <span class="badge badge-success">{{$hd->trangthai}}</span>
                @endif
                @if ($hd->trangthai=="Gần Hết Hiệu Lực")
                <span><a class="badge badge-warning" onclick="return confirmAction1()" href="sever/admin/hopdong/thongbao/{{ $hd->maHD }}">{{$hd->trangthai}}</a></span>
                @endif
                @if ($hd->trangthai=="Trễ Gia Hạn")
                <span><a class="badge badge-info" onclick="return confirmAction1()" href="sever/admin/hopdong/thongbao/{{ $hd->maHD }}">{{$hd->trangthai}}</a></span>
                @endif
                @if ($hd->trangthai=="Hết Hiệu Lực")
                <span><a class="badge alert-danger" onclick="return confirmAction1()" href="sever/admin/hopdong/thongbao/{{ $hd->maHD }}">{{$hd->trangthai}}</a></span>
                @endif
                @if ($hd->trangthai=="Chấm Dứt")
                <span class="badge badge-danger">{{$hd->trangthai}}</span>
                @endif
              </td>
              <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirmAction()" href="sever/admin/hopdong/xoa/{{$hd->maHD}}"> Delete</a></td>
              <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="sever/admin/hopdong/sua/{{$hd->maHD}}">Edit</a></td>
              <td class="center"><i class="fa fa-plus-square-o"></i> <a href="sever/admin/giahan/them/{{$hd->maHD}}">Add</a></td>
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
  function confirmAction1() {
    return confirm("Bạn thực sự muốn thông báo không?")
  }
</script>
@endsection

