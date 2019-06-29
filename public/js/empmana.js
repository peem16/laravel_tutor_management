
$(document).ready(function() {
viewData();
  function viewData(){

$.ajax({
    url: 'getDataemp',
    method: 'POST',
        dataType: 'html',


}).done(function(data){

 var servers = $.parseJSON(data);
$("#bodyemp").empty();

        $.each(servers, function(index, value) {




          var tr = "<tr>";
          tr = tr + "<td style='border-color:#000000;'>" +value.IDUserAccount+ "</td>";
          tr = tr + "<td style='border-color:#000000;'>" + value.firstname + "</td>";
          tr = tr + "<td style='border-color:#000000;'>" + value.lastname + "</td>";
          tr = tr + "<td style='border-color:#000000;'>" + value.username + "</td>";
          tr = tr + "<td style='border-color:#000000;'>****</td>";
          tr = tr + "<td style='border-color:#000000;'>" + value.email + "</td>";
          tr = tr + "<td style='border-color:#000000;'>" + value.sex + "</td>";
          tr = tr + "<td style='border-color:#000000;'>" + value.age + "</td>";
          tr = tr + "<td style='border-color:#000000;'>" + value.phone + "</td>";
          tr = tr + "<td style='border-color:#000000;'>" + value.address + "</td>";
          tr = tr + "<td style='border-color:#000000;'>" + value.position + "</td>";

          tr = tr + "<td style='text-align:center; border-color:#000000;'><button class='edit btn ' style='background: #25a8e0; color: #000000;' data-info='"+value.IDUserAccount+","+value.firstname+","+value.lastname+","+value.username+","+value.email+","+value.sex+","+value.age+","+value.phone+","+value.address+","+value.position+"'><span class='glyphicon glyphicon-edit'></span>แก้ไข</button>";

          tr = tr + "     <button class='delete btn' style='background: #ef67a7; color: #000000;' data-info='"+value.IDUserAccount+","+value.firstname+","+value.lastname+","+value.username+","+value.email+","+value.sex+","+value.age+","+value.phone+","+value.address+","+value.position+"'<span class='glyphicon glyphicon-trash'></span>ลบ</button></td>";


          tr = tr + "</tr>";
          $('#bodyemp').append(tr);

        });

});

    }



    $(document).on('click', '#addemp', function() {

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


      $('.modal-title').text("เพิ่มข้อมูลพนักงาน");


      $('#empedit').hide();
      $('#empdel').hide();
      $('#submit_addemp').show();

      $('.bodyempss').show();
      $('.bodydel').hide();



      $("input[name='optionsRadios']").prop("checked",false);



      $("input[name='positionRadios']").prop("checked",false);


$('#firstname').val("");
$('#lastname').val("");
$('#username').val("");
$('#password').val("");
$('#email').val("");
$('#phone').val("");
$('#age').val("");
$('#address').val("");


      $('#modelemp').modal('show')



});
$(document).on('click', '#empdel', function() {



  $.ajax({
    type: "POST",
    url: "getDataemp",
    data: {
      'action':'delete',
      'ida':$('#ida').val(),


    },
    dataType: "html",
    success: function(data) {

      viewData();


      $('#modelemp').modal('hide')


    }
  });



});


$(document).on('click', '.delete', function() {
  $('.modal-title').text("ลบข้อมูล");

  $('#empedit').hide();
  $('#empdel').show();
  $('#submit_addemp').hide();


  $('.bodyempss').hide();
  $('.bodydel').show();





  var stuff = $(this).data('info').split(',');
  $('#ida').val(stuff[0]);


  $('#modelemp').modal('show')

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

});
$(document).on('click', '.edit', function() {
  $('.modal-title').text("แก้ไขข้อมูล");
  $('.bodyempss').show();
  $('.bodydel').hide();

  $('#empedit').show();
  $('#empdel').hide();
  $('#submit_addemp').hide();

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


  var stuff = $(this).data('info').split(',');

  $('#ida').val(stuff[0]);

$('#firstname').val(stuff[1]);
$('#lastname').val(stuff[2]);
$('#username').val(stuff[3]);
$('#password').val("");
$('#email').val(stuff[4]);

$("input[name='optionsRadios'][value='"+stuff[5]+"']").prop("checked",true);

$('#phone').val(stuff[7]);



$('#age').val(stuff[6]);
$('#address').val(stuff[8]);


$("input[name='positionRadios'][value='"+stuff[9]+"']").prop("checked",true);


  $('#modelemp').modal('show')



});
$(document).on('click', '#empedit', function() {



  var sex;
  var position;
    $("input:radio[name=optionsRadios]:checked").each(function() {


  sex = $(this).val();

  });

  $("input:radio[name=positionRadios]:checked").each(function() {


  position= $(this).val();

  });


        $.ajax({
          type: "POST",
          url: "getDataemp",
          data: {
            'action':'edit',
            'ida':$('#ida').val(),

            'firstname':$('#firstname').val(),
            'lastname':$('#lastname').val(),
          'username':$('#username').val(),
          'password':$('#password').val(),
          'email':$('#email').val(),
          'age':$('#age').val(),
          'phone':$('#phone').val(),
          'sex':sex,
          'position':position,

          'address':$('#address').val(),

          },
          dataType: "json",
          success: function(data) {


if((data.errors)){

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
  $('#ee10').text(data.errors.position);



}else{
  viewData();



  $('#modelemp').modal('hide')
}


          }
        });







});

$(document).on('click', '#submit_addemp', function() {
var sex;
var position;
  $("input:radio[name=optionsRadios]:checked").each(function() {


sex = $(this).val();

});

$("input:radio[name=positionRadios]:checked").each(function() {


position= $(this).val();

});


      $.ajax({
        type: "POST",
        url: "getDataemp",
        data: {
          'action':'add',
          'firstname':$('#firstname').val(),
          'lastname':$('#lastname').val(),
        'username':$('#username').val(),
        'password':$('#password').val(),
        'email':$('#email').val(),
        'age':$('#age').val(),
        'phone':$('#phone').val(),
        'sex':sex,
        'position':position,

        'address':$('#address').val(),

        },
        dataType: "json",
        success: function(data) {

          if((data.errors)){

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
            $('#ee10').text(data.errors.position);





          }else{
            viewData();



            $('#modelemp').modal('hide')
          }


        }
      });












});

$(document).on('click', '#addemp', function() {

  var stuff = $(this).data('info').split(',');






  $('#modelemp').modal('show')



});


});
