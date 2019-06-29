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


              tr = tr +  "<div  id='collapsetable"+value.idtutor+"'>";
              tr = tr +  "</div>";

              tr = tr +  "</div>";




       $('#report').append(tr);


        });


});

    }

    $(document).on('click', '.all', function() {


var id= $(this).data('id');


        $.ajax({
            url: 'getstudencome',
            method: 'post',
            data: {
              action:"all"
              ,id:id
            },

                dataType: 'html',


        }).done(function(data){

         var servers = $.parseJSON(data);
        $("#collapsetable"+id).empty();

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
      // var id= "";
                $.each(servers, function(index, value) {


                  var tr = "  <br><p>";
                              tr =tr +  " <button class='btn btn-primary all2' type='button' data-toggle='collapse' data-target='#collapseExample2_"+ value.id_timetable+"' data-id='"+value.id_timetable+"' aria-expanded='false' aria-controls='collapseExample2_'>";


                              tr =tr  +" วิชา "+value.name +" "+value.nameGrade+" "+"วันที่ "+value.Start_date+" - "+value.End_date+" เวลา "+value.Start_time+" - "+value.End_time;
                              tr =tr +  "   </button>";
                              tr =tr +  "  </p>";


                                  tr = tr +  " <div class='collapse' id='collapseExample2_"+value.id_timetable+"'>";

                                  tr = tr +  "<div id='collapse2_"+value.id_timetable+"'>";
                                  tr = tr +  "</div>";


                                  tr = tr +  "<div id='collapsetable2_"+value.id_timetable+"'>";
                                  tr = tr +  "</div>";

                                  tr = tr +  "</div>";




              $("#collapsetable"+id).append(tr);


                });


        });


});

          $(document).on('click', '.all2', function() {

  var ids= $(this).data('id');


  $.ajax({
      url: 'getreporttutor2',
      method: 'post',
      data: {
        action:"all",
        id:ids,

      },

          dataType: 'html',


  }).done(function(data){


    var servers = $.parseJSON(data);
    $('#collapsetable2_'+ids).empty();
    $('#collapse2_'+ids).empty();



    var tr =  "<table class='table' ><thead> <tr> <th scope='col'>#</th> <th >ชื่อ-นามสกุล</th><th >ก่อนเรียน</th><th >ข้อ1</th><th>ข้อ2</th><th>ข้อ3</th><th>ข้อ4</th><th>ข้อ5</th><th>ผลเฉลี่ย</th><th >หลังเรียน</th><th >ข้อ1</th><th>ข้อ2</th><th>ข้อ3</th><th>ข้อ4</th><th>ข้อ5</th><th>ผลเฉลี่ย</th></tr> </thead><tbody id='body"+ids+"'> </tbody></table>";

    $('#collapsetable2_'+ids).append(tr);
var num = 1;
    $.each(servers, function(index, value) {

  var tr =


      tr = tr + "<tr> ";
      tr = tr + "<th scope='row'>"+num+"</th>";
      tr = tr + "<td>"+value.firstname+" "+value.lastname+"</td>";
      tr = tr + " <td></td>";

      tr = tr + " <td>"+value.bf1+" คะแนน</td>";
      tr = tr + " <td>"+value.bf2+" คะแนน</td>";
      tr = tr + " <td>"+value.bf3+" คะแนน</td>";
      tr = tr + " <td>"+value.bf4+" คะแนน</td>";
      tr = tr + " <td>"+value.bf5+" คะแนน</td>";


var sa = value.t1/5;
if(sa<=1){

sa = "ควรปรับปรุง";

}else if(sa<=2){
sa = "พอใช้";

}else if(sa<=3){

sa = "ปานกลาง";
}else if(sa<=4){

sa = "ดี";
}else if(sa<=5){

sa = "ดีมาก";
}

      tr = tr + " <td>"+sa+" </td>";
      tr = tr + " <td></td>";


if(value.af1==null){

  tr = tr + " <td> - </td>";

}else{
  tr = tr + " <td>"+value.af1+" คะแนน</td>";

}
if(value.af2==null){

  tr = tr + " <td> - </td>";

}else{
  tr = tr + " <td>"+value.af2+" คะแนน</td>";


}
if(value.af3==null){

  tr = tr + " <td> - </td>";

}else{
  tr = tr + " <td>"+value.af3+" คะแนน</td>";


}
if(value.af4==null){

  tr = tr + " <td> - </td>";

}else{
  tr = tr + " <td>"+value.af4+" คะแนน</td>";


}
if(value.af5==null){

  tr = tr + " <td> - </td>";

}else{
  tr = tr + " <td>"+value.af5+" คะแนน</td>";


}

if(value.t2!=null){

  var sa2 = value.t2/5;


  if(sa2<=1){

  sa2 = "ควรปรับปรุง";

}else if(sa2<=2){
  sa2 = "พอใช้";

}else if(sa2<=3){

  sa2 = "ปานกลาง";
}else if(sa2<=4){

  sa2 = "ดี";
}else if(sa2<=5){

  sa2 = "ดีมาก";
  }
  tr = tr + " <td>"+sa2+" </td>";

}else{

  tr = tr + " <td> - </td>";

}



      tr = tr + "  </tr>";




      $('#body'+ids).append(tr);
      num++;
    });

    });


          });

});
