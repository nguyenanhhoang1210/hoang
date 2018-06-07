@extends('client.quanlyphongkham.layout.master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dịch vụ
                    <small>Thêm</small>
                </h1>
                <hr>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="danhsachdichvu" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Dịch vụ</label>
                        <select class="form-control" name="dichvu" required="">
                            <option value="">Chọn dịch vụ</option>
                            @foreach($dichvu as $dv)
                            <option value="{{ $dv->id }}">{{ $dv->Ten }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Chọn</button>
                </form>
            </div>
              <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin dịch vụ của : {{Auth::guard('phongkham')->user()->tenphongkham}}
            </div>
                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Dịch vụ</th>
                        
                        
                    </tr>
                </thead>
                 <tbody>
                    @foreach($dichvupk as $dvpk)
                    <tr class="odd gradeX" align="center">
                       <td>{{$dvpk->Ten}}</td>

                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="client/quanlyphongkham/dichvu/xoa/{{$dvpk->iddvpk}}">Delete</a></td>
                    </tr>


                    @endforeach
                </tbody>
            </table>
          
            <!-- /.col-lg-12 -->
          
        </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection