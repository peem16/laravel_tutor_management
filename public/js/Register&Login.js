$(document).ready(function() {
  $('#p1').hide();
  $('#p2').hide();

  $('#p3').hide();
  $('#p4').hide();
  $('#p5').hide();


  $('#p11').hide();
  $('#p22').hide();
  $('#p33').hide();
  $('#p44').hide();
  $('#p55').hide();

  $("#Totalall").hide();
// $("#Totalall").html("ระดับผลประเมิน: ดีมาก");
$("#Totalallt").val(25);

  $('#ppp').hide();


  // $('#Totalall').hide();
var ss = 0;
// $('#numberss').hide();

  $('#showeree').hide();
  $('#showeree2').hide();

    $('#p4').hide();


    $('#succcess').hide();

$('#submit').hide();
$('#ppp').hide();
  $("#Totalall").hide();


  $('#Text2').hide();
  $('#Text1').hide();
    $('#text').hide();
    $('#lvlknow1').hide();
    $('#lvlknow2').hide();
    $('#lvlknow3').hide();
    $('#lvlknow4').hide();
    $('#lvlknow5').hide();
      $('#reconment').hide();

var totoall = "";

function sss (){



   ss = 0;

   if($('#lvlknow1').val()=="5"){
   ss = ss+5;

 }else if($('#lvlknow1').val()=="4"){
     ss = ss+4;


   }else if($('#lvlknow1').val()=="3"){
     ss = ss+3;


   }else if($('#lvlknow1').val()=="2"){
     ss = ss+2;


   }else if($('#lvlknow1').val()=="1"){
     ss = ss+1;


   }

   if($('#lvlknow2').val()=="5"){
   ss = ss+5;

 }else if($('#lvlknow2').val()=="4"){
     ss = ss+4;


   }else if($('#lvlknow2').val()=="3"){
     ss = ss+3;


   }else if($('#lvlknow2').val()=="2"){
     ss = ss+2;


   }else if($('#lvlknow2').val()=="1"){
     ss = ss+1;


   }

   if($('#lvlknow3').val()=="5"){
   ss = ss+5;

 }else if($('#lvlknow3').val()=="4"){
     ss = ss+4;


   }else if($('#lvlknow3').val()=="3"){
     ss = ss+3;


   }else if($('#lvlknow3').val()=="2"){
     ss = ss+2;


   }else if($('#lvlknow3').val()=="1"){
     ss = ss+1;


   }
   if($('#lvlknow4').val()=="5"){
   ss = ss+5;

 }else if($('#lvlknow4').val()=="4"){
     ss = ss+4;


   }else if($('#lvlknow4').val()=="3"){
     ss = ss+3;


   }else if($('#lvlknow4').val()=="2"){
     ss = ss+2;


   }else if($('#lvlknow4').val()=="1"){
     ss = ss+1;


   }




  if($('#lvlknow5').val()=="5"){
  ss = ss+5;

}else if($('#lvlknow5').val()=="4"){
    ss = ss+4;


  }else if($('#lvlknow5').val()=="3"){
    ss = ss+3;


  }else if($('#lvlknow5').val()=="2"){
    ss = ss+2;


  }else if($('#lvlknow5').val()=="1"){
    ss = ss+1;


  }


if(ss<=5){

  // $("#Totalall").html("ระดับผลประเมิน: แย่");

  $("#Totalallt").val(ss);

}else if(ss<=10){
  // $("#Totalall").html("ระดับผลประเมิน: พอใช้");

  $("#Totalallt").val(ss);

}else if(ss<=15){

  // $("#Totalall").html("ระดับผลประเมิน: ปานกลาง");
  $("#Totalallt").val(ss);

}else if(ss<=20){

// $("#Totalall").html("ระดับผลประเมิน: ดี");
$("#Totalallt").val(ss);

}else if(ss<=25){
  // $("#Totalall").html("ระดับผลประเมิน: ดีมาก");

  $("#Totalallt").val(ss);

}



}

      $(document).on('change', '#lvlknow5', function() {


 sss ();


});
$(document).on('change', '#lvlknow4', function() {


sss ();


});
$(document).on('change', '#lvlknow3', function() {


sss ();


});
$(document).on('change', '#lvlknow2', function() {


sss ();


});
$(document).on('change', '#lvlknow1', function() {


sss ();


});






  $(document).on('click', '#succcess', function() {






        window.location.href = '/' ;


  });









  $(document).on('click', '#btncheck', function() {



    $.ajax({
      type: "POST",
      url: "checktest",
      data: {
        'key':$('#idtest').val(),


      },
      dataType: "html",
      success: function(data) {
        var servers = $.parseJSON(data);


                  $.each(servers, function(index, value) {
                      $.each(value, function(index2, value2) {

                    if(value2.idtype == "1"){

                      $('#p2').hide();
                      $('#p22').show();

                    }else{
                      $('#p2').show();
                      $('#p22').hide();


                    }



                      });

});
        if(data=='1'){
          $('#p1').hide();
          $('#p2').hide();
          $('#p3').hide();
              $('#p4').hide();
              $('#ppp').hide();

              $('#p5').hide();
              $('#p11').hide();
              $('#p22').hide();
              $('#p33').hide();
              $('#p44').hide();
              $('#p55').hide();
              // $('#Totalall').hide();
              // $('#numberss').hide();


        $('#showeree').show();
          $('#Text2').hide();
              $('#Text1').hide();
                $('#text').hide();
                $('#lvlknow1').hide();
                $('#lvlknow2').hide();
                $('#lvlknow3').hide();

                $('#lvlknow4').hide();
                $('#lvlknow5').hide();

  // $("#Totalall").hide();
                  $('#reconment').hide();
                  $('#submit').hide();
  $('#showeree2').hide();
        }

        else if(data=='2'){
          $('#p1').hide();
          $('#p2').hide();
          $('#p3').hide();
              $('#p4').hide();
  // $("#Totalall").hide();
              $('#p5').hide();
              // $('#Totalall').hide();
              // $('#numberss').hide();
              $('#p11').hide();
              $('#p22').hide();
              $('#p33').hide();
              $('#p44').hide();
              $('#p55').hide();
          $('#showeree2').show();
          $('#Text2').hide();
              $('#Text1').hide();
                $('#text').hide();
                $('#lvlknow1').hide();
                $('#lvlknow2').hide();
                $('#lvlknow3').hide();

                $('#lvlknow4').hide();
                $('#lvlknow5').hide();


                  $('#reconment').hide();
                  $('#submit').hide();
  $('#showeree').hide();
        }


var servers = $.parseJSON(data);


          $.each(servers, function(index, value) {

  $.each(value, function(index2, value2) {


if(value2.idtype==1){


  $('#p1').show();

  $('#p2').show();

  $('#p3').show();
      $('#p4').show();
      $('#p5').show();


      $('#lvlknow1')
        .find('option')
        .remove()
        .end();

              var x = document.getElementById("lvlknow1");
              var option = document.createElement("option");
              option.value = 5;
              option.text = "ถูกต้องครบทุกตัวโน้ต ได้คะแนน 5 คะแนน";
              x.add(option);
              var option = document.createElement("option");

              option.value = 4;
              option.text = "ผิด 1-2 ตัวโน้ต ได้คะแนน 4 คะแนน";
              x.add(option);
              var option = document.createElement("option");

              option.value = 3;
              option.text = "ผิด 3-4 ตัวโน้ต ได้คะแนน 3 คะแนน";
              x.add(option);
              var option = document.createElement("option");

              option.value = 2;
              option.text = "ผิด 5-6 ตัวโน้ต ได้คะแนน 2 คะแนน";
              x.add(option);
              var option = document.createElement("option");

              option.value = 1;
              option.text = "ผิด 6 ตัวโน้ตขึ้นไป ได้คะแนน 1 คะแนน";
              x.add(option);


                      $('#lvlknow2')
                        .find('option')
                        .remove()
                        .end();


                        var x = document.getElementById("lvlknow2");
                        var option = document.createElement("option");
                        option.value = 5;
                        option.text = "อ่านโน้ตบทฝึกถูกตองครบทุกตัวโน้ต ได้คะแนน 5 คะแนน";
                        x.add(option);
                        var option = document.createElement("option");

                        option.value = 4;
                        option.text = "อ่านโน้ตบทฝึกผิด 1-2 ตัวโน้ต ได้คะแนน 4 คะแนน";
                        x.add(option);
                        var option = document.createElement("option");

                        option.value = 3;
                        option.text = "อ่านโน้ตบทฝึกผิด 3-4 ตัวโน้ต ได้คะแนน 3 คะแนน";
                        x.add(option);
                        var option = document.createElement("option");

                        option.value = 2;
                        option.text = "อ่านโน้ตบทฝึกผิด 5-6 ตัวโน้ต ได้คะแนน 2 คะแนน";
                        x.add(option);
                        var option = document.createElement("option");

                        option.value = 1;
                        option.text = "อ่านโน้ตบทฝึกผิด 6 ตัวโน้ตขึ้นไป ได้คะแนน 1 คะแนน";
                        x.add(option);


                        $('#lvlknow3')
                          .find('option')
                          .remove()
                          .end();



                                              var x = document.getElementById("lvlknow3");
                                              var option = document.createElement("option");
                                              option.value = 5;
                                              option.text = "เสียงใส ไม่เพี้ยน ได้คะแนน 5 คะแนน";
                                              x.add(option);
                                              var option = document.createElement("option");

                                              option.value = 4;
                                              option.text = "เสียงใส แต่เพี้ยน 1-2 ตัวโน้ต ได้คะแนน 4 คะแนน";
                                              x.add(option);
                                              var option = document.createElement("option");

                                              option.value = 3;
                                              option.text = "เสียงใส แต่เพี้ยน 3-4 ตัวโน้ต ได้คะแนน 3 คะแนน";
                                              x.add(option);
                                              var option = document.createElement("option");

                                              option.value = 2;
                                              option.text = "เสียงใส แต่เพี้ยน 5-6 ตัวโน้ต ได้คะแนน 2 คะแนน";
                                              x.add(option);
                                              var option = document.createElement("option");

                                              option.value = 1;
                                              option.text = "เสียงใส แต่เพี้ยน 6 ตัวโน้ตขึ้นไป ได้คะแนน 1 คะแนน";
                                              x.add(option);


                                              $('#lvlknow4')
                                                .find('option')
                                                .remove()
                                                .end();


                                                var x = document.getElementById("lvlknow4");
                                                var option = document.createElement("option");
                                                option.value = 5;
                                                option.text = "ฟังโน้ตบทฝึกถูกตองครบทุกตัวโน้ต ได้คะแนน 5 คะแนน";
                                                x.add(option);
                                                var option = document.createElement("option");

                                                option.value = 4;
                                                option.text = "ฟังโน้ตบทฝึกผิด 1-2 ตัวโน้ต ได้คะแนน 4 คะแนน";
                                                x.add(option);
                                                var option = document.createElement("option");

                                                option.value = 3;
                                                option.text = "ฟังโน้ตบทฝึกผิด 3-4 ตัวโน้ต ได้คะแนน 3 คะแนน";
                                                x.add(option);
                                                var option = document.createElement("option");

                                                option.value = 2;
                                                option.text = "ฟังโน้ตบทฝึกผิด 5-6 ตัวโน้ต ได้คะแนน 2 คะแนน";
                                                x.add(option);
                                                var option = document.createElement("option");

                                                option.value = 1;
                                                option.text = "ฟังโน้ตบทฝึกผิด 6 ตัวโน้ตขึ้นไป ได้คะแนน 1 คะแนน";
                                                x.add(option);

                                                $('#lvlknow5')
                                                  .find('option')
                                                  .remove()
                                                  .end();


                                                  var x = document.getElementById("lvlknow5");
                                                  var option = document.createElement("option");
                                                  option.value = 5;
                                                  option.text = "ถูกต้องร้อยละ 100 ของคะแนนเต็ม";
                                                  x.add(option);
                                                  var option = document.createElement("option");

                                                  option.value = 4;
                                                  option.text = "ถูกต้องร้อยละ 80 ของคะแนนเต็ม";
                                                  x.add(option);
                                                  var option = document.createElement("option");

                                                  option.value = 3;
                                                  option.text = "ถูกต้องร้อยละ 60 ของคะแนนเต็ม์";
                                                  x.add(option);
                                                  var option = document.createElement("option");

                                                  option.value = 2;
                                                  option.text = "ถูกต้องร้อยละ 40 ของคะแนนเต็ม";
                                                  x.add(option);
                                                  var option = document.createElement("option");

                                                  option.value = 1;
                                                  option.text = "ถูกต้องต่ำกว่าร้อยละ 20 ของคะแนนเต็ม์";
                                                  x.add(option);

}else if(value2.idtype==undefined){


}


else{
  $('#lvlknow1')
    .find('option')
    .remove()
    .end();

          var x = document.getElementById("lvlknow1");
          var option = document.createElement("option");
          option.value = 5;
          option.text = "ถูกต้องร้อยละ 100 ของคะแนนเต็ม";
          x.add(option);
          var option = document.createElement("option");

          option.value = 4;
          option.text = "ถูกต้องร้อยละ 80 ของคะแนนเต็ม";
          x.add(option);
          var option = document.createElement("option");

          option.value = 3;
          option.text = "ถูกต้องร้อยละ 60 ของคะแนนเต็ม";
          x.add(option);
          var option = document.createElement("option");

          option.value = 2;
          option.text = "ถูกต้องร้อยละ 40 ของคะแนนเต็ม";
          x.add(option);
          var option = document.createElement("option");

          option.value = 1;
          option.text = "ถูกต้องต่ำกว่าร้อยละ 20 ของคะแนนเต็ม";
          x.add(option);


                  $('#lvlknow2')
                    .find('option')
                    .remove()
                    .end();


                    var x = document.getElementById("lvlknow2");
                    var option = document.createElement("option");
                    option.value = 5;
                    option.text = "ถูกต้องร้อยละ 100 ของคะแนนเต็ม";
                    x.add(option);
                    var option = document.createElement("option");

                    option.value = 4;
                    option.text = "ถูกต้องร้อยละ 80 ของคะแนนเต็ม";
                    x.add(option);
                    var option = document.createElement("option");

                    option.value = 3;
                    option.text = "ถูกต้องร้อยละ 60 ของคะแนนเต็ม";
                    x.add(option);
                    var option = document.createElement("option");

                    option.value = 2;
                    option.text = "ถูกต้องร้อยละ 40 ของคะแนนเต็ม";
                    x.add(option);
                    var option = document.createElement("option");

                    option.value = 1;
                    option.text = "ถูกต้องต่ำกว่าร้อยละ 20 ของคะแนนเต็ม";
                    x.add(option);


                    $('#lvlknow3')
                      .find('option')
                      .remove()
                      .end();



                                          var x = document.getElementById("lvlknow3");
                                          var option = document.createElement("option");
                                          option.value = 5;
                                          option.text = "อ่าน/คำนวณถูกต้องทั้งหมด ได้คะแนน 5 คะแนน";
                                          x.add(option);
                                          var option = document.createElement("option");

                                          option.value = 4;
                                          option.text = "อ่าน/คำนวณถูกต้อง 1-2 จุด ได้คะแนน 4 คะแนน";
                                          x.add(option);
                                          var option = document.createElement("option");

                                          option.value = 3;
                                          option.text = "อ่าน/คำนวณถูกต้อง 3-4 จุด ได้คะแนน 4 คะแนน";
                                          x.add(option);
                                          var option = document.createElement("option");

                                          option.value = 2;
                                          option.text = "อ่าน/คำนวณถูกต้อง 5-6 จุด ได้คะแนน 2 คะแนน";
                                          x.add(option);
                                          var option = document.createElement("option");

                                          option.value = 1;
                                          option.text = "อ่าน/คำนวณถูกต้อง 6 จุดขึ้นไป ได้คะแนน 1 คะแนน";
                                          x.add(option);


                                          $('#lvlknow4')
                                            .find('option')
                                            .remove()
                                            .end();


                                            var x = document.getElementById("lvlknow4");
                                            var option = document.createElement("option");
                                            option.value = 5;
                                            option.text = "ผลทดสอบถูกต้องร้อยละ 100 ของคะแนนเต็ม";
                                            x.add(option);
                                            var option = document.createElement("option");

                                            option.value = 4;
                                            option.text = "ผลทดสอบถูกต้องร้อยละ 80 ของคะแนนเต็ม";
                                            x.add(option);
                                            var option = document.createElement("option");

                                            option.value = 3;
                                            option.text = "ผลทดสอบถูกต้องร้อยละ 60 ของคะแนนเต็ม";
                                            x.add(option);
                                            var option = document.createElement("option");

                                            option.value = 2;
                                            option.text = "ผลทดสอบถูกต้องร้อยละ 40 ของคะแนนเต็ม";
                                            x.add(option);
                                            var option = document.createElement("option");

                                            option.value = 1;
                                            option.text = "ผลทดสอบถูกต้องต่ำกว่าร้อยละ 20 ของคะแนนเต็ม";
                                            x.add(option);

                                            $('#lvlknow5')
                                              .find('option')
                                              .remove()
                                              .end();


                                              var x = document.getElementById("lvlknow5");
                                              var option = document.createElement("option");
                                              option.value = 5;
                                              option.text = "ระดับความรู้อยู่ในระดับร้อยละ100 ของเกณฑ์";
                                              x.add(option);
                                              var option = document.createElement("option");

                                              option.value = 4;
                                              option.text = "ระดับความรู้อยู่ในระดับร้อยละ80 ของเกณฑ์";
                                              x.add(option);
                                              var option = document.createElement("option");

                                              option.value = 3;
                                              option.text = "ระดับความรู้อยู่ในระดับร้อยละ 60 ของเกณฑ์";
                                              x.add(option);
                                              var option = document.createElement("option");

                                              option.value = 2;
                                              option.text = "ระดับความรู้อยู่ในระดับร้อยละ 40 ของเกณฑ์";
                                              x.add(option);
                                              var option = document.createElement("option");

                                              option.value = 1;
                                              option.text = "ระดับความรู้อยู่ในระดับต่ำกว่าร้อยละ 20 ของเกณฑ์";
                                              x.add(option);



  $('#p11').show();

  $('#p22').show();

  $('#p33').show();
      $('#p44').show();
      $('#p55').show();




}


            if(value2.idUserAccount!=""){

                  // $('#Totalall').show();
                  // $('#numberss').show();
                  $('#ppp').show();
  // $("#Totalall").show();
                  $('#showeree').hide();
  $('#showeree2').hide();
              $('#Text2').html("แบบประเมินวิชา: "+value2.name);
              $('#Text2').show();
                  $('#Text1').show();
                    $('#text').show();
                    $('#lvlknow1').show();
                    $('#lvlknow2').show();
                    $('#lvlknow3').show();

                    $('#lvlknow4').show();
                    $('#lvlknow5').show();

                      $('#reconment').show();
                      $('#submit').show();

            }


          });

        });



      }
    });

  //   $.ajax({
  //     type: "POST",
  //     url: "getcd",
  //     data: {
  //       'key':$('#idtest').val(),
  //
  //
  //     },
  //     dataType: "html",
  //     success: function(data) {
  //
  //
  // var servers = $.parseJSON(data);
  //
  // $('#reconment')
  //   .find('option')
  //   .remove()
  //   .end();
  //         $.each(servers, function(index, value) {
  //
  //
  //               var x = document.getElementById("reconment");
  //               var option = document.createElement("option");
  //               option.value = value.idGrade;
  //               option.text = value.nameGrade ;
  //               x.add(option);
  //
  //
  //
  //
  //
  //         });
  //
  //
  //
  //
  //     }
  //   });



  });

  $(document).on('click', '#submit_studen', function() {

var sex;
if(document.getElementById("group1.1").checked){

sex = 'male';

}else if(document.getElementById("group1.2").checked){

sex = 'female';

}

    $.ajax({
      type: "POST",
      url: "registerstudent",
      data: {
        'username':$('#username').val(),
        'password':$('#password2').val(),
      'firstname':$('#firstname').val(),
      'lastname':$('#lastname').val(),
      'phone':$('#phone').val(),
      'email':$('#email2').val(),
      'age':$('#age').val(),
      'sex':sex,
      'address':$('#address').val(),

      },
      dataType: "json",
      success: function(data) {
        $('#success').text("");
      if((data.usernamemes)){
        $('#ee1').text("");
        $('#ee1').text(data.usernamemes);


      }
      if ((data.errors)){
        // $('.erroredit').removeClass('hidden');
        //   $('.erroredit').addClass('show');
        $('#ee1').text("");
        $('#ee1').text(data.errors.username);
        $('#ee2').text("");
        $('#ee2').text(data.errors.password);
        $('#ee3').text("");
        $('#ee3').text(data.errors.firstname);
        $('#ee4').text("");
        $('#ee4').text(data.errors.lastname);
        $('#ee5').text("");
        $('#ee5').text(data.errors.phone);
        $('#ee6').text("");
        $('#ee6').text(data.errors.email);
        $('#ee7').text("");
        $('#ee7').text(data.errors.age);
        $('#ee8').text("");
        $('#ee8').text(data.errors.sex);
        $('#ee9').text("");
        $('#ee9').text(data.errors.address);


    $('#success').text("");

      }else{

        if(data=="Success"){
          $('#ee1').text("");

          $('#ee2').text("");

          $('#ee3').text("");

          $('#ee4').text("");

          $('#ee5').text("");

          $('#ee6').text("");

          $('#ee7').text("");

          $('#ee8').text("");

          $('#ee9').text("");

    $('#success').text("Success");
      $('#username').val("");
        $('#password2').val("");
      $('#firstname').val("");
    $('#lastname').val("");
      $('#phone').val("");
      $('#email2').val("");
        $('#age').val("");
    $("input[name='group1']").prop("checked",false);
      $('#address').val("");



        }

      }
    }
    });




  });



  $(document).on('click', '#btnsubmittutor', function() {
    var sex = "";
    if(document.getElementById("group1.1").checked){

    sex = 'male';

    }else if(document.getElementById("group1.2").checked){

    sex = 'female';

  }


    var Resume = $('#Resume');
    var IDCardPhoto = $('#IDCardPhoto');
    var profile = $('#profile');


    var formData = new FormData();
    formData.append('Resume', Resume[0].files[0]);
    formData.append('IDCardPhoto', IDCardPhoto[0].files[0]);
    formData.append('Pic', profile[0].files[0]);


    formData.append('firstName',$('#FirstName').val());
    formData.append('lastName',$('#LastName').val());
    formData.append('idcard',$('#idcard').val());
    formData.append('phone',$('#Phone').val());
    formData.append('position',$('#Position').val());
    formData.append('email',$('#Email').val());
    formData.append('ability',$('#Ability').val());
    formData.append('address',$('#Address').val());
    formData.append('sex',sex);
    formData.append('age',$('#age').val());



    $.ajax({
      method: 'post',
      dataType: 'json',
      url: "registertutor",
      contentType: false,
      processData: false,
      headers: {
    'X-CSRF-TOKEN': $('input[name=_token]').val()
},
        data: formData

        ,
        success: function(data) {

          if((data.idcard)){
            $('#ee3').text("");
            $('#ee3').text(data.idcard);


          }


          if ((data.errors)){
            // $('.erroredit').removeClass('hidden');
            //   $('.erroredit').addClass('show');
            $('#ee1').text("");
            $('#ee1').text(data.errors.firstName);
            $('#ee2').text("");
            $('#ee2').text(data.errors.lastName);
            $('#ee3').text("");
            $('#ee3').text(data.errors.idcard);
            $('#ee4').text("");
            $('#ee4').text(data.errors.phone);
            $('#ee5').text("");
            $('#ee5').text(data.errors.position);
            $('#ee6').text("");
            $('#ee6').text(data.errors.email);
            $('#ee7').text("");
            $('#ee7').text(data.errors.ability);
            $('#ee8').text("");
            $('#ee8').text(data.errors.address);
            $('#ee9').text("");
            $('#ee9').text(data.errors.sex);
            $('#ee10').text("");
            $('#ee10').text(data.errors.age);

            $('#ee11').text("");
            $('#ee11').text(data.errors.Pic);

            $('#ee12').text("");
            $('#ee12').text(data.errors.Resume);

            $('#ee13').text("");
            $('#ee13').text(data.errors.IDCardPhoto);

            $('#ee13').text("");
            $('#ee13').text(data.errors.IDCardPhoto);
        $('#success').text("");

          }else{


  if(data=="Success"){


$('#hidebody').hide();

$('#btnsubmittutor').hide();

$('#succcess').show();

  }

}
      }
    });






  });





});
