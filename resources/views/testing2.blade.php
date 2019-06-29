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
			<a href="/" class="navbar-brand"><img src="images/iconbgfn.png" width=150 height=45;></a>

		</div>

		<div class="collapse navbar-collapse">

			<ul class="nav navbar-nav navbar-right">
				<li><a href="/" class="smoothScroll">Home</a></li>


				@guest
					<li id="login" data-toggle="modal" data-target="#exampleModalCenter" class="login"><a style="color: #ef67a5" href="#Login" class="smoothScroll">Login</a></il>

				@endguest

				@auth
					<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" style="color: #ef67a5" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								{{Auth::user()->firstname." ".Auth::user()->lastname}} <span class="caret"></span>
							</a>

							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{ route('logout') }}"
								>
											Logout

									</a>
									<br>
				@endauth

				@auth


				@if (Auth::user()->idtutor !=0)

					<a class="dropdown-item" href="testing">

							ทดสอบ
					</a>
					<br>
					<a class="dropdown-item" href="edituser">

							แก้ไขข้อมูล
					</a>
				@elseif (Auth::user()->idstudent!=0)
					<a class="dropdown-item" href="Transaction">

							ประวัติ
					</a>
					<br>
					<a class="dropdown-item" href="edituser">

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
	<div class="container">
		<div class="row">




<form class="" action="testrecord" method="post">

  <div class="col-md-2 col-sm-2">
    <label for="idtest">กรุณากรอกรหัสทดสอบ</label>

    <input type="text" name="idtest" value="" id="idtest" class="form-control" required>
<br>
		<button type="button" id="btncheck" style="color:black"  name="button">กด</button>

		<p id="showeree" style="color:red">รหัสนี้ได้รับการประเมินไปแล้ว</p>
		<p id="showeree2" style="color:red">คุณไม่มีสิทธิ์ประเมินรายวิชานี้</p>

  </div>

  <div class="col-md-8 col-sm-4">
		<label for="text" id="Text2" ></label>
<label for="text" id="Text1" ></label>
  <textarea name="text" rows="4" cols="40" id="text" class="form-control "  required></textarea>



  </div>
<br>
		<label for="text" id="p1"  >1.ความถูกต้องและแม่นยำของจังหวะ</label>
		<label for="text" id="p11" >1.ความถูกต้องในการทำแบบทดสอบ</label>

<select class="form-control " id="lvlknow1" name="lvlknow1"   >



		<option value="5">ดีมาก  (5 คะแนน)</option>
		<option value="4">ดี (4 คะแนน)</option>
		<option value="3">ปานกลาง (3 คะแนน)</option>
		<option value="2">พอใช้ (2 คะแนน)</option>
		<option value="1">ควรปรับปรุง (1 คะแนน)</option>


</select>


		<label for="text" id="p2" >2.อ่านโน้ตบทฝึกที่กำหนดให้ได้ถูกต้อง</label>


		<label for="text" id="p22" >2.ความรู้ด้านเนื้อหาในวิชาที่เรียน</label>


<select class="form-control " id="lvlknow2" name="lvlknow2"  >


		<option value="5">ดีมาก  (5 คะแนน)</option>
		<option value="4">ดี (4 คะแนน)</option>
		<option value="3">ปานกลาง (3 คะแนน)</option>
		<option value="2">พอใช้ (2 คะแนน)</option>
		<option value="1">ควรปรับปรุง (1 คะแนน)</option>


</select>
		<label for="text" id="p3" >3.คุณภาพของเสียงที่บรรเลงออกมา</label>

		<label for="text" id="p33" >3.ความถูกต้องในการอ่าน/คำนวณในวิชาที่เรียน</label>

<select class="form-control " id="lvlknow3"name="lvlknow3"  >


		<option value="5">ดีมาก  (5 คะแนน)</option>
		<option value="4">ดี (4 คะแนน)</option>
		<option value="3">ปานกลาง (3 คะแนน)</option>
		<option value="2">พอใช้ (2 คะแนน)</option>
		<option value="1">ควรปรับปรุง (1 คะแนน)</option>


</select>


<label for="text" id="p4" >4.ฟังโน้ตบทฝึกที่กำหนดให้ได้ถูกต้อง</label>

<label for="text" id="p44" >4.ผลการทดสอบนักเรียนทำได้ตรงตามที่คาดหวัง</label>

<select class="form-control " id="lvlknow4"name="lvlknow4"  >



		<option value="5">ดีมาก  (5 คะแนน)</option>
		<option value="4">ดี (4 คะแนน)</option>
		<option value="3">ปานกลาง (3 คะแนน)</option>
		<option value="2">พอใช้ (2 คะแนน)</option>
		<option value="1">ควรปรับปรุง (1 คะแนน)</option>


</select>

<label for="text" id="p5" >5.ความรู้ในวิชาดนตรีด้านทฤษฎี</label>

<label for="text" id="p55" >5.ผลการทดสอบของนักเรียนอยู่ในระดับใด</label>

<select class="form-control " id="lvlknow5"name="lvlknow5"  >


	<option value="5">ดีมาก  (5 คะแนน)</option>
	<option value="4">ดี (4 คะแนน)</option>
	<option value="3">ปานกลาง (3 คะแนน)</option>
	<option value="2">พอใช้ (2 คะแนน)</option>
	<option value="1">ควรปรับปรุง (1 คะแนน)</option>


</select>
{{-- <label for="text" id="p4" >แนะนำ</label>

<select class="form-control " id="reconment" name="reconment"  >
 --}}


</select>
{{-- <label for="text" id="ppp"  >คะแนนทดสอบก่อนเรียน</label>

<input id='numberss' type="number" min='0' max="100" style="color:#000000" name="numberss" value=""> --}}

<br>
{{-- <label for="text" id="Totalall" name='Totalall' ></label> --}}


<input type="text" hidden id="Totalallt" name="Totalallt" >

<br>

{{ csrf_field() }}

<button type="submit" id="submit"  name="button"> Sent</button>
</form>


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
