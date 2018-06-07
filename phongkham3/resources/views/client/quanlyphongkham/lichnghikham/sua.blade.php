@extends('client.quanlyphongkham.layout.master')
@section('content')

<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Lịch khám
                        <small>Edit</small>
                    </h1>
                </div>
                
                    
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Ngày nghỉ</label>
                                <input class="form-control" type="date" name="ngaynghi" value="{{$lichnghi->ngaynghi}}" />
                            </div>
                            <div class="form-group">
                            <label>Ca nghỉ</label>
                            <select class="form-control" name="cakham" id="cakham">
                                @foreach($cakham as $cakham)
                                <option value="{{ $cakham->maca }}">{{ $cakham->tenca }}</option>
                                @endforeach
                            </select>
                        </div>
                          
                          
                            <button type="submit" class="btn btn-default">Edit Category</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
<hr>

@endsection