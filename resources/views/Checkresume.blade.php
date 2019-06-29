@extends('mainadmin')

@section('section')

<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

<script type="text/javascript" src="js/Checkresume.js"></script>


{{ csrf_field() }}

      <section id="main-content">
          <section class="wrapper">
      		<div class="row mt">
      			<div class="col-lg-12 col-md-12 col-sm-12">
              <! -- STRIPPED PROGRESS BARS -->
              <div class="showback">
                <h4><i class=""></i>ตรวจสอบเอกสารการสมัครเป็นครู</h4>

                <table id="tableroom" class="table table-bordered" style="border-color:#000; text-align:center;">
                  <thead>
                    <tr id="headtable">

                      <!-- style="text-align:center" ให้ข้อความอยู่กลาง -->

                      <th scope="col" style="border-color:#000; text-align:center;">ชื่อ</th>
                      <th scope="col" style="border-color:#000; text-align:center;">นามสกุล</th>
                      <th scope="col" style="border-color:#000; text-align:center;">ตำแหน่งที่สนใจ</th>
                      <th scope="col" style="border-color:#000; text-align:center;">ความสามารถ</th>
                      <th scope="col" style="border-color:#000; text-align:center;">ไฟล์ประวัติ</th>
                      <th scope="col" style="border-color:#000; text-align:center;">ไฟล์ยืนยันตัวตน</th>
                      <th scope="col" style="border-color:#000; text-align:center;"> </th>


                    </tr>
                  </thead>
                  <tbody id="bodyresume">



                    @foreach($resume as $resume)
                    <tr class="item{{$resume->idresume}}">
                        <td>{{$resume->firstname}}</td>
                        <td>{{$resume->lastname}}</td>
                        <td>{{$resume->interested_position}}</td>
                        <td>{{$resume->ability}}</td>

                          <td>
                        @if ($resume->resume_file!==null)
                          <form method="POST" action="{{ route('downloadresume') }}" >
                          <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">

                            {{-- <input type="hidden" name="file" id="file" value="{{$resume->resume_file}}">
                             &nbsp;<button type="submit" class="btn btn-primary">
                              <i class="fa fa-download" aria-hidden="true"></i>
                                </button> --}}

                                <button type="button" class="btn btn-primary show"   data-resume="{{$resume->resume_file}}">
                                 <i class="fa fa-image" aria-hidden="true"></i>
                                   </button>


                        @endif
                        </td>




                          <td>

                        @if ($resume->Identification_file!==null)
                          <form method="POST" action="{{ route('downloadresume') }}" >
                          <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
{{--
                            <input type="hidden" name="file" id="file" value="{{$resume->Identification_file}}">
                             &nbsp;<button type="submit" class="btn btn-primary">
                              <i class="fa fa-download" aria-hidden="true"></i>
                                </button> --}}


                                                                <button type="button" class="btn btn-primary show"   data-resume="{{$resume->Identification_file}}">
                                                                 <i class="fa fa-image" aria-hidden="true"></i>
                                                                   </button>



                        @endif
                        </td>


  <td>


  <button type="button" class="btn btn-primary view"   data-info="{{$resume->idresume}},{{$resume->firstname}},{{$resume->lastname}},{{$resume->Identification_no}},{{$resume->phone}},
    {{$resume->interested_position}},{{$resume->email}},{{$resume->ability}},{{$resume->address}},{{$resume->sex}},{{$resume->age}},{{$resume->resume_file}},{{$resume->Identification_file}}">
        <i class="fas fa-align-left"></i>
     </button>

     <button type="button" class="btn btn-success yes"  data-id="{{$resume->idresume}}">
       <i class="fas fa-check"></i>
        </button>
        <button type="button" class="btn btn-danger no" data-id="{{$resume->idresume}}">
      <i class="fas fa-times"></i>


           </button>
  </td>



                    </tr>
                    @endforeach



                  </tbody>
                </table>




                </div>



      </section><!-- /MAIN CONTENT -->

</section>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="photomodal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

<img src="" class="img-responsive" alt="Cinque Terre" id="img">

    </div>
  </div>
</div>

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


แสดงความคิดเห็น
 <textarea class="form-control" id="comment" rows="3"></textarea>
 		<p id="ee1" style="color: red" ></p>
<p id="sub">เลือกวิชา</p>
<div class="checksub">
  @foreach ($course as $key  )

   {{$key->name}}<input class="form-check-input " type="checkbox" name="checksub" value="{{$key->idcourse}}" >

  @endforeach
</div>
		<p id="ee2" style="color: red" ></p>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-success" hidden id="confirm">ผ่าน</button>
        <button type="button" class="btn btn-success" hidden id="confirmno">ไม่ผ่าน</button>


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
      <div class="modal-body" id="bodyfrom2">
<input type="text" name="" hidden value="" id="hideid">



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>


    </div>
  </div>
</div>

</div>
    @endsection
