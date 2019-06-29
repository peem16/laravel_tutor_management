jQuery(document).ready(function(){

$('#Idcourse_detai_h').hide();
$('#idcourse_h').hide();
$('#idGrade_h').hide();
$('#amount_courses_h').hide();

  var stuff ;
viewDatatimetable();
  function viewDatatimetable(){




    $.ajax({
      url: 'crudtimetable',
      method: 'POST',
          dataType: 'html',
          data:{
            'action':'view',

          }


    }).done(function(data){


    var servers = $.parseJSON(data);



    $('#bodytable').empty();

var v =0;
          $.each(servers, function(index, value) {


            var tr = "<tr>";
            tr = tr + "<td>" +v+ "</td>";
            tr = tr + "<td>" + value.Start_time + "</td>";
            tr = tr + "<td>" + value.End_time + "</td>";
            tr = tr + "<td>" + value.Start_date + "</td>";
            tr = tr + "<td>" + value.End_date + "</td>";
            tr = tr + "<td>" + value.firstname + " "+ value.lastname +  "</td>";
            tr = tr + "<td>" + value.number + "</td>";
v++;

            //
            tr = tr + "<td><button  class='edit btn btn-info'data-info='"+value.id_timetable+","+value.Start_time+","+value.End_time+","+value.Start_date+","+value.End_date+","+value.idtutor+","+value.Idcourse_detail+","+value.idroom+","+value.firstname+","+value.lastname+","+value.idcourse+","+value.name+","+value.Idcourse_detail+","+value.idGrade+","+value.idtype+","+value.name+","+value.amount_courses+"'><span class='glyphicon glyphicon-edit'></span> Edit</button>";

            tr = tr + "<button class='delete btn btn-danger'data-info='"+value.id_timetable+","+value.Start_time+","+value.End_time+","+value.Start_date+","+value.End_date+","+value.idtutor+","+value.Idcourse_detail+","+value.idroom+","+value.firstname+","+value.lastname+","+value.idcourse+","+value.name+","+value.Idcourse_detail+","+value.idGrade+"'<span class='glyphicon glyphicon-trash'></span> Delete</button></td>";


            tr = tr + "</tr>";
            $('#bodytable').append(tr);


          });

    });




  }




  function viewDatatutor(){




    $.ajax({
      url: 'gettutoroncourse',
      method: 'POST',
          dataType: 'html',
          data: {
        'namesubject':$('#subject').val()

        ,}

    }).done(function(data){

          $('#tutor')
            .find('option')
            .remove()
            .end();
    var servers = $.parseJSON(data);





          $.each(servers, function(index, value) {



    var x = document.getElementById("tutor");
    var option = document.createElement("option");
    option.value = value.idtutor;
    option.text = value.firstname +" "+value.lastname;
    x.add(option);


          });


          if(stuff!=null){



              $('#tutor').val(stuff[5]);



          }

    });




  }





  $('#detailsub').css('width', '80%');

$('#detailsub').css('margin-left', '-40%');



$( "#time_1" ).on('click', function() {



  var date = $('#time_1').val().split(':');

  var hours = parseInt(date[0]);
  var minutes = parseInt(date[1]);

    var date_1 = $("input[name='group']:checked").data('per').split(':');


  var  date_2  = parseInt(date_1[0])+hours;
  var  date_3  = parseInt(date_1[1])+minutes;



  if(date_2.toString().length == 1){

      date_2  = "0"+date_2;

  }
  if(date_3.toString().length == 1){

      date_3  = "0"+date_3;

  }

var idthiden = $('#idhiden').val();

document.getElementById("time_2").value = date_2+":"+date_3;

var course_detai ;
if($('input:radio[name=group]:checked').data('idcd')){

course_detai = $('input:radio[name=group]:checked').data('idcd');
}else{
course_detai = $('#Idcourse_detai_h').val();

}

var amount ;
if($('input:radio[name=group]:checked').data('amount')){

amount = $('input:radio[name=group]:checked').data('amount');
}else{
amount = $('#amount_courses_h').val();

}
var idgrate ;
if($('input:radio[name=group]:checked').data('idgrate')){

idgrate = $('input:radio[name=group]:checked').data('idgrate');
}else{
idgrate = $('#idGrade_h').val();

}

var course ;
if($('input:radio[name=group]:checked').data('course')){

course = $('input:radio[name=group]:checked').data('course');
}else{
course = $('#idcourse_h').val();

}


var de111=  document.getElementById("date2").value

var date =  document.getElementById("date1").value



$.ajax({
  url: 'getsumtimetable2',
  method: 'POST',

      data: {
        'it':idthiden,

    'id':course_detai,
    'data1':date,
    'data2':de111,
    'time1':$("#time_1").val(),
    'time2':$("#time_2").val(),
    'amount':amount,
    'idgrate':idgrate,
    'course':course
  },dataType: 'html',  success: function(data) {

if(data=="false"){


  document.getElementById("saveedit").disabled = true;

$("#ee1").html("รายการนี้ไม่สามารถเปลี่ยนแปลงได้ กรุณาเลือกเวลาใหม่");
}else{
  $("#ee1").html("่");
  document.getElementById("saveedit").disabled = false;

  $('#tutor')
    .find('option')
    .remove()
    .end();

          $('#room')
            .find('option')
            .remove()
            .end();
  var servers = $.parseJSON(data);
   $.each(servers, function(index, value) {


     $.each(value, function(index2, value2) {

     if(index == "techemty"){
       var x = document.getElementById("tutor");
       var option = document.createElement("option");
       option.value = value2.idtutor;
       option.text = value2.firstname+" "+ value2.lastname;
       x.add(option);


     }

     if(index == "room"){
       var x = document.getElementById("room");
       var option = document.createElement("option");
       option.value = value2.idroom;
       option.text = value2.number;
       x.add(option);


     }

   });

   });

}




}

});






});





$(document).on('change', '#date1', function() {




  var date = document.getElementById("date1").value;


var s = 7*($("input[name='group']:checked").data('amount')-1 );


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

var date = document.getElementById("date2").value = d111;


});


  $(document).on('click', '#savevalue', function() {






$('#detailsub').modal('hide')



});










$('input[type=radio][name=optionsRadios]').change(function() {
viewDatasubject();


});

$('#subject').change(function() {

viewDatasubsubject();
viewDatatutor();


});
$('#grade').change(function() {

viewDatasubdetailsubject();

});

function viewDatasubsubject(){


  $.ajax({
    url: 'subsubject',
    method: 'POST',
        dataType: 'html',
        data: {
      'id':$('#subject').val()

      ,}

  }).done(function(data){

  var servers = $.parseJSON(data);




  $('#grade')
    .find('option')
    .remove()
    .end();


        $.each(servers, function(index, value) {



  var x = document.getElementById("grade");
  var option = document.createElement("option");
  option.value = value.idGrade;
  option.text = value.nameGrade;
  x.add(option);

        });

        if(stuff!=null){

          $('#grade').val(stuff[13]);

        }

 viewDatasubdetailsubject();

 viewDatatutor();

  });




}


function viewDatasubdetailsubject(){


  $.ajax({
    url: 'subdatailsubject',
    method: 'POST',
        dataType: 'html',
        data: {
      'id':$('#subject').val(),
      'idg':$('#grade').val()

      ,}

  }).done(function(data){

  var servers = $.parseJSON(data);


  $("#bodysubdetail").empty();


        $.each(servers, function(index, value) {

                      var tr = "<tr>";
                      tr = tr + "<td>" +value.name+ "</td>";
                      tr = tr + "<td>" +value.nameGrade+ "</td>";
                      tr = tr + "<td>" +value.amount_courses+ " ครั้ง</td>";
                      tr = tr + "<td>" +value.per_round+ " ชั่วโมง</td>";
                      tr = tr + "<td>" +value.Time_length+ " เดือน</td>";

                      tr = tr + "<td>" +moneyFormat(value.price)+ " บาท</td>";
                      tr = tr + "<td>" +value.note+ "</td>";

                      tr = tr + "<td><input type='radio' name='group' value='"+value.Idcourse_detail+"' required data-id='"+value.Idcourse_detail+"'  data-course='"+value.idcourse+"' data-idgrate='"+value.idGrade+"' data-idcd='"+value.Idcourse_detail+"' data-amount='"+value.amount_courses+"' data-per='"+value.per_round+"' ></td>";





                  tr = tr + "</tr>";



                      $('#bodysubdetail').append(tr);





        });

        if(stuff!=null){

          $("input[name='group'][value='"+stuff[6]+"']").prop("checked",true);

        }

  });




}




function moneyFormat(price, sign = '') {
const pieces = parseFloat(price).toFixed(2).split('')
let ii = pieces.length - 3
while ((ii-=3) > 0) {
pieces.splice(ii, 0, ',')
}
return sign + pieces.join('')
}



function viewDatasubject(){
var ss  = $("input[name='optionsRadios']:checked").val();
$.ajax({
  url: 'crumsubject',
  method: 'POST',
      dataType: 'html',
      data: {
    'action':'view',
    'where':ss

    ,}

}).done(function(data){

var servers = $.parseJSON(data);


$('#subject')
  .find('option')
  .remove()
  .end();


      $.each(servers, function(index, value) {



var x = document.getElementById("subject");
var option = document.createElement("option");
option.value = value.name;
option.text = value.name;
x.add(option);

      });

if(stuff!=null){

  $('#subject').val(stuff[15]);

}


viewDatasubsubject();





});

  }




$(document).on('click', '#saveadd', function() {



  $.ajax({
    url: 'crudtimetable',
    method: 'POST',
        dataType: 'html',
        data: {
          'action':"add",

      'dates1':document.getElementById("date1").value,
      'datee2':document.getElementById("date2").value,
        'times1':document.getElementById("time_1").value,
          'timee2':document.getElementById("time_2").value,
          'iddetail':$("input[name='group']:checked").data('id'),
          'idroom':$('#room').val(),
          'idtutor':$('#tutor').val()
      ,},

success: function(data) {

  $('#exampleModal').modal('hide');

    var iframe = document.getElementById('frame');
    iframe.src = "http://localhost:8000/timetableshow";
viewDatatimetable();
  }





});
});


$(document).on('click', '#saveedit', function() {

  $.ajax({
    url: 'crudtimetable',
    method: 'POST',
        dataType: 'html',
        data: {
          'action':"edit",
          'id':$('#idhiden').val(),

      'dates1':document.getElementById("date1").value,
      'datee2':document.getElementById("date2").value,
        'times1':document.getElementById("time_1").value,
          'timee2':document.getElementById("time_2").value,
          'iddetail':$("input[name='group']:checked").data('id'),
          'idroom':$('#room').val(),
          'idtutor':$('#tutor').val()
      ,},

success: function(data) {

  $('#exampleModal').modal('hide');

    var iframe = document.getElementById('frame');
    iframe.src = "http://localhost:8000/timetableshow";
viewDatatimetable();
  }

});

});

$(document).on('click', '#savedel', function() {

  $.ajax({
    url: 'crudtimetable',
    method: 'POST',
        dataType: 'html',
        data: {
          'action':"del",
          'id':$('#idhiden').val(),

      },

success: function(data) {

  $('#exampleModal').modal('hide');

    var iframe = document.getElementById('frame');
    iframe.src = "http://localhost:8000/timetableshow";
viewDatatimetable();
  }

});


});

  $(document).on('click', '#showdetail', function() {

    $('#detailsub').modal('show')


  });

$(document).on('click', '.addtimetable', function() {
  stuff=null;

  $('#exampleModal').modal('show')

            $("input[name='optionsRadios']").prop("checked",false);


            $('#subject')
              .find('option')
              .remove()
              .end();

              $('#grade')
                .find('option')
                .remove()
                .end();
                $('#tutor')
                  .find('option')
                  .remove()
                  .end();
document.getElementById("date1").value = "";
document.getElementById("date2").value = "";

document.getElementById("time_1").value = "00:00";
document.getElementById("time_2").value =  "00:00";


   $('#savedel').hide();
   $('#saveedit').hide();
   $('#saveadd').show();


   $('.showbody').show();
   $('.delbody').hide();

   $('.delmodal').hide();

});


$(document).on('click', '.edit', function() {
  document.getElementById("saveedit").disabled = false;
  
  $('#exampleModal').modal('show')
  $("#ee1").html("่");
  $('.delmodal').hide();

  stuff=null;

   stuff = $(this).data('info').split(',');

   $('.showbody').show();
   $('.delbody').hide();

$('#idhiden').val(stuff[0]);

  $('#subject')
    .find('option')
    .remove()
    .end();

    $('#grade')
      .find('option')
      .remove()
      .end();
      $('#tutor')
        .find('option')
        .remove()
        .end();
$("input[name='optionsRadios'][value='"+stuff[14]+"']").prop("checked",true);
viewDatasubject();



var str  = stuff[1].split(":");

var str2  = stuff[2].split(":");

document.getElementById("date1").value = stuff[3];
document.getElementById("date2").value = stuff[4];

document.getElementById("time_1").value = str[0]+":"+str[1];
document.getElementById("time_2").value =   str2[0]+":"+str2[1];


document.getElementById("Idcourse_detai_h").value = stuff[6];
document.getElementById("idcourse_h").value = stuff[10];
document.getElementById("idGrade_h").value = stuff[13];
document.getElementById("amount_courses_h").value = stuff[16];



$('#room').val(stuff[7]);

   $('#savedel').hide();
   $('#saveedit').show();
   $('#saveadd').hide();




});

$(document).on('click', '.delete', function() {
  $('#exampleModal').modal('show')
  $('.showbody').hide();
  $('.delbody').show();
  stuff=null;

   stuff = $(this).data('info').split(',');

   $('#idhiden').val(stuff[0]);


   $('#savedel').show();
   $('#saveedit').hide();
   $('#saveadd').hide();

   $('.delmodal').show();

});

$(document).on('click', '#confirmadd', function() {

$.ajax({
  type: "POST",
  url: "actiontimetable",
  data: {
    'action':'add',




  },

  success: function(data) {



if(data=="Success"){



}


  }
});
});






});
