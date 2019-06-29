$(document).ready(function() {



  $(document).on('click', '#add', function() {
  $('.modal-title').text("เพิ่มข้อมูล");
    $('#ee1').text("");

    $('#ee2').text("");

    $('#ee3').text("");

    $('#newsmodal').modal('show')
$('#Topics').val("");
$('#Content').val("");
$('#PIC').val("");

$('.bodyadd').show();
$('.bodydel').hide();

$('.delmodal').hide();
$('.editmodal').hide();
$('.addmodal').show();
});

  $(document).on('click', '.edit', function() {
    $('#ee1').text("");

    $('#ee2').text("");

    $('#ee3').text("");

  $('.modal-title').text("แก้ไขข้อมูล");
  var  stuff = $(this).data('info').split(',');


    $('#newsmodal').modal('show')

    $('#idhiden').val(stuff[0]);


    $('#Topics').val(stuff[1]);
    $('#Content').val(stuff[2]);
    $('#PIC').val("");


    $('.bodyadd').show();
    $('.bodydel').hide();

    $('.delmodal').hide();
    $('.editmodal').show();
    $('.addmodal').hide();
});


  $(document).on('click', '.delete', function() {


          $('.modal-title').text("ลบข้อมูล");



    $('.bodyadd').hide();
    $('.bodydel').show();







  $('.delmodal').show();
  $('.editmodal').hide();
  $('.addmodal').hide();


    $('#newsmodal').modal('show');
    var  stuff = $(this).data('info').split(',');
    $('#idhiden').val(stuff[0]);


    $('#idpic').val(stuff[4]);


});


$(document).on('click', '.addmodal', function() {



  var pic = $('#PIC');



  var formData = new FormData();
  formData.append('pic', pic[0].files[0]);

  formData.append('Topics',$('#Topics').val());
  formData.append('Content',$('#Content').val());
  formData.append('action','add');




  $.ajax({
    method: 'post',
    dataType: 'json',
    url: "crudNews",
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
          $('#ee1').text(data.errors.Topics);
          $('#ee2').text("");
          $('#ee2').text(data.errors.Content);
          $('#ee3').text("");
          $('#ee3').text(data.errors.pic);

        }else{

if(data=="Success"){

            $('#ee1').text("");

            $('#ee2').text("");

            $('#ee3').text("");

  $('#newsmodal').modal('hide');
  viewDatanews();
}


}

    }
  });








});


$(document).on('click', '.editmodal', function() {





    var pic = $('#PIC');



    var formData = new FormData();
    formData.append('pic', pic[0].files[0]);

    formData.append('id',$('#idhiden').val());
    formData.append('Topics',$('#Topics').val());
    formData.append('Content',$('#Content').val());
    formData.append('action','edit');




    $.ajax({
      method: 'post',
      dataType: 'json',
      url: "crudNews",
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
            $('#ee1').text(data.errors.Topics);
            $('#ee2').text("");
            $('#ee2').text(data.errors.Content);
            $('#ee3').text("");
            $('#ee3').text(data.errors.pic);

          }else{

  if(data=="Success"){
    $('#ee1').text("");

    $('#ee2').text("");

    $('#ee3').text("");


    $('#newsmodal').modal('hide');
  viewDatanews();
  }
}

      }
    });



});

$(document).on('click', '.delmodal', function() {



      $.ajax({
        type: "POST",
        url: "crudNews",
        data: {
'action':'del',
        'id':$('#idhiden').val(),
        'pic':$('#idpic').val(),

        // 'iddetail': $("input[name='groupbuy']:checked").val(),


        },
        dataType: 'html',
        success: function(data) {

          $('#newsmodal').modal('hide');
  viewDatanews();

        }

      });


});







  viewDatanews();
    function viewDatanews(){




      $.ajax({
        url: 'crudNews',
        method: 'POST',
            dataType: 'html',
            data:{
              'action':'view',

            }


      }).done(function(data){


      var servers = $.parseJSON(data);



      $('#bodynews').empty();


            $.each(servers, function(index, value) {


              var tr = "<tr>";
              tr = tr + "<td>" +value.id_news+ "</td>";
              tr = tr + "<td>" + value.Topics + "</td>";
              if(value.Content){

                tr = tr + "<td>" + value.Content + "</td>";

              }else{
                tr = tr + "<td> - </td>";

              }
              tr = tr + "<td>" + value.idemp + "</td>";
              tr = tr + "<td>" + value.updated_at + "</td>";

              tr = tr + "<td>" + value.created_at + "</td>";


              //
              tr = tr + "<td><button style='background: #25a8e0; color: #000000;' class='edit btn 'data-info='"+value.id_news+","+value.Topics+","+value.Content+","+value.idemp+","+value.pic+"'><span class='glyphicon glyphicon-edit'></span> แก้ไข</button>";

              tr = tr + "<button   style='background: #ef67a7; color: #000000;' class='delete btn 'data-info='"+value.id_news+","+value.Topics+","+value.Content+","+value.idemp+","+value.pic+"'><span class='glyphicon glyphicon-trash'></span>  ลบ  </button></td>";


              tr = tr + "</tr>";
              $('#bodynews').append(tr);


            });

      });




    }


});
