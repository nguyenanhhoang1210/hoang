@extends('sever.nhanvien.layout.index')

@section('content')
<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="bg-image" style="background-image: url('assets/img/photos/photo2@2x.jpg');">
        <div class="hero bg-primary-dark-op">
            <div class="hero-inner">
                <div class="content content-full text-center">
                    <h1 class="display-4 font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInDown">Codebase</h1>
                    <h2 class="font-w400 text-white-op mb-50 invisible" data-toggle="appear" data-class="animated fadeInUp" data-timeout="250">Chúc bạn một ngày tốt lành.</h2>
                    <a class="btn btn-hero btn-noborder btn-rounded btn-primary invisible" data-toggle="appear" data-class="animated bounceIn" data-timeout="750" href="sever/nhanvien/thongke/today">
                        <i class="si si-rocket mr-10"></i> Get Started
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->
@endsection