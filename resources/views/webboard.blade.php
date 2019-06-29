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

<script type="text/javascript" src="js/topics.js" charset="utf-8"></script>



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
				<li><a href="/home" class="smoothScroll">หน้าแรก</a></li>


				@guest
					<li id="login" data-toggle="modal" data-target="#exampleModalCenter" class="login"><a style="color: #ef67a5" href="#Login" class="smoothScroll">เข้าสู้ระบบ</a></il>

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


	<div class="container" >


<div class="row">
	<div id = "peemm">
	<button type="button" class="btn btn-primary" id="addtopic" data-toggle="modal" data-target=".bd-example-modal-lg">สร้างกระทู้</button>
</div>
</div>
<div class="row">
		<div id = "peem">
	<div class='col-md-5 bodytopic'>





		</div>
		</div>
</div>







<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modaltopic">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body ">
				 	<p style="text-align: left">หัวข้อเรื่อง</p>
      <input class="form-control"  type="text" name="" value="" id="texttop">
	<p style="text-align: left">รายละเอียด</p>
			<textarea class="form-control"   rows="4" cols="40"   aria-label="With textarea" id="textdetail"></textarea>
       </div>
       <div class="modal-footer">
         <button type="button" style="background-color:blue"   data-dismiss="modal">Close</button>
         <button type="button" style="background-color:blue" id="addddd" >Save changes</button>
       </div>
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
