jQuery(document).ready(function(){


viewDatastopic();

  $(document).on('click', '#addtopic', function() {




$('#modaltopic').show();

});
$(document).on('click', '#addddd', function() {




      $.ajax({
        url: 'crudtopic',
        method: 'POST',
            dataType: 'html',
            data:{
              'action':'add',
              'Topics':$('#texttop').val(),
              'Content':$('#textdetail').val(),

            }


      }).done(function(data){

location.reload();


});




});




function viewDatastopic(){

  $.ajax({
    url: 'crudtopic',
    method: 'POST',
        dataType: 'html',
        data:{
          'action':'view',


        }


  }).done(function(data){


     var servers = $.parseJSON(data);


             $(".bodytopic").empty();

            $.each(servers, function(index, value) {


              var tr ="";

              tr = tr + "  	<div class='list-group'>";
              tr = tr + "<a href='webboarddetail"+value.idboard+"' class='list-group-item list-group-item-action flex-column align-items-start'>";
              tr = tr + "<div class='d-flex w-100 justify-content-between'>";
              tr = tr + "	<h5 class='mb-1'>"+value.Topics+"</h5>";
              tr = tr + "	</div>";
              tr = tr + "	</a>";

              tr = tr + "	</div>";




              $('.bodytopic').append(tr);

            });

});
}




});
