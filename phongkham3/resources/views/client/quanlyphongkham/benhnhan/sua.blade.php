@extends('client.quanlyphongkham.layout.master')
@section('content')

<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bệnh nhân
                        <small>Edit</small>
                    </h1>
                </div>
                
                    
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                        

                                        <label>Fullname</label>
                                        <input type="text" class="form-control"  name="hoten" value="{{$benhnhan->tenbenhnhan}}" required  />
                                    </div>


                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="diachi" value="{{$benhnhan->diachi}}" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="sdt" value="{{$benhnhan->sdt}}" required  />
                                    </div>
                                    <div class="form-group">
                                    <label>Giới tính</label>
                                        <input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
                                        <input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
                                        </div>
                                        
                                    
                            <div class="form-group">
                                <label>Chẩn đoán</label>
                                <input class="form-control" name="chandoan" value="{{$benhnhan->chandoan}}" />
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