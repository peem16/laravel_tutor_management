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
				<a href="/" class="navbar-brand"><img src="images/iconbgfn.png" width=150 height=45;></a>

			@endguest
		</div>

		<div class="collapse navbar-collapse">

			<ul class="nav navbar-nav navbar-right">
				<li><a href="/" class="smoothScroll">หน้าแรก</a></li>


				@guest
					<li id="login" data-toggle="modal" data-target="#exampleModalCenter" class="login"><a style="color: #ef67a5" href="#Login" class="smoothScroll">เข้าสู่ระบบ</a></il>

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

							แก้ไขข้อมูล
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
	<div class ="emay">
<div class="form-panel">
	<!-- <div class="containernaja"> -->
		<!-- <div class="row "> -->

<h2> <center>ช่วยเหลือ <i class="fa fa-child"></i></h2>
 <img src="helps/ic_sign-in.png"> 1. ทำการสมัครสมาชิกเพื่อใช้เข้าสู่ระบบ <br>
 <img src="helps/ic_log-in.png"> 2. นำชื่อผู้ใช้และรหัสผ่าน ทำการเข้าสู่ระบบเพื่อใช้งานเว็บไซต์ <br><br>
 <div class="Howtobuycourse"> **วิธีซื้อคอร์สเรียน </div>
 <img src="helps/ic_reserved.png"> 1. ทำการจองคอร์สเรียน <a style="color:#ff0000;"> *เสียค่าชำระเงินการจอง 100 บาท </a> <br>
 <img src="helps/ic_testing.png"> 2. เมื่อทำการจองแล้ว ผู้ใช้จะได้รับการทดสอบทักษะที่สถาบัน <br>
 <img src="helps/ic_buy-corse.png"> 3. ซื้อคอร์สเรียน โดยเลือกประเภทเรียนแบบ เรียนเดี่ยว เรียนคู่ เรียนแบบกลุ่ม
 <center><button type="button" class="btn btn-info" data-toggle="collapse"  style=" color:black; border-color:black; margin-top:10px;" data-target="#demo2"> กรณีซื้อคอร์สเรียนประเภทคู่และกลุ่ม </button></center>
 <div id="demo2" class="collapse">
   <center><img src="helps/img_buy.png" width="500" height="240" style=" margin-top:20px"></center>
 </div>
<br>


 4. ทำการยืนยันชำระเงินการซื้อคอร์สเรียน <br>
 <div class="Howtobuycourse"> (ผู้ใช้ต้องจองคอร์สเรียนและทดสอบทักษะที่สถานบันก่อนจึงจะทำการซื้อคอร์สเรียนได้)

 </div>

<br>


</div>
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
