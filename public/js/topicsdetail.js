jQuery(document).ready(function(){

  viewDatastopicdetail();


  $(document).on('click', '#btn', function() {



    $.ajax({
      url: 'crudtopicdetail',
      method: 'POST',
          dataType: 'html',
          data:{
            'action':'add',
            'ans':$('#textans').val(),
            'id':$('#id').val(),
          }


    }).done(function(data){

  viewDatastopicdetail();
  });


});


  function viewDatastopicdetail(){



    $.ajax({
      url: 'crudtopicdetail',
      method: 'POST',
          dataType: 'html',
          data:{
            'action':'view',
            'id':$('#id').val(),

          }


    }).done(function(data){


       var servers = $.parseJSON(data);


               $(".bodywft").empty();

              $.each(servers, function(index, value) {


                var tr ="";

                tr = tr + "  	<div class='panel panel-default kkkk'>";
                tr = tr + "<div class='panel-heading'>"+value.who+"</div>";
                tr = tr + "<div class='panel-body'>";
                tr = tr + ""+value.Answer+"";
                tr = tr + "</div>";
                tr = tr + "</div>";



                $('.bodywft').append(tr);

              });

  });
  }



});
