$(document).ready(function() {

  $(document).on('click', '#submit_addstudent', function() {




        $("input:radio[name=optionsRadios]:checked").each(function() {


      sex = $(this).val();

      });


        $.ajax({
          type: "POST",
          url: "crudstudent",
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



            }else{
            viewData();


            $('#modalstudent').modal('hide')

          }

          }
        });


  });


  $(document).on('click', '#studentedit', function() {



            $("input:radio[name=optionsRadios]:checked").each(function() {


          sex = $(this).val();

          });


            $.ajax({
              type: "POST",
              url: "crudstudent",
              data: {
                'action':'edit',
                'id':$('#ida').val(),

                'firstname':$('#firstname').val(),
                'lastname':$('#lastname').val(),
              'username':$('#username').val(),
              'password':$('#password').val(),

              'email':$('#email').val(),
              'age':$('#age').val(),
              'phone':$('#phone').val(),
              'sex':sex,


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



                }else{
                viewData();


                $('#modalstudent').modal('hide')

              }

              }
            });





  });

  $(document).on('click', '#studentdel', function() {





    $.ajax({
      type: "POST",
      url: "crudstudent",
      data: {
        'action':'del',
        'id':$('#ida').val(),


      },
      dataType: "html",
      success: function(data) {

        viewData();


        $('#modalstudent').modal('hide')


      }
    });



  });



  $(document).on('click', '.del', function() {
    $('#ee1').text("");

    $('#ee2').text("");

    $('#ee3').text("");

    $('#ee4').text("");

    $('#ee5').text("");

    $('#ee6').text("");

    $('#ee7').text("");

    $('#ee8').text("");

    $('#ee9').text("");

$('.modal-title').text("ลบข้อมูล");
    $('.bodydel').show("");
    $('.bodyadd').hide("");

      $('#studentedit').hide("");
      $('#studentdel').show("");

    $('#submit_addstudent').hide("");

    $('#modalstudent').modal('show')




          $('#ida').val($(this).data('info'));
  });

  $(document).on('click', '#add', function() {
    $('#ee1').text("");

    $('#ee2').text("");

    $('#ee3').text("");

    $('#ee4').text("");

    $('#ee5').text("");

    $('#ee6').text("");

    $('#ee7').text("");

    $('#ee8').text("");

    $('#ee9').text("");
$('.modal-title').text("เพิ่มข้อมูล");

      $('#studentedit').hide("");
      $('#studentdel').hide("");

    $('#submit_addstudent').show("");


            $('#ida').val("");

            $('#firstname').val("");
            $('#lastname').val("");
            $('#username').val("");
            $('#password').val("");

            $("input[name='optionsRadios']").prop("checked",false);


            $('#email').val("");
            $('#age').val("");
            $('#phone').val("");
            $('#address').val("");
            $('#modalstudent').modal('show')


            $('.bodydel').hide("");
            $('.bodyadd').show("");
  });


$(document).on('click', '.edit', function() {
  $('#ee1').text("");

  $('#ee2').text("");

  $('#ee3').text("");

  $('#ee4').text("");

  $('#ee5').text("");

  $('#ee6').text("");

  $('#ee7').text("");

  $('#ee8').text("");

  $('#ee9').text("");
  $('.modal-title').text("แก้ไข");
  $('.bodydel').hide("");
  $('.bodyadd').show("");
  $('#modalstudent').modal('show')


  $('#studentedit').show("");
  $('#studentdel').hide("");

$('#submit_addstudent').hide("");


  var stuff = $(this).data('info').split(',');


        $('#ida').val(stuff[0]);

        $('#firstname').val(stuff[1]);
        $('#lastname').val(stuff[2]);
        $('#username').val(stuff[3]);
        $('#password').val('****');

        $("input[name='optionsRadios'][value='"+stuff[4]+"']").prop("checked",true);


        $('#email').val(stuff[6]);
        $('#age').val(stuff[5]);
        $('#phone').val(stuff[7]);
        $('#address').val(stuff[8]);


});




  viewData();
    function viewData(){

  $.ajax({
      url: 'crudstudent',
      method: 'POST',
      data: {

        'action':'view',

      },

          dataType: 'html',


  }).done(function(data){

   var servers = $.parseJSON(data);
  $("#tablestudent").empty();


  var num = 1;
          $.each(servers, function(index, value) {




            var tr = "<tr>";
            tr = tr + "<td>" + num + "</td>";

            tr = tr + "<td>" + value.firstname + "</td>";
            tr = tr + "<td>" + value.lastname + "</td>";

            tr = tr + "<td>" + value.sex + "</td>";
            tr = tr + "<td>" + value.age + "</td>";
            tr = tr + "<td>" + value.Email + "</td>";
            tr = tr + "<td>" + value.phone + "</td>";
            tr = tr + "<td>" + value.address + "</td>";



            tr = tr + "<td><button style='background: #25a8e0; color: #000000;' type='button' class='btn  edit' data-info='"+value.idstudent+","+value.firstname+","+value.lastname+","+value.username+","+value.sex+","+value.age+","+value.Email+","+value.phone+","+value.address+","+value.profilepic+"' ><span class='glyphicon glyphicon-edit'></span>แก้ไข</button>";
            tr = tr + "<button style='background: #ef67a7; color: #000000;' type='button' class='btn btn-danger del' data-info='"+value.idstudent+"' > <span class='glyphicon glyphicon-trash'></span>ลบ</button></td>";


            tr = tr + "</tr>";
            $('#tablestudent').append(tr);
  num++;
          });


  });

      }



});
