@extends('client.nguoidangky.layout.master')
@section('content')


<div id="page-wrapper">
    <div class="container-fluid">
    
        <br>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin đăng ký khám bệnh
                    
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                     
                        <th>Họ tên</th>
                        <th>SĐT</th>    
                        <th>Tên bệnh nhân</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>Lý do khám</th>
                        <th>Ca khám</th>
                        <th>Ngày khám</th>
                        <th>Phòng khám</th>
                        <th>Tình trạng</th>
                                 
                    </tr>
                </thead>
                 <tbody>
                    @foreach($dangkykhambenh as $bn)
                    <tr class="odd gradeX" align="center">
                 
                      <td>{{$bn->hoten}}</td>
                        <td>{{$bn->sdt}}</td>    
                       <td>{{$bn->tenbenhnhan}}</td>
                       <td>{{$bn->gioitinh}}</td>
                       <td>{{$bn->diachi}}</td>
                       <td>{{$bn->lydokham}}</td>  
                        <td>{{$bn->tenca}}</td>
                       <td>{{$bn->ngaykham}}</td>
                        <td>{{$bn->tenphongkham}}</td>
                        <td>@if($bn->tinhtrang==0)
                            {{ "Chưa xử lý" }}
                         
                            @else
                            {{" Đã xử lý"}}
                            @endif</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="client/nguoidangky/lichdangky/xoa/{{$bn->makhambenh}}"> Delete</a></td>
                        
                         
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<hr>

@endsection