@extends('client.quanlyphongkham.layout.master')
@section('content')


<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin  của : {{Auth::guard('phongkham')->user()->tenphongkham}}
            </div>
                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Mã phòng khám</th>
                        <th>Tên phòng khám</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Địa chị</th>
                        <th>Hình ảnh</th>
                        <th>Ghi chú</th>
                        <th>Mật khẩu</th>
                       
                        
                    </tr>
                </thead>
                 <tbody>
                    @foreach($pk as $pk)
                    <tr class="odd gradeX" align="center">
                       <td>{{$pk->id}}</td>
                       <td>{{$pk->tenphongkham}}</td>
                       <td>{{$pk->email}}</td>
                        <td>{{$pk->Sdt}}</td>
                        <td>{{$pk->diaChiChiTiet}}</td>
                        <td>
                           <img src="source/img/{{$pk->hinhanh}}" class="img-fluid" alt="" style="height: 100px; width: 400px;" />
                        </td>
                        <td>{{$pk->ghichu}}</td>
                       <td>{{$pk->password}}</td>
                       
        
                 
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="client/quanlyphongkham/phongkham/sua/{{$pk->id}}">Edit</a></td>
                    </tr>


                    @endforeach
                </tbody>
            </table>
          
            <!-- /.col-lg-12 -->
          
        </div>
        <!-- /.row -->
    
        <br>
    </div>
    <!-- /.container-fluid -->
</div>
<hr>

@endsection