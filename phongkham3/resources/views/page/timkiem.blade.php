  @extends('master')
@section('content')
   <main>
   <div id="results">
       <div class="container">
           <div class="row">
               <div class="col-md-6">
                   <h4><strong>Tìm thấy {{count($phongkham)}} phòng khám</strong></h4>
               </div>
               <div class="col-md-6">
                    <div class="search_bar_list">
                    <form role="search" method="get" id="searchform" action="{{route('search')}}">
                    <input type="text" class="form-control" name="key" placeholder="Ex. Specialist, Name, Doctor..." />
                    <input type="submit" value="Search" />
                </form>
                </div>
               </div>
           </div>
           <!-- /row -->
       </div>
       <!-- /container -->
   </div>
   <!-- /results -->
   
   <div class="filters_listing">
    <div class="container">
      <ul class="clearfix">
        <li>
          <h6>Type</h6>
          <div class="switch-field">
            <input type="radio" id="all" name="type_patient" value="all" checked="" />
            <label for="all">All</label>
            
          </div>
        </li>
        
        
      </ul>
    </div>
    <!-- /container -->
  </div>
  <!-- /filters -->
     
  <div class="container margin_60_35">
    <div class="row">
      <div class="col-lg-8">
        <div class="row">
            @foreach($phongkham as $pk)
          <div class="col-md-6">
            <div class="box_list wow fadeIn">
              <a href="#0" class="wish_bt"></a>
              <figure>
                <a href="{{route('chitietphongkham',$pk->id)}}"><img src="source/img/{{$pk->hinhanh}}" class="img-fluid" alt="" />
                  <div class="preview"><span>Read more</span></div>
                </a>
              </figure>
              <div class="wrapper">
                <small>Psicologist</small>
                <h3>{{$pk->tenphongkham}}</h3>

                <p>{{$pk->ghichu}}</p>
                <span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></span>
                <a href="./badges.html" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="./img/badges/badge_1.svg" width="15" height="15" alt="" /></a>
              </div>
              <ul>
                <li><a href="#0" onclick="onHtmlClick('Doctors', 0)"><i class="icon_pin_alt"></i>View on map</a></li>
                <li><a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x0:0xa6a9af76b1e2d899!2sAssistance+%E2%80%93+H%C3%B4pitaux+De+Paris!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="_blank"><i class="icon_pin_alt"></i>Directions</a></li>
                <li><a href="./detail-page.html">Book now</a></li>
              </ul>
            </div>

          </div>
          @endforeach
          <!-- /box_list -->
        
        </div>
        <!-- /row -->

        
          
            
    
        <!-- /pagination -->
      </div>
      <!-- /col -->
      
      <aside class="col-lg-4" id="sidebar">
        <div id="map_listing" class="normal_list">
        </div>
      </aside>
      <!-- /aside -->
      
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
  </main>
  <script src="./js/jquery-2.2.4.min.js"></script>
  <script src="./js/common_scripts.min.js"></script>
  <script src="./assets/validate.js"></script>
  <script src="./js/functions.js"></script>
    
    <!-- SPECIFIC SCRIPTS -->
    <script src="../assets2/maps.googleapis.com/maps/api/js.js"></script>
    <script src="./js/map_listing.js"></script>
    <script src="./js/infobox.js"></script> 
    <script src="./js/jquery.selectbox-0.2.js"></script>
  <script>
    $(".selectbox").selectbox();
  </script>
  <!-- /main -->
@endsection