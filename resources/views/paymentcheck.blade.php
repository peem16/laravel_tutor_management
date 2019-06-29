@extends('mainadmin')

@section('section')

  <script src="js/paymentre.js"></script>



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
                <h4><i class="fa fa-angle-right"></i> ตรวจสอบการจองคอร์เรียน</h4>



                <table id="tablepayment" class="table table-bordered" style="border-color:#000; text-align:center;">
                  <thead>
                    <tr id="headtable">
                      <th scope="col" style="border-color:#000; text-align:center;">รหัสการจอง</th>
                      <th scope="col" style="border-color:#000; text-align:center;">วิชา</th>
                      <th scope="col" style="border-color:#000; text-align:center;">ผู้ทำรายการ</th>

                      <th scope="col" style="border-color:#000; text-align:center;">วันที่และเวลา</th>
                      <th scope="col" style="border-color:#000; text-align:center;">ไฟล์</th>
                      <th scope="col" style="border-color:#000; text-align:center;">สถานะ</th>
                      <th scope="col" style="border-color:#000; text-align:center;"></th>


                    </tr>
                  </thead>
                  <tbody id="datapay">

                  </tbody>
                </table>



      </section><!-- /MAIN CONTENT -->

</section>



<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  id="checkmodal">
  <div class="modal-dialog  modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">ตรวจสอบเอกสาร</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="bodyfrom">

<input type="hidden" name="" value="" id=idpayre>

<img  class="img-responsive" alt="Cinque Terre" id="img">

<br>
<p style="color:red">รายการชำระเงินทั้งหมด 100 บาท</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-success" hidden id="confirm">ผ่าน</button>
        <button type="button" class="btn btn-success" hidden id="confirmno">ไม่ผ่าน</button>


    </div>
  </div>
</div>

</div>



    @endsection
