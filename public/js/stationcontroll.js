
$(document).ready(function() {

  viewData2();

  function viewData2(){

$.ajax({
    url: 'getstation',
    method: 'get',
    data: {

    },

        dataType: 'html',


}).done(function(data){
   var servers = $.parseJSON(data);
    $.each(servers, function(index, value) {

      if(value.name_station){

      $("#namesta").val(value.name_station);

      }

      if(value.latitude){

        $("#latitude").val(value.latitude);


      }
      if(value.longitude){


        $("#Longitude").val(value.longitude);

      }
      if(value.Singup_distance){

        $("#dis").val(value.Singup_distance);


      }

    });


});

    }


    $(document).on('click', '.save', function() {

      $.ajax({
          url: 'editstation',
          method: 'POST',
              dataType: 'json',
              data: {
            'namesta':$('#namesta').val(),
            'latitude' :  $('#latitude').val(),
            'Longitude':  $('#Longitude').val(),
            'dis':  $('#dis').val(),


          }

      }).done(function(data){
$("#ee1").html("บันทึกสำเร็จ");
viewData2();

      });



});


});
