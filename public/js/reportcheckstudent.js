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
                      tr =tr +  "<button class='btn btn-primary all' type='button' style='text-align: left;' data-toggle='collapse' data-target='#collapseExample"+ value.idtutor+"' data-id='"+value.idtutor+"' aria-expanded='false' aria-controls='collapseExample'>";


                      tr =tr  +" ผู้สอน "+value.firstname+" "+value.lastname;
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





  // viewData();

      $(document).on('click', '.all', function() {


  var id= $(this).data('id');

  $('#spce2_'+id).empty();

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


                                    tr = tr +  "<div id='spce2_"+value.id_timetable+"'>";
                                    tr = tr +  "</div>";


                                    tr = tr +  "</div>";




                $("#collapsetable"+id).append(tr);


                  });


          });


});

$(document).on('click', '.date2', function() {

  var date= $(this).data('date');
  var ids= $(this).data('ids');

  var status= $(this).data('idstatus');

  $.ajax({
      url: 'getstudencomedetail_date_over',
      method: 'post',
      data: {
        action:"all",
        date:date,
        id:ids,

      },

          dataType: 'html',


  }).done(function(data){
    $('#body'+ids).empty();
    $('#namecol'+ids).empty();

    $('#namecol'+ids).append("สถานะ");
    var servers = $.parseJSON(data);
var num = 1;
          $.each(servers, function(index, value2) {
          var tr= "";
        tr = tr + "<tr> ";
        tr = tr + "<th scope='row'>"+num+"</th>";
        tr = tr + "<td>"+value2.firstname+" "+value2.lastname+"</td>";

        if(value2.status == "true"){

          tr = tr + "<td>เช็คชื่อ</td>";

        }else if(value2.status == "false") {

          tr = tr + "<td>ลาหยุด</td>";


        }else if(value2.status == "late") {

          tr = tr + "<td>เช็คชื่อ</td>";


        }else if(value2.status == null) {

          tr = tr + "<td>-</td>";

        }else {

          tr = tr + "<td>ไม่ได้เช็คชื่อ</td>";

        }

        // tr = tr + " <td>"+value.num+"/"+am+"</td>";
        tr = tr + "  </tr>";




        $('#body'+ids).append(tr);
        num++;
        });

  });


});



      $(document).on('click', '.btndate', function() {

        var date= $(this).data('date');
        var ids= $(this).data('ids');

        var status= $(this).data('idstatus');


if(status=="false"){

  $('#spce2_'+ids).empty();

  var tr= "<p   style=' color:red;margin-top:10px'>*ไม่มีการเรียนการสอนเนื่องจากผู้สอนลา</p>";


  $('#spce2_'+ids).append(tr);







  $('#collapsetable2_'+ids).hide();

}
// else if(status=="missing"){
//   $('#spce2_'+ids).empty();
//
//   var tr= "<p   style=' color:red;margin-top:10px'>* ไม่ได้มาสอน</p>";
//
//
//   $('#spce2_'+ids).append(tr);
//
//
//
//
//
//
//
//   $('#collapsetable2_'+ids).hide();
//
//
//
// }



else{
  $('#spce2_'+ids).empty();

  $('#collapsetable2_'+ids).show();

  $.ajax({
      url: 'getstudencomedetail_date',
      method: 'post',
      data: {
        action:"all",
        date:date,
        id:ids,

      },

          dataType: 'html',


  }).done(function(data){
    var servers = $.parseJSON(data);
    $('#body'+ids).empty();
    var am = "";
    $('#namecol'+ids).empty();

    $('#namecol'+ids).append("สถานะ");

    $.each(servers, function(index, value) {



      if(index=="am"){

    am = value;

    }
    if(index=="detail"){


var num = 1;
      $.each(value, function(index2, value2) {
      var tr= "";
    tr = tr + "<tr> ";
    tr = tr + "<th scope='row'>"+num+"</th>";
    tr = tr + "<td>"+value2.firstname+" "+value2.lastname+"</td>";

    if(value2.status == "true"){

      tr = tr + "<td>เช็คชื่อ</td>";

    }else if(value2.status == "false") {

      tr = tr + "<td>ขาดเรียน</td>";


    }else if(value2.status == "late") {

      tr = tr + "<td>เช็คชื่อ</td>";


    }else if(value2.status == null) {

      tr = tr + "<td>-</td>";

    }else {

      tr = tr + "<td>ไม่ได้เช็คชื่อ</td>";

    }

    // tr = tr + " <td>"+value.num+"/"+am+"</td>";
    tr = tr + "  </tr>";




    $('#body'+ids).append(tr);
    num++;
    });


  }

      if(index=="check"){

        if(value=="false"){
          var tr= "";

          tr = tr + "<p style='color:red' >* วันนี้มีการลาและถูกชดเชย</p>";

          $('#spce2_'+ids).append(tr);
          $('#body'+ids).empty();
          //
          //
          //
          //
          // var tr= "";
          //
          //
          // tr = tr + "<p style='color:red' >* มีการลาสอน</p>";
          //
          // $('#spce2_'+ids).append(tr);


        }else if(value=="leave"){
          var tr= "";

          tr = tr + "<p style='color:red' >* วันนี้มีการลาและถูกชดเชย</p>";

          $('#spce2_'+ids).append(tr);
          $('#body'+ids).empty();

        }else if(value=="missing"){
          $.ajax({
              url: 'gettutor_compensate',
              method: 'post',
              data: {
                action:"all",
                id:ids,
                date:date,

              },

                  dataType: 'html',


          }).done(function(data2){
            var servers9 = $.parseJSON(data2);
            $.each(servers9, function(index9, value9) {



if(index9=="tutor"){

  $.each(value9, function(index99, value99) {

// alert(value99.firstname );
var tr= "";

tr = tr + "<p style='color:red' >*ครูสอนแทน "+value99.firstname +" "+value99.lastname +"</p>";

$('#spce2_'+ids).append(tr);
});

}
            });

          });




          // $('#body'+ids).empty();

        }


      }
});

  });
}




});




        $(document).on('click', '.all2', function() {


        var ids= $(this).data('id');
        $('#collapsetable2_'+ids).show();
        $('#spce2_'+ids).empty();

        $.ajax({
            url: 'getstudencomedetail',
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

var am = "";

var tr =  "<table class='table' ><thead> <tr> <th scope='col'>#</th> <th scope='col'>ชื่อ-นามสกุล</th><th scope='col' id='namecol"+ids+"'>จำนวนเข้าเรียน/จำนวนคอร์สเรียน</th></tr> </thead><tbody id='body"+ids+"'> </tbody></table>";

$('#collapsetable2_'+ids).append(tr);
$.each(servers, function(index, value) {

  if(index=="am"){

am = value;



}

if(index=="detail"){
  $.each(value, function(index2, value2) {
    $.each(value2, function(index3, value3) {
// alert(value3);

if(value3=='missing'){
  var tr = "<button style='margin-top:2px' type='button' class='btn btn-Secondary btndate' data-date="+index3+" data-ids="+ids+"  data-idstatus='false'>"+index3+"</button> ";

}else if(value3=='false'){
  var tr = "<button style='margin-top:2px'  type='button' class='btn btn-danger btndate' data-date="+index3+" data-ids="+ids+"  data-idstatus='true'>"+index3+"</button> ";


}else if(value3=='leave'){
  var tr = "<button style='margin-top:2px'  type='button' class='btn btn-danger btndate' data-date="+index3+" data-ids="+ids+"  data-idstatus='true'>"+index3+"</button> ";


}else{
  var tr = "<button style='margin-top:2px'  type='button' class='btn btn-primary btndate' data-date="+index3+" data-ids="+ids+"  data-idstatus='true'>"+index3+"</button> ";


}



  $('#collapse2_'+ids).append(tr);

});

});

$.ajax({
    url: 'getstudencomedetail_over',
    method: 'post',
    data: {

      id:ids,

    },

        dataType: 'html',


		success: function(data) {


  var servers = $.parseJSON(data);
  $.each(servers, function(index, value) {

    var tr = "<button style='margin-top:2px'  type='button' class='btn btn-warning date2' data-date="+value.date+" data-ids="+ids+"  data-idstatus='true'>"+value.date+"</button> ";

    $('#collapse2_'+ids).append(tr);

  });


}
});


}

if(index=="all"){

  var num = 1;

  $.each(value, function(index2, value2) {

    var tr= "";
  tr = tr + "<tr> ";
  tr = tr + "<th scope='row'>"+num+"</th>";
  tr = tr + "<td>"+value2.firstname+" "+value2.lastname+"</td>";
  tr = tr + " <td>"+value2.num+"/"+am+"</td>";
  tr = tr + "  </tr>";




  $('#body'+ids).append(tr);
  num++;

});



}


});

          });




        });




});
