jQuery(document).ready(function(){





var testid;



$(document).on('click', '#savetimess', function() {
var check = true;
  $.ajax({
    url: 'checkselecttime',
    method: 'POST',
dataType: 'json',
        data: {
          'id_timetable':$('input:radio[name=groupselecttime]:checked').data('id_timetable'),

'amount':$('input:radio[name=groupselecttime]:checked').data('amount'),

          'date1':$('input:radio[name=groupselecttime]:checked').data('start_date'),
          'time1':$('input:radio[name=groupselecttime]:checked').data('start_time'),
          'date2':$('input:radio[name=groupselecttime]:checked').data('end_date'),
          'time2':$('input:radio[name=groupselecttime]:checked').data('end_time'),


    },  success: function(data) {


if(data==true){

  var d1 = new Date($('input:radio[name=groupselecttime]:checked').data('start_date'));
  d1.setDate(d1.getDate());

  var d11 = d1.getDate();

  var d112 = (d1.getMonth()+1);

  if(d11.toString().length==1){
  if(d112.toString().length==1){

  var d111 = d1.getFullYear()+'-0' + (d1.getMonth()+1) + '-0'+d1.getDate();

  }else{

  var d111 = d1.getFullYear()+'-' + (d1.getMonth()+1) + '-0'+d1.getDate();

  }
  }else{
  if(d112.toString().length==1){

  var d111 = d1.getFullYear()+'-0' + (d1.getMonth()+1) + '-'+d1.getDate();


  }else{
  var d111 = d1.getFullYear()+'-' + (d1.getMonth()+1) + '-'+d1.getDate();


  }

  }
  document.getElementById("date1").value =d111;

  var d1 = new Date($('input:radio[name=groupselecttime]:checked').data('end_date'));
  d1.setDate(d1.getDate());

  var d11 = d1.getDate();

  var d112 = (d1.getMonth()+1);

  if(d11.toString().length==1){
  if(d112.toString().length==1){

  var d111 = d1.getFullYear()+'-0' + (d1.getMonth()+1) + '-0'+d1.getDate();

  }else{

  var d111 = d1.getFullYear()+'-' + (d1.getMonth()+1) + '-0'+d1.getDate();

  }




  }else{
  if(d112.toString().length==1){

  var d111 = d1.getFullYear()+'-0' + (d1.getMonth()+1) + '-'+d1.getDate();


  }else{
  var d111 = d1.getFullYear()+'-' + (d1.getMonth()+1) + '-'+d1.getDate();


  }

  }
  document.getElementById("date2").value =d111;

  var date_1 = $('input:radio[name=groupselecttime]:checked').data('start_time').split(':');


  var  date_2  = parseInt(date_1[0]);
  var  date_3  = parseInt(date_1[1]);



  if(date_2.toString().length == 1){

  date_2  = "0"+date_2;

  }
  if(date_3.toString().length == 1){

  date_3  = "0"+date_3;

  }



  document.getElementById("time_1").value = date_2+":"+date_3;
  var date_1 = $('input:radio[name=groupselecttime]:checked').data('end_time').split(':');


  var  date_2  = parseInt(date_1[0]);
  var  date_3  = parseInt(date_1[1]);



  if(date_2.toString().length == 1){

  date_2  = "0"+date_2;

  }
  if(date_3.toString().length == 1){

  date_3  = "0"+date_3;

  }



  document.getElementById("time_2").value = date_2+":"+date_3;



  document.getElementById("buydd").disabled = false;

  $('#timetablessss').modal('hide');
  $('#errorsll').html("");


}else{
  check = false;

$('#errorsll').html("คุณมีเวลาเรียนในช่วงเวลานี้แล้ว");
}


    }
  });



});

$(document).on('click', '#btnkey', function() {



  $.ajax({
    url: 'getkey',
    method: 'POST',
dataType: 'html',
        data: {
          'id':$('input:radio[name=groupbuy]:checked').data('idcd'),
      'key':$("#keyprivate").val(),

    },  success: function(data) {



if(data=='full'){



  $('#numberss').show();


$('#numberss').html('จำนวนเต็ม');

}else if(data =="notfound"||data=="[]"){

  $('#numberss').show();


$('#numberss').html('เลขรหัสไม่ถูกต้อง');



}else if (data =="timeout"){


    $('#numberss').show();


  $('#numberss').html('เกินระยะเวลาในการสมัคร กรุณาติดต่อสถาบัน');

}else{

  $('#numberss').hide();

      var servers = $.parseJSON(data);





            $.each(servers, function(index, value) {

              if(value.num >=value.amounts){


$("#ee3").html("จำนวนห้องเต็ม");

              }else{



                              var d1 = new Date(value.Start_date);
                              d1.setDate(d1.getDate());

                              var d11 = d1.getDate();

                              var d112 = (d1.getMonth()+1);

                              if(d11.toString().length==1){
                              if(d112.toString().length==1){

                              var d111 = d1.getFullYear()+'-0' + (d1.getMonth()+1) + '-0'+d1.getDate();

                              }else{

                              var d111 = d1.getFullYear()+'-' + (d1.getMonth()+1) + '-0'+d1.getDate();

                              }
                            }else{
                            if(d112.toString().length==1){

                            var d111 = d1.getFullYear()+'-0' + (d1.getMonth()+1) + '-'+d1.getDate();


                            }else{
                            var d111 = d1.getFullYear()+'-' + (d1.getMonth()+1) + '-'+d1.getDate();


                            }

                            }
                            document.getElementById("date1").value =d111;

                            var d1 = new Date(value.End_date);
                            d1.setDate(d1.getDate());

                            var d11 = d1.getDate();

                            var d112 = (d1.getMonth()+1);

                            if(d11.toString().length==1){
                            if(d112.toString().length==1){

                            var d111 = d1.getFullYear()+'-0' + (d1.getMonth()+1) + '-0'+d1.getDate();

                            }else{

                            var d111 = d1.getFullYear()+'-' + (d1.getMonth()+1) + '-0'+d1.getDate();

                            }




                            }else{
                            if(d112.toString().length==1){

                            var d111 = d1.getFullYear()+'-0' + (d1.getMonth()+1) + '-'+d1.getDate();


                            }else{
                            var d111 = d1.getFullYear()+'-' + (d1.getMonth()+1) + '-'+d1.getDate();


                            }

                            }
                          document.getElementById("date2").value =d111;

                          var date_1 = value.Start_time.split(':');


                        var  date_2  = parseInt(date_1[0]);
                        var  date_3  = parseInt(date_1[1]);



                        if(date_2.toString().length == 1){

                            date_2  = "0"+date_2;

                        }
                        if(date_3.toString().length == 1){

                            date_3  = "0"+date_3;

                        }



                        document.getElementById("time_1").value = date_2+":"+date_3;
                        var date_1 = value.End_time.split(':');


                      var  date_2  = parseInt(date_1[0]);
                      var  date_3  = parseInt(date_1[1]);



                      if(date_2.toString().length == 1){

                          date_2  = "0"+date_2;

                      }
                      if(date_3.toString().length == 1){

                          date_3  = "0"+date_3;

                      }



                      document.getElementById("time_2").value = date_2+":"+date_3;



                      var de111=  document.getElementById("date2").value

                      var date =  document.getElementById("date1").value


                        $.ajax({
                          url: 'getsumtimetable',
                          method: 'POST',

                              data: {

                            'id':$('input:radio[name=groupbuy]:checked').data('idcd'),
                            'data1':date,
                            'data2':de111,
                            'time1':$("#time_1").val(),
                            'time2':$("#time_2").val(),
                            'amount':$('input:radio[name=groupbuy]:checked').data('amount'),
                            'idgrate':$('input:radio[name=groupbuy]:checked').data('idgrate'),
                            'course':$('input:radio[name=groupbuy]:checked').data('course')
                          },  success: function(data) {



                            if(data=="yes"){


                            document.getElementById("buydd").disabled = false;
                            $('#showErorr').html("");

                            }else if(data=="no"){

                              document.getElementById("buydd").disabled = true;

                              $('#showErorr').html("กรุณาเลือกช่วงเวลาอื่น");


                            }else if(data=="not"){


                              document.getElementById("buydd").disabled = true;

                            $('#showErorr').html("คุณมีเวลาเรียนในช่วงเวลานี้แล้ว");


                            }



                          }
                        });

              }



});











  }


}
  });

});



$(document).on('click', '#buydd', function() {
  var de111=  document.getElementById("date2").value

  var date =  document.getElementById("date1").value
var key = "";
if($('#keyprivate').val()!=""){

key = $('#keyprivate').val();

}else if($('input:radio[name=groupselecttime]:checked').data('key') != ""){

key = $('input:radio[name=groupselecttime]:checked').data('key');
}



  $.ajax({
    url: 'buycourse',
    method: 'POST',

        data: {
      'id':$('input:radio[name=groupbuy]:checked').data('idcd'),
      'data1':date,
      'data2':de111,
      'time1':$("#time_1").val(),
      'time2':$("#time_2").val(),
      'price':$('input:radio[name=groupbuy]:checked').data('price'),
      'test':testid,
      'keyinput':key,
    },  success: function(data) {


if(data="Success"){

location.reload();


}


  }

  });

});

  $(document).on('click', '#selecttime', function() {

    $('#errorsll').html("");


  $('#timetablessss').modal('show');


  $.ajax({
    url: 'gettimetablewtf',
    method: 'POST',
    dataType:'html',
        data: {
      'id':$('input:radio[name=groupbuy]:checked').data('idcd'),

    },  success: function(data) {

      var servers = $.parseJSON(data);



      $('#bodytime').empty();


            $.each(servers, function(index, value) {

if(value.num >=value.amount){


}else{
  var tr = "<tr>";

  tr = tr + "<td>" + value.Start_date + "</td>";
  tr = tr + "<td>" + value.End_date + "</td>";
  tr = tr + "<td>" + value.Start_time + "</td>";
  tr = tr + "<td>" + value.End_time + "</td>";

  tr = tr + "<td>  <input type='radio' class='wtf' name='groupselecttime'  data-id_timetable='"+value.id_timetable+"'   data-amount='"+value.amount_courses+"'  data-key='"+value.privatekey+"'  data-start_date='"+value.Start_date+"' data-end_date='"+value.End_date+"' data-start_time='"+value.Start_time+"' data-end_time='"+value.End_time+"' required></td>";






  tr = tr + "</tr>";
  $('#bodytime').append(tr);


}


            });



  }

});


  });

  $(document).on('change', '.wtf', function() {
      $('#showErorr').html("");
  $('#numberss').hide();
    document.getElementById("date1").value = "";
    document.getElementById("date2").value = "";
    document.getElementById("time_1").value = "00:00";
    document.getElementById("time_2").value =  "00:00";
    $('#selecttime').hide();
    document.getElementById("buydd").disabled = true;
$("#keyprivate").val("");
document.getElementById("keycheck").checked = false;

var select = $("input[name='groupbuy']:checked").data('group');
$('#pkey').hide();

$('#keyprivate').hide();
$('#btnkey').hide();

  $('#keycheck').hide();
if(select==0){

  $('#selecttime').hide();

$('#pkey').hide();


  $('#keycheck').hide();

}else if(select==1){

  $('#pkey').show();

  $('#selecttime').hide();


  $('#keycheck').show();

}else if (select==2){

  $('#pkey').show();


  $('#keycheck').show();


  $('#selecttime').hide();

}else if (select==3){

  $('#pkey').hide();


  $('#keycheck').hide();




$('#selecttime').show();



}




});

$(document).on('click', '#keycheck', function() {


if(document.getElementById("keycheck").checked == true){
$("#keyprivate").val("");
  $('#numberss').hide();
    document.getElementById("date1").disabled = true;
    document.getElementById("date2").disabled = true;
    document.getElementById("time_1").disabled = true;
    document.getElementById("time_2").disabled = true;
    document.getElementById("buydd").disabled = true;

    $('#keyprivate').show();
    $('#btnkey').show();

}else{
  $('#numberss').hide();
$("#keyprivate").val("");
    document.getElementById("date1").disabled = false;
    document.getElementById("date2").disabled = true;
    document.getElementById("time_1").disabled = false;
    document.getElementById("time_2").disabled = true;
    document.getElementById("buydd").disabled = true;

    $('#keyprivate').hide();
    $('#btnkey').hide();
}



});


  $(document).on('change', '#date1', function() {






      var date = document.getElementById("date1").value;


    var s = 7*($("input[name='groupbuy']:checked").data('amount')-1 );


    var d1 = new Date(date);



    d1.setDate(d1.getDate()+s);

    var d11 = d1.getDate();

    var d112 = (d1.getMonth()+1);

    if(d11.toString().length==1){
    if(d112.toString().length==1){

    var d111 = d1.getFullYear()+'-0' + (d1.getMonth()+1) + '-0'+d1.getDate();

    }else{

    var d111 = d1.getFullYear()+'-' + (d1.getMonth()+1) + '-0'+d1.getDate();

    }




    }else{
    if(d112.toString().length==1){

    var d111 = d1.getFullYear()+'-0' + (d1.getMonth()+1) + '-'+d1.getDate();


    }else{
    var d111 = d1.getFullYear()+'-' + (d1.getMonth()+1) + '-'+d1.getDate();


    }

    }

   document.getElementById("date2").value = d111;



   document.getElementById("time_1").value = "08:00";


   document.getElementById("time_2").value = "09:00";

   $('#time_1').change();


});
i = 0;


// $( "#time_1").unbind( "keydown" );

//
$(document).on('keyup', '#time_1', function() {
//


setTimeout(function() {
  //your code to be executed after 1 second
}, 100000);



var date = $('#time_1').val().split(':');

var hours = date[0];

if(hours=="01"){

  document.getElementById("time_1").value = "08:00";


}else if(hours=="02"){
  document.getElementById("time_1").value = "08:00";



}else if(hours=="03"){
  document.getElementById("time_1").value = "08:00";



}else if(hours=="04"){

  document.getElementById("time_1").value = "08:00";


}else if(hours=="05"){
  document.getElementById("time_1").value = "08:00";



}else if(hours=="06"){
  document.getElementById("time_1").value = "08:00";



}else if(hours=="07"){

  document.getElementById("time_1").value = "08:00";


}else if(hours=="00"){

  document.getElementById("time_1").value = "08:00";


}

$('#time_1').change();
});




$(document).on('change', '#time_1', function() {





    var date = $('#time_1').val().split(':');

    var hours = parseInt(date[0]);
    var minutes = parseInt(date[1]);




      var date_1 = $("input[name='groupbuy']:checked").data('per').split(':');


    var  date_2  = parseInt(date_1[0])+hours;
    var  date_3  = parseInt(date_1[1])+minutes;



    if(date_2.toString().length == 1){

        date_2  = "0"+date_2;

    }
    if(date_3.toString().length == 1){

        date_3  = "0"+date_3;

    }



  document.getElementById("time_2").value = date_2+":"+date_3;



var de111=  document.getElementById("date2").value

var date =  document.getElementById("date1").value


  $.ajax({
    url: 'getsumtimetable',
    method: 'POST',

        data: {

      'id':$('input:radio[name=groupbuy]:checked').data('idcd'),
      'data1':date,
      'data2':de111,
      'time1':$("#time_1").val(),
      'time2':$("#time_2").val(),
      'amount':$('input:radio[name=groupbuy]:checked').data('amount'),
      'idgrate':$('input:radio[name=groupbuy]:checked').data('idgrate'),
      'course':$('input:radio[name=groupbuy]:checked').data('course')
    },  success: function(data) {


if(data=="yes"){


document.getElementById("buydd").disabled = false;
$('#showErorr').html("");

}else if(data=="no"){

  document.getElementById("buydd").disabled = true;

  $('#showErorr').html("กรุณาเลือกช่วงเวลาอื่น");


}else if(data=="not"){


  document.getElementById("buydd").disabled = true;

$('#showErorr').html("คุณมีเวลาเรียนในช่วงเวลานี้แล้ว");


}



  }

});


});

  $(document).on('click', '#buycou', function() {



  $('#bodytime').empty();

    $('#pkey').hide();

    $('#keyprivate').val("");

    $('#selecttime').hide();

    $('#keyprivate').hide();
    $('#btnkey').hide();

      $('#keycheck').hide();
testid = $(this).data('test');

    $.ajax({
      url: 'getgradesubjects2',
      method: 'POST',
          dataType: 'html',
          data:{
            'idcourse':$(this).data('id'),

          }


    }).done(function(data){


    var servers = $.parseJSON(data);



    $('#bodygrade').empty();


          $.each(servers, function(index, value) {


            var tr = "<tr>";

            tr = tr + "<td>" + value.nameGrade + "</td>";
            tr = tr + "<td>" + value.amount_courses + "</td>";
            tr = tr + "<td>" + value.per_round + "</td>";
            tr = tr + "<td>" + value.Time_length + "</td>";
            tr = tr + "<td>" + value.price + "</td>";
            tr = tr + "<td>" + value.note + "</td>";
            tr = tr + "<td>  <input type='radio' class='wtf' name='groupbuy' value='"+value.idGrade+"' data-group='"+value.Isgroup+"' data-idgrate='"+value.idGrade+"' data-amount='"+value.amount_courses+"' data-per='"+value.per_round+"' data-course='"+value.idcourse+"'  data-price='"+value.price+"'   data-info='"+value.amount_courses+","+value.per_round+","+value.Time_length+"' data-idcd='"+value.Idcourse_detail+"'  data-amount='"+value.amount_courses+"' required></td>";






            tr = tr + "</tr>";
            $('#bodygrade').append(tr);


          });


  });

  $('#timetable').modal('show')

  document.getElementById("date1").value = "";
  document.getElementById("date2").value = "";
  document.getElementById("time_1").value = "00:00";
  document.getElementById("time_2").value =  "00:00";


  var d1 = new Date();
  d1.setDate(d1.getDate()+3);

  var d11 = d1.getDate();

  var d112 = (d1.getMonth()+1);

  if(d11.toString().length==1){
  if(d112.toString().length==1){

  var d111 = d1.getFullYear()+'-0' + (d1.getMonth()+1) + '-0'+d1.getDate();

  }else{

  var d111 = d1.getFullYear()+'-' + (d1.getMonth()+1) + '-0'+d1.getDate();

  }




  }else{
  if(d112.toString().length==1){

  var d111 = d1.getFullYear()+'-0' + (d1.getMonth()+1) + '-'+d1.getDate();


  }else{
  var d111 = d1.getFullYear()+'-' + (d1.getMonth()+1) + '-'+d1.getDate();


  }


  }

  document.getElementById("date1").min = d111;



    var d1 = new Date();
    d1.setMonth(d1.getMonth()+2);

    var d11 = d1.getDate();

    var d112 = (d1.getMonth()+1);

    if(d11.toString().length==1){
    if(d112.toString().length==1){

    var d111 = d1.getFullYear()+'-0' + (d1.getMonth()+1) + '-0'+d1.getDate();

    }else{

    var d111 = d1.getFullYear()+'-' + (d1.getMonth()+1) + '-0'+d1.getDate();

    }




    }else{
    if(d112.toString().length==1){

    var d111 = d1.getFullYear()+'-0' + (d1.getMonth()+1) + '-'+d1.getDate();


    }else{
    var d111 = d1.getFullYear()+'-' + (d1.getMonth()+1) + '-'+d1.getDate();


    }


    }

    document.getElementById("date1").max = d111;

});

});
