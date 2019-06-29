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

<script type="text/javascript" src="js/edituser.js" charset="utf-8"></script>



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
				<a href="/" class="navbar-brand"><img src="images/iconbgfn.png" width=150 height=45;></a>  <a href="/admin" class="navbar-brand">BACKEND</a>

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
						<label for="Username" class="col-md-4 control-label" >Username</label>

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
{{ csrf_field() }}
<br><br><br>
			<div class="col-md-3 col-sm-3">

					​<picture>
					  <source srcset="/storage/Pic/{{$user->profilepic}}" id='imgpro' type="image/svg+xml">
					  <img src="..." class="img-fluid float-left "style="max-width:100%; "   alt="Responsive image">
					</picture>

<input type='file' onchange="readURL(this);" id='imgsrc' />



<script>


function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imgpro')
                    .attr('srcset', e.target.result)

            };

            reader.readAsDataURL(input.files[0]);
        }

				var formData = new FormData();
				var profile = $('#imgsrc');
				var who = $('#who').val();

				formData.append('Pic', profile[0].files[0]);
				formData.append('id', $('#id').val());
				formData.append('who', who);

				$.ajax({
					method: 'post',
					dataType: 'json',
					url: "changepic",
					contentType: false,
					processData: false,
					headers: {
				'X-CSRF-TOKEN': $('input[name=_token]').val()
			},
						data: formData

						,
						success: function(data) {



			if(data=="Success"){


			alert("ทำการสมัครแล้วว");

			}


					}
				});

    }
</script>

				</div>

  <div class="col-md-3 col-sm-3">
  @if (Auth::user()->idstudent!="")

	<input type="hidden" name="" value="{{$user->idstudent}}" id="id">
	<input type="hidden" name="" value="student" id="who">

				ชื่อผู้ใช้ <input name="username" type="text" class="form-control" id="username" placeholder="Username" value="{{ $user->username }}"  required>
				รหัสผ่าน <input name="password" type="password" class="form-control" id="passwordw" placeholder="Password" value="" required>
				ชื่อจริง <input name="firstname" type="text" class="form-control" id="firstname" placeholder="First Name" value="{{$user->firstname}}" required>
				นามสกุล <input name="lastname" type="text" class="form-control" id="lastname" placeholder="Last Name" value="{{$user->lastname}}" required>
				เบอร์โทรศัพท์ <input name="phone" type="telephone" class="form-control" id="phone" placeholder="Phone Number" value="{{$user->phone}}" required>
				อีเมล <input name="email" type="email" class="form-control" id="email2" placeholder="Email Address" value="{{$user->Email}}" required>
				อายุ <select id="age" class="" name="age" style="color: #000000" required >
								<?php for ($i=0; $i < 60; $i++) {
							echo "<option value=".$i.">$i</option>";

								} ?>
					</select>


					ผู้ชาย<input type="radio" name="group1" value="male" id="group1.1" required>

					ผู้หญิง<input type="radio" name="group1" style="padding-	bottom: -2px" value="female" id="group1.2" >
					<br>
					<script>
					$(document).ready(function() {

					 $("#age").val("{{$user->age}}");
						$("input[name='group1'][value='{{$user->sex}}']").prop("checked",true);
	 $("#address").val("{{$user->address}}");

					});
					</script>
					<br>
					Address
					<textarea name="address" style="color: #000000" rows="4" cols="40" id="address" value='{{$user->address}}' required></textarea>

	<button type="button" class="btn btn-primary" id="submitedit">ยืนยันการแก้ไข</button>

@elseif (Auth::user()->idtutor!="")




		<input type="hidden" name="" value="{{$user->idtutor}}" id="id">
		<input type="hidden" name="" value="tutor" id="who">

							Username<input name="username" type="text" class="form-control" id="username" placeholder="Username" value="{{ $user->username }}"  required>
							Password<input name="password" type="text" class="form-control" id="passwordw" placeholder="Password" value="" required>
						firstname<input name="firstname" type="text" class="form-control" id="firstname" placeholder="First Name" value="{{$user->firstname}}" required>
						lastname<input name="lastname" type="text" class="form-control" id="lastname" placeholder="Last Name" value="{{$user->lastname}}" required>
						phone<input name="phone" type="telephone" class="form-control" id="phone" placeholder="Phone Number" value="{{$user->phone}}" required>
						email<input name="email" type="email" class="form-control" id="email2" placeholder="Email Address" value="{{$user->Email}}" required>
						Age <select id="age" class="" name="age" style="color: #000000" required >
									<?php for ($i=0; $i < 60; $i++) {
								echo "<option value=".$i.">$i</option>";

									} ?>
						</select>


						male<input type="radio" name="group1" value="male" id="group1.1" required>

						female<input type="radio" name="group1" style="padding-	bottom: -2px" value="female" id="group1.2" >
						<br>
						<script>
						$(document).ready(function() {

						 $("#age").val("{{$user->age}}");
							$("input[name='group1'][value='{{$user->sex}}']").prop("checked",true);
		 $("#address").val("{{$user->address}}");

						});
						</script>
						<br>
						Address
						<textarea name="address" style="color: #000000" rows="4" cols="40" id="address" value='{{$user->address}}' required></textarea>

<p id="subject"  style="color: #FFF">รายวิชาที่สอน </p>

		<button type="button" class="btn btn-primary" id="submitedit">ยืนยันการแก้ไข</button>



@endif


				</div>


		</div>


<script >





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
});



</script>
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
