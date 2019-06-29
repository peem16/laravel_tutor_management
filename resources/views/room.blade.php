@extends('mainadmin')

@section('section')


  <script src="js/jquery.tabledit.js"></script>

  <script  type="text/javascript" src="js/admincontrol.js"></script>



{{ csrf_field() }}



      <section id="main-content">
          <section class="wrapper">
      		<div class="row mt">
      			<div class="col-lg-12 col-md-7 col-sm-12">
              <! -- STRIPPED PROGRESS BARS -->
              <div class="showback">
                <h4><i class=""></i>เพิ่มห้องเรียน</h4>


             <div class="form-row">

    <div class="form-group col-md-2" style="">
      	<p id="ee1" style="color: red" ></p>
      <label for="Number">เลขห้อง:</label>
      <input type="text" class="form-control" id="Number">
    </div>
    <div class="form-group col-md-2">
      <p id="ee2" style="color: red" ></p>

      <label for="Amount">จำนวน:</label>
    <input type="text" class="form-control" id="Amount">
    </div>
    <div class="form-group col-md-3">
      	<p id="ee3" style="color: red" ></p>
      <label for="Description">รายละเอียด:</label>
      <input type="text" class="form-control" id="Description">
    </div>
    <div class="form-group col-md-3">
      	<p id="ee4" style="color: red" ></p>
      <label for="Description">ชนิดห้อง:</label>

<select class="form-control" name="" id="selecttype">
  <option value="ห้องดนตรี">ห้องดนตรี</option>
    <option value="ห้องเรียน">ห้องเรียน</option>
</select>

    </div>
  </div>

  <br>


             <a id="addroom" class="btn" style="background: #25a8e0; color: #ffffff; margin-top: 4px;">เพิ่ม</a>


          </div><!-- /showback -->
      				<! -- BASIC PROGRESS BARS -->
      				<div class="showback">
      					<h4><i class=""></i> ห้องเรียน</h4>
                {{-- ///////////// https://www.youtube.com/watch?v=oxZj82kh4FA   --}}
                <table id="tableroom"class="table table-bordered" style="border-color:#000;">
                  <thead>
                    <tr id="headtable">
                      <th scope="col" style="border-color:#000;">#</th>
                      <th scope="col"style="border-color:#000;">เลขห้อง</th>
                      <th scope="col"style="border-color:#000;">จำนวน</th>
                      <th scope="col"style="border-color:#000;">รายละเอียด</th>
                      <th scope="col"style="border-color:#000;">ชนิดห้อง</th>

                    </tr>
                  </thead>
                  <tbody id="dataroom">

                  </tbody>
                </table>
      				</div><!--/showback -->






						<!-- Modal -->
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
						      </div>
						      <div class="modal-body">
						        Hi there, I am a Modal Example for Dashgum Admin Panel.
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        <button type="button" class="btn btn-primary">Save changes</button>
						      </div>
						    </div>
						  </div>
						</div>
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
