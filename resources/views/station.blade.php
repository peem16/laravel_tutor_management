@extends('mainadmin')

@section('section')


  <script src="js/jquery.tabledit.js"></script>

  <script  type="text/javascript" src="js/stationcontroll.js"></script>



{{ csrf_field() }}



      <section id="main-content">
          <section class="wrapper">
      		<div class="row mt">
      			<div class="col-lg-12 col-md-7 col-sm-12">
              <! -- STRIPPED PROGRESS BARS -->
              <div class="showback">
                <h4><i class=""></i>ตั้งค่าที่ตั้งสถาบัน</h4>


             <div class="form-row">


  </div>

  <br>


             {{-- <a id="addroom" class="btn" style="background: #25a8e0; color: #ffffff; margin-top: 4px;">เพิ่ม</a> --}}


          </div><!-- /showback -->
      				<! -- BASIC PROGRESS BARS -->
      				<div class="col-md-5 showback">
      					{{-- <h4><i class=""></i> ตั้งค่า</h4> --}}
                {{-- ///////////// https://www.youtube.com/watch?v=oxZj82kh4FA   --}}

                <h5>  <label for="namesta">ชื่อสถาบัน</label></h5>

                  <input type="text" name="namesta" id='namesta' required class="form-control">
                      <h5>  <label for="latitude">ละติจูด</label></h5>

                  <input type="number"  name="latitude" class="form-control" required id='latitude'>
                      <h5>  <label for="Longitude">ลองจิจูด</label></h5>

                  <input type="number"  name="Longitude"  class="form-control" required id='Longitude'>
                      <h5>  <label for="dis">ความกว้างของสถาบัน (หน่วยเป็นเมตร)</label></h5>

                  <input type="number"  name="dis" id='dis' required  class="form-control">
                  <br>
                      <p id='ee1' style="color:blue"></p>

<br>


<button type="button" class="btn btn-primary save">บันทึก</button>
      				</div><!--/showback -->






						<!-- Modal -->

      				</div><!-- /showback -->







      			</div><!-- /col-lg-6 -->

      		</div><!--/ row -->
          </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->

      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->

{{-- ////////////////////// --}}


      @endsection
