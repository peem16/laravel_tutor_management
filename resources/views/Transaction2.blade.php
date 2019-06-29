<!DOCTYPE html>
<html lang="en">
<head>
<!--
New Event
http://www.templatemo.com/tm-486-new-event
-->
<title>EAKQ HOUSE</title>
<meta name="csrf-token" content="{{ csrf_token() }}" />

<meta name="description" content="">
<meta name="author" content="">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/owl.theme.css">
<link rel="stylesheet" href="css/owl.carousel.css">
<script type="text/javascript" src="js/jquery-3.3.1.min.js" charset="utf-8"></script>

<!-- Main css -->
<link rel="stylesheet" href="css/style.css">




<!-- Google Font -->
<link href='https://fonts.googleapis.com/css?family=Poppins:400,500,600' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="js/Transaction.js" charset="utf-8"></script>
</head>
<body data-spy="scroll" data-offset="50" data-target=".navbar-collapse">

<!-- =========================
     PRE LOADER
============================== -->
<div class="preloader">

	<div class="sk-rotating-plane"></div>

</div>


<!-- =========================
     NAVIGATION LINKS
============================== -->
<div class="navbar navbar-fixed-top custom-navbar" role="navigation">
	<div class="container">

		<!-- navbar header -->
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>


			@auth

			@if ( Auth::user()->idemp != '')
		<a href="/" class="navbar-brand"><img src="images/iconbgfn.png" width=150 height=45;></a>
			@else
	<a href="/" class="navbar-brand"><img src="images/iconbgfn.png" width=150 height=45;></a>

			@endif


			@endauth

			@guest
				<a href="/" class="navbar-brand">EAKQ HOUSE</a>

			@endguest



		</div>

		<div class="collapse navbar-collapse">

			<ul class="nav navbar-nav navbar-right">
				<li><a href="/" class="smoothScroll">หน้าแรก</a></li>

				@guest
					<li id="login" data-toggle="modal" data-target="#exampleModalCenter" class="login"><a style="color: #ef67a5" href="#Login" class="smoothScroll">Login</a></il>

				@endguest

				@auth
					<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" style="color: #ef67a5" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								{{Auth::user()->firstname." ".Auth::user()->lastname}} <span class="caret"></span>
							</a>

							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" style="color: #2d9fd9" href="{{ route('logout') }}"
								>
											ออกจากระบบ

									</a>
									<br>
				@endauth

				@auth


				@if (Auth::user()->idtutor !=0)

					<a class="dropdown-item" style="color: #2d9fd9" href="testing">

							ทดสอบ
					</a>
					<br>
					<a class="dropdown-item" style="color: #2d9fd9" href="edituser">

							แก้ไขข้อมูลส่วนตัว
					</a>
				@elseif (Auth::user()->idstudent!=0)
					<a class="dropdown-item" style="color: #2d9fd9" href="Transaction">

							ประวัติการชำระเงิน
					</a>
					<br>
					<a class="dropdown-item" style="color: #2d9fd9" href="edituser">

							แก้ไขข้อมูล
					</a>

				@endif

				@endauth

		   </li>

			</ul>

		</div>

	</div>
</div>
<!-- <div class ="loginbar">Login</div> -->
<div class="modal" tabindex="-1" role="dialog" id="exampleModalCenter">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="POST" action="{{ route('login') }}">
						<label for="Username" class="col-md-4 control-label">Username</label>

						<input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="username" value="{{ old('email') }}" required autofocus>

						@if ($errors->has('email'))
								<span class="invalid-feedback">
										<strong>{{ $errors->first('email') }}</strong>
								</span>
						@endif
						<br>
						<label for="Username" class="col-md-4 control-label">Password</label>

						<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

						@if ($errors->has('password'))
								<span class="invalid-feedback">
										<strong>{{ $errors->first('password') }}</strong>
								</span>
						@endif

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn" style="background-color: #ef67a5">Login</button>
			</form>
        <button type="button" class="btn btn-secondary"  style="background-color: #25aae2" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- =========================
    INTRO SECTION
============================== -->
<section id="intro" class="parallax-section">


		<div class="list-group  col-md-4" id="myList" role="tablist">
			<a class="list-group-item list-group-item-action active" id="tab1" data-toggle="list" href="#home" role="tab" data-tab="1">รายการชำระเงินการจอง</a>
			<a class="list-group-item list-group-item-action"  id="tab2" data-toggle="list" href="#buy" role="tab" data-tab="2">รายการชำระเงินการซื้อ</a>
			{{-- <a class="list-group-item list-group-item-action"  id="tab2" data-toggle="list" href="#profile" role="tab" data-tab="3">ประวัติรายการชำระเงิน</a> --}}

		</div>
	<div class="container" >



<div id ="jjj"><h3>รายการชำระเงิน</h3></div>

	<div class="col-md-8">

	 <div class="tab-content">
	   <div class="tab-pane active" id="home" role="tabpanel">

			 <div class="wow fadeInUp col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10" data-wow-delay="0.9s">
 				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					@foreach ($trans as $key )
<form class="" action="confirmreser" method="post" enctype="multipart/form-data">


{{ csrf_field() }}

   					<div class="panel-default panel" style="	margin-left: -50px;">
    						<div class="panel-heading" role="tab" id="heading{{$key->idpay_reserve}}">
       						<h4 class="panel-title">
         						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key->idpay_reserve}}" aria-expanded="false" aria-controls="collapse{{$key->idpay_reserve}}">
											{{$key->name}}  เมื่อวันที่ 	{{ date("Y-m-d",strtotime($key->created_at)) }}


<input type="hidden" name="idreser" value="{{$key->idpay_reserve}}">
         						</a>
       						</h4>
     					</div>
    						<div id="collapse{{$key->idpay_reserve}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$key->idpay_reserve}}">
       						<div class="panel-body">
@if ($key->status == "ยังไม่ได้ชำระเงิน")

	<p>	ค่าจอง 100 บาท</p>

	<input type="file" class="custom-file-input" name="file" id="validatedCustomFile" required>

	<input type="submit" name="" value="ยืนยัน">



@elseif ($key->ask1!=null)
<div class="" style=" text-align: left" >


	@if ($key->idtype == "1")

<p >1.ความถูกต้องและแม่นยำของจังหวะ</p>

<p style="padding-left: 20px;">{{$key->ask1}} คะแนน</p>
<p>2.อ่านโน้ตบทฝึกที่กำหนดให้ได้ถูกต้อง</p>
<p style="padding-left: 20px;">{{$key->ask2}} คะแนน </p>
<p>3.คุณภาพของเสียงที่บรรเลงออกมา</p>
<p style="padding-left: 20px;"> {{$key->ask3}} คะแนน</p>

<p>4.ฟังโน้ตบทฝึกที่กำหนดให้ได้ถูกต้อง</p>
<p style="padding-left: 20px;">{{$key->ask4}} คะแนน</p>
<p>5.ความรู้ในวิชาดนตรีด้านทฤษฎ</p>
<p style="padding-left: 20px;">{{$key->ask5}} คะแนน</p>
@else

	<p >1.ความถูกต้องในการทำแบบทดสอบ</p>

	<p style="padding-left: 20px;">{{$key->ask1}} คะแนน</p>
	<p>2.ความรู้ด้านเนื้อหาในวิชาที่เรียน</p>
	<p style="padding-left: 20px;">{{$key->ask2}} คะแนน</p>
	<p>3.ความถูกต้องในการอ่าน/คำนวณในวิชาที่เรียน</p>
	<p style="padding-left: 20px;">{{$key->ask3}} คะแนน</p>

	<p>4.ผลการทดสอบนักเรียนทำได้ตรงตามที่คาดหวัง</p>
	<p style="padding-left: 20px;">{{$key->ask4}} คะแนน</p>
	<p>5.ผลการทดสอบของนักเรียนอยู่ในระดับใด</p>
	<p style="padding-left: 20px;">{{$key->ask5}} คะแนน</p>

@endif



<p>คำแนะนำเพิ่มเติม</p>
<p>{{$key->comment}}</p>
{{-- <p>คอร์สที่แนะนำ</p>
<p>{{$key->nameGrade}}</p> --}}
</div>

<button type="button" name="button" id="buycou" data-id="{{$key->idcourse}}" data-test="{{$key->idTesting}}" >ซื้อคอร์ส</button>



@elseif ($key->status=='ผ่านการตรวจสอบ')



	<p>{{$key->status}}</p>

	<p>รหัสทดสอบคือ :</p>
	<p>{{$key->random_key}}</p>

@else

	<p>{{$key->status}}</p>




@endif



       						</div>
    						 </div>

  					</div>
					</form>

					@endforeach






  				 </div>
 			</div>

		 </div>

		 <div class="tab-pane " id="buy" role="tabpanel">

			 <div class="wow fadeInUp col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10" data-wow-delay="0.9s">
 				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						@foreach ($buy as $key )
<form class="" action="confirmbuy" method="post" enctype="multipart/form-data">


{{ csrf_field() }}
   					<div class="panel panel-default"  style="	margin-left: -50px;">
    						<div class="panel-heading" role="tab" id="headingw{{$key->idbuy}}">
       						<h4 class="panel-title">
         						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsew{{$key->idbuy}}" aria-expanded="false" aria-controls="collapsew{{$key->idbuy}}">
											{{$key->name}}  เมื่อวันที่ 	{{ date("Y-m-d",strtotime($key->datetime)) }}


<input type="hidden" name="idbuy" value="{{$key->idbuy}}">
         						</a>
       						</h4>
     					</div>
    						<div id="collapsew{{$key->idbuy}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingw{{$key->idbuy}}">
       						<div class="panel-body">
@if ($key->status == "ยังไม่ได้ชำระเงิน")



	<p style="text-align:left;">ประเภท {{$key->nameGrade}} จำนวน {{$key->amount_courses}} ครั้ง	ค่าซื้อคอร์ส {{$key->buy_price}} บาท      </p>

	<p style="text-align:left;">	วันเริ่มเรียน {{$key->date_start}} </p>
	<p style="text-align:left;">	วันสิ้นสุด {{$key->date_end}} </p>
	<p style="text-align:left;">	เวลาเริ่มเรียน {{$key->time_start}} </p>
	<p style="text-align:left;">	เวลาสิ้นสุด {{$key->time_end}} </p>


	<input type="file" class="custom-file-input" name="file" id="validatedCustomFile" required>

	<input type="submit" name="" value="ยืนยัน">








@elseif ($key->status=='ผ่านการตรวจสอบ')


@if ($key->idtype==1)
	<p>{{$key->status}}</p>
	@if ($key->keyinput)
		<p>	รหัสกลุ่มการเรียนคือ</p>
			<p>{{$key->keyinput}}</p>
	@endif

@else
	<p>{{$key->status}}</p>

@endif



@else

	<p>{{$key->status}}</p>




@endif



       						</div>
    						 </div>
  					</div>
					</form>

					@endforeach






  				 </div>
 			</div>

		 </div>

 </div>
		</div>


<script type="text/javascript">

$('#myList a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')




if($(this).data('tab')==1){

	$('#tab1').addClass('active');

  //
  $('#tab2').removeClass('active');


}else{

	$('#tab2').addClass('active');

  //
  $('#tab1').removeClass('active');

}
})


</script>
</section>













<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="timetable">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

			<table class="table">
			  <caption>คอร์สเรียน</caption>
			  <thead>
			    <tr>




						<th scope="col">ประเภทการเรียน</th>
			      <th scope="col">จำนวนครั้ง</th>
						<th scope="col">ครั้งละ</th>
						<th scope="col">ระยะเวลา</th>
			      <th scope="col">ค่าเรียน(บาท)</th>
						<th scope="col">หมายเหตุ</th>
						<th scope="col">เลือก</th>


			    </tr>
			  </thead>
			  <tbody id="bodygrade">

			  </tbody>
			</table>


<p id="pkey" hidden>keyprivate</p>
 <input type="checkbox" id="keycheck" hidden aria-label="Checkbox for following text input">



<input type="text" name="" value=""  hidden id='keyprivate'>
<button type="button" name="button" hidden id="btnkey">ยืนยัน</button>
<p id="numberss" style="color:red" hidden> </p>
ิ<br>
<p id="ee3" style="color: red" ></p>


<button type="button" name="button" id="selecttime" hidden>เลือก</button>
{{-- <a href="http://localhost:8000/timetableshow" target="_blank">แสดงตารางเรียน</a> --}}



<input type="date" lass="form-control"  name="" min='today'   id='date1' value="">

<input type="date" lass="form-control"  name="" value="" id='date2'  disabled>

<input type="time" value="00:00"   min="08:00" max="19:00"  id='time_1' >
<input type="time" value="00:00"  min="09:00" max="20:00" id='time_2' disabled>

<button type="button" name="button" class="btn btn-primary" id="buydd">ซื้อได้</button>
    <label id="showErorr" style="color:red" ></label>





    </div>
  </div>
</div>


<div class="modal fade" id="timetablessss" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เลือกคอร์สเรียนที่มีอยู่แล้ว</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<table class="table">
				  <caption>ตารางเรียน</caption>
				  <thead>
				    <tr>


				      <th scope="col">วันที่เริ่ม</th>
							<th scope="col">วันสิ้นสุด</th>
							<th scope="col">เวลาเริ่มเรียน</th>
				      <th scope="col">เวลาสิ้นสุด</th>
							<th scope="col">เลือก</th>



				    </tr>
				  </thead>
				  <tbody id="bodytime">

				  </tbody>
				</table>
      </div>
      <div class="modal-footer">
				<p id="errorsll" style="color:red"></p>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="savetimess">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- =========================
    OVERVIEW SECTION
============================== -->



<!-- =========================
    DETAIL SECTION
============================== -->



<!-- =========================
    FOOTER SECTION
============================== -->
<footer>
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12">
				<p class="wow fadeInUp" data-wow-delay="0.6s">Copyright &copy; 2016 Your Company

                    | Design: <a rel="nofollow" href="http://www.templatemo.com/page/1" target="_parent">Templatemo</a></p>

				<ul class="social-icon">
					<li><a href="#" class="fa fa-facebook wow fadeInUp" data-wow-delay="1s"></a></li>
					<li><a href="#" class="fa fa-twitter wow fadeInUp" data-wow-delay="1.3s"></a></li>
					<li><a href="#" class="fa fa-dribbble wow fadeInUp" data-wow-delay="1.6s"></a></li>
					<li><a href="#" class="fa fa-behance wow fadeInUp" data-wow-delay="1.9s"></a></li>
					<li><a href="#" class="fa fa-google-plus wow fadeInUp" data-wow-delay="2s"></a></li>
				</ul>

			</div>

		</div>
	</div>
</footer>

<p id="keyeee"> </p>
<!-- Back top -->
<a href="#back-top" class="go-top"><i class="fa fa-angle-up"></i></a>


<!-- =========================
     SCRIPTS
============================== -->
<script src="js/jquery.js"></script>

<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.parallax.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>
<script	>

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
	});


	</script>

</body>
</html>
