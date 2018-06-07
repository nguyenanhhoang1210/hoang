@extends('client.quanlyphongkham.layout.master')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
    
        <br>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin bệnh nhân
                    
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
                        <th>Mã bệnh nhân</th>
                        <th>Tên bệnh nhân</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th>Chẩn đoán</th>
                        
                                
                        
                    </tr>
                </thead>
                 <tbody>
                    @foreach($benhnhan as $bn)
                    <tr class="odd gradeX" align="center">
                        
                     
                     
                        <td>{{$bn->mabenhnhan}}</td>
                       <td>{{$bn->tenbenhnhan}}</td>
                       <td>{{$bn->gioitinh}}</td>
                       <td>{{$bn->diachi}}</td>
                       <td>{{$bn->sdt}}</td>  
                       <td>{{$bn->chandoan}}</td>
                      
                           
                             <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="client/quanlyphongkham/benhnhan/sua/{{$bn->mabenhnhan}}">Edit</a></td>
                           
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