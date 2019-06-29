$(document).ready(function() {









      $(document).on('click', '.detailtutor', function() {
$('#checkmodal2').modal('show');

  var stuff = $(this).data('info').split(',');


  $("#bodyfrom3").empty();

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

              tr += " <div class='form-group row'>";

              tr += "<label class='col-sm-6 col-form-label'>โปรไฟล์</label>";
              tr += " <div class='col-sm-10'>";
              tr += "</div>";

              tr += "<button class='show2'  data-resume="+stuff[13]+" type='button' name='button'><i class='fa fa-image' aria-hidden='true'></i></button>";

              tr += "</div>";
              tr += " <div class='form-group row'>";

              tr += "<label class='col-sm-6 col-form-label'>Resume</label>";
              tr += " <div class='col-sm-10'>";
              tr += "</div>";

              tr += "<button class='show'  data-resume="+stuff[11]+" type='button' name='button'><i class='fa fa-image' aria-hidden='true'></i></button>";

              tr += "</div>";
              tr += " <div class='form-group row'>";

              tr += "<label class='col-sm-6 col-form-label'>สำเนาประชาชน</label>";
              tr += " <div class='col-sm-10'>";
              tr += "</div>";

              tr += "<button class='show'  data-resume="+stuff[12]+" type='button' name='button'> <i class='fa fa-image' aria-hidden='true'></i></button>";

              tr += "</div>";



              tr += " <div class='form-group row'>";


              tr += "<label class='col-sm-6 col-form-label'>Comment</label>";
              tr += " <div class='col-sm-10'>";
              tr += "</div>";

              tr += "<p>"+stuff[14]+"</p>";

              tr += "</div>";
              tr += "</div>";

              tr += "<label class='col-sm-6 col-form-label'>วิชาที่สอน</label>";
              tr += " <div class='col-sm-10'>";
              tr += "</div>";







              tr += "<p id='subject'></p>";



              tr += "</div>";
              tr += "</div>";


  $('#bodyfrom3').append(tr);
  $.ajax({
    type: "POST",
    url: "resumesubject",
          dataType: 'html',
    data: {

    'id':$(this).data("course"),

    },

    success: function(data) {
      var servers = $.parseJSON(data);
      var num= 0;
$.each(servers, function(index, value) {

if(num==0){

  $('#subject').append(value.name);


}else{
  $('#subject').append(","+value.name);


}
num++;


});



    }
  });

      });



      $(document).on('click', '.show', function() {


        $('#photomodal').modal('show')

  document.getElementById("img").src="storage/Resume/"+$(this).data('resume');


           });
           $(document).on('click', '.show2', function() {


             $('#photomodal').modal('show')

         document.getElementById("img").src="storage/Pic/"+$(this).data('resume');


                });











    $(document).on('click', '.pass', function() {



      $('#pass').show();
      $('#fail').hide();

      $('#modal').modal('show')


    $('#hideid').val($(this).data('id'));


    $('#comment').hide();


    });
    $(document).on('click', '#pass', function() {



      $.ajax({
        type: "POST",
        url: "actiontutor",
        data: {
          'action':'pass',
        'id':$('#hideid').val(),

        },

        success: function(data) {



    if(data=="Success"){



  $('#modal').modal('hide')
  var bounce = new Bounce();
  bounce
    .translate({
      from: { x: 0, y: 0 },
      to: { x: 0, y: -500 },
      duration: 10000,
      stiffness: 4
    })
    .scale({
      from: { x: 1, y: 1 },
      to: { x: 0.1, y: 2.3 },
      easing: "sway",
      duration: 800,
      delay: 65,
      stiffness: 2
    })
    .scale({
      from: { x: 1, y: 1},
      to: { x: 5, y: 1 },
      easing: "sway",
      duration: 300,
      delay: 30,
    })
    .applyTo(document.querySelectorAll(".anime"+$('#hideid').val()));

    }


        }
      });

         });

         $(document).on('click', '#fail', function() {



           $.ajax({
             type: "POST",
             url: "actiontutor",
             data: {
               'action':'fail',
             'id':$('#hideid').val(),
             'comment':$('#comment').val(),

             },

             success: function(data) {


               if ((data.errors)){
                   var tr = "";
                 if ((data.errors.comment)){

               tr =  data.errors.comment+"<br>";

                 }
                 var unique_id = $.gritter.add({
                     // (string | mandatory) the heading of the notification
                     title: '// WARNING ',
                     // (string | mandatory) the text inside the notification
                     text:   tr,
                     // (string | optional) the image to display on the left

                     // (bool | optional) if you want it to fade out on its own or just sit there
                     sticky: true,
                     // (int | optional) the time you want it to be alive for before fading out
                     time: '',
                     // (string | optional) the class name you want to apply to that specific message
                     class_name: 'my-sticky-class'
                 });



               }else{





         if(data=="Success"){



       $('#modal').modal('hide')

       var bounce = new Bounce();
       bounce
         .translate({
           from: { x: 0, y: 0 },
           to: { x: 0, y: -500 },
           duration: 10000,
           stiffness: 4
         })
         .scale({
           from: { x: 1, y: 1 },
           to: { x: 0.1, y: 2.3 },
           easing: "sway",
           duration: 800,
           delay: 65,
           stiffness: 2
         })
         .scale({
           from: { x: 1, y: 1},
           to: { x: 5, y: 1 },
           easing: "sway",
           duration: 300,
           delay: 30,
         })
         .applyTo(document.querySelectorAll(".anime"+$('#hideid').val()));

         }

}
             }
           });

              });

    $(document).on('click', '.fail', function() {

      $('#pass').hide();
      $('#fail').show();
      $('#modal').modal('show')

      $('#comment').show();



    $('#hideid').val($(this).data('id'));



    });


});
