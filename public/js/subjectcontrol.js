$(document).ready(function() {

var actionis = "subject";



$(document).on('click', '#confirmdeltype', function() {



  $.ajax({
      url: 'crudtype',
      method: 'POST',
          dataType: 'html',
          data: {
        'action':'del',
        'idtype':  $('#idtypehide').val(),

      }

  }).done(function(data){
    $('#tpyemodal').modal('hide')

  viewDatatype();
  });




});

$(document).on('click', '#submit_edittype', function() {

  $.ajax({
      url: 'crudtype',
      method: 'POST',
          dataType: 'json',
          data: {
        'action':'edit',
        'idtype':  $('#idtypehide').val(),

        'nametype':  $('#idtypename').val(),
      }

  }).done(function(data){


    if ((data.errors)){

      $('#ee1').text("");
      $('#ee1').text(data.errors.nametype);


    }else{
      if(data=="Success"){

        $('#tpyemodal').modal('hide')

      viewDatatype();
      }
}
  });




});





$(document).on('click', '#submit_addtype', function() {




    $.ajax({
        url: 'crudtype',
        method: 'POST',
            dataType: 'Json',
            data: {
          'action':'add',
          'nametype':  $('#idtypename').val(),


        }

    }).done(function(data){

      if ((data.nametypes)){

        $('#ee1').text("");
        $('#ee1').text(data.nametypes);


      }
  if ((data.errors)){

    $('#ee1').text("");
    $('#ee1').text(data.errors.nametype);


  }else{

if(data=="Success"){

  $('#tpyemodal').modal('hide')

viewDatatype();
}

}
    });




});


$(document).on('click', '#submit_addgrade', function() {

  var group;
  if(document.getElementById("exampleRadios1").checked){

  group = '0';

  }else if(document.getElementById("exampleRadios2").checked){

  group = '1';

}else if(document.getElementById("exampleRadios3").checked){

  group = '2';

  }
  $.ajax({
      url: 'crudgrade',
      method: 'POST',
          dataType: 'json',
          data: {
        'action':'add',
        'nameGrade':  $('#gradename').val(),
        'idtype':  $("input[name='optionstype']:checked").val(),
          'group':  group,

      }

  }).done(function(data){
    if((data.nameGrades)){

      $('#ee2').text("");
      $('#ee2').text(data.nameGrades);

    }
    if ((data.errors)){

      $('#ee2').text("");
      $('#ee2').text(data.errors.nameGrade);
      $('#ee3').text("");
      $('#ee3').text(data.errors.idtype);
      $('#ee4').text("");
      $('#ee4').text(data.errors.group);

    }else{





      if(data=="Success"){
        $('#ee2').text("");

        $('#ee3').text("");

        $('#ee4').text("");
        $('#grademodal').modal('hide')

    viewDatagrade();


      }



}
  });



});
$(document).on('click', '#submit_editgrade', function() {


  var group;
  if(document.getElementById("exampleRadios1").checked){

  group = '0';

  }else if(document.getElementById("exampleRadios2").checked){

  group = '1';

}else if(document.getElementById("exampleRadios3").checked){

  group = '2';

  }

  $.ajax({
      url: 'crudgrade',
      method: 'POST',
          dataType: 'json',
          data: {
        'action':'edit',
        'idgrade' :  $('#idgradehide').val(),
        'nameGrade':  $('#gradename').val(),
        'idtype':  $("input[name='optionstype']:checked").val(),
        'group':  group,

      }

  }).done(function(data){
    if ((data.errors)){

      $('#ee2').text("");
      $('#ee2').text(data.errors.nameGrade);
      $('#ee3').text("");
      $('#ee3').text(data.errors.idtype);
      $('#ee4').text("");
      $('#ee4').text(data.errors.group);

    }else{


      if(data=="Success"){
        $('#ee2').text("");

        $('#ee3').text("");

        $('#ee4').text("");
    $('#grademodal').modal('hide');

viewDatagrade();

}
}
  });



});
$(document).on('click', '#confirmdelgrade', function() {

  $.ajax({
      url: 'crudgrade',
      method: 'POST',
          dataType: 'html',
          data: {
        'action':'del',
        'idgrade' :  $('#idgradehide').val(),

      }

  }).done(function(data){
    $('#grademodal').modal('hide')

viewDatagrade();
  });




});


$(document).on('click', '#addGrade', function() {
$('.modal-title').text("เพิ่มข้อมูล");

  $('#grademodal').modal('show')

  $('#idgradehide').val("");
  $('#gradename').val("");



  $("input[name='optionstype']").prop("checked",false);


  $('#submit_addgrade').show();
  $('#submit_editgrade').hide();
  $('#confirmdelgrade').hide();


  $('.bodydelgrade').hide();
  $('.bodyaddeditgrade').show();
  $('#ee2').text("");

  $('#ee3').text("");

  $('#ee4').text("");



});
$(document).on('click', '.editgrade', function() {

  $('.modal-title').text("แก้ไขข้อมูล");
  $('#ee2').text("");

  $('#ee3').text("");

  $('#ee4').text("");
  $('#grademodal').modal('show')

  $('#idgradehide').val($(this).data('id'));
  $('#gradename').val($(this).data('name'));

  $("input[name='optionstype'][value='"+$(this).data('type')+"']").prop("checked",true);


  $('#submit_addgrade').hide();
  $('#submit_editgrade').show();
  $('#confirmdelgrade').hide();
  $('.bodydelgrade').hide();
  $('.bodyaddeditgrade').show();


});
$(document).on('click', '.delgrade', function() {
$('.modal-title').text("ลบข้อมูล");
  $('#grademodal').modal('show')
  $('#idgradehide').val($(this).data('id'));




  $('#submit_addgrade').hide();
  $('#submit_editgrade').hide();
  $('#confirmdelgrade').show();

  $('.bodydelgrade').show();
  $('.bodyaddeditgrade').hide();


});











$(document).on('click', '#addtype', function() {
  $('#ee1').text("");
  $('#tpyemodal').modal('show')

  $('#idtypehide').val("");
  $('#idtypename').val("");

        $('.modal-title').text("เพิ่มข้อมูล");

  $('#submit_addtype').show();
  $('#submit_edittype').hide();
  $('#confirmdeltype').hide();


    $('.bodyaddedittype').show();
    $('.bodydeltype').hide();





});
$(document).on('click', '.edittype', function() {
  $('#ee1').text("");

  $('#tpyemodal').modal('show')
  $('#idtypehide').val($(this).data('id'));
  $('#idtypename').val($(this).data('name'));
  $('#submit_addtype').hide();
  $('#submit_edittype').show();
  $('#confirmdeltype').hide();

  $('.bodyaddedittype').show();
  $('.bodydeltype').hide();
});


$(document).on('click', '.deltype', function() {
  $('#ee1').text("");

  $('#tpyemodal').modal('show')
  $('#idtypehide').val($(this).data('id'));

  $('#submit_addtype').hide();
  $('#submit_edittype').hide();
  $('#confirmdeltype').show();


  $('.bodyaddedittype').hide();
  $('.bodydeltype').show();
});






  $(document).on('click', '#subjectbtn', function() {



if(actionis=="subject"){




}else if(actionis=="Grade"){
actionis = "subject";

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
    .applyTo(document.querySelectorAll("#Grade"));

    $('#Grade').hide();
    $('#subject').show();

    var bounce = new Bounce();
    bounce
      .translate({
        from: { x: 0, y: -500 },
        to: { x: 0, y: 0 },
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
      .applyTo(document.querySelectorAll("#subject"));


}else if(actionis=="type"){

  actionis = "subject";

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
    .applyTo(document.querySelectorAll("#type"));
    $('#type').hide();
    $('#subject').show();
    var bounce = new Bounce();
    bounce
      .translate({
        from: { x: 0, y: -500 },
        to: { x: 0, y: 0 },
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
      .applyTo(document.querySelectorAll("#subject"));


}else{



}




  });




  $(document).on('click', '#Gradebtn', function() {



    if(actionis=="Grade"){




    }else if(actionis=="subject"){
    actionis = "Grade";

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
        .applyTo(document.querySelectorAll("#subject"));
        $('#subject').hide();
        $('#Grade').show();
        var bounce = new Bounce();
        bounce
          .translate({
            from: { x: 0, y: -500 },
            to: { x: 0, y: 0 },
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
          .applyTo(document.querySelectorAll("#Grade"));


    }else if(actionis=="type"){

      actionis = "Grade";

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
        .applyTo(document.querySelectorAll("#type"));
        $('#type').hide();
        $('#Grade').show();
        var bounce = new Bounce();
        bounce
          .translate({
            from: { x: 0, y: -500 },
            to: { x: 0, y: 0 },
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
          .applyTo(document.querySelectorAll("#Grade"));


    }else{



    }


  });


  $(document).on('click', '#typebtn', function() {



        if(actionis=="type"){




        }else if(actionis=="subject"){
        actionis = "type";

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
            .applyTo(document.querySelectorAll("#subject"));
            $('#subject').hide();
            $('#type').show();
            var bounce = new Bounce();
            bounce
              .translate({
                from: { x: 0, y: -500 },
                to: { x: 0, y: 0 },
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
              .applyTo(document.querySelectorAll("#type"));


        }else if(actionis=="Grade"){

          actionis = "type";

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
            .applyTo(document.querySelectorAll("#Grade"));
            $('#Grade').hide();
            $('#type').show();
            var bounce = new Bounce();
            bounce
              .translate({
                from: { x: 0, y: -500 },
                to: { x: 0, y: 0 },
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
              .applyTo(document.querySelectorAll("#type"));


        }else{



        }


  });














  $('#sub-menu1').addClass('active');

  //
  $('#sub2').addClass('active');

viewDatatype();
  function viewDatatype(){

$.ajax({
    url: 'crudtype',
    method: 'POST',
        dataType: 'html',
        data: {
      'action':'view',}

}).done(function(data){

 var servers = $.parseJSON(data);


         $("#bodytype").empty();

        $.each(servers, function(index, value) {

          var tr = "<tr>";
          tr = tr + "<td>" +value.idtype+ "</td>";
          tr = tr + "<td>" +value.nametype+ "</td>";






tr = tr + "<td><button class='edittype btn btn-info'data-id='"+value.idtype+"' data-name='"+value.nametype+"'><span class='glyphicon glyphicon-edit'></span> แก้ไข</button>";

tr = tr + "<button class='deltype btn btn-danger'data-id='"+value.idtype+"' data-name='"+value.nametype+"'  <span class='glyphicon glyphicon-trash'></span> ลบ</button></td>";

      tr = tr + "</tr>";



          $('#bodytype').append(tr);

        });

});

    }

viewDatagrade();
    function viewDatagrade(){

  $.ajax({
      url: 'crudgrade',
      method: 'POST',
          dataType: 'html',
          data: {
        'action':'view',}

  }).done(function(data){

   var servers = $.parseJSON(data);


           $("#bodyGrade").empty();

          $.each(servers, function(index, value) {

            var tr = "<tr>";
            tr = tr + "<td>" +value.idGrade+ "</td>";
            tr = tr + "<td>" +value.nameGrade+ "</td>";
            tr = tr + "<td>" +value.idtype+ "</td>";







  tr = tr + "<td><button class='editgrade btn btn-info'data-id='"+value.idGrade+"' data-name='"+value.nameGrade+"' data-type='"+value.idtype+"'><span class='glyphicon glyphicon-edit'></span> แก้ไข</button>";

  tr = tr + "<button class='delgrade btn btn-danger'data-id='"+value.idGrade+"' data-name='"+value.nameGrade+"'  data-type='"+value.idtype+"' <span class='glyphicon glyphicon-trash'></span> ลบ</button></td>";

        tr = tr + "</tr>";



            $('#bodyGrade').append(tr);

          });

  });

      }









    function viewDatasubject(){

  $.ajax({
      url: 'crumsubject',
      method: 'POST',
          dataType: 'html',
          data: {
        'action':'view',}

  }).done(function(data){

   var servers = $.parseJSON(data);


           $("#bodysubject").empty();

          $.each(servers, function(index, value) {

            var tr = "<tr>";
            tr = tr + "<td>" +value.idcourse+ "</td>";
            tr = tr + "<td>" +value.name+ "</td>";
            tr = tr + "<td>" +value.course_detail+ "</td>";

            // tr = tr + "<td>" + value.amount_courses + "</td>";
            // tr = tr + "<td>" + value.per_round + "</td>";
            // tr = tr + "<td>" + value.Time_length + "</td>";
            // tr = tr + "<td>" + value.price + "</td>";
            // tr = tr + "<td>" + value.note + "</td>";
            // tr = tr + "<td>" + value.nametype + "</td>";





tr = tr + "<td><button style='background: #25a8e0; border-color: #25a8e0; Color:#000;' class='edit btn btn-info'data-info='"+value.idcourse+","+value.name+","+value.amount_courses+","+value.per_round+","+value.Time_length+","+value.price+","+value.note+","+value.idtype+","+value.course_detail+"'><span class='glyphicon glyphicon-edit'></span> แก้ไข</button>  &nbsp;";

tr = tr + "<button style='background: #ef67a7; border-color: #ef67a7; Color:#000;' class='delete btn btn-danger'data-info='"+value.idcourse+","+value.name+","+value.amount_courses+","+value.per_round+","+value.Time_length+","+value.price+","+value.note+","+value.idtype+","+value.course_detail+"'>  <span class='glyphicon glyphicon-trash'></span> ลบ</button></td>";

        tr = tr + "</tr>";



            $('#bodysubject').append(tr);

          });

  });

      }





  $(document).on('click', '#submit_addsubject', function() {

    var strg ="";
    var num = 0 ;
    var datatest = "";
    var array = [];
    $("input:checkbox[name=Grade]:checked").each(function() {






var  k = 1;

      while (document.getElementById($(this).val()+"amount_"+k)!=undefined) {
        var  data4 = document.getElementById($(this).val()+"amount_"+k).value;

  datatest += "&amount"+$(this).val()+"_"+k+"="+data4 ;

  k++;

      }

      k  = k-1;
      array.push(k)

      k = 1;
      while (document.getElementById($(this).val()+"per_round_"+k)!=undefined) {
        var  data5 = document.getElementById($(this).val()+"per_round_"+k).value;

        var  mm = document.getElementById($(this).val()+"per_roundm_"+k).value;


  datatest += "&per_round"+$(this).val()+"_"+k+"="+data5+":"+mm ;
  k++;
      }
      k = 1;
      while (document.getElementById($(this).val()+"Time_length_"+k)!=undefined) {
        var  data6 = document.getElementById($(this).val()+"Time_length_"+k).value;

  var mm  = $("input[name='"+$(this).val()+"Time_lengthm_"+k+"']:checked").val();

    datatest += "&Time_length"+$(this).val()+"_"+k+"="+data6+" "+mm ;
    k++;
      }
      k = 1;
      while (document.getElementById($(this).val()+"price_"+k)!=undefined) {
        var  data7 = document.getElementById($(this).val()+"price_"+k).value;

    datatest += "&price"+$(this).val()+"_"+k+"="+data7 ;
    k++;
      }
      k = 1;
      while (document.getElementById($(this).val()+"note_"+k)!=undefined) {
        var  data8 = document.getElementById($(this).val()+"note_"+k).value;

    datatest += "&note"+$(this).val()+"_"+k+"="+data8 ;
    k++;
      }




      if(num==0){

        strg  = $(this).val();


      }else{

        strg  += ","+$(this).val();


      }

num++;

    });

  var dataString = datatest+"&action=add" + "&namesubject=" + $('#namesubject').val()  +"&idGrade="+ strg +"&array="+ array +"&detailsubject="+$('#detailsubject').val();


    $.ajax({
      type: "POST",
      url: "crumsubject",
      data: dataString,




      success: function(data) {




if(data=="addsuccess"){



  $('#modeledit').modal('hide')


viewDatasubject();

}



      }

    });




  });





  $('input[type=radio][name=optionsRadios]').change(function() {
getgrade()

  });

      function getgrade() {


        $.ajax({
          type: "POST",
          url: "getgrade",
          data: {'idGrade': $("input[name='optionsRadios']:checked").val()},
          dataType: 'html',
          success: function(data) {
            //  console.log(data);
            //  $('#getRequestData').append(data);
            var servers = $.parseJSON(data);
            //  console.log(servers);
            $("#divradiograde").empty();
              var num = 1;
            $.each(servers, function(index, value) {



              var tr = "";
              tr = tr + "<label>";


                tr = tr + " <input name='Grade' type='checkbox' value="+value.idGrade+" data-idg='"+value.idGrade+"' data-name='"+value.nameGrade+"' >";

                  tr = tr + "<button id='modalGrade"+value.idGrade+"' type='button' class='btn btn-primary plus' data-idg='"+value.idGrade+"' hidden  >+</button>";

                tr = tr + ""+value.nameGrade+"";
              tr = tr + "</label>";
              tr = tr + "<br>";
              $('#divradiograde').append(tr);

              $('#modalGrade'+value.idGrade).hide();


num++;



            });


          }

        });


      }

            // $('#myTable').DataTable();
            $(document).on('click', '.delete', function() {
  $('.modal-title').text("ลบข้อมูล");


$('#modeledit').modal('show')
      var stuff = $(this).data('info').split(',');


            $('#idsubjects').val(stuff[0]);




            $('#submit_addsubject').hide();

            $('#submit_editsubject').hide();
            $('#confirmdel').show();

            $('#inputfrom').hide();

            $('#delform').show();




            });

  var array = [[]];

            $(document).on('click', '.plus', function() {
var id = $(this).data('idg');

if(document.getElementById("modeledit"+id)==undefined){




  var tr = "<div class='modal fade' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'  id='modeledit"+id+"'>"

    tr = tr + "<div class='modal-dialog' role='document'>";
    tr = tr + "<div class='modal-content'>";
    tr = tr + "<div class='modal-header'>";
    tr = tr + " <h5 class='modal-title2' id='exampleModalLabel'>กำหนดรายละเอียด</h5>";
    tr = tr + " <nav aria-label='...'>";
    tr = tr + "<ul class='pagination pagination-sm bodypagin"+id+"'>";
    tr = tr + "<li class='page-item active' id='"+id+"page1' data-idtab='1' data-id='"+id+"'>";
    tr = tr + " <a class='page-link' href='#' tabindex='-1'>1</a>";
    tr = tr + "</li>";
    tr = tr + "</ul>";
    tr = tr + "<ul class='pagination pagination-sm'>";
    tr = tr + "<li class='page-item2'>";
    tr = tr + "<a class='page-link plussequence' data-idg='"+id+"'  href='#'>+</a>";
    tr = tr + "</li>";
    tr = tr + "</ul>";
    tr = tr + "</nav>";
    tr = tr + "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
    tr = tr + " <span aria-hidden='true'>&times;</span>";
    tr = tr + " </button>";
    tr = tr + "</div>";
    tr = tr + "<div class='modal-body' id='bodyfrom"+id+"'>";

    tr = tr +"<input type='text' class='hidden' value='2' id='idhidden"+id+"'>";


      tr = tr +"<form class='form-horizontal style-form fm' method='get' id='"+id+"inputfrom_1'>";

      tr = tr +"<div class='form-group'>";
      tr = tr + "  <label class='col-sm-2 col-sm-2 control-label'>จำนวนคอร์ส</label>";
      tr = tr + "   <div class='col-sm-10'>";

      tr = tr + "   <input type='number'  max='50' min='0'  class='form-control' id='"+id+"amount_1'>";


      tr = tr + " </div>";

      tr = tr + " </div>";



      tr = tr +"<div class='form-group'>";
      tr = tr + "  <label class='col-sm-2 col-sm-2 control-label'>ระยะเวลาต่อรอบ</label>";
      tr = tr + "   <div class='col-sm-2'>";

      tr = tr + "    <input type='number' max='12' min='0' class='form-control' id='"+id+"per_round_1'> ชั่วโมง";


      tr = tr + " </div>";

      tr = tr + "   <div class='col-sm-2'>";


      tr = tr + "    <input type='number' max='60' min='0'  class='form-control' id='"+id+"per_roundm_1' value='00'> นาที";

      tr = tr + " </div>";
      tr = tr + " </div>";


      tr = tr +"<div class='form-group'>";
      tr = tr + "  <label class='col-sm-2 col-sm-2 control-label'>ระยะเวลา</label>";
      tr = tr + "   <div class='col-sm-10'>";

      tr = tr + "    <input type='number' max='12' min='0'  class='form-control' id='"+id+"Time_length_1'><br />";

      tr = tr + "เดือน <input type='radio' name='"+id+"Time_lengthm_1' value='เดือน' required>";
      tr = tr + "เดือนครึ่ง  <input type='radio' name='"+id+"Time_lengthm_1' value='เดือนครึ่ง' required>";

      tr = tr + " </div>";


      tr = tr + " </div>";




      tr = tr +"<div class='form-group'>";
      tr = tr + "  <label class='col-sm-2 col-sm-2 control-label'>ราคา</label>";
      tr = tr + "   <div class='col-sm-10'>";

      tr = tr + "    <input type='number' max='999999' min='0'  class='form-control' id='"+id+"price_1'>";

      tr = tr + " </div>";

      tr = tr + " </div>";



      tr = tr +"<div class='form-group'>";
      tr = tr + "  <label class='col-sm-2 col-sm-2 control-label'>โน๊ต</label>";
      tr = tr + "   <div class='col-sm-10'>";

      tr = tr + "    <input type='text' class='form-control' id='"+id+"note_1'>";

      tr = tr + " </div>";

      tr = tr + " </div>";



      tr = tr + " </form>";


    tr = tr + "</div>";
    tr = tr + " <div class='modal-footer'>";
    tr = tr + "<button type='button' class='btn btn-secondary' data-dismiss='modal'>ปิด</button>";
    tr = tr + "</div>";
    tr = tr + "</div>";
    tr = tr + "</div>";
    tr = tr + "</div>";






    $('.allmodal').append(tr);

}

  $('#modeledit'+id).modal('show')

            });


              $(document).on('change', "input[name='Grade']", function() {
                if(this.checked) {
                  // checkbox is checked
                  $('#modalGrade'+$(this).data('idg')).show();
                  $('.modal-title2').text(""+$(this).data('name'));



                }else{


                    $('#modalGrade'+$(this).data('idg')).hide();
                }
            });

            $(document).on('click', ".plussequence", function() {


var id = $(this).data('idg');

var n = $('#idhidden'+id).val();

var tr = " <li class='page-item p"+n+"'data-idtab='"+n+"' id='"+id+"page"+n+"'  data-id='"+id+"'><a class='page-link' href='#' >"+n+"</a></li>"

  $('.bodypagin'+id).append(tr);


     tr = "<form class='form-horizontal style-form fm' method='get' id='"+id+"inputfrom_"+n+"' hidden>";

  tr = tr +"<div class='form-group'>";
  tr = tr + "  <label class='col-sm-2 col-sm-2 control-label'>จำนวนคอร์ส</label>";
  tr = tr + "   <div class='col-sm-10'>";

  tr = tr + "   <input type='number' max='50' min='0'  class='form-control' id='"+id+"amount_"+n+"'>";


  tr = tr + " </div>";

  tr = tr + " </div>";



  tr = tr +"<div class='form-group'>";
  tr = tr + "  <label class='col-sm-2 col-sm-2 control-label'>ระยะเวลาต่อรอบ</label>";
  tr = tr + "   <div class='col-sm-2'>";

  tr = tr + "    <input type='number' max='12' min='0'  class='form-control' id='"+id+"per_round_"+n+"'> ชั่วโมง";


  tr = tr + " </div>";
  tr = tr + "   <div class='col-sm-2'>";


  tr = tr + "    <input type='number' max='60' min='0'  class='form-control' id='"+id+"per_roundm_"+n+"' value='00'> นาที";

  tr = tr + " </div>";
  tr = tr + " </div>";


  tr = tr +"<div class='form-group'>";
  tr = tr + "  <label class='col-sm-2 col-sm-2 control-label'>ระยะเวลา</label>";
  tr = tr + "   <div class='col-sm-10'>";

  tr = tr + "    <input type='number' max='12' min='0'  class='form-control' id='"+id+"Time_length_"+n+"'><br />";

  tr = tr + "เดือน <input type='radio' name='"+id+"Time_lengthm_"+n+"' value='เดือน' required>";
  tr = tr + "เดือนครึ่ง  <input type='radio' name='"+id+"Time_lengthm_"+n+"' value='เดือนครึ่ง' required>";

  tr = tr + " </div>";

  tr = tr + " </div>";


  tr = tr +"<div class='form-group'>";
  tr = tr + "  <label class='col-sm-2 col-sm-2 control-label'>ราคา</label>";
  tr = tr + "   <div class='col-sm-10'>";

  tr = tr + "    <input type='number' max='999999' min='0'  class='form-control' id='"+id+"price_"+n+"'>";

  tr = tr + " </div>";

  tr = tr + " </div>";



  tr = tr +"<div class='form-group'>";
  tr = tr + "  <label class='col-sm-2 col-sm-2 control-label'>โน๊ต</label>";
  tr = tr + "   <div class='col-sm-10'>";

  tr = tr + "    <input type='text' class='form-control' id='"+id+"note_"+n+"'>";

  tr = tr + " </div>";

  tr = tr + " </div>";



  tr = tr + " </form>";

n = parseInt(n)+1;

$('#idhidden'+id).val(n);

$('#bodyfrom'+id).append(tr);


  n++;

          });


          $(document).on('click', ".page-item", function() {



            $('.page-item').removeClass('active');

            $('.p'+$(this).data('idtab')).addClass('active');

            $('.fm').hide();

            $('#'+$(this).data('id')+'inputfrom_'+$(this).data('idtab')).show();




        });


            $(document).on('click', '#addsubject', function() {


              $('.modal-title').text("เพิ่มข้อมูล");

$('#modeledit').modal('show')
$('#inputfrom').show();
$('#delform').hide();


 $('#submit_addsubject').show();

 $('#submit_editsubject').hide();
 $('#confirmdel').hide();




               $('#idsubjects').val('');
              $('#namesubject').val('');
              $('#detailsubject').val('');

              $('#amount').val('');
              $('#per_round').val('');
              $('#Time_length').val('');
              $('#price').val('');
              $('#note').val('');



              $("input[name='optionsRadios']").prop("checked",false);
              getgrade();


              $("input[name='Grade']").prop("checked",false);



$('.allmodal').empty();


            });




$(document).on('click', '.edit', function() {

  $('.modal-title').text("แก้ไขข้อมูล");

  $('.allmodal').empty();

 $('#submit_addsubject').hide();
 $('#confirmdel').hide();

 $('#inputfrom').show();

 $('#submit_editsubject').show();

 $('#delform').hide();

$('#modeledit').modal('show')
//
//
  var stuff = $(this).data('info').split(',');


              $('#idsubjects').val(stuff[0]);
             $('#namesubject').val(stuff[1]);
             $('#amount').val(stuff[2]);
             $('#per_round').val(stuff[3]);
             $('#Time_length').val(stuff[4]);
             $('#price').val(stuff[5]);
             $('#note').val(stuff[6]);

             $('#detailsubject').val(stuff[8]);




$("input[name='optionsRadios'][value='"+stuff[7]+"']").prop("checked",true);
getgrade();




$.ajax({
  type: "POST",
  url: "getgradesubjects",
  data: {

  'idsubjects':stuff[0],

  },
  dataType: 'html',
  success: function(data) {

    var servers = $.parseJSON(data);
    var id = "";
    var id2 = "";
    var n = 2;
    $.each(servers, function(index, value) {



      $("input[name='Grade'][value='"+value.idGrade+"']").prop("checked",true);

id = value.idGrade  ;


if(id2==id){



  var tr = " <li class='page-item p"+n+"'data-idtab='"+n+"' id='"+id+"page"+n+"'  data-id='"+id+"'><a class='page-link' href='#' >"+n+"</a></li>"

    $('.bodypagin'+id).append(tr);


       tr = "<form class='form-horizontal style-form fm' method='get' id='"+id+"inputfrom_"+n+"' hidden>";

    tr = tr +"<div class='form-group'>";
    tr = tr + "  <label class='col-sm-2 col-sm-2 control-label'>จำนวนคอร์ส</label>";
    tr = tr + "   <div class='col-sm-10'>";

    tr = tr + "   <input type='number' max='50' min='0'  class='form-control' id='"+id+"amount_"+n+"' value='"+value.amount_courses+"'>";

    tr = tr +"<input type='text' class='hidden' value='"+value.Idcourse_detail+"' id='idmanygrade"+id+"_"+n+"'>";


    tr = tr + " </div>";

    tr = tr + " </div>";



    tr = tr +"<div class='form-group'>";
    tr = tr + "  <label class='col-sm-2 col-sm-2 control-label'>ระยะเวลาต่อรอบ</label>";
    tr = tr + "   <div class='col-sm-2'>";

    var str = value.per_round;
       var res = str.split(":");


    tr = tr + "    <input type='number' max='12' min='0'   class='form-control' id='"+id+"per_round_"+n+"' value='"+res[0]+"'> ชั่วโมง";


    tr = tr + " </div>";
    tr = tr + "   <div class='col-sm-2'>";


    tr = tr + "    <input type='number' max='60' min='0'  class='form-control' id='"+id+"per_roundm_"+n+"' value='"+res[1]+"'> นาที";

    tr = tr + " </div>";
    tr = tr + " </div>";


    tr = tr +"<div class='form-group'>";
    tr = tr + "  <label class='col-sm-2 col-sm-2 control-label'>ระยะเวลา</label>";
    tr = tr + "   <div class='col-sm-10'>";

    var str = value.Time_length;
       var res = str.split(" ");


    tr = tr + "    <input type='number' max='12' min='0'  class='form-control' id='"+id+"Time_length_"+n+"' value='"+res[0]+"'><br />";



    if(res[1]=='เดือนครึ่ง'){

      tr = tr + "เดือน <input type='radio' name='"+id+"Time_lengthm_"+n+"' value='เดือน'   >";
      tr = tr + "เดือนครึ่ง  <input type='radio' name='"+id+"Time_lengthm_"+n+"'  value='เดือนครึ่ง' checked required>";

    }else{

      tr = tr + "เดือน <input type='radio' name='"+id+"Time_lengthm_"+n+"' value='เดือน' checked required>";
      tr = tr + "เดือนครึ่ง  <input type='radio' name='"+id+"Time_lengthm_"+n+"'  value='เดือนครึ่ง' required>";

    }

    tr = tr + " </div>";

    tr = tr + " </div>";


    tr = tr +"<div class='form-group'>";
    tr = tr + "  <label class='col-sm-2 col-sm-2 control-label'>ราคา</label>";
    tr = tr + "   <div class='col-sm-10'>";

    tr = tr + "    <input type='number' max='999999' min='0'  class='form-control' id='"+id+"price_"+n+"' value='"+value.price+"'>";

    tr = tr + " </div>";

    tr = tr + " </div>";



    tr = tr +"<div class='form-group'>";
    tr = tr + "  <label class='col-sm-2 col-sm-2 control-label'>โน๊ต</label>";
    tr = tr + "   <div class='col-sm-10'>";

    tr = tr + "    <input type='text' class='form-control' id='"+id+"note_"+n+"' value='"+value.note+"'>";

    tr = tr + " </div>";

    tr = tr + " </div>";



    tr = tr + " </form>";

  n = parseInt(n)+1;

  $('#idhidden'+id).val(n);

  $('#bodyfrom'+id).append(tr);





}else{



  var tr = "<div class='modal fade' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'  id='modeledit"+id+"'>"

    tr = tr + "<div class='modal-dialog' role='document'>";
    tr = tr + "<div class='modal-content'>";
    tr = tr + "<div class='modal-header'>";
    tr = tr + " <h5 class='modal-title2' id='exampleModalLabel'>กำหนดรายละเอียด</h5>";
    tr = tr + " <nav aria-label='...'>";
    tr = tr + "<ul class='pagination pagination-sm bodypagin"+id+"'>";
    tr = tr + "<li class='page-item active' id='"+id+"page1' data-idtab='1' data-id='"+id+"'>";
    tr = tr + " <a class='page-link' href='#' tabindex='-1'>1</a>";
    tr = tr + "</li>";
    tr = tr + "</ul>";
    tr = tr + "<ul class='pagination pagination-sm'>";
    tr = tr + "<li class='page-item2'>";
    tr = tr + "<a class='page-link plussequence' data-idg='"+id+"'  href='#'>+</a>";
    tr = tr + "</li>";
    tr = tr + "</ul>";
    tr = tr + "</nav>";
    tr = tr + "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
    tr = tr + " <span aria-hidden='true'>&times;</span>";
    tr = tr + " </button>";
    tr = tr + "</div>";
    tr = tr + "<div class='modal-body' id='bodyfrom"+id+"'>";

    tr = tr +"<input type='text' class='hidden' value='2' id='idhidden"+id+"'>";

    tr = tr +"<input type='text' class='hidden' value='"+value.Idcourse_detail+"' id='idmanygrade"+id+"_"+1+"'>";



      tr = tr +"<form class='form-horizontal style-form fm' method='get' id='"+id+"inputfrom_1'>";

      tr = tr +"<div class='form-group'>";
      tr = tr + "  <label class='col-sm-2 col-sm-2 control-label'>จำนวนคอร์ส</label>";
      tr = tr + "   <div class='col-sm-10'>";

      tr = tr + "   <input type='number' max='50' min='0'  class='form-control' id='"+id+"amount_1' value='"+value.amount_courses+"'>";


      tr = tr + " </div>";

      tr = tr + " </div>";



      tr = tr +"<div class='form-group'>";
      tr = tr + "  <label class='col-sm-2 col-sm-2 control-label'>ระยะเวลาต่อรอบ</label>";
      tr = tr + "   <div class='col-sm-2'>";
      var str = value.per_round;
         var res = str.split(":");

      tr = tr + "    <input type='number' max='12' min='0'  class='form-control' id='"+id+"per_round_1' value='"+res[0]+"'> ชั่วโมง";

      tr = tr + " </div>";

      tr = tr + "   <div class='col-sm-2'>";


      tr = tr + "    <input type='number' max='60' min='0'  class='form-control' id='"+id+"per_roundm_1' value='"+res[1]+"'> นาที";

      tr = tr + " </div>";

      tr = tr + " </div>";


      tr = tr +"<div class='form-group'>";
      tr = tr + "  <label class='col-sm-2 col-sm-2 control-label'>ระยะเวลา</label>";
      tr = tr + "   <div class='col-sm-10'>";

      var str = value.Time_length;
         var res = str.split(" ");



      tr = tr + "    <input type='number' max='12' min='0'  class='form-control' id='"+id+"Time_length_1' value='"+res[0]+"'><br />";
if(res[1]=='เดือนครึ่ง'){

  tr = tr + "เดือน <input type='radio' name='"+id+"Time_lengthm_1' value='เดือน'   >";
  tr = tr + "เดือนครึ่ง  <input type='radio' name='"+id+"Time_lengthm_1'  value='เดือนครึ่ง' checked required>";

}else{

  tr = tr + "เดือน <input type='radio' name='"+id+"Time_lengthm_1' value='เดือน' checked required>";
  tr = tr + "เดือนครึ่ง  <input type='radio' name='"+id+"Time_lengthm_1'  value='เดือนครึ่ง' required>";

}




      tr = tr + " </div>";

      tr = tr + " </div>";


      tr = tr +"<div class='form-group'>";
      tr = tr + "  <label class='col-sm-2 col-sm-2 control-label'>ราคา</label>";
      tr = tr + "   <div class='col-sm-10'>";

      tr = tr + "    <input type='number' max='999999' min='0'  class='form-control' id='"+id+"price_1' value='"+value.price+"'>";

      tr = tr + " </div>";

      tr = tr + " </div>";



      tr = tr +"<div class='form-group'>";
      tr = tr + "  <label class='col-sm-2 col-sm-2 control-label'>โน๊ต</label>";
      tr = tr + "   <div class='col-sm-10'>";

      tr = tr + "    <input type='text' class='form-control' id='"+id+"note_1' value='"+value.note+"'>";

      tr = tr + " </div>";

      tr = tr + " </div>";



      tr = tr + " </form>";


    tr = tr + "</div>";
    tr = tr + " <div class='modal-footer'>";
    tr = tr + "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
    tr = tr + "</div>";
    tr = tr + "</div>";
    tr = tr + "</div>";
    tr = tr + "</div>";




    $('.allmodal').append(tr);


}
id2 = value.idGrade;






    });

    $("input:checkbox[name=Grade]:checked").each(function() {





      $('#modalGrade'+$(this).val()).show();

    });


  }
});








    });



$(document).on('click', '#submit_editsubject', function() {


      var strg ="";
      var num = 0 ;
      var datatest = "";
      var array = [];
      $("input:checkbox[name=Grade]:checked").each(function() {






  var  k = 1;

        while (document.getElementById($(this).val()+"amount_"+k)!=undefined) {
          var  data4 = document.getElementById($(this).val()+"amount_"+k).value;

    datatest += "&amount"+$(this).val()+"_"+k+"="+data4 ;

    k++;

        }

        k  = k-1;
        array.push(k)

        k = 1;
        while (document.getElementById($(this).val()+"per_round_"+k)!=undefined) {
          var  data5 = document.getElementById($(this).val()+"per_round_"+k).value;

    var  mm = document.getElementById($(this).val()+"per_roundm_"+k).value;


    datatest += "&per_round"+$(this).val()+"_"+k+"="+data5+":"+mm ;
    k++;
        }
        k = 1;
        while (document.getElementById($(this).val()+"Time_length_"+k)!=undefined) {
          var  data6 = document.getElementById($(this).val()+"Time_length_"+k).value;

          var mm  = $("input[name='"+$(this).val()+"Time_lengthm_"+k+"']:checked").val();

            datatest += "&Time_length"+$(this).val()+"_"+k+"="+data6+" "+mm ;


      k++;
        }
        k = 1;
        while (document.getElementById($(this).val()+"price_"+k)!=undefined) {
          var  data7 = document.getElementById($(this).val()+"price_"+k).value;

      datatest += "&price"+$(this).val()+"_"+k+"="+data7 ;
      k++;
        }
        k = 1;
        while (document.getElementById($(this).val()+"note_"+k)!=undefined) {
          var  data8 = document.getElementById($(this).val()+"note_"+k).value;

      datatest += "&note"+$(this).val()+"_"+k+"="+data8 ;
      k++;
        }



        k = 1;
        while (document.getElementById('idmanygrade'+$(this).val()+"_"+k)!=undefined) {
          var  data9 = document.getElementById('idmanygrade'+$(this).val()+"_"+k).value;

          datatest += "&idmanygrade"+$(this).val()+"_"+k+"="+data9 ;

      k++;
        }




        if(num==0){

          strg  = $(this).val();


        }else{

          strg  += ","+$(this).val();


        }

  num++;

      });

    var dataString = datatest+"&action=edit" + "&namesubject=" + $('#namesubject').val()  +"&idGrade="+ strg +"&array="+ array +"&idsubjects="+ $('#idsubjects').val()+"&detailsubject="+$('#detailsubject').val();;


      $.ajax({
        type: "POST",
        url: "crumsubject",
        data: dataString,


        success: function(data) {



  if(data=="editsuccess"){

    $('#modeledit').modal('hide')


  viewDatasubject();

  }



        }

      });



     });


     $(document).on('click', '#confirmdel', function() {


       $.ajax({
         type: "POST",
         url: "crumsubject",
         data: {
           'action':'del',
           'idsubjects': $('#idsubjects').val(),


         },

         success: function(data) {



     if(data=="deletesuccess"){

       $('#modeledit').modal('hide')


viewDatasubject();
     }


         }
       });

          });

});
