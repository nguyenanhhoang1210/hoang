@extends('sever.nhanvien.layout.index')

@section('content')
<!-- Main Container -->
<main id="main-container">
  <!-- Page Content -->
  <div class="content">
    <h2 class="content-heading">Tin Tức</h2>
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
       @if(count($tintuc)==0)
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
              <th>Tiêu Đề</th>
              <th>Tóm Tắt</th>
              <th>Delete</th>
              <th>Edit</th>
            </tr>
          </thead>
          <tbody>
            @foreach($tintuc as $tt)
            <tr class="odd gradeX" align="center">
              <td>{{$tt->id}}</td>
              <td> <p>{{ $tt->TieuDe }}</p>
                <img width="100px" src="upload/tintuc/{{ $tt->Hinh }}" />
              </td>
              <td>{!!  $tt->TomTat  !!}</td>
              <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirmAction()" href="sever/nhanvien/tintuc/xoa/{{$tt->id}}"> Delete</a></td>
              <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="sever/nhanvien/tintuc/sua/{{$tt->id}}">Edit</a></td>
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

