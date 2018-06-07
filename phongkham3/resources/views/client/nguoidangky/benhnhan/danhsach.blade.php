@extends('client.nguoidangky.layout.master')
@section('content')


<div id="page-wrapper">
    <div class="container-fluid">
    
        <br>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin bệnh nhân
                    
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Mã bệnh nhân</th>
                        <th>Tên bệnh nhân</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>Chẩn đoán</th>
                     
                        
                        
                        
                    </tr>
                </thead>
                 <tbody>
                    @foreach($dangkykhambenh as $bn)
                    <tr class="odd gradeX" align="center">
                       <td>{{$bn->mabenhnhan}}</td>
                       <td>{{$bn->tenbenhnhan}}</td>
                       <td>{{$bn->gioitinh}}</td>
                       <td>{{$bn->diachi}}</td>
                       <td>{{$bn->chandoan}}</td>
                    
                          
                         
                         
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