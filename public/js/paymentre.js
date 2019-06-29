
$(document).ready(function() {




  viewData();

  function viewData(){

$.ajax({
    url: 'getDatapaymentre',
    method: 'GET',
        dataType: 'html',


}).done(function(data){

 var servers = $.parseJSON(data);
$("#datapay").empty();

        $.each(servers, function(index, value) {




          var tr = "<tr>";
          tr = tr + "<td style='border-color:#000000;'>" +value.idpay_reserve+ "</td>";
          tr = tr + "<td style='border-color:#000000;'>" +value.name+ "</td>";
          tr = tr + "<td style='border-color:#000000;'>" +value.firstname+"  "+value.lastname+ "</td>";


if(value.datetime == null){

  tr = tr + "<td style='border-color:#000000;'>" + "-" + "</td>";

}else{
  tr = tr + "<td style='border-color:#000000;'>" + value.datetime + "</td>";

}
if(value.img == null){

  tr = tr + "<td style='border-color:#000000;'>" + "-" + "</td>";

}else{
  tr = tr + "<td style='border-color:#000000;'>" + value.img + "</td>";

}


          tr = tr + "<td style='border-color:#000000;'>" + value.status + "</td>";

if(value.status == "ผ่านการตรวจสอบ"||value.status == "ไม่ผ่านการตรวจสอบ"){
  tr = tr + "<td style='border-color:#000000;'></td>";

}else if(value.status == "ยังไม่ได้ชำระเงิน"){

  tr = tr + "<td style='border-color:#000000;'></td>";

}else{
  tr = tr + "<td style='border-color:#000000;'><button type='button' class='btn btn-primary view' data-img='"+value.img+"' data-id='"+value.idpay_reserve+"'><i class='fas fa-check'></i></button></td>";

}



          tr = tr + "</tr>";
          $('#datapay').append(tr);

        });


});

    }


    $(document).on('click', '.view', function() {


      $('#checkmodal').modal('show')

document.getElementById("img").src="storage/payment_reser/"+$(this).data('img');



$('#idpayre').val($(this).data('id'));


         });
         $(document).on('click', '#confirm', function() {


           $.ajax({
             type: "POST",
             url: "actioncheckpayre",
             data: {
               'action':'pass',
             'id':$('#idpayre').val(),

             },

             success: function(data) {



         if(data=="Success"){

           viewData();
           $('#checkmodal').modal('hide')


         }


             }
           });

              });
         $(document).on('click', '#confirmno', function() {



           $.ajax({
             type: "POST",
             url: "actioncheckpayre",
             data: {
               'action':'nopass',
             'id':$('#idpayre').val(),

             },

             success: function(data) {



         if(data=="Success"){

           viewData();
           $('#checkmodal').modal('hide')


         }


             }
           });

              });
});
