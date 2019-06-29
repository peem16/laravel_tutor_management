<!DOCTYPE html>
@extends('mainadmin')

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>EAKQ Admin</title>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js" charset="utf-8"></script>

    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
    <!-- Bootstrap core CSS -->
    {{-- <script type="text/javascript" src="js/jq.schedule.js"></script> --}}

    <script type="text/javascript" src="js/timetable.js"></script>


    <link rel="stylesheet" type="text/css" href="css/style2.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>

          <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript" language="javascript"></script>

          <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


  </head>
  <style type="text/css" >
  body, html {width: 100%; height: 100%; margin: 0; padding: 0}
  .first-row {position: absolute;top: 0; left: 0; right: 0; height: 100px; background-color: lime;}
  .second-row {position: initial; top: 100px; left: 0; right: 0; bottom: 0;  }
  .second-row iframe {position: absolute; display: block; width: 100%; height: 100%; border: none;}
   </style>
  <body >
    <script	>

    	$.ajaxSetup({
    		headers: {
    			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    						}
    	});


    	</script>
  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->

      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>EAKQ HOUSE Management</b></a>
            <!--logo end-->

            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

              	  <p class="centered"><a href="#"><img src="assets/img/ui-employee.png" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">{{Auth::user()->firstname." ".Auth::user()->lastname}} </h5>


@if (Auth::user()->position == "admin"||Auth::user()->position == "Registration")

                  <li class="sub-menu" >
                      <a id="sub-menu1" href="javascript:;" >
                          <i class="fas fa-graduation-cap"></i>
                          <span>จัดการข้อมูลการเรียน</span>
                      </a>
                      <ul class="sub">
                          <li id="sub1"><a  href="room">จัดการห้องเรียน</a></li>
                          <li id="sub2"><a  href="Subjects">จัดการวิชาเรียน</a></li>
                      </ul>
                  </li>
@endif
@if (Auth::user()->position == "admin"||Auth::user()->position == "Registration")

                  <li class="sub-menu" >
                      <a id="sub-menu2" href="javascript:;" >
                          <i class="fas fa-user"></i>
                          <span>จัดการข้อมูลผู้ใช้</span>
                      </a>
                      <ul class="sub">
                          <li id="sub3"><a  href="employee_management">จัดการพนักงาน</a></li>
                          <li id="sub4"><a  href="Checkresume">ตรวจสอบเอกสารการสมัคร</a></li>
                          <li id="sub5"><a  href="allow_tutor">การอนุมัติเป็นครู</a></li>
                          <li id="sub5"><a  href="tutor_management">จัดการครู</a></li>
                          <li id="sub5"><a  href="student_management">จัดการนักเรียน</a></li>




                      </ul>
                  </li>
                @endif

                @if (Auth::user()->position == "admin"||Auth::user()->position == "Registration")

                  <li class="sub-menu">
                      <a href="timetable" >
                        <i class="fas fa-table"></i>
                          <span>จัดการตารางเรียน</span>
                      </a>

                  </li>
                @endif

                @if (Auth::user()->position == "admin"||Auth::user()->position == "Officer")

                  <li class="sub-menu">
                      <a href="newsmanagement" >
                        <i class="fas fa-newspaper"></i>
                          <span>จัดการข่าวสถาบัน</span>
                      </a>

                  </li>
                @endif
              @if (Auth::user()->position == "admin"||Auth::user()->position == "Accounting")
                  <li class="sub-menu">
                      <a href="paymentcheck" >
                          <i class="fas fa-credit-card"></i>
                          <span>จัดการชำระเงิน</span>
                      </a>
                      <ul class="sub">
                        <li id="sub5"><a  href="paymentcheck">ตรวจสอบการจองคอร์ส</a></li>

                        <li id="sub5"><a  href="paymentcheckbuy">ตรวจสอบการซื้อคอร์</a></li>




                          </ul>
                  </li>
                @endif
                @if (Auth::user()->position == "admin")

                  <li class="sub-menu">
                      <a href="reportbuy" >
                          <i class="fas fa-file-alt"></i>
                          <span>รายงาน</span>
                      </a>
                      <ul class="sub">

                        <li id="sub5"><a  href="reportbuy">รายกงานการซื้อคอร์สเรียน</a></li>

        <li id="sub5"><a  href="reporttutor">รายงานผลการประเมินครูผู้สอนของนักเรียน</a></li>
        <li id="sub5"><a  href="reporttutor2">รายงานผลการประเมินนักเรียน</a></li>

        <li id="sub5"><a  href="reportcheckstuden">รายงานผลการเข้าสอน</a></li>

                          </ul>
                  </li>
                @endif

              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->

  <section id="container" >








{{ csrf_field() }}

      <section id="main-content">
          <section class="wrapper">
      		<div class="row mt">
      			<div class="col-lg-12 col-md-12 col-sm-12">
              <! -- STRIPPED PROGRESS BARS -->
              <div class="showback second-row">
                <h4><i class="fa fa-angle-right"></i> ตารางเรียน</h4>

                {{-- <a id="addtimetable" class="btn addtimetable"  style="background: #25a8e0; color: #ffffff; margin-bottom: 8px;">เพิ่ม</a> --}}


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">รายละเอียด</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body showbody">

<input type="text" hidden class="hidden" name="" value="" id="idhiden">

        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">ชนิดวิชา</label>
            <div class="col-sm-10">


              @foreach($type as $type3)

                                  <div class="radio">
                                    <label>
                                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="{{$type3->idtype}}">
                                      {{$type3->nametype}}
                                    </label>
                                  </div>

              @endforeach



            </div>
        </div>

<select class="" name="" id="subject">

</select>

<select class="" name="" id="grade">

</select>

<button type="button" name="button" id="showdetail">x</button>




  <input type="text"  id='Idcourse_detai_h' value="">
  <input type="text"  id='idcourse_h' value="">
  <input type="text"  id='idGrade_h' value="">
  <input type="text" id='amount_courses_h' value="">





<input type="date" name="" min='today' id='date1' value="">

<input type="date" name="" value="" id='date2'  disabled>

        <input type="time" value="00:00"   min="08:00" max="19:00" id='time_1'>
        <input type="time" value="00:00"  min="09:00" max="20:00" id='time_2' disabled>
<select class="" name="" id="room">

@foreach ($room as $key )

<option value="{{$key->idroom}}">{{$key->number}}</option>

@endforeach

</select>

<select class="" name="tutor" id="tutor">



</select>


<p id="ee1" style="color: red" ></p>

      </div>
<div class="delmodal">
คุณแน่ใจรึยังว่าจะลบ?
</div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary " id="saveadd">บันทึก</button>
        <button type="button" class="btn btn-primary " id="saveedit">แก้ไข</button>
        <button type="button" class="btn btn-primary " id="savedel">ลบ</button>

      </div>
    </div>
  </div>
</div>

<div class="modal fade modal-large" id="detailsub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">รายละเอียด</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">วิชา</th>
        <th scope="col">ระดับ</th>
        <th scope="col">จำนวนครั้ง</th>
        <th scope="col">ครั้งละ</th>
        <th scope="col">ระยะเวลา</th>
        <th scope="col">ค่าเรียน</th>
        <th scope="col">หมายเหตุ</th>
        <th scope="col">action</th>


      </tr>
    </thead>
    <tbody id="bodysubdetail">



    </tbody>
  </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary" id="savevalue">Save changes</button>
      </div>
    </div>
  </div>
</div>





<table  id="tablepayment" class="table table-bordered" style="border-color:#000; text-align:center;" >
  <thead>
    <tr id="headtable">
      <th scope="col"  style="border-color:#000; text-align:center;">#</th>
      <th scope="col"  style="border-color:#000; text-align:center;">เวลาเริ่มต้น</th>
      <th scope="col"  style="border-color:#000; text-align:center;">เวลาสิ้นสุด</th>
      <th scope="col"  style="border-color:#000; text-align:center;">วันเริ่มต้น</th>
      <th scope="col" style="border-color:#000; text-align:center;">วันสิ้นสุด</th>
      <th scope="col"  style="border-color:#000; text-align:center;">ครู</th>
      <th scope="col"  style="border-color:#000; text-align:center;">ห้องเรียน</th>
    <th scope="col"  style="border-color:#000; text-align:center;"></th>
    </tr>
  </thead>
  <tbody id="bodytable">

  </tbody>
</table>







  <iframe id="frame"  src="http://localhost:8000/timetableshow" />


      </section><!-- /MAIN CONTENT -->

</section>

<!-- Modal -->

<!-- Modal -->


<footer class="site-footer">
    <div class="text-center">
        2014 - Alvarez.is
        <a href="index.html#" class="go-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
</footer>
<!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->

<script src="assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="assets/js/jquery.sparkline.js"></script>


<!--common script for all pages-->
<script src="assets/js/common-scripts.js"></script>

<script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="assets/js/gritter-conf.js"></script>

<!--script for this page-->
<script src="assets/js/sparkline-chart.js"></script>
<script src="assets/js/zabuto_calendar.js"></script>

<script type="text/javascript">
  $(document).ready(function () {
  var unique_id = $.gritter.add({
      // (string | mandatory) the heading of the notification
      title: 'Welcome to Dashgum!',
      // (string | mandatory) the text inside the notification
      text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for <a href="http://blacktie.co" target="_blank" style="color:#ffd777">BlackTie.co</a>.',
      // (string | optional) the image to display on the left
      image: 'assets/img/ui-sam.jpg',
      // (bool | optional) if you want it to fade out on its own or just sit there
      sticky: true,
      // (int | optional) the time you want it to be alive for before fading out
      time: '',
      // (string | optional) the class name you want to apply to that specific message
      class_name: 'my-sticky-class'
  });

  return false;
  });
</script>

<script type="application/javascript">
  $(document).ready(function () {



    var d1 = new Date();
    d1.setDate(d1.getDate());

    var d11 = d1.getDate();

    var d112 = (d1.getMonth()+1);

    if(d11.toString().length==1){
    if(d112.toString().length==1){

    var d111 = d1.getFullYear()+'-0' + (d1.getMonth()+1) + '-0'+d1.getDate();

    }else{

    var d111 = d1.getFullYear()+'-' + (d1.getMonth()+1) + '-0'+d1.getDate();

    }




    }else{
    if(d112.toString().length==1){

    var d111 = d1.getFullYear()+'-0' + (d1.getMonth()+1) + '-'+d1.getDate();


    }else{
    var d111 = d1.getFullYear()+'-' + (d1.getMonth()+1) + '-'+d1.getDate();


    }


    }

    document.getElementById("date1").min = d111;





      $("#date-popover").popover({html: true, trigger: "manual"});
      $("#date-popover").hide();
      $("#date-popover").click(function (e) {
          $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
          action: function () {
              return myDateFunction(this.id, false);
          },
          action_nav: function () {
              return myNavFunction(this.id);
          },
          ajax: {
              url: "show_data.php?action=1",
              modal: true
          },
          legend: [
              {type: "text", label: "Special event", badge: "00"},
              {type: "block", label: "Regular event", }
          ]
      });
  });


  function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
  }
</script>



</body>
</html>
