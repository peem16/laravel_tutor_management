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

<script src="js/Register&Login.js"></script>
<script src="js/reser&buy.js"></script>



{{-- <link rel="shortcut icon" href="../favicon.ico">
<link rel="stylesheet" type="text/css" href="css/normalize.css" />
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<link rel="stylesheet" type="text/css" href="css/set2.css" /> --}}



<!-- Google Font -->
<link href='https://fonts.googleapis.com/css?family=Poppins:400,500,600' rel='stylesheet' type='text/css'>

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


{{--
@auth ('admin')

@endauth --}}

@auth

@if ( Auth::user()->idemp != '')

		<a href="/" class="navbar-brand"><img src="images/iconbgfn.png" width=150 height=45;></a>

@else
	<a href="/" class="navbar-brand"><img src="images/iconbgfn.png" width=150 height=45;></a>

@endif


@endauth

@guest
	<a href="/" class="navbar-brand"><img src="images/iconbgfn.png" width=150 height=45;></a>

@endguest




		</div>

		<div class="collapse navbar-collapse">

			<ul class="nav navbar-nav navbar-right">
				<li><a href="#home" data-scroll>หน้าหลัก</a></li>

				<li><a href="#speakers" data-scroll>ข่าวสาร</a></li>
				<li><a href="#program" data-scroll>คอร์สเรียน</a></li>
				<li><a href="#register" data-scroll>สมัครสมาชิก</a></li>
				<!--<li><a href="#venue" data-scroll>Venue</a></li>-->
				{{-- <li><a href="#sponsors" data-scroll>ครูผู้สอนและทีมงาน</a></li> --}}
				<li><a href="#contact" data-scroll>ติดต่อ</a></li>
				<li><a href="help" data-scroll>ช่วยเหลือ</a></li>
			@auth
				<li><a href="webboard" data-scroll>เว็บบอร์ด</a></li>

			@endauth



@guest
	<li id="login" data-toggle="modal" data-target="#exampleModalCenter" class="login"><a style="color: #ef67a5" href="#Login" class="smoothScroll">เข้าสู่ระบบ</a></il>

@endguest

@auth
	<li class="nav-item dropdown">
			<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" style="color: #ef67a5" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				{{Auth::user()->firstname." ".Auth::user()->lastname}} <span class="caret"></span>
			</a>

			<div class="dropdown-menu"  aria-labelledby="navbarDropdown">
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
	{{-- <a class="dropdown-item" style="color: #2d9fd9" href="assessment">

			ประเมินผลการเรียน
	</a> --}}
@elseif (Auth::user()->idstudent!=0)
	<a class="dropdown-item" style="color: #2d9fd9" href="Transaction">

		ประวัติการชำระเงิน
	</a>
	<br>
	<a class="dropdown-item" style="color: #2d9fd9" href="edituser">

			แก้ไขข้อมูลส่วนตัว
	</a>

@endif

@endauth


									</div>

							</li>


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
						<label for="Username" class="col-md-4 control-label">ชื่อผู้ใช้</label>

						<input id="email" type="text" class="form-control" name="username" value="" required autofocus>

  {{ csrf_field() }}

						<br>
						<label for="Username" class="col-md-4 control-label">รหัสผ่าน</label>

						<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

						@if ($errors->has('password'))
								<span class="invalid-feedback">
										<strong>{{ $errors->first('password') }}</strong>
								</span>
						@endif

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn" style="background-color: #ef67a5">เข้าสู่ระบบ</button>
			</form>
        <button type="button" class="btn btn-secondary"  style="background-color: #25aae2" data-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>
</div>

<!-- =========================
    INTRO SECTION
============================== -->
<section id="intro" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12">
				<h1 class="wow fadeInUp" data-wow-delay="1.6s">EAKQ HOUSE OF LEARNING</h1>
			@guest
				<a href="#register" data-scroll class="btn btn-lg btn-danger " data-wow-delay="2.3s">สมัครสมาชิก</a>

			@endguest


			</div>


		</div>
	</div>
</section>


<!-- =========================
    OVERVIEW SECTION
============================== -->


<!-- =========================
    DETAIL SECTION
============================== -->



<!-- =========================
    VIDEO SECTION
============================== -->


<!--<section id="video" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="wow fadeInUp col-md-6 col-sm-10" data-wow-delay="1.3s">
				<h2>Watch Video</h2>
				<h3>Quisque ut libero sapien. Integer tellus nisl, efficitur sed dolor at, vehicula finibus massa. Sed tincidunt metus sed eleifend suscipit.</h3>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet. Dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet consectetuer diam nonummy.</p>
			</div>
			<div class="wow fadeInUp col-md-6 col-sm-10" data-wow-delay="1.6s">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/XDPwXQjAlB0" allowfullscreen></iframe>
				</div>
			</div>

		</div>
	</div>
</section>-->


<!-- =========================
    SPEAKERS SECTION
============================== -->
<section id="speakers" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12 wow bounceIn">
				<div class="section-title">
					<h2>ข่าวสาร</h2>
					<!--<p>Lorem ipsum dolor sit amet, maecenas eget vestibulum justo imperdiet.</p>-->
				</div>
			</div>

			<!-- Testimonial Owl Carousel section
			================================================== -->
			<div id="owl-speakers" class="owl-carousel">



				@foreach ($news as $key )

					<div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.9s">
						<div class="speakers-wrapper">
							<img src="storage/news/{{$key->pic}}" class="img-responsive" alt="speakers">
								<div class="speakers-thumb">
									<h3>	{{$key->Topics}}</h3>
									<h6>	{{$key->Content}}</h6>
								</div>
						</div>
					</div>



				@endforeach


			</div>

		</div>
	</div>
</section>


<!-- =========================
    PROGRAM SECTION
============================== -->
<section id="program" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="wow fadeInUp col-md-12 col-sm-12" data-wow-delay="0.6s">
				<div class="section-title">
					<h2>คอร์สเรียน</h2>
					<!--<p>Quisque ut libero sapien. Integer tellus nisl, efficitur sed dolor at, vehicula finibus massa. Sed tincidunt metus sed eleifend suscipit.</p>-->
				</div>
			</div>

			<div class="wow fadeInUp col-md-10 col-sm-10" data-wow-delay="0.9s">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="active"><a href="#fday" aria-controls="fday" role="tab" data-toggle="tab">วิชาดนตรี</a></li>
					<li><a href="#sday" aria-controls="sday" role="tab" data-toggle="tab">วิชาการ</a></li>

				</ul>
				<!-- tab panes -->
				<div class="tab-content">

					<div role="tabpanel" class="tab-pane active" id="fday">
						<!-- program speaker here -->





@foreach ($subjects as $key)

@if ($key->idtype == 1)
	<div class="program-divider col-md-12 col-sm-12"></div>

	<!-- program speaker here -->
	<div class="col-md-2 col-sm-2">
		<img src="images/music2.png" class="img-responsive" alt="program">
	</div>
	<div class="col-md-10 col-sm-10">
		<h6>
			{{-- <span><i class="fa fa-clock-o"></i> 10.00 AM</span>
			<span><i class="fa fa-map-marker"></i> Room 360</span> --}}
		</h6>
		<h3>{{$key->name}}</h3>
		@auth

				@if (Auth::user()->IDUserAccount)

									@if (Auth::user()->idstudent!=0&&$key->status==null)


										<button type="button" name="button"  class="reser" data-ids='{{$key->idcourse}}' data-name='{{$key->name}}'>จอง</button>

									@elseif (Auth::user()->idstudent!=0&&$key->idTesting>=0&&$key->status=='ผ่านการตรวจสอบ'&&$key->comment!=null)

										<button type="button" name="button"  class="buy" data-ids='{{$key->idcourse}}' data-test='{{$key->idTesting}}'  data-name='{{$key->name}}'>ซื้อ</button>


									@elseif (Auth::user()->idstudent!=0&&$key->idTesting>=0&&$key->status=='ผ่านการตรวจสอบ'&&$key->comment==null)


								<a href="Transaction">รับรหัสการทดสอบ</a>



									@elseif (Auth::user()->idstudent!=0&&$key->status=='ยังไม่ได้ชำระเงิน'||$key->status=='รอการตรวจสอบการชำระ')


<a href="Transaction">ตรวจสอบการชำระ</a>






									@endif
	@endif
@endauth


	<div class = "coursedetailja">	<p>{{$key->course_detail}}</p></div>
	</div>
@else

@endif


							<!-- program divider -->



@endforeach


					</div>

					<div role="tabpanel" class="tab-pane" id="sday">
						<!-- program speaker here -->


				 @foreach ($subjects as $key)

						@if ($key->idtype == 2)
							<div class="program-divider col-md-12 col-sm-12"></div>

							<!-- program speaker here -->
							<div class="col-md-2 col-sm-2">
								<img src="images/book.png" class="img-responsive" alt="program">
							</div>
							<div class="col-md-10 col-sm-10">
								<h6>
									<span><i class="fa fa-clock-o"></i> 10.00 AM</span>
									<span><i class="fa fa-map-marker"></i> Room 360</span>
								</h6>
								<h3>{{$key->name}}</h3>
									@auth
				@if (Auth::user()->IDUserAccount)
						@if (Auth::user()->idstudent!=0&&$key->status==null)


							<button type="button" name="button" class="reser" data-ids='{{$key->idcourse}}'data-name='{{$key->name}}'>จอง</button>

						@elseif (Auth::user()->idstudent!=0&&$key->idTesting>=0&&$key->status=='ผ่านการตรวจสอบ'&&$key->comment!=null)






							<button type="button" name="button"  class="buy" data-ids='{{$key->idcourse}}'  data-test='{{$key->idTesting}}'  data-name='{{$key->name}}'>ซื้อ</button>


						@elseif (Auth::user()->idstudent!=0&&$key->idTesting>=0&&$key->status=='ผ่านการตรวจสอบ'&&$key->comment==null)




					<a href="Transaction">รับรหัสการทดสอบ</a>


					@elseif (Auth::user()->idstudent!=0&&$key->status=='ยังไม่ได้ชำระเงิน'||$key->status=='รอการตรวจสอบการชำระ')


					<a href="Transaction">ตรวจสอบการชำระ</a>




						@endif

						@endauth
	@endif

<div class = "coursedetailja"><p>{{$key->course_detail}}</p></div>
</div>
@else

@endif

													<!-- program divider -->



						@endforeach


					</div>


				</div>

		</div>
	</div>
</section>


<!-- =========================
   REGISTER SECTION
============================== -->
<section id="register" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="wow fadeInUp col-md-7 col-sm-7" data-wow-delay="0.6s">
				<h2>สมัครสมาชิก</h2>
				<!--<h3>Nunc eu nibh vel augue mollis tincidunt id efficitur tortor. Sed pulvinar est sit amet tellus iaculis hendrerit.</h3>-->
				<p>สมัครสมาชิกเพื่อทำการจองคอร์สเรียนหรือซื้อคอร์สเรียน</p>
			</div>

			<div class="wow fadeInUp col-md-5 col-sm-5" data-wow-delay="1s">
				<form action="#" method="post" >
						{{ csrf_field() }}


						<h3 id="success" style="color: #37bfc6"> </h3>

												<input name="username" type="text" class="form-control" id="username" placeholder="ชื่อผู้ใช้" required>
													<p id="ee1" style="color: red" ></p>
												<input name="password" type="text" class="form-control" id="password2" placeholder="รหัสผ่าน" required>
							<p id="ee2" style="color: red" ></p>
											<input name="firstname" type="text" class="form-control" id="firstname" placeholder="ชื่อจริง" required>
											<p id="ee3" style="color: red" ></p>
											<input name="lastname" type="text" class="form-control" id="lastname" placeholder="นามสกุล" required>
										<p id="ee4" style="color: red" ></p>
											<input name="phone" type="telephone" class="form-control" id="phone" placeholder="เบอร์โทรศัพท์" required>
									<p id="ee5" style="color: red" ></p>
											<input name="email" type="email" class="form-control" id="email2" placeholder="อีเมล์" required>
												<p id="ee6" style="color: red" ></p>
											อายุ <select id="age" class="" name="age" style="color: #000000" required>
														<?php for ($i=0; $i < 60; $i++) {
													echo "<option value=".$i.">$i</option>";

														} ?>
											</select>
											<p id="ee7" style="color: red" ></p>
											ผู้ชาย<input type="radio" name="group1" value="male" id="group1.1" style="padding-	bottom: -2px" required>

											ผู้หญิง<input type="radio" name="group1" style="padding-	bottom: -2px" value="female" id="group1.2" >
										<p id="ee8" style="color: red" ></p>
											<br>

											<br>
											ที่อยู่
											<textarea name="address" rows="4" cols="40" id="address" style="color: black;" required></textarea>
						  			<p id="ee9" style="color: red" ></p>


											<div class="col-md-offset-6 col-md-6 col-sm-offset-1 col-sm-10">



						<input name="submit" type="submit2" style="cursor:Pointer" class="form-control" id="submit_studen"   value="สมัครสมาชิก">
					</div>
				</form>
			</div>

			<div class="col-md-1"></div>

		</div>
	</div>
</section>


<!-- =========================
    FAQ SECTION
============================== -->
<section id="faq" class="parallax-section">
	<div class="container">
		<div class="row">

			<!-- Section title
			================================================== -->




		</div>
	</div>
</section>


<!-- =========================
    VENUE SECTION
============================== -->
<!--<section id="venue" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="wow fadeInLeft col-md-offset-1 col-md-5 col-sm-8" data-wow-delay="0.9s">
				<h2>Venue</h2>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet. Dolore magna aliquam erat volutpat.</p>
				<h4>New Event</h4>
  				<h4>120 Market Street, Suite 110</h4>
  				<h4>San Francisco, CA 10110</h4>
				<h4>Tel: 010-020-0120</h4>
			</div>

		</div>
	</div>
</section>-->


<!-- =========================
    SPONSORS SECTION
============================== -->


<!-- =========================
    CONTACT SECTION
============================== -->
<section id="contact" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="wow fadeInUp col-md-offset-1 col-md-5 col-sm-6" data-wow-delay="0.6s">
				<div class="contact_des">
					<h3>สถานที่ทำการ</h3>
					<p>สถาบันสอนดนตรีและกวดวิชา เอ็กคิว (EakQ) ที่ตั้ง 179 ถนน โชคชัย 4 เขตลาดพร้าว</p>
					<p>แขวงลาดพร้าว กรุงเทพฯ 10230 เบอร์โทรศัพท์: 08-5905-8222, 02-044-0467</p>

					<a href="Resume" class="btn btn-danger">สมัครเป็นครู</a>

							<a href="tutorcheck" class="btn btn-danger">ตรวจสอบการสมัครเป็นครู</a>
				</div>
			</div>




			<div class="wow fadeInUp col-md-5 col-sm-6" data-wow-delay="0.9s">


					<!-- Section title -->
<!-- Google maps print -->
	<div id="map" class="element-line">
			<div class="moduletable">


<div class="custom"  >
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d242.1584304334568!2d100.59671432118789!3d13.806888854853868!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1f421138d85cde1e!2zRWFrUSAo4LmA4Lit4LmH4LiB4LiE4Li04LinKSAiSG91c2Ugb2YgTGVhcm5pbmci!5e0!3m2!1sen!2sth!4v1471796018576" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
	</div>

</div>
	<!-- Google maps print -->
<!-- form contact -->
	<div class="container">

				</div>


		</div>
	</div>
</section>




<div class="modal" tabindex="-1" role="dialog" id="modalre">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">จองคอร์สเรียน</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p id='bodyre'></p>
<input type="hidden" name="" value="" id="hideids">

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
			{{-- <th scope="col"> </th> --}}



    </tr>
  </thead>
  <tbody id="bodygrade">

  </tbody>
</table>



				<p style="color:red">*การจองทุกรอบจะต้องมาทดสอบที่สถาบันสอนดนตรีและกวดวิชา</p>
				<p style="color:red">*กรุณาโทรมาสอบถามเวลาในการเรียนคอร์ส เพราะทางสภาบันจะไม่เปิดเผยข้อมูล</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="confirmre">ยืนยัน</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด	</button>
      </div>
    </div>
  </div>
</div>

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
						{{-- <th scope="col"> </th> --}}



			    </tr>
			  </thead>
			  <tbody id="bodygrade2">

			  </tbody>
			</table>


<p id="pkey" hidden>keyprivate</p>
 <input type="checkbox" id="keycheck" hidden aria-label="Checkbox for following text input">

<input type="text" name="" value=""  hidden id='keyprivate'>
<button type="button" name="button" hidden id="btnkey">ยืนยัน</button>
<p id="numberss" style="color:red" hidden> </p>
ิ<br>


<button type="button" name="button" id="selecttime" hidden>เลือก</button>
{{-- <a href="http://localhost:8000/timetableshow" target="_blank">แสดงตารางเรียน</a> --}}


<input type="date" lass="form-control"  name="" min='today'   id='date1' value="">

<input type="date" lass="form-control"  name="" value="" id='date2'  disabled>

<input type="time" value="00:00"   min="08:00" max="19:00" id='time_1'>
<input type="time" value="00:00"  min="09:00" max="20:00" id='time_2' disabled>

<button type="button" name="button" class="btn btn-primary" id="buydd">ซื้อได้</button>
<label id="showErorr" style="color:red" ></label>





    </div>
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


				      <th scope="col">Start_date</th>
							<th scope="col">End_date</th>
							<th scope="col">Start_time</th>
				      <th scope="col">End_time</th>
							<th scope="col">action</th>



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
    FOOTER SECTION
============================== -->



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
