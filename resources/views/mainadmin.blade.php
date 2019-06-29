<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>EAKQ Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <script type="text/javascript" src="js/jquery-3.3.1.min.js" charset="utf-8"></script>

  <body>
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
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="เมนูจร๊า" style="color:#ef67a7;"></div>
              </div>
            <!--logo start-->
            <a href="admin" class="logo"><b>EAKQ HOUSE MANAGEMENT</b></a>
            <!--logo end-->

            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout">Logout</a></li>
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
                  @if (Auth::user()->position == "admin")

                                    <li class="sub-menu" >
                                        <a id="sub-menu1" href="javascript:;" >
                                            <i class="fas fa-graduation-cap"></i>
                                            <span>จัดการข้อมูลสถาบัน</span>
                                        </a>
                                        <ul class="sub">
                                            <li id="sub1"><a  href="station">จัดการที่ตั้งสถาบัน</a></li>

                                        </ul>
                                    </li>
                  @endif

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
                      <a href="report" >
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
  <body background="images/eakqbg.png" width=1366 height=768;>
  <section id="container">

  @yield('section')




      <!--main content end-->
      <!--footer start-->
      <!-- <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer> -->
      <!--footer end-->
  </section>
</body>
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

        // $(document).ready(function () {
        // var unique_id = $.gritter.add({
        //     // (string | mandatory) the heading of the notification
        //     title: 'Welcome to Dashgum!',
        //     // (string | mandatory) the text inside the notification
        //     text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for <a href="http://blacktie.co" target="_blank" style="color:#ffd777">BlackTie.co</a>.',
        //     // (string | optional) the image to display on the left
        //     image: 'assets/img/ui-sam.jpg',
        //     // (bool | optional) if you want it to fade out on its own or just sit there
        //     sticky: true,
        //     // (int | optional) the time you want it to be alive for before fading out
        //     time: '',
        //     // (string | optional) the class name you want to apply to that specific message
        //     class_name: 'my-sticky-class'
        // });
        //
        // return false;
        // });
	</script>

	<script type="application/javascript">
        $(document).ready(function () {

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
