@extends('client.quanlyphongkham.layout.master')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
    
        <br>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin đăng ký khám bệnh
                    
                </h1>
                 <div>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err)
                        {{ $err }}<br>
                        @endforeach
                    </div>
                    @endif
                    @if (session('thongbao'))
                    <div class="alert alert-success">
                        {{ session('thongbao') }}
                    </div>
                    @endif
                </div>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Mã người đăng ký</th>
                        <th>Họ tên</th>
                        <th>SDT</th>
                        <th>Email</th>
                        <th>Tên bệnh nhân</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>Lý do khám</th>
                        <th>Ca khám</th>
                        <th>Tình trạng</th>
                                
                        
                    </tr>
                </thead>
                 <tbody>
                    @foreach($dangkykhambenh as $bn)
                    <tr class="odd gradeX" align="center">
                        <td>{{$bn->madangky}}</td>
                      <td>{{$bn->hoten}}</td>
                        <td>{{$bn->sdt}}</td>
                     
                        <td>{{$bn->email}}</td>
                       <td>{{$bn->tenbenhnhan}}</td>
                       <td>{{$bn->gioitinh}}</td>
                       <td>{{$bn->diachi}}</td>
                       <td>{{$bn->lydokham}}</td>  
                        <td>{{$bn->tenca}}</td> 
                        <td>@if($bn->tinhtrang==0)
                            {{ "Chưa xử lý" }}
                         
                            @else
                            {{" Đã xử lý"}}
                            @endif</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="client/quanlyphongkham/dangkykhambenh/xoa/{{$bn->makhambenh}}"> Delete</a></td>
                             <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="client/quanlyphongkham/dangkykhambenh/sua/{{$bn->makhambenh}}">Edit</a></td>
                            <td class="center"><i class="fa fa-arrow-alt-circle-left"></i> <a href="client/quanlyphongkham/ketquadangky/them/{{$bn->madangky}}">Trả kết quả đăng ký</a></td>
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