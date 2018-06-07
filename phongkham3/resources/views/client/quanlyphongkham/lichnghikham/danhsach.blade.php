@extends('client.quanlyphongkham.layout.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
        
                <h1 class="page-header">Thông tin lịch nghỉ khám
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
            </div>

                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>

                    <tr align="center">
                           <th>Ngày nghỉ</th>
                        <th>Tên ca</th>
                     
                      
                    </tr>
                </thead>
                 <tbody>
                    @foreach($lichnghi as $ln)
                    <tr class="odd gradeX" align="center">
                        <td>{{$ln->ngaynghi}}</td>
                       <td>{{$ln->tenca}}</td>
                      
                       


                         <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="client/quanlyphongkham/lichnghikham/xoa/{{$ln->malich}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="client/quanlyphongkham/lichnghikham/sua/{{$ln->malich}}">Edit</a></td>
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