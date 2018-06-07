@extends('client.nhanvienphongkham.layout.master')
@section('content')


<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin nhân viên của : {{Auth::guard('nhanvienphongkham')->user()->tennhanvien}}
            </div>
                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Mã nhân viên</th>
                        <th>Tên nhân viên</th>
                        <th>Email</th>
                        <th>Mật khẩu</th>
                        <th>Chức vụ</th>
                        
                        
                    </tr>
                </thead>
                 <tbody>
                    @foreach($nvpk as $nvpk)
                    <tr class="odd gradeX" align="center">
                       <td>{{$nvpk->manv}}</td>
                       <td>{{$nvpk->tennhanvien}}</td>
                       <td>{{$nvpk->email}}</td>
                       <td>{{$nvpk->password}}</td>
                       <td> @if($nvpk->maloai==1)
                            {{ "Bác sĩ" }}
                            @elseif ($nvpk->maloai==2)
                            {{ "Y tá" }}
                            @else
                            {{" Quan ly"}}
                            @endif</td>
        
                 
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="client/nhanvienphongkham/qlthongtin/sua/{{$nvpk->manv}}">Edit</a></td>
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