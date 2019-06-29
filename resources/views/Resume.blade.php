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
				<li><a href="/home" class="smoothScroll">หน้าแรก</a></li>

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

					<a class="dropdown-item" href="testing">

							ทดสอบ
					</a>
					<br>
					<a class="dropdown-item" href="edituser">

							แก้ไขข้อมูลข้อมูลส่วนตัว
					</a>
				@elseif (Auth::user()->idstudent!=0)
					<a class="dropdown-item" href="Transaction">

							ประวัติการชำระเงิน
					</a>
					<br>
					<a class="dropdown-item" href="edituser">

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
        <button type="submit" class="btn" style="background-color: #ef67a5">เข้าสู่ระบบ</button>
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

			<div class="col-md-12 col-sm-12">

			</div>

			<form  id="hidebody">
			  <div class="form-row" style="margin-top: 110px;">
			    <div class="form-group col-md-6">
								<p id="ee1" style="color: red" ></p>
			      <label for="FirstName" class="col-sm-2 col-form-label">FirstName</label>
			     <input type="text" id="FirstName" class="form-control">
			    </div>
			    <div class="form-group col-md-6">
								<p id="ee2" style="color: red" ></p>
			      <label for="LastName" class="col-sm-2 col-form-label">LastName</label>
			   <input type="text" id="LastName" class="form-control">
			    </div>
			  </div>
				<div class="form-row">
			 	 <div class="form-group col-md-6">
					 		<p id="ee3" style="color: red" ></p>
			 		 <label for="idcard" class="col-sm-5 col-form-label">Identification Number</label>
			 		<input type="text" id="idcard" class="form-control">
			 	 </div>
			 	 <div class="form-group col-md-6">
					 		<p id="ee4" style="color: red" ></p>
			 		 <label for="Phone" class="col-sm-2 col-form-label">Phone</label>
			 	<input type="text" id="Phone" class="form-control">
			 	 </div>
			  </div>
				<div class="form-row">
				 <div class="form-group col-md-6">
					 		<p id="ee5" style="color: red" ></p>
					 <label for="Position" class="col-sm-5 col-form-label">Interested Position</label>
					<input type="text" id="Position" class="form-control">
				 </div>
				 <div class="form-group col-md-6">
					 		<p id="ee6" style="color: red" ></p>
					 <label for="Email" class="col-sm-2 col-form-label">Email</label>
				<input type="text" id="Email" class="form-control">
				 </div>
				</div>

				<div class="form-row">
				 <div class="form-group col-md-6">


		<p id="ee7" style="color: red" ></p>
		 		<label for="Ability" class="col-sm-2 col-form-label">Ability</label>
		 		<textarea name="Ability" rows="4" cols="60" id="Ability" style="color: black;" required></textarea>

		 	</div>


				 <div class="form-group col-md-6">
					 		<p id="ee8" style="color: red" ></p>
					<label for="Address" class="col-sm-2 col-form-label">Address</label>
					<textarea name="Address" rows="4" cols="60" id="Address" style="color: black;"  required></textarea>

				</div>
				 </div>


				 <div class="form-row">
		 		 <div class="form-group col-md-6">
					 		<p id="ee9" style="color: red" ></p>
					 <label for="sex" class="col">Sex :</label>
					 male <input type="radio" name="group1" value="male" id="group1.1" required>
					female <input type="radio" name="group1" style="padding-	bottom: -2px" value="female" id="group1.2" >

	<br>
			<p id="ee10" style="color: red" ></p>
	<label for="inputCity">Age :</label>
	<select id="age" class="" name="age" style="color: #000000" required>
		 <?php for ($i=0; $i < 60; $i++) {
	 echo "<option value=".$i.">$i</option>";

		 } ?>
	</select>
		 		 </div>
	 <div class="form-group col-md-6">
		 </div>
		 		</div>


				<div class="form-row">
				 <div class="form-group col-md-6">
					 <div class="custom-file">
						 <label for="profile" class="col-sm-5 col-form-label">Profile</label>

						 <input type="file" class="custom-file-input" id="profile">

					 </div>
					 <p id="ee11" style="color: red" ></p>

				 </div>

				 <div class="form-group col-md-6">


					 <div class="custom-file">
						 <label for="Resume" class="col-sm-5 col-form-label">Resume</label>

						 <input type="file" class="custom-file-input" id="Resume">





				 </div>
				 <p id="ee12" style="color: red" ></p>

				 </div>
				</div>

								<div class="form-row">
								 <div class="form-group col-md-6">
									 <div class="custom-file" hidden>
										 <label class="col-sm-5 col-form-label"></label>

										 <input type="file" class="custom-file-input" hidden>

									 </div>
								 </div>
								 <div class="form-group col-md-6">
									 <div class="custom-file">

										 <label for="ID Card" class="col-sm-5 col-form-label">Copy of ID Card</label>
										 <input type="file" class="custom-file-input" id="IDCardPhoto">




								 </div>
								 <p id="ee13" style="color: red" ></p>

								 </div>
								</div>





				</div>


<input class="btn btn-danger" id="btnsubmittutor" value="Submit form">





			</form>
			<input class="btn btn-danger"  value="เสร็จสิ้น" id="succcess"  class="hidden" hidden>












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
