@extends('mainadmin')

@section('section')

  <script type="text/javascript" src="js/studenmana.js"></script>



    <link rel="stylesheet"
        href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>






{{ csrf_field() }}

      <section id="main-content">
          <section class="wrapper">
      		<div class="row mt">
      			<div class="col-lg-12 col-md-12 col-sm-12">
              <! -- STRIPPED PROGRESS BARS -->
              <div class="showback">
                <h4><i class=""></i>จัดการนักเรียน</h4>

<button type="button" class="btn" style="background: #25a8e0; color: #ffffff; margin-top: 4px;" name="button" id="add">เพิ่ม</button>
<br>
<br>
                <table id="tableroom" class="table table-bordered"style="border-color:#000; text-align:center;">
                  <thead>
                    <tr id="headtable">
                      <th scope="col" style="border-color:#000; text-align:center;">#</th>
                      <th scope="col" style="border-color:#000; text-align:center;">ชื่อ</th>
                      <th scope="col" style="border-color:#000; text-align:center;">นามสกุล</th>
                      <th scope="col" style="border-color:#000; text-align:center;">เพศ</th>
                      <th scope="col" style="border-color:#000; text-align:center;">อายุ</th>
                      <th scope="col" style="border-color:#000; text-align:center;">อีเมล์</th>
                      <th scope="col" style="border-color:#000; text-align:center;">เบอร์โทรศัพท์</th>
                      <th scope="col" style="border-color:#000; text-align:center;">ที่อยู่</th>
                      <th scope="col"style="border-color:#000; text-align:center;"> </th>

                    </tr>
                  </thead>
                  <tbody id="tablestudent">

                  </tbody>
                </table>

      </section><!-- /MAIN CONTENT -->

</section>


<!-- Modal -->
<div class="modal fade" id="modalstudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bodyadd">

        <form class="form-horizontal style-form" method="get" id="inputfrom">
          <input type="text"  hidden class="hidden" id="ida">



            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">ชื่อ</label>
                <div class="col-sm-10">
                  <p id="ee1" style="color: red" ></p>

                    <input type="text" class="form-control" id="firstname">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">นามสกุล</label>
                <div class="col-sm-10">
                  <p id="ee2" style="color: red" ></p>

                    <input type="text" class="form-control" id="lastname">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">ชื่อผู้ใช้</label>
                <div class="col-sm-10">
                  <p id="ee3" style="color: red" ></p>

                    <input type="text" class="form-control" id="username">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">รหัสผ่าน</label>
                <div class="col-sm-10">
                  <p id="ee4" style="color: red" ></p>

                    <input type="text" class="form-control" id="password">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">อีเมล์</label>
                <div class="col-sm-10">
                  <p id="ee5" style="color: red" ></p>

                    <input type="text" class="form-control" id="email">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">เพศ</label>
                <p id="ee6" style="color: red" ></p>

                <div class="col-sm-10">


                                      <div class="radio">
                                        <label>
                                          <input type="radio" name="optionsRadios" id="optionsRadios1" value="male">
                                          ชาย
                                        </label>
                                      </div>
                                      <div class="radio">
                                        <label>
                                          <input type="radio" name="optionsRadios" id="optionsRadios2" value="female">
                                          หญิง
                                        </label>
                                      </div>



                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">อายุ</label>
                <div class="col-sm-10">
                  <p id="ee7" style="color: red" ></p>

                    <input type="text" class="form-control" id="age">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">เบอร์โทรศัพท์</label>
                <div class="col-sm-10">
                  <p id="ee8" style="color: red" ></p>

                    <input type="text" class="form-control" id="phone">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">ที่อยู่</label>
                <div class="col-sm-10">
                  <p id="ee9" style="color: red" ></p>

              <textarea name="address" rows="4" cols="40" id="address" required></textarea>
                </div>
            </div>





        </form>

      </div>
      <div class="modal-body bodydel">

        คุณแน่ใจแล้วหรือว่าจะลบ ?
      </div>

      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary" name="button" id="submit_addstudent" hidden>บันทึก</button>
        <button type="button" class="btn btn-primary" name="button" id="studentedit" hidden>แก้ไข</button>
        <button type="button" class="btn btn-primary" name="button" id="studentdel" hidden>ลบ</button>

      </div>
    </div>
  </div>
</div>


    @endsection
