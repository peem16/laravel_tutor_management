$(document).ready(function() {

  function viewDatasesume(){

$.ajax({
    url: 'viewresume',
    method: 'POST',
        dataType: 'html',
        data: {
      'action':'view',}

}).done(function(data){
  var token = $('#_token').val();


 var servers = $.parseJSON(data);


         $("#bodyresume").empty();

        $.each(servers, function(index, value) {

          var tr = "<tr class='item'>";

          tr = tr + "<td>" +value.firstname+ "</td>";
          tr = tr + "<td>" + value.lastname + "</td>";
          tr = tr + "<td>" + value.interested_position + "</td>";
          tr = tr + "<td>" + value.ability + "</td>";



          tr = tr + "<td>";

if(value.resume_file!==null){


  var file = "<form method='POST' action='http://localhost:8000/downloadresume' ><input type='hidden' name='_token' value='"+token+"'><input type='hidden' name='file' id='file' value='"+value.resume_file+"'>&nbsp;<button type='submit' class='btn btn-primary'> <i class='fa fa-download' aria-hidden='true'></i></button></form>";


}


          tr = tr + ""+file+""+"</td>";


          tr = tr + "<td>";

  if(value.Identification_file!==null){


  var file2 = "<form method='POST' action='http://localhost:8000/downloadresume' ><input type='hidden' name='_token' value='"+token+"'><input type='hidden' name='file' id='file' value='"+value.Identification_file+"'>&nbsp;<button type='submit' class='btn btn-primary'> <i class='fa fa-download' aria-hidden='true'></i></button></form>";

  }


          tr = tr + ""+file2+""+"</td>";

          tr = tr + "<td><button type='button' class='btn btn-primary view'   data-info='"+value.idresume+','+value.firstname+','+value.lastname+','+value.Identification_no+','+value.phone+','+value.interested_position+','+value.email+','+value.ability+','+value.address+','+value.sex+','+value.age+','+value.resume_file+','+value.Identification_file+"'><i class='fas fa-align-left'></i></button>";


          tr = tr + "<button type='button' class='btn btn-primary yes'  data-id='"+value.idresume+"'><i class='fas fa-check'></i></button>";

          tr = tr + "<button type='button' class='btn btn-danger no'  data-id='"+value.idresume+"'><i class='fas fa-times'></i></button></td>";






      tr = tr + "</tr>";



          $('#bodyresume').append(tr);

        });

});

    }
    $(document).on('click', '.show', function() {


      $('#photomodal').modal('show')

document.getElementById("img").src="storage/Resume/"+$(this).data('resume');


         });




  $(document).on('click', '#confirm', function() {

var datasubject = "";
var k = 0;
    $("input:checkbox[name=checksub]:checked").each(function() {

      datasubject += "&subject"+k+"="+$(this).val();
k++;

});

  var dataString = "&action=pass"+"&id="+$('#hideid').val()+ "&comment="+$('#comment').val()+ "&num="+k+ datasubject;


    $.ajax({
      type: "POST",
      url: "actioncheckresume",
      data: dataString,

      success: function(data) {

        if ((data.errors)){

          $('#ee1').text("");
          $('#ee1').text(data.errors.comment);
          $('#ee2').text("");
          $('#ee2').text(data.errors.subject0);


        }else{

  if(data=="Success"){

viewDatasesume();
$('#checkmodal').modal('hide')

  }

}
      }
    });

       });

       $(document).on('click', '#confirmno', function() {



         $.ajax({
           type: "POST",
           url: "actioncheckresume",
           data: {
             'action':'nopass',
           'id':$('#hideid').val(),
           'comment':$('#comment').val(),


           },

           success: function(data) {

             if ((data.errors)){

               $('#ee1').text("");
               $('#ee1').text(data.errors.comment);



             }else{

       if(data=="Success"){

         viewDatasesume();
         $('#checkmodal').modal('hide')


       }


     }
           }
         });

            });


  $(document).on('click', '.yes', function() {



    $('#confirm').show();
    $('#confirmno').hide();


    $('#hideid').val($(this).data('id'));





    $('.checksub').show();


    $('#checkmodal').modal('show')




    $('#sub').show();

    $('#ee1').text("");
     $('#ee2').text("");

});



$(document).on('click', '.no', function() {

  $('#checkmodal').modal('show')

  $('#hideid').val($(this).data('id'));



  $('.checksub').hide();



  $('#confirmno').show();
  $('#confirm').hide();
  $('#sub').hide();

  $('#ee1').text("");
   $('#ee2').text("");
});


$(document).on('click', '.view', function() {

  $('#checkmodal2').modal('show')

  var stuff = $(this).data('info').split(',');
  $("#bodyfrom2").empty();

var tr = " <div class='form-group row'>";
 tr += "<label class='col-sm-6 col-form-label'>ชื่อ</label>";
 tr += " <div class='col-sm-10'>";
 tr += "</div>";

 tr += "<p>"+stuff[1]+"</p>";

 tr += "</div>";
 tr += "</div>";

              tr += " <div class='form-group row'>";

              tr += "<label class='col-sm-6 col-form-label'>นามสกุล</label>";
              tr += " <div class='col-sm-10'>";
              tr += "</div>";

              tr += "<p>"+stuff[2]+"</p>";

              tr += "</div>";
              tr += "</div>";

              tr += " <div class='form-group row'>";

              tr += "<label class='col-sm-6 col-form-label'>เลขรหัสประจำตัว</label>";
              tr += " <div class='col-sm-10'>";
              tr += "</div>";

              tr += "<p>"+stuff[3]+"</p>";

              tr += "</div>";
              tr += "</div>";

              tr += " <div class='form-group row'>";

              tr += "<label class='col-sm-6 col-form-label'>เบอร์</label>";
              tr += " <div class='col-sm-10'>";
              tr += "</div>";

              tr += "<p>"+stuff[4]+"</p>";

              tr += "</div>";
              tr += "</div>";


              tr += " <div class='form-group row'>";

              tr += "<label class='col-sm-6 col-form-label'>ตำแหน่งที่สนใจ</label>";
              tr += " <div class='col-sm-10'>";
              tr += "</div>";

              tr += "<p>"+stuff[5]+"</p>";

              tr += "</div>";
              tr += "</div>";

              tr += " <div class='form-group row'>";

              tr += "<label class='col-sm-6 col-form-label'>อีเมล์</label>";
              tr += " <div class='col-sm-10'>";
              tr += "</div>";

              tr += "<p>"+stuff[6]+"</p>";

              tr += "</div>";
              tr += "</div>";

              tr += " <div class='form-group row'>";

              tr += "<label class='col-sm-6 col-form-label'>ความสามารถ</label>";
              tr += " <div class='col-sm-10'>";
              tr += "</div>";

              tr += "<p>"+stuff[7]+"</p>";

              tr += "</div>";
              tr += "</div>";


              tr += " <div class='form-group row'>";

              tr += "<label class='col-sm-6 col-form-label'>ที่อยู่</label>";
              tr += " <div class='col-sm-10'>";
              tr += "</div>";

              tr += "<p>"+stuff[8]+"</p>";

              tr += "</div>";
              tr += "</div>";


              tr += " <div class='form-group row'>";

              tr += "<label class='col-sm-6 col-form-label'>เพศ</label>";
              tr += " <div class='col-sm-10'>";
              tr += "</div>";

              tr += "<p>"+stuff[9]+"</p>";

              tr += "</div>";
              tr += "</div>";


              tr += " <div class='form-group row'>";

              tr += "<label class='col-sm-6 col-form-label'>อายุ</label>";
              tr += " <div class='col-sm-10'>";
              tr += "</div>";

              tr += "<p>"+stuff[10]+"</p>";

              tr += "</div>";
              tr += "</div>";

  $('#bodyfrom2').append(tr);



});
});
