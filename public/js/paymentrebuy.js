
$(document).ready(function() {

viewData();

  $(document).on('click', '.action', function() {

    var stuff = $(this).data('info').split(',');

    document.getElementById("img").src="storage/payment_buy/"+stuff['5'];



            $('#checkmodal').modal('show');


$("#idpaybuy").val(stuff[0]);


$("#idkey").val("");
$("#idkey").val($(this).data('key'));


  });

  $(document).on('click', '.info', function() {

    var stuff = $(this).data('info').split(',');



            $('#infomodal').modal('show');
            $('#h1').html('วันที่เริ่มทำรายการ  '+stuff['1']);
            $('#h2').html("  วันที่ชำระเงิน "+stuff['2']);
            $('#h3').html("ชื่อผู้ทำรายการ "+stuff['3']+ " "+stuff['4'] );

  $('#h4').html("ประเภท "+stuff['9']);
  $('#h5').html("ชื่อวิชา "+stuff['7']);
  $('#h6').html("กลุ่มการเรียน "+stuff['8']);
  $('#h7').html("เวลา "+stuff['10'] +" ชั่วโมง");


    $('#h8').html("เวลาทั้งหมด "+stuff['13']);
    $('#h9').html("จำนวน "+stuff['14'] +"ครั้ง");
    $('#h10').html("ราคา "+stuff['11']+"บาท");


    $('#h11').html("หมายเหตุวิชา "+stuff['12']);

            $('#h12').html("สถานะ"+stuff['6']);



            $('#h13').html("วันที่เรียน "+stuff['15']+" - "+stuff['16'] );
            $('#h14').html("เวลาเรียน "+stuff['17']+" - "+stuff['18']);

            if(stuff['19']=="null"){

              $('#h15').html("รหัส ไม่มี" );

            }else{

              $('#h15').html("รหัส "+stuff['19'] );

            }




  });
  $(document).on('click', '#confirm', function() {


        $('#selectroom').modal('show');



        $.ajax({
            url: 'gettutorandroom',
            method: 'POST',
                dataType: 'json',
                data:{

           'id':$('#idpaybuy').val(),
            'key':$('#idkey').val(),
            'amount':$('#idkey').val(),

         },

        success: function(data) {

          $('#room')
            .find('option')
            .remove()
            .end();
            $('#tutor')
              .find('option')
              .remove()
              .end();



          $.each(data.room, function(index, value) {


    var x = document.getElementById("room");
    var option = document.createElement("option");
    option.value = value.idroom;
    option.text = value.number;
    x.add(option);


          });


          $.each(data.tech, function(index, value) {



    var x = document.getElementById("tutor");
    var option = document.createElement("option");
    option.value = value.idtutor;
    option.text = value.firstname + " " + value.lastname ;
    x.add(option);


          });

        }
      });



  });
  $(document).on('click', '#comfirmss', function() {


    $.ajax({
        url: 'getDatabuylist',
        method: 'POST',
            dataType: 'html',
            data:{

              action:'pass',
       'id':$('#idpaybuy').val(),
 'idroom':$('#room').val(),
 'idtutor':$('#tutor').val(),

            }

    }).done(function(data){
      $('#selectroom').modal('hide');

   $('#checkmodal').modal('hide');
viewData();
    });


  });

    $(document).on('click', '#confirmno', function() {


      $.ajax({
          url: 'getDatabuylist',
          method: 'POST',
              dataType: 'html',
              data:{

                action:'nopass',
       'id':$('#idpaybuy').val(),
              }

      }).done(function(data){

   $('#checkmodal').modal('hide');
viewData();
      });



    });

  function viewData(){

$.ajax({
    url: 'getDatabuylist',
    method: 'POST',
        dataType: 'html',
        data:{

          action:'view',

        }

}).done(function(data){

 var servers = $.parseJSON(data);
$("#datapay").empty();

        $.each(servers, function(index, value) {




          var tr = "<tr>";
          tr = tr + "<td style='border-color:#000000;'>" +value.idbuy+ "</td>";
          tr = tr + "<td style='border-color:#000000;'>" + value.datetime + "</td>";

          if(value.date_pay==null){
            tr = tr + "<td style='border-color:#000000;'> - </td>";


          }else{
            tr = tr + "<td style='border-color:#000000;'>" + value.date_pay + "</td>";

          }


          tr = tr + "<td style='border-color:#000000;'>" + value.firstname  + value.lastname + "</td>";
          if(value.img==null){

            tr = tr + "<td style='border-color:#000000;'> - </td>";

}else{
  tr = tr + "<td style='border-color:#000000;'>" + value.img + "</td>";


}
          tr = tr + "<td style='border-color:#000000;'>" + value.status + "</td>";

            if(value.status == 'ผ่านการตรวจสอบ'||value.status == 'ไม่ผ่านการตรวจสอบ'){

                tr = tr +"<td style='border-color:#000000;'></td>";
            }else if(value.status == 'ยังไม่ได้ชำระเงิน'){
              tr = tr + "<td><button class='info btn btn-info info' data-info='"+value.idbuy+","+value.datetime+","+value.date_pay+","+value.firstname+","+value.lastname+","+value.img+","+value.status+","+value.name+","+value.nameGrade+","+value.nametype+","+value.per_round+","+value.price+","+value.note+","+value.Time_length+","+value.amount_courses+","+value.date_start+","+value.date_end+","+value.time_start+","+value.time_end+","+value.keyinput+"'><span class='glyphicon glyphicon-edit'></span> รายละเอียด </button>";


            }else{
              tr = tr + "<td style='border-color:#000000;'><button class='info btn btn-info info' data-info='"+value.idbuy+","+value.datetime+","+value.date_pay+","+value.firstname+","+value.lastname+","+value.img+","+value.status+","+value.name+","+value.nameGrade+","+value.nametype+","+value.per_round+","+value.price+","+value.note+","+value.Time_length+","+value.amount_courses+","+value.date_start+","+value.date_end+","+value.time_start+","+value.time_end+","+value.keyinput+"'><span class='glyphicon glyphicon-edit'></span> รายละเอียด </button>";

              tr = tr + "<button class='action btn btn-success action' data-info='"+value.idbuy+","+value.datetime+","+value.date_pay+","+value.firstname+","+value.lastname+","+value.img+","+value.status+"' data-key='"+value.keyinput+"' <span class='glyphicon glyphicon-trash'></span> ตรวจสอบ</button></td>";


            }





          tr = tr + "</tr>";
          $('#datapay').append(tr);

        });

});

    }





});
