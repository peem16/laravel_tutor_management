@extends('mainadmin')

@section('section')

  <script src="js/jquery.tabledit.js"></script>

  <script  type="text/javascript" src="js/tutorcrud.js"></script>


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
                <h4><i class="fa fa-angle-right"></i> การจัดการครู</h4>



                <a id="addtutor" class="btn" style="background: #25a8e0; color: #ffffff; margin-bottom: 8px;" >เพิ่ม</a>

                <table id="tableroom" class="table table-bordered" style="border-color:#000; text-align:center;">
                  <thead>
                    <tr id="headtable" >

                      <th scope="col" style="border-color:#000; text-align:center;">#</th>
                      <th scope="col" style="border-color:#000; text-align:center;">ชื่อ</th>
                      <th scope="col" style="border-color:#000; text-align:center;">นามสกุล</th>
                      <th scope="col" style="border-color:#000; text-align:center;">เพศ</th>
                      <th scope="col" style="border-color:#000; text-align:center;">ความสามารถ</th>
                      <th scope="col" style="border-color:#000; text-align:center;">ตำแหน่งที่สนใจ</th>
                      <th scope="col"> </th>





                    </tr>
                  </thead>
                  <tbody id="bodytutor">







                  </tbody>
                </table>


      </section><!-- /MAIN CONTENT -->

</section>


<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  id="modeltutor">
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
                  <input type="text"  hidden class="hidden" id="idtutor">



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
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">ความสามารถ</label>
                        <div class="col-sm-10">
                          <p id="ee10" style="color: red" ></p>

                      <input type="text" class="form-control" id="ability">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">ตำแหน่งที่สนใจ</label>
                        <div class="col-sm-10">
                          <p id="ee11" style="color: red" ></p>

                      <input type="text" class="form-control" id="interested_position">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">เลขรหัสประจำตัว</label>
                        <div class="col-sm-10">
                          <p id="ee12" style="color: red" ></p>

                      <input type="text" class="form-control" id="Identification_no">

                        </div>
                    </div>
                    
                    <p id="ee13" style="color: red" ></p>

@foreach ($course as $key )

  {{$key->name}} <input type="checkbox" aria-label="Checkbox for following text input" value='{{$key->idcourse}}' name="checksub">

@endforeach

<input id='filepic' type='file' name='filename' />

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                    <button type="button" name="button" id="picbtn" >รูป</button>

                        </div>
                    </div>



                </form>



      </div>
      <div class="modal-body bodydel" hidden>

คุณแน่ใจแล้วหรือว่าจะลบ ?
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>

        <button type="button" class="btn btn-primary" name="button" id="submit_addtutor" hidden>บันทึก</button>
        <button type="button" class="btn btn-primary" name="button" id="tutoredit" hidden>แก้ไข</button>
        <button type="button" class="btn btn-primary" name="button" id="tutordel" hidden>ลบ</button>





      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="picmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <picture>
    <source srcset="" type="image/svg+xml" id='imgpro'>
    <img src="..." class="img-fluid img-thumbnail" alt="...">
    <input id='fileid' type='file' name='filename' onchange="readURL(this);" hidden/>
  </picture>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary changes">แก้ไข</button>
      </div>
    </div>
  </div>
</div>
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
        var profile = $('#fileid');
        var who = 'tutor';



        formData.append('Pic', profile[0].files[0]);
        formData.append('id', $('#idtutor').val());
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

    @endsection
