@extends('client.quanlyphongkham.layout.master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chuyên Khoa
                    <small>thêm</small>
                </h1>
                <hr>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="danhsachchuyenkhoa" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Chuyên Khoa</label>
                        <select class="form-control" name="idKhoa" required="">
                            <option value="">Chọn chuyên khoa</option>
                            @foreach($chuyenkhoa as $ck)
                            <option value="{{ $ck->id }}">{{ $ck->Ten }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Chọn</button>
                </form>
            </div>
              <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin chuyên khoa của : {{Auth::guard('phongkham')->user()->tenphongkham}}
            </div>
                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Chuyên khoa</th>
                        
                        
                    </tr>
                </thead>
                 <tbody>
                    @foreach($chuyenkhoapk as $ckpk)
                    <tr class="odd gradeX" align="center">
                       <td>{{$ckpk->Ten}}</td>

                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="client/quanlyphongkham/chuyenkhoa/xoa/{{$ckpk->idckpk}}">Delete</a></td>
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