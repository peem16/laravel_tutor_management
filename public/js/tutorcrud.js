$(document).ready(function() {






viewData();
  function viewData(){

$.ajax({
    url: 'crudtutor',
    method: 'POST',
    data: {

      'action':'view',

    },

        dataType: 'html',


}).done(function(data){

 var servers = $.parseJSON(data);
$("#bodytutor").empty();


var num = 1;
        $.each(servers, function(index, value) {




          var tr = "<tr>";
          tr = tr + "<td>" + num + "</td>";

          tr = tr + "<td>" + value.firstname + "</td>";
          tr = tr + "<td>" + value.lastname + "</td>";

          tr = tr + "<td>" + value.sex + "</td>";
          tr = tr + "<td>" + value.ability + "</td>";
          tr = tr + "<td>" + value.interested_position + "</td>";


          tr = tr + "<td><button style='background: #25a8e0; color: #000000;' type='button' class='btn  edit' data-info='"+value.idtutor+","+value.firstname+","+value.lastname+","+value.username+","+value.sex+","+value.age+","+value.Email+","+value.phone+","+value.address+","+value.ability+","+value.interested_position+","+value.Identification_no+","+value.profilepic+","+value.idresume+"' ><span class='glyphicon glyphicon-edit'></span>แก้ไข</button>";
          tr = tr + "<button type='button' class='btn del' style='background: #ef67a7; color: #000000;' data-info='"+value.idtutor+"' ><span class='glyphicon glyphicon-trash'></span>ลบ</button></td>";


          tr = tr + "</tr>";
          $('#bodytutor').append(tr);
num++;
        });


});

    }

    $(document).on('click', '#addtutor', function() {
      $('#ee1').text("");
      $('#ee2').text("");
      $('#ee3').text("");
      $('#ee4').text("");
      $('#ee5').text("");
      $('#ee6').text("");
      $('#ee7').text("");
      $('#ee8').text("");
      $('#ee9').text("");
      $('#ee10').text("");
      $('#ee11').text("");
      $('#ee12').text("");
      $('#ee13').text("");


      $('.modal-title').text("เพิ่มข้อมูล");


$('.bodydel').hide("");
$('.bodyadd').show("");

$('#tutoredit').hide("");
$('#tutordel').hide("");

$('#submit_addtutor').show("");


      $("input[name='checksub']").prop("checked",false);

      $('#idtutor').val("");

            $('#firstname').val("");
            $('#lastname').val("");
            $('#username').val("");
            $('#password').val("");

            $("input[name='optionsRadios']").prop("checked",false);


            $('#email').val("");
            $('#age').val("");
            $('#phone').val("");
            $('#address').val("");
            $('#ability').val("");

            $('#interested_position').val("");
            $('#Identification_no').val("");


       $('#picbtn').attr('data-pic' , '');


       $('#modeltutor').modal('show')
       $('#filepic').show();
       $('#picbtn').hide();
       $('#filepic').val("");

    });

    $(document).on('click', '.edit', function() {
      $('.bodydel').hide("");
      $('.bodyadd').show("");

              $('#ee1').text("");
              $('#ee2').text("");
              $('#ee3').text("");
              $('#ee4').text("");
              $('#ee5').text("");
              $('#ee6').text("");
              $('#ee7').text("");
              $('#ee8').text("");
              $('#ee9').text("");
              $('#ee10').text("");
              $('#ee11').text("");
              $('#ee12').text("");
              $('#ee13').text("");


      $('.modal-title').text("แก้ไขข้อมูล");


      $('#tutoredit').show("");
      $('#tutordel').hide("");

$('#submit_addtutor').hide("");


      $('#filepic').hide();
      $('#filepic').val("");

      $('#picbtn').show();


      $('#modeltutor').modal('show')

      var stuff = $(this).data('info').split(',');


$('#idtutor').val(stuff[0]);

      $('#firstname').val(stuff[1]);
      $('#lastname').val(stuff[2]);
      $('#username').val(stuff[3]);
      $('#password').val('');

      $("input[name='optionsRadios'][value='"+stuff[4]+"']").prop("checked",true);


      $('#email').val(stuff[6]);
      $('#age').val(stuff[5]);
      $('#phone').val(stuff[7]);
      $('#address').val(stuff[8]);
      $('#ability').val(stuff[9]);

      $('#interested_position').val(stuff[10]);
      $('#Identification_no').val(stuff[11]);


 $('#picbtn').attr('data-pic' , stuff[12]);

 $.ajax({
     url: 'subjecttutor',
     method: 'POST',
     data: {

       'id':$('#idtutor').val(),

     },

     dataType: "html",
     success: function(data) {

       var servers = $.parseJSON(data);


              $.each(servers, function(index, value) {


$("input[name='checksub'][value='"+value.idcourse+"']").prop("checked",true);


              });

     }


 });


});
$(document).on('click', '.del', function() {
  $('.bodydel').show("");
  $('.bodyadd').hide("");
      $('.modal-title').text("ลบข้อมูล");


  $('#tutoredit').hide("");
  $('#tutordel').show("");

  $('#submit_addtutor').hide("");

  $('#modeltutor').modal('show')



$('#idtutor').val($(this).data('info'));


$('#ee1').text("");
$('#ee2').text("");
$('#ee3').text("");
$('#ee4').text("");
$('#ee5').text("");
$('#ee6').text("");
$('#ee7').text("");
$('#ee8').text("");
$('#ee9').text("");
$('#ee10').text("");
$('#ee11').text("");
$('#ee12').text("");
$('#ee13').text("");


});








$(document).on('click', '.changes', function() {

  document.getElementById('fileid').click();

});


$(document).on('click', '#picbtn', function() {

  $('#fileid').hide()

  $('#picmodal').modal('show')


  $('#imgpro')
      .attr('srcset', '/storage/Pic/'+$(this).data('pic'))


      $('#imgpro').attr('data-type' , 'pic');

});





$(document).on('click', '#tutordel', function() {



    $.ajax({
      type: "POST",
      url: "crudtutor",
      data: {
        'action':'del',
        'idtutor':$('#idtutor').val(),

      },
      dataType: "html",
      success: function(data) {

        viewData();


        $('#modeltutor').modal('hide')


      }
    });


});
$(document).on('click', '#tutoredit', function() {






  var checksub= "";
  var num = 0;
    $("input:checkbox[name=checksub]:checked").each(function() {

  if(num==0){

    checksub = $(this).val();
  num++;
  }else{

    checksub = checksub+","+$(this).val();

  }


  });

    $("input:radio[name=optionsRadios]:checked").each(function() {


  sex = $(this).val();

  });


    $.ajax({
      type: "POST",
      url: "crudtutor",
      data: {
        'action':'edit',
        'idtutor':$('#idtutor').val(),

        'firstname':$('#firstname').val(),
        'lastname':$('#lastname').val(),
      'username':$('#username').val(),
      'password':$('#password').val(),

      'email':$('#email').val(),
      'age':$('#age').val(),
      'phone':$('#phone').val(),
      'sex':sex,
      'ability':$('#ability').val(),
      'interested_position':$('#interested_position').val(),
      'Identification_no':$('#Identification_no').val(),

      'address':$('#address').val(),
      'checksub':checksub
      },
      dataType: "json",
      success: function(data) {
    if ((data.errors)){


      $('#ee1').text("");
      $('#ee1').text(data.errors.firstname);
      $('#ee2').text("");
      $('#ee2').text(data.errors.lastname);
      $('#ee3').text("");
      $('#ee3').text(data.errors.username);
      $('#ee4').text("");
      $('#ee4').text(data.errors.password);
      $('#ee5').text("");
      $('#ee5').text(data.errors.email);
      $('#ee6').text("");
      $('#ee6').text(data.errors.sex);
      $('#ee7').text("");
      $('#ee7').text(data.errors.age);
      $('#ee8').text("");
      $('#ee8').text(data.errors.phone);
      $('#ee9').text("");
      $('#ee9').text(data.errors.address);
      $('#ee10').text("");
      $('#ee10').text(data.errors.ability);
      $('#ee11').text("");
      $('#ee11').text(data.errors.interested_position);
      $('#ee12').text("");
      $('#ee12').text(data.errors.Identification_no);
      $('#ee13').text("");
      $('#ee13').text(data.errors.checksub);



    }else{

      viewData();


      $('#modeltutor').modal('hide')

    }


      }
    });




});














$(document).on('click', '#submit_addtutor', function() {

var checksub= "";
var num = 0;
  $("input:checkbox[name=checksub]:checked").each(function() {

if(num==0){

  checksub = $(this).val();
num++;
}else{

  checksub = checksub+","+$(this).val();

}


});

  $("input:radio[name=optionsRadios]:checked").each(function() {


sex = $(this).val();

});
var formData = new FormData();
var profile = $('#filepic');

	formData.append('Pic', profile[0].files[0]);
  formData.append('action', 'add');
  formData.append('firstname', $('#firstname').val());
  formData.append('lastname', $('#lastname').val());
    formData.append('username', $('#username').val());
      formData.append('password', $('#password').val());
        formData.append('email', $('#email').val());
          formData.append('age', $('#age').val());
            formData.append('phone', $('#phone').val());
              formData.append('sex', sex);
              formData.append('ability', $('#ability').val());
              formData.append('interested_position', $('#interested_position').val());
              formData.append('Identification_no', $('#Identification_no').val());
              formData.append('address', $('#address').val());

              formData.append('checksub', checksub);






  $.ajax({
    method: 'post',
    dataType: 'json',
    url: "crudtutor",
    contentType: false,
    processData: false,
    headers: {
  'X-CSRF-TOKEN': $('input[name=_token]').val()
},
      data: formData

      ,
      success: function(data) {


        if ((data.errors)){


          $('#ee1').text("");
          $('#ee1').text(data.errors.firstname);
          $('#ee2').text("");
          $('#ee2').text(data.errors.lastname);
          $('#ee3').text("");
          $('#ee3').text(data.errors.username);
          $('#ee4').text("");
          $('#ee4').text(data.errors.password);
          $('#ee5').text("");
          $('#ee5').text(data.errors.email);
          $('#ee6').text("");
          $('#ee6').text(data.errors.sex);
          $('#ee7').text("");
          $('#ee7').text(data.errors.age);
          $('#ee8').text("");
          $('#ee8').text(data.errors.phone);
          $('#ee9').text("");
          $('#ee9').text(data.errors.address);
          $('#ee10').text("");
          $('#ee10').text(data.errors.ability);
          $('#ee11').text("");
          $('#ee11').text(data.errors.interested_position);
          $('#ee12').text("");
          $('#ee12').text(data.errors.Identification_no);
          $('#ee13').text("");
          $('#ee13').text(data.errors.checksub);



        }else{

          viewData();


          $('#modeltutor').modal('hide')

        }

    }
  });





});






});
