$(document).ready(function() {


  $(document).on('change', '#month', function() {



    $.ajax({
        url: 'getreportbuy',
        method: 'post',
        data: {
          action:"where",
          date:$('#month').val(),
        },

            dataType: 'html',


    }).done(function(data){

     var servers = $.parseJSON(data);
    $("#report").empty();


            $.each(servers, function(index, value) {




              var tr = "<tr>";



  if(value.num==null){

    tr = tr + "<td > "+value.name +"</td><td>"+value.nameGrade +"</td><td> 0 รายการ</td> ";

  } else{
    tr = tr + " <td >"+value.name +" </td><td>"+value.nameGrade +"</td><td> "+value.num +" รายการ </td>";


  }





              tr = tr + "</tr>";
              $('#report').append(tr);

            });


    });

});



  viewData();
    function viewData(){

  $.ajax({
      url: 'getreportbuy',
      method: 'post',
      data: {
        action:"all"
      },

          dataType: 'html',


  }).done(function(data){

   var servers = $.parseJSON(data);
  $("#report").empty();


          $.each(servers, function(index, value) {




            var tr = "<tr>";



if(value.num==null){

  tr = tr + "<td style='border-color:#000000;'> "+value.name +"</td><td style='border-color:#000000;'>"+value.nameGrade +"</td><td style='border-color:#000000;'> 0 รายการ</td> ";

} else{
  tr = tr + " <td style='border-color:#000000;'>"+value.name +" </td><td style='border-color:#000000;'>"+value.nameGrade +"</td><td style='border-color:#000000;'> "+value.num +" รายการ </td>";


}





            tr = tr + "</tr>";
            $('#report').append(tr);

          });


  });

      }





});
