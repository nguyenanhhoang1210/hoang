@extends('sever.nhanvien.layout.index')

@section('content')
<!-- Main Container -->
<main id="main-container">
  <!-- Page Content -->
  <div class="content">
    <h2 class="content-heading">Phòng Khám</h2>
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
      @if(count($phongkham)==0)
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
              <th>ID</th>
              <th>Tên</th>
              <th>Email</th>
              <th>Số ĐT</th>
              <th>Địa Chỉ</th>
              <th>Trạng Thái</th>
              <th>Delete</th>
              <th>Edit</th>
              <th>Hợp Đồng</th>
            </tr>
          </thead>
          <tbody class="updatePK">
            @foreach($phongkham as $tkpk)
            <tr class="odd gradeX" align="center">
              <td>{{$tkpk->id}}</td>
              <td>{{$tkpk->tenphongkham}}</td>
              <td>{{$tkpk->email}}</td>
              <td>{{$tkpk->Sdt}}</td>
              <td>{{$tkpk->diaChiChiTiet}}, {{ $tkpk->phuongxa->name }}, {{ $tkpk->phuongxa->quanhuyen->name }}, {{ $tkpk->phuongxa->quanhuyen->tinhthanh->name }}</td>
              <td>
                <label class="css-control css-control-primary css-switch" >
                  <input type="checkbox" class="css-control-input"  @if ($tkpk->TrangThai=="on")
                  {{ "checked" }}
                  @endif disabled>
                  <span class="css-control-indicator"></span>
                </label>
              </td>
              <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirmAction()" href="sever/nhanvien/phongkham/xoa/{{$tkpk->id}}"> Delete</a></td>
              <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="sever/nhanvien/phongkham/sua/{{$tkpk->id}}">Edit</a></td>
              <td class="center"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <a href="sever/nhanvien/hopdong/them/{{$tkpk->id}}">Thêm</a></td>
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

