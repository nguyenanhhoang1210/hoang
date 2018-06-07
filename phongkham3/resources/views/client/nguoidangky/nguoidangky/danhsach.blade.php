@extends('client.nguoidangky.layout.master')

@section('content')




<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin người đăng ký khám
                    
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Họ tên </th>
                        <th>SĐT</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Password</th>
                        
                        
                    </tr>
                </thead>
                 <tbody>
                    @foreach($nguoidangky as $nguoidangky)
                    <tr class="odd gradeX" align="center">
                       <td>{{$nguoidangky->madangky}}</td>
                       <td>{{$nguoidangky->hoten}}</td>
                       <td>{{$nguoidangky->sdt}}</td>
                       <td>{{$nguoidangky->email}}</td>
                       <td>{{$nguoidangky->diachi}}</td>
                       <td>{{$nguoidangky->password}}</td>
                       
                        <td class="center">          
                            <a href="client/nguoidangky/nguoidangky/sua/{{$nguoidangky->madangky}}"><i class="fa fa-pencil fa-fw">Edit</i> </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    
        <br>
        
    </div>
    <!-- /.container-fluid -->
</div>
<hr>

@endsection