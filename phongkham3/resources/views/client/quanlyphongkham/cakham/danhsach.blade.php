@extends('client.quanlyphongkham.layout.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                
                <h1 class="page-header">Thông tin ca khám
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
                        <th>Mã ca </th>
                        <th>Tên ca</th>
                        <th>Giờ bắt đầu</th>
                        <th>Giờ kết thúc</th>
                        <th >Ghi chú</th>
                    </tr>
                </thead>
                 <tbody>
                    @foreach($cakham as $ck)
                    <tr class="odd gradeX" align="center">
                        <td>{{$ck->maca}}</td>
                       <td>{{$ck->tenca}}</td>
                       <td>{{$ck->giobatdau}}</td>
                        <td>{{$ck->gioketthuc}}</td>
                         <td>{{$ck->ghichu}}</td>


                        
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