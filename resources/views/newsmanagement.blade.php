@extends('mainadmin')

@section('section')




    <link rel="stylesheet"
        href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

        <script type="text/javascript" src="js/News.js" charset="utf-8"></script>





{{ csrf_field() }}

      <section id="main-content">
          <section class="wrapper">
      		<div class="row mt">
      			<div class="col-lg-12 col-md-12 col-sm-12">
              <! -- STRIPPED PROGRESS BARS -->
              <div class="showback">
                <h4><i class="fa fa-angle-right"></i> การจัดการข่าว</h4>


<button type="button" style="background: #25a8e0; color: #ffffff; margin-top: 4px;" name="button" class="btn " id="add"> เพิ่ม</button>
<br> <br>
                <table id="tablepayment" class="table table-bordered" style="border-color:#000; text-align:center;">
                  <thead>
                    <tr  id="headtable">
                      <th scope="col" style="border-color:#000; text-align:center;">รหัสข่าว</th>
                      <th scope="col" style="border-color:#000; text-align:center;">หัวข้อ</th>
                      <th scope="col" style="border-color:#000; text-align:center;">เนื้อหา</th>
                      <th scope="col" style="border-color:#000; text-align:center;">สร้างโดย</th>
                      <th scope="col" style="border-color:#000; text-align:center;">วันที่แก้ไข</th>
                      <th scope="col" style="border-color:#000; text-align:center;">วันที่สร้าง</th>
                      <th scope="col" style="border-color:#000; text-align:center;"></th>
                    </tr>
                  </thead>
                  <tbody id="bodynews">

                  </tbody>
                </table>


                <div class="modal fade" id="newsmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bodyadd">

<input type="text" name="" id="idhiden" class="hidden" value="">
<input type="text" name="" id="idpic" class="hidden" value="">


                              <div class="form-group">
                                  <p id="ee1" style="color: red" ></p>
                                  <label for="Topics">หัวข้อ</label>
                                  <input type="email" class="form-control" id="Topics"  placeholder="Topics">

                                </div>
                                <div class="form-group">
                                    <p id="ee2" style="color: red" ></p>
                                    <label for="Content">เนื้อหา</label>
                                    <input type="email" class="form-control" id="Content"  placeholder="Content">

                                  </div>
                                  <div class="form-group">
                                      <p id="ee3" style="color: red" ></p>
                                      <label for="Content">รูปภาพ</label>
                                      <input type="file" id="PIC"  placeholder="PIC">

                                    </div>
      </div>


      <div class="bodydel">
คุณแน่ใจแล้วหรือว่าต้องการลบ ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary addmodal">บันทึก</button>
        <button type="button" class="btn btn-primary editmodal">แก้ไข</button>
        <button type="button" class="btn btn-primary delmodal">ลบ</button>

      </div>
    </div>
  </div>
</div>


      </section><!-- /MAIN CONTENT -->

</section>





    @endsection
