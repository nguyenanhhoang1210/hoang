@extends('sever.admin.layout.index')

@section('content')
<!-- Main Container -->
<main id="main-container">
  <!-- Page Content -->
  <div class="content">
    <h2 class="content-heading">Users Hệ Thống</h2>
    @if(session('thongbao'))
    <div class="alert alert-success">
      {{ session('thongbao') }}
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
                <th>Name</th>
                <th>Email</th>
                <th>Level</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $user as $u )
            <tr class="odd gradeX" align="center">
                <td>{{ $u->id }}</td>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>
                    @if($u->quyen==1)
                    {{ "Admin" }}
                    @else
                    {{ "Thường" }}
                    @endif
                </td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="sever/admin/user/xoa/{{ $u->id }}"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="sever/admin/user/sua/{{ $u->id }}">Edit</a></td>
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