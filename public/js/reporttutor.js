$(document).ready(function() {
  viewData2();

    function viewData2(){

  $.ajax({
      url: 'gettutorall',
      method: 'post',
      data: {
        action:"all"
      },

          dataType: 'html',


  }).done(function(data){

   var servers = $.parseJSON(data);
  $("#report").empty();

  var id= "";
          $.each(servers, function(index, value) {

            var tr = "  <br><p>";
                        tr =tr +  "<button class='btn btn-primary all' type='button'  data-toggle='collapse' data-target='#collapseExample"+ value.idtutor+"' data-id='"+value.idtutor+"' aria-expanded='false' aria-controls='collapseExample'>";


                        tr =tr  +" วิชา "+"ผู้สอน "+value.firstname+" "+value.lastname;
                        tr =tr +  "   </button>";
                        tr =tr +  "  </p>";


                            tr = tr +  " <div style='padding-left: 50px;' class='collapse' id='collapseExample"+value.idtutor+"'>";

                            tr = tr +  "<div id='collapse"+value.idtutor+"'>";
                            tr = tr +  "</div>";



                            tr = tr +  "</div>";




         $('#report').append(tr);


          });


  });

      }
  // viewData();
  $(document).on('click', '.all', function() {

    var id= $(this).data('id');


  $.ajax({
      url: 'getreporttutor',
      method: 'post',
      data: {
        action:"all",
        id:id

      },

          dataType: 'html',


  }).done(function(data){

    if(data=="[]"){

      var unique_id = $.gritter.add({
          // (string | mandatory) the heading of the notification
          title: '// WARNING ',
          // (string | mandatory) the text inside the notification
          text: "ไม่มีข้อมูล",
          // (string | optional) the image to display on the left

          // (bool | optional) if you want it to fade out on its own or just sit there
          sticky: true,
          // (int | optional) the time you want it to be alive for before fading out
          time: 1,
          // (string | optional) the class name you want to apply to that specific message
          class_name: 'my-sticky-class'
      });

    }

   var servers = $.parseJSON(data);
  $("#collapse"+id).empty();


          $.each(servers, function(index, value) {

//             if(id!=value.id_timetable){
//
//               var tr = "  <br><p>";
//             tr =tr +  "<button class='btn btn-primary' type='button' data-toggle='collapse' data-target='#collapseExample"+ value.id_timetable+"' aria-expanded='false' aria-controls='collapseExample'>";
//
//               tr =tr +   value.firstname +" "+ value.lastname +" วิชา "+value.name +" "+value.nameGrade+" "+value.Start_date+" - "+value.End_date+" เวลา "+value.Start_time+" - "+value.End_time;
//                   tr =tr +  "   </button>";
//               tr =tr +  "       </p>";
//
//               tr =tr +  " <div class='collapse' id='collapseExample"+ value.id_timetable+"'>";
//             tr =tr +  " <div id='body"+ value.id_timetable+"' >";
//
//             tr =tr +  "<button class='btn btn-primary' type='button' data-toggle='collapse' data-target='#collapseExampleS"+value.idstudent+"_"+value.id_timetable+"' aria-expanded='false' aria-controls='collapseExample'>";
//
//               tr =tr + "ผลประเมินของ"+  value.firstnameS +" "+ value.lastnameS;
//                   tr =tr +  "   </button>";
//
//
//                   tr =tr +  " <div class='collapse' id='collapseExampleS"+value.idstudent+"_"+value.id_timetable+"'>";
//
//           tr =tr + "<br> ผลประเมินของ "+value.firstnameS+value.lastnameS ;
//             tr =tr + "<br>"+"1.ห้องเรียน/สถานที่ปฏิบัติ มีความเหมาะสม สะดวก <br>"+ value.ask1;
//             tr =tr + "<br>"+"2.ผู้สอนมาสอนสม่ำเสมอและตรงต่อเวลา <br>"+ value.ask2;
//             tr =tr + "<br>"+"3.ผู้สอน สอนอย่างมีขั้นตอน มีการเตรียมการสอนที่ดี <br>"+ value.ask3;
//             tr =tr + "<br>"+"4.ผู้สอนได้สอนครบถ้วนและให้ข้อเสนอแนะที่ดี <br>"+ value.ask4;
//             tr =tr + "<br>"+"5.เครื่องมืออุปกรณ์มีเพียงพอ ทันสมัย และอยู่ในสภาพพร้อมใช้ <br>"+value.ask5;
//
//             tr =tr + "<br>"+"6.ความคิดเห็น <br>"+value.Content;
//                         tr =tr +  "</div>";
//
//             tr =tr +  " </div>";
//             tr =tr +  "</div>";
//
//
//             $('#report').append(tr);
//             id =value.id_timetable;
//
//           }else{
//   var tr = "";
//   tr =tr +  "<br><button class='btn btn-primary' type='button' data-toggle='collapse' data-target='#collapseExampleS"+value.idstudent+"_"+value.id_timetable+"' aria-expanded='false' aria-controls='collapseExample'>";
//
//     tr =tr + "ผลประเมินของ"+  value.firstnameS +" "+ value.lastnameS;
//         tr =tr +  "   </button>";
//   tr =tr +  " <div class='collapse' id='collapseExampleS"+value.idstudent+"_"+value.id_timetable+"'>";
//
// tr =tr + "<br> ผลประเมินของ "+value.firstnameS+value.lastnameS;
// tr =tr + "<br>"+"1.ห้องเรียน/สถานที่ปฏิบัติ มีความเหมาะสม สะดวก <br>"+ value.ask1;
// tr =tr + "<br>"+"2.ผู้สอนมาสอนสม่ำเสมอและตรงต่อเวลา <br>"+ value.ask2;
// tr =tr + "<br>"+"3.ผู้สอน สอนอย่างมีขั้นตอน มีการเตรียมการสอนที่ดี <br>"+ value.ask3;
// tr =tr + "<br>"+"4.ผู้สอนได้สอนครบถ้วนและให้ข้อเสนอแนะที่ดี <br>"+ value.ask4;
// tr =tr + "<br>"+"5.เครื่องมืออุปกรณ์มีเพียงพอ ทันสมัย และอยู่ในสภาพพร้อมใช้ <br>"+value.ask5;
//
//
//         tr =tr +  "</div>";
//
//   $('#body'+ value.id_timetable).append(tr);
//           }


  var tr = "  <br><p>";
              tr =tr +  "<button class='btn btn-primary' type='button' data-toggle='collapse' data-target='#collapseExample"+ value.id_timetable+"' aria-expanded='false' aria-controls='collapseExample'>";


              tr =tr  +" วิชา "+value.name +" "+value.nameGrade+" วันที่  "+value.Start_date+" - "+value.End_date+" เวลา "+value.Start_time+" - "+value.End_time;
              tr =tr +  "   </button>";
              tr =tr +  "  </p>";




    tr =tr +  " <div class='collapse' id='collapseExample"+ value.id_timetable+"'>";




//
tr =tr +  "<table class='table table-hover'>";

//ห้องเรียน/สถานที่ปฏิบัติ มีความเหมาะสม สะดวก

tr =tr +  "<thead><tr><th scope='col'>#</th><th scope='col'>หัวข้อ</th><th scope='col'>Mean</th>      <th scope='col'>SD</th>    </tr>  </thead>";
tr =tr +  "<tbody>";
tr =tr +  "<tr> <th scope='row'>1</th><td> ติวเตอร์สอนตรงตามเป้าหมายการสอนหรือไม่	</td> <td>"+(((5*value.sum1_1)+(4*value.sum1_2)+(3*value.sum1_3)+(2*value.sum1_4)+(1*value.sum1_5))/value.sum)+"</td>  <td>";

var mean = (((5*value.sum1_1)+(4*value.sum1_2)+(3*value.sum1_3)+(2*value.sum1_4)+(1*value.sum1_5))/value.sum);

  var sd = Math.pow(((((Math.pow(5-mean, 2))*value.sum1_1)+((Math.pow(4-mean, 2))*value.sum1_2)+((Math.pow(3-mean, 2))*value.sum1_3)+((Math.pow(2-mean, 2))*value.sum1_4)+((Math.pow(1-mean, 2))*value.sum1_5))/(value.sum-1)), 0.5);

if(value.sum=="1"){
  var sd = 0;

}

tr =tr +  ""+sd.toFixed(2);;
tr =tr +  "</td></tr>";

tr =tr +  "</tbody>";
tr =tr +  "</table>";


tr =tr +  "<table class='table'>";

tr =tr +  " <thead class='thead-light'>";
tr =tr +  " <tr> <th scope='col'>Choice</th><th scope='col'>คำอธิบาย</th><th scope='col'>คะแนน</th> <th scope='col'>ความถี่</th> <th scope='col'>N</th></tr> </thead>";
tr =tr +  "<tbody>";
 tr =tr +  "<tr> <th scope='row'>1</th><td>ดีมาก</td> <td>5</td>  <td>"+(100/value.sum)*value.sum1_1+"%</td><td>"+value.sum1_1+"</td></tr>";
 tr =tr +  "<tr> <th scope='row'>2</th><td>ดี</td> <td>4</td>  <td>"+(100/value.sum)*value.sum1_2+"%</td><td>"+value.sum1_2+"</td></tr>";
 tr =tr +  "<tr> <th scope='row'>3</th><td>ปานกลาง</td> <td>3</td>  <td>"+(100/value.sum)*value.sum1_3+"%</td><td>"+value.sum1_3+"</td></tr>";
 tr =tr +  "<tr> <th scope='row'>4</th><td>พอใช้</td> <td>2</td>  <td>"+(100/value.sum)*value.sum1_4+"%</td><td>"+value.sum1_4+"</td></tr>";
 tr =tr +  "<tr> <th scope='row'>5</th><td>ควรปรับปรุง</td> <td>1</td>  <td>"+(100/value.sum)*value.sum1_5+"%</td><td>"+value.sum1_5+"</td></tr>";

tr =tr +  "</tbody>";
tr =tr +  "</table>";


/////2


tr =tr +  "<table class='table table-hover'>";

//ผู้สอนมาสอนสม่ำเสมอและตรงต่อเวลา

tr =tr +  "<thead><tr><th scope='col'>#</th><th scope='col'>หัวข้อ</th><th scope='col'>Mean</th>      <th scope='col'>SD</th>    </tr>  </thead>";
tr =tr +  "<tbody>";
tr =tr +  "<tr> <th scope='row'>2</th><td> ความสามารถในการถ่ายทอดความรู้ของติวเตอร์	 </td> <td>"+(((5*value.sum2_1)+(4*value.sum2_2)+(3*value.sum2_3)+(2*value.sum2_4)+(1*value.sum2_5))/value.sum)+"</td>  <td>";

var mean = (((5*value.sum2_1)+(4*value.sum2_2)+(3*value.sum2_3)+(2*value.sum2_4)+(1*value.sum2_5))/value.sum);

var sd = Math.pow(((((Math.pow(5-mean, 2))*value.sum2_1)+((Math.pow(4-mean, 2))*value.sum2_2)+((Math.pow(3-mean, 2))*value.sum2_3)+((Math.pow(2-mean, 2))*value.sum2_4)+((Math.pow(1-mean, 2))*value.sum2_5))/(value.sum-1)), 0.5);
if(value.sum=="1"){
  var sd = 0;

}
tr =tr +  ""+sd.toFixed(2);;
tr =tr +  "</td></tr>";

tr =tr +  "</tbody>";
tr =tr +  "</table>";





tr =tr +  "<table class='table'>";

tr =tr +  " <thead class='thead-light'>";
tr =tr +  " <tr> <th scope='col'>Choice</th><th scope='col'>คำอธิบาย</th><th scope='col'>คะแนน</th> <th scope='col'>ความถี่</th> <th scope='col'>N</th></tr> </thead>";
tr =tr +  "<tbody>";
 tr =tr +  "<tr> <th scope='row'>1</th><td>ดีมาก</td> <td>5</td>  <td>"+(100/value.sum)*value.sum2_1+"%</td><td>"+value.sum2_1+"</td></tr>";
 tr =tr +  "<tr> <th scope='row'>2</th><td>ดี</td> <td>4</td>  <td>"+(100/value.sum)*value.sum2_2+"%</td><td>"+value.sum2_2+"</td></tr>";
 tr =tr +  "<tr> <th scope='row'>3</th><td>ปานกลาง</td> <td>3</td>  <td>"+(100/value.sum)*value.sum2_3+"%</td><td>"+value.sum2_3+"</td></tr>";
 tr =tr +  "<tr> <th scope='row'>4</th><td>พอใช้</td> <td>2</td>  <td>"+(100/value.sum)*value.sum2_4+"%</td><td>"+value.sum2_4+"</td></tr>";
 tr =tr +  "<tr> <th scope='row'>5</th><td>ควรปรับปรุง</td> <td>1</td>  <td>"+(100/value.sum)*value.sum2_5+"%</td><td>"+value.sum2_5+"</td></tr>";

tr =tr +  "</tbody>";
tr =tr +  "</table>";







//////3



tr =tr +  "<table class='table table-hover'>";

// ผู้สอน สอนอย่างมีขั้นตอน มีการเตรียมการสอนที่ดี
tr =tr +  "<thead><tr><th scope='col'>#</th><th scope='col'>หัวข้อ</th><th scope='col'>Mean</th>      <th scope='col'>SD</th>    </tr>  </thead>";
tr =tr +  "<tbody>";
tr =tr +  "<tr> <th scope='row'>3</th><td> การสร้างแรงจูงใจของติวเตอร์ที่ทำให้อยากเรียนรู้	 </td> <td>"+(((5*value.sum3_1)+(4*value.sum3_2)+(3*value.sum3_3)+(2*value.sum3_4)+(1*value.sum3_5))/value.sum)+"</td>  <td>";

var mean = (((5*value.sum3_1)+(4*value.sum3_2)+(3*value.sum3_3)+(2*value.sum3_4)+(1*value.sum3_5))/value.sum);

var sd = Math.pow(((((Math.pow(5-mean, 2))*value.sum3_1)+((Math.pow(4-mean, 2))*value.sum3_2)+((Math.pow(3-mean, 2))*value.sum3_3)+((Math.pow(2-mean, 2))*value.sum3_4)+((Math.pow(1-mean, 2))*value.sum3_5))/(value.sum-1)), 0.5);
if(value.sum=="1"){
  var sd = 0;

}
tr =tr +  ""+sd.toFixed(2);;
tr =tr +  "</td></tr>";

tr =tr +  "</tbody>";
tr =tr +  "</table>";





tr =tr +  "<table class='table'>";

tr =tr +  " <thead class='thead-light'>";
tr =tr +  " <tr> <th scope='col'>Choice</th><th scope='col'>คำอธิบาย</th><th scope='col'>คะแนน</th> <th scope='col'>ความถี่</th> <th scope='col'>N</th></tr> </thead>";
tr =tr +  "<tbody>";
 tr =tr +  "<tr> <th scope='row'>1</th><td>ดีมาก</td> <td>5</td>  <td>"+(100/value.sum)*value.sum3_1+"%</td><td>"+value.sum3_1+"</td></tr>";
 tr =tr +  "<tr> <th scope='row'>2</th><td>ดี</td> <td>4</td>  <td>"+(100/value.sum)*value.sum3_2+"%</td><td>"+value.sum3_2+"</td></tr>";
 tr =tr +  "<tr> <th scope='row'>3</th><td>ปานกลาง</td> <td>3</td>  <td>"+(100/value.sum)*value.sum3_3+"%</td><td>"+value.sum3_3+"</td></tr>";
 tr =tr +  "<tr> <th scope='row'>4</th><td>พอใช้</td> <td>2</td>  <td>"+(100/value.sum)*value.sum3_4+"%</td><td>"+value.sum3_4+"</td></tr>";
 tr =tr +  "<tr> <th scope='row'>5</th><td>ควรปรับปรุง</td> <td>1</td>  <td>"+(100/value.sum)*value.sum3_5+"%</td><td>"+value.sum3_5+"</td></tr>";

tr =tr +  "</tbody>";
tr =tr +  "</table>";




///////4
tr =tr +  "<table class='table table-hover'>";
//ผู้สอนได้สอนครบถ้วนและให้ข้อเสนอแนะที่ดี

tr =tr +  "<thead><tr><th scope='col'>#</th><th scope='col'>หัวข้อ</th><th scope='col'>Mean</th>      <th scope='col'>SD</th>    </tr>  </thead>";
tr =tr +  "<tbody>";
tr =tr +  "<tr> <th scope='row'>4</th><td> เนื้อหาและความรู้ที่ได้รับ	 </td> <td>"+(((5*value.sum4_1)+(4*value.sum4_2)+(3*value.sum4_3)+(2*value.sum4_4)+(1*value.sum4_5))/value.sum)+"</td>  <td>";

var mean = (((5*value.sum4_1)+(4*value.sum4_2)+(3*value.sum4_3)+(2*value.sum4_4)+(1*value.sum4_5))/value.sum);

var sd = Math.pow(((((Math.pow(5-mean, 2))*value.sum4_1)+((Math.pow(4-mean, 2))*value.sum4_2)+((Math.pow(3-mean, 2))*value.sum4_3)+((Math.pow(2-mean, 2))*value.sum4_4)+((Math.pow(1-mean, 2))*value.sum4_5))/(value.sum-1)), 0.5);
if(value.sum=="1"){
  var sd = 0;

}
tr =tr +  ""+sd.toFixed(2);;
tr =tr +  "</td></tr>";

tr =tr +  "</tbody>";
tr =tr +  "</table>";





tr =tr +  "<table class='table'>";

tr =tr +  " <thead class='thead-light'>";
tr =tr +  " <tr> <th scope='col'>Choice</th><th scope='col'>คำอธิบาย</th><th scope='col'>คะแนน</th> <th scope='col'>ความถี่</th> <th scope='col'>N</th></tr> </thead>";
tr =tr +  "<tbody>";
 tr =tr +  "<tr> <th scope='row'>1</th><td>ดีมาก</td> <td>5</td>  <td>"+(100/value.sum)*value.sum4_1+"%</td><td>"+value.sum4_1+"</td></tr>";
 tr =tr +  "<tr> <th scope='row'>2</th><td>ดี</td> <td>4</td>  <td>"+(100/value.sum)*value.sum4_2+"%</td><td>"+value.sum4_2+"</td></tr>";
 tr =tr +  "<tr> <th scope='row'>3</th><td>ปานกลาง</td> <td>3</td>  <td>"+(100/value.sum)*value.sum4_3+"%</td><td>"+value.sum4_3+"</td></tr>";
 tr =tr +  "<tr> <th scope='row'>4</th><td>พอใช้</td> <td>2</td>  <td>"+(100/value.sum)*value.sum4_4+"%</td><td>"+value.sum4_4+"</td></tr>";
 tr =tr +  "<tr> <th scope='row'>5</th><td>ควรปรับปรุง</td> <td>1</td>  <td>"+(100/value.sum)*value.sum4_5+"%</td><td>"+value.sum4_5+"</td></tr>";

tr =tr +  "</tbody>";
tr =tr +  "</table>";

///////////5


tr =tr +  "<table class='table table-hover'>";
//เครื่องมืออุปกรณ์มีเพียงพอ ทันสมัย และอยู่ในสภาพพร้อมใช้

tr =tr +  "<thead><tr><th scope='col'>#</th><th scope='col'>หัวข้อ</th><th scope='col'>Mean</th>      <th scope='col'>SD</th>    </tr>  </thead>";
tr =tr +  "<tbody>";
tr =tr +  "<tr> <th scope='row'>5</th><td> สิ่งที่เรียนรู้สามารถนำไปใช้ประโยชน์ในการศึกษาได้จริง	</td> <td>"+(((5*value.sum5_1)+(4*value.sum5_2)+(3*value.sum5_3)+(2*value.sum5_4)+(1*value.sum5_5))/value.sum)+"</td>  <td>";

var mean = (((5*value.sum5_1)+(4*value.sum5_2)+(3*value.sum5_3)+(2*value.sum5_4)+(1*value.sum5_5))/value.sum);

var sd = Math.pow(((((Math.pow(5-mean, 2))*value.sum5_1)+((Math.pow(4-mean, 2))*value.sum5_2)+((Math.pow(3-mean, 2))*value.sum5_3)+((Math.pow(2-mean, 2))*value.sum5_4)+((Math.pow(1-mean, 2))*value.sum5_5))/(value.sum-1)), 0.5);
if(value.sum=="1"){
  var sd = 0;

}
tr =tr +  ""+sd.toFixed(2);;
tr =tr +  "</td></tr>";

tr =tr +  "</tbody>";
tr =tr +  "</table>";





tr =tr +  "<table class='table'>";

tr =tr +  " <thead class='thead-light'>";
tr =tr +  " <tr> <th scope='col'>Choice</th><th scope='col'>คำอธิบาย</th><th scope='col'>คะแนน</th> <th scope='col'>ความถี่</th> <th scope='col'>N</th></tr> </thead>";
tr =tr +  "<tbody>";
 tr =tr +  "<tr> <th scope='row'>1</th><td>ดีมาก</td> <td>5</td>  <td>"+(100/value.sum)*value.sum5_1+"%</td><td>"+value.sum5_1+"</td></tr>";
 tr =tr +  "<tr> <th scope='row'>2</th><td>ดี</td> <td>4</td>  <td>"+(100/value.sum)*value.sum5_2+"%</td><td>"+value.sum5_2+"</td></tr>";
 tr =tr +  "<tr> <th scope='row'>3</th><td>ปานกลาง</td> <td>3</td>  <td>"+(100/value.sum)*value.sum5_3+"%</td><td>"+value.sum5_3+"</td></tr>";
 tr =tr +  "<tr> <th scope='row'>4</th><td>พอใช้</td> <td>2</td>  <td>"+(100/value.sum)*value.sum5_4+"%</td><td>"+value.sum5_4+"</td></tr>";
 tr =tr +  "<tr> <th scope='row'>5</th><td>ควรปรับปรุง</td> <td>1</td>  <td>"+(100/value.sum)*value.sum5_5+"%</td><td>"+value.sum5_5+"</td></tr>";

tr =tr +  "</tbody>";
tr =tr +  "</table>";

tr =tr +  "<a class='detailss' data-id='"+value.id_timetable+"'>คำแนะนำ</a>";

// tr =tr +  "<thead><tr><th scope='col'>#</th> <th scope='col'>หัวข้อ</th><th scope='col'>Last</th> <th scope='col'>Handle</th> </tr>  </thead>";
// tr =tr +  "<tbody>";
// tr =tr +  "<tr> <th scope='row'>1</th><td>ผู้เรียนเข้าใจเนื้อหาในการเรียน</td> <td>Otto</td>  <td>@mdo</td></tr>";
// tr =tr +  "<tr><th scope='row'>2</th><td>ผู้เรียนตั้งใจและสนใจในการเรียน</td> <td>Otto</td>  <td>@mdo</td></tr>";
// tr =tr +  "<tr><th scope='row'>3</th><td>ผู้เรียนติดตามเนื้อหาและทำแบบฝึกหัดที่มอบหมายอย่างสม่ำเสมอ</td> <td>Otto</td>  <td>@mdo</td></tr>";
// tr =tr +  "<tr><th scope='row'>4</th><td>ผู้เรียนทบทวนบทเรียนก่อนเข้าเรียน</td> <td>Otto</td>  <td>@mdo</td></tr>";
// tr =tr +  "<tr><th scope='row'>5</th><td>ผู้เรียนได้ประโยชน์จากการเรียนวิชานี้</td> <td>Otto</td>  <td>@mdo</td></tr>";
//
// tr =tr +  "</tbody>";



                tr =tr +  "</div>";



          $("#collapse"+id).append(tr);


          });


  });

});


$(document).on('click', '.detailss', function() {

  var id = $(this).data('id');


$.ajax({
    url: 'getdetailtimetable',
    method: 'post',
    data: {
      id:id
    },

        dataType: 'html',


}).done(function(data){
  $(".sxxx").empty();
var tr = "<h5>1.ปัญหาที่เกิดขึ้น</h5><hr><div style='padding-left: 10px;' id='div1'></div>";
  tr = tr + "<hr><h5>2.สิ่งที่ต้องการให้ติวเตอร์แก้ไข	</h5><hr><div  style='padding-left: 10px;' id='div2'></div>";
  $(".sxxx").append(tr);

  var servers = $.parseJSON(data);
 $("#collapse"+id).empty();




var num = 1;
         $.each(servers, function(index, value) {
var tr = "";

if(value.Content){
  tr = tr+ "- "+value.Content +"<br>";


}






  $("#div1").append(tr);
  num++;
});

var num = 1;
         $.each(servers, function(index, value) {
var tr = "";

if(value.Content2){
  tr = tr+  "- "+value.Content2 +"<br>";


}






  $("#div2").append(tr);
  num++;
});
$('#exampleModal').modal('show')

});
});

});
