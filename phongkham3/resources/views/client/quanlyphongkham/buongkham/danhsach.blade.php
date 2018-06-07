@extends('client.quanlyphongkham.layout.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <h1 class="page-header">Thông tin buồng khám 
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

                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>

                    <tr align="center">
                        <th>Mã buồng khám </th>
                        <th>Tên buồng khám</th>
                        <th>Tên phòng khám</th>
                        <th>Chuyên khoa</th>
                    </tr>
                </thead>
                 <tbody>
                    @foreach($buongkham as $bk)
                    <tr class="odd gradeX" align="center">
                        <td>{{$bk->mabuongkham}}</td>
                       <td>{{$bk->tenbuongkham}}</td>
                       <td>{{$bk->tenphongkham}}</td>
                       <td>{{$bk->Ten}}</td>
            
                         <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="client/quanlyphongkham/buongkham/xoa/{{$bk->mabuongkham}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="client/quanlyphongkham/buongkham/sua/{{$bk->mabuongkham}}">Edit</a></td>
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