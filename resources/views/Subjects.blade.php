@extends('mainadmin')

@section('section')

    <script type="text/javascript" src="js/subjectcontrol.js"></script>

    <script type="text/javascript" src="js/bounce.min.js"></script>


    <link rel="stylesheet"
        href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>






{{ csrf_field() }}

      <section id="main-content">
          <section class="wrapper">

            <div class="icon">
              <img src="images/ic_subject.png" style="width:3%;cursor: pointer; margin-top: 17px; margin-right: 20px;" class="rounded-circle btncircle" alt="Cinque Terre" id="subjectbtn">
              <img src="images/ic_type_study.png" style="width:3%;cursor: pointer; margin-top: 17px; margin-right: 20px;" class="rounded-circle btncircle" alt="Cinque Terre" id="Gradebtn">
              <img src="images/ic_type_subject.png" style="width:3%;cursor: pointer; margin-top: 17px; margin-right: 20px;" class="rounded-circle btncircle" alt="Cinque Terre" id="typebtn">

            </div>
      		<div class="row mt">
      			<div class="col-lg-12 col-md-12 col-sm-12">
              <! -- STRIPPED PROGRESS BARS -->
              <div class="showback" id='subject'>
                <h4 style="margin-bottom: 10px;"><i class=""></i>วิชาเรียน</h4>

                <a id="addsubject" class="btn" style="background: #25a8e0; color: #ffffff; margin-bottom: 8px;">เพิ่ม</a>

<div class="tablesubject" >



                <table class="table table-bordered" style="border-color:#000;">
        <thead>
            <tr >
                <th class="text-center" style="border-color:#000;">ลำดับที่</th>
                <th class="text-center" style="border-color:#000;">ชื่อวิชา</th>
                <th class="text-center" style="border-color:#000;">รายละเอียด</th>


                <th class="text-center"style="border-color:#000;"></th>

            </tr>
        </thead>
        <tbody id="bodysubject" >
  @foreach($subjects as $item)
  <tr class="item{{$item->idcourse}}"  >
      <td style="border-color:#000000;">{{$item->idcourse}}</td>
      <td style="border-color:#000;">{{$item->name}}</td>
      <td style="border-color:#000;">{{$item->course_detail}}</td>



        <td style="border-color:#000;"><button class="edit btn btn-success" style="background: #25a8e0; border-color: #25a8e0; Color:#000;"
                data-info="{{$item->idcourse}},{{$item->name}},{{$item->amount_courses}},{{$item->per_round}},{{$item->Time_length}},{{$item->price}},{{$item->note}},{{$item->idtype}},{{$item->course_detail}}">
                <span class="glyphicon glyphicon-edit" ></span> แก้ไข
            </button>
            <button class="delete btn btn-danger" style="background: #ef67a7; border-color: #ef67a7; Color:#000;"
  data-info="{{$item->idcourse}},{{$item->name}},{{$item->amount_courses}},{{$item->per_round}},{{$item->Time_length}},{{$item->price}},{{$item->note}},{{$item->idtype}},{{$item->course_detail}}">
                <span class="glyphicon glyphicon-trash"></span> ลบ
            </button></td>
  </tr>
  @endforeach
  </tbody>
    </table>

  </div>





</div>
<div class="showback" id='type'hidden>
  <h4><i class="fa fa-angle-right"></i> ประเภทวิชา</h4>

<div class="tabletype">

  <button id="addtype" type="button" class="btn" style="background: #25a8e0; color: #ffffff; margin-bottom: 8px;" name="button">เพิ่ม</button>


  <table id="tablepayment" class="table table-bordered" style="border-color:#000; text-align:center;">
<thead>
<tr id="headtable">

      <th scope="col" style="border-color:#000; text-align:center;">รหัสประเภทวิชา</th>
      <th scope="col" style="border-color:#000; text-align:center;">ชื่อประเภทวิชา</th>
      <th scope="col" style="border-color:#000; text-align:center;"></th>


</tr>
</thead>
<tbody id="bodytype">

</tbody>
</table>

</div>





</div>


<div class="showback" id='Grade' hidden >
  <h4><i class="fa fa-angle-right"></i> ประเภทการเรียน</h4>

<div class="tableGrade">
  <button id="addGrade" class="btn" style="background: #25a8e0; color: #ffffff; margin-bottom: 8px;" type="button" name="button">เพิ่ม</button>



  <table id="tablepayment" class="table table-bordered" style="border-color:#000; text-align:center;">
<thead>
<tr id="headtable">



      <th scope="col" style="border-color:#000; text-align:center;">รหัสประเภทการเรียน</th>
      <th scope="col" style="border-color:#000; text-align:center;">ชื่อประเภท</th>
      <th scope="col" style="border-color:#000; text-align:center;">ประเภทวิชา</th>

      <th scope="col" style="border-color:#000; text-align:center;"></th>



</tr>
</thead>
<tbody id="bodyGrade">

</tbody>
</table>

</div>





</div>
</div>

	<!-- <div class="col-lg-2">

<img src="images/icon_pencil_white.png" style="width:20%;cursor: pointer; margin-bottom: 5px;" class="rounded-circle btncircle" alt="Cinque Terre" id="subjectbtn"><br>
<img src="images/icon_pencil_white.png" style="width:20%;cursor: pointer; margin-bottom: 5px;" class="rounded-circle btncircle" alt="Cinque Terre" id="Gradebtn"><br>
<img src="images/icon_pencil_white.png" style="width:20%;cursor: pointer; margin-bottom: 5px;" class="rounded-circle btncircle" alt="Cinque Terre" id="typebtn">


</div> -->
      </section><!-- /MAIN CONTENT -->

</section>




  <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  id="modeledit">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">กำหนดรายละเอียด</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

                  <form class="form-horizontal style-form" method="get" id="inputfrom">
                    <input type="text"  hidden class="hidden" id="idsubjects">

                      <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">ชื่อวิชา</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="namesubject">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">รายละเอียด</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="detailsubject">
                          </div>
                      </div>
                      {{-- <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">amount_courses</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="amount">
                              <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">per_round</label>
                          <div class="col-sm-10">
                          <input type="text" class="form-control" id="per_round">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Time_length</label>
                          <div class="col-sm-10">
                          <input type="text" class="form-control" id="Time_length">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">price</label>
                          <div class="col-sm-10">
                          <input type="text" class="form-control" id="price">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">note</label>
                          <div class="col-sm-10">
                          <input type="text" class="form-control" id="note">
                          </div>
                      </div> --}}
                      <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">ประเภทวิชา</label>
                          <div class="col-sm-10">


                            @foreach($type as $type3)

                                                <div class="radio">
                                                  <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="{{$type3->idtype}}">
                                                    {{$type3->nametype}}
                                                  </label>
                                                </div>

                            @endforeach



                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">ประเภทการเรียน</label>
                          <div class="col-sm-10" id="divradiograde">


                          </div>
                      </div>



                  </form>

                  <div class="" id='delform' hidden>


คุณแน่ใจแล้วหรือว่าจะลบ ?
                  </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
          <button type="button" class="btn btn-primary" id="submit_editsubject">แก้ไข</button>
          <button type="button" class="btn btn-primary" name="button" id="submit_addsubject">บันทึก</button>
          <button type="button" class="btn btn-primary" name="button" id="confirmdel">ลบ</button>



        </div>
      </div>
    </div>
  </div>

<div class="allmodal">


</div>



<div class="modal fade" id="tpyemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLongTitle">กำหนดรายละเอียด</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="hidden" name="" value="" id="idtypehide">

      <div class="modal- bodyaddedittype">
      <p>    ชื่อวิชา </p> <input type="text" name="" class="form-control" value="" id="idtypename">
	<p id="ee1" style="color: red" ></p>
      </div>
      <div class="modal- bodydeltype" hidden>
  คุณแน่ใจแล้วหรือว่าจะลบ ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary" id="submit_edittype">แก้ไข</button>
        <button type="button" class="btn btn-primary" name="button" id="submit_addtype">บันทึก</button>
        <button type="button" class="btn btn-primary" name="button" id="confirmdeltype">ลบ</button>

      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="grademodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">กำหนดรายละเอียด</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="hidden" name="" value="" id="idgradehide">

      <div class="modal- bodyaddeditgrade">
    <p id="ee2" style="color: red" ></p>

        ชื่อประเภทการเรียน  <input type="text" name="" value="" class="form-control"  id="gradename">
            <p id="ee3" style="color: red" ></p>
ประเภทวิชา

  @foreach($type as $type9)

                      <div class="radio">
                        <label>
                          <input type="radio" name="optionstype"  value="{{$type9->idtype}}">
                          {{$type9->nametype}}
                        </label>
                      </div>

  @endforeach
      <p id="ee4" style="color: red" ></p>
ประเภทการเรียน

  <div class="form-check">
    <input class="form-check-input" type="radio" name="exampleRadios3" id="exampleRadios1" value="0" checked>
    <label class="form-check-label" for="exampleRadios1">
      เรียนคนเดียว
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="exampleRadios3" id="exampleRadios3" value="1">
    <label class="form-check-label" for="exampleRadios2">
    เรียนคู่
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="exampleRadios3" id="exampleRadios2" value="2">
    <label class="form-check-label" for="exampleRadios3">
    เรียนกลุ่ม
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="exampleRadios3" id="exampleRadios2" value="3">
    <label class="form-check-label" for="exampleRadios3">
    เรียนกลุ่ม(Public)
    </label>
  </div>

      </div>
      <div class="modal- bodydelgrade" hidden>
  คุณแน่ใจแล้วหรือว่าจะลบ ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary" id="submit_editgrade">แก้ไข</button>
        <button type="button" class="btn btn-primary" name="button" id="submit_addgrade">บันทึก</button>
        <button type="button" class="btn btn-primary" name="button" id="confirmdelgrade">ลบ</button>
      </div>
    </div>
  </div>
</div>
    @endsection
