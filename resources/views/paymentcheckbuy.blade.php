@extends('mainadmin')

@section('section')

  <script src="js/paymentrebuy.js"></script>



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
                <h4><i class="fa fa-angle-right"></i> ตรวจสอบการซื้อคอร์เรียน</h4>



                <table id="tablepayment"class="table table-bordered"  style="border-color:#000; text-align:center;">
                  <thead>
                    <tr id="headtable">
                      <th scope="col"  style="border-color:#000; text-align:center;">รหัสการซื้อ</th>
                      <th scope="col"  style="border-color:#000; text-align:center;">วันที่และเวลา</th>
                      <th scope="col"  style="border-color:#000; text-align:center;">วันที่ชำระเงิน</th>

                      <th scope="col"  style="border-color:#000; text-align:center;">ผู้ทำรายการ</th>
                      <th scope="col"  style="border-color:#000; text-align:center;">ไฟล์</th>
                      <th scope="col"  style="border-color:#000; text-align:center;">สถานะ</th>
                      <th scope="col"  style="border-color:#000; text-align:center;"> </th>


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

<input type="hidden" name="" value="" id=idpaybuy>

<input type="hidden" name="" value="" id=idkey>

<img  class="img-responsive" alt="Cinque Terre" id="img">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-success" hidden id="confirm">ผ่าน</button>
        <button type="button" class="btn btn-success" hidden id="confirmno">ไม่ผ่าน</button>


    </div>
  </div>
</div>

</div>

<!-- Modal -->
<div class="modal fade" id="infomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">รายละเอียดรายการชำระ</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <hr>
       <h4 id="h1"></h5>
       <h4 id="h2"></h4>
          <h4 id="h3"></h4>
              <h4 id="h4"></h4>
                <hr>
        <h4 id="h5"></h4>
<h4 id="h6"></h4>
<h4 id="h7"></h4>

<h4 id="h8"></h4>
<h4 id="h9"></h4>
<h4 id="h10"></h4>
<h4 id="h11"></h4>

  <hr>
  <h4 id="h13"></h4>
  <h4 id="h14"></h4>
  <h4 id="h15"></h4>
  <hr>
                   <h4 id="h12"></h4>
        <hr>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>

      </div>
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="selectroom">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">กำหนดห้องเรียนและครูผู้สอน</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
ห้องเรียน
<br>
<select class="" name="" id="room">

</select>
<br>

ผู้สอน
<br>

<select class="" name=""id="tutor">

</select>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary" id="comfirmss">ยืนยัน</button>
      </div>
    </div>
  </div>
</div>



    @endsection
