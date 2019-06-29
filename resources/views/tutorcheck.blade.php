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



<script type="text/javascript" src="js/tutorcheck.js" charset="utf-8"></script>


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
			<a href="/" class="navbar-brand">EAKQ HOUSE</a>
		</div>

		<div class="collapse navbar-collapse">

			<ul class="nav navbar-nav navbar-right">
				<li><a href="home" class="smoothScroll">หน้าแรก</a></li>

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


			<div class="jumbotron jumbotron-fluid">


  <div class="row">
<div class="col-md-6">
				    <input type="text" class="form-control" id="identification" placeholder="identification" maxlength="13">
  </div>


  {{ csrf_field() }}



<div class="col-md-2">
			<button type="button"  name="button" id="btns">ค้นหา</button>
  </div>

			</div>



			<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="heading">
						<h4 class="panel-title">
</div>
		<div class="panel-body">


<h3 style="color:black" id="Resume">      </h3>


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
