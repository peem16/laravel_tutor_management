@extends('mainadmin')

@section('section')
  <script type="text/javascript" src="js/manag_tutor.js"></script>

  <script type="text/javascript" src="js/bounce.min.js"></script>


  <section id="main-content">
      <section class="wrapper">
      <div class="row mt">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <! -- STRIPPED PROGRESS BARS -->
          <div class="showback">

            <h4><i class=""></i>การอนุมัติเป็นครู</h4>

@foreach ($resume as $resume )


  <div class="col-md-3 mb anime{{$resume->idresume}}  " >
    <!-- WHITE PANEL - TOP USER -->
    <div class="white-panel pn" style="margin-top: 45px; background: #d5e7fb;">
      <div class="white-header" style="background: #ffd9d9;">
        <h5>ผู้สมัครเป็นครู</h5>
      </div>
      <p><img src="storage/Pic/{{$resume->profilepic}}" class="img-circle" width="120" height="90" ></p>
      <p style="color:black"><b>{{$resume->firstname." ".$resume->lastname}}</b></p>
      <div class="row">
        <a class="detailtutor" href="#" data-info="{{$resume->idresume}},{{$resume->firstname}},{{$resume->lastname}},{{$resume->Identification_no}},{{$resume->phone}},
          {{$resume->interested_position}},{{$resume->email}},{{$resume->ability}},{{$resume->address}},{{$resume->sex}},{{$resume->age}},{{$resume->resume_file}},{{$resume->Identification_file}},{{$resume->profilepic}},{{$resume->comment}}" data-course="{{$resume->course}}">  <p style="color:black" class="small mt">รายละเอียด</p></a>

      </div>
      <div class="row">
        <div class="col-md-6">
          <button type="button" name="button" class="btn btn-success pass" style="margin-left: 70px;" data-id="{{$resume->idresume}}">ผ่าน</button>
        </div>
        <div class="col-md-6">
          <button type="button" name="button" class="btn btn-danger fail" style="margin-right: 70px;" data-id="{{$resume->idresume}}">ไม่ผ่าน</button>


        </div>
      </div>
    </div>
  </div><!-- /col-md-4 -->


@endforeach






          </div>
  </div>  </div>


        </section><!-- /MAIN CONTENT -->

        </section>



        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  id="modal">
          <div class="modal-dialog  modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">โปรตรวจสอบ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="bodyfrom2">
                  <input type="text" name="" hidden value="" id="hideid">

คุณตัดสินใจแล้วใช่ไหม?

<textarea class="form-control" id="comment" rows="3" hidden></textarea>

              </div>
              <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-success" id="pass" hidden data-dismiss="modal">ผ่าน</button>
                <button type="button" class="btn btn-danger" id="fail" hidden data-dismiss="modal">ไม่ผ่าน</button>



            </div>
          </div>
        </div>

        </div>


        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  id="checkmodal2">
          <div class="modal-dialog  modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">แสดงผล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="bodyfrom3">
        <input type="text" name="" hidden value="" id="hideid">



              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>


            </div>
          </div>
        </div>

        </div>


        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="photomodal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

        <img src="" class="img-responsive" alt="Cinque Terre" id="img">

            </div>
          </div>
        </div>
@endsection
