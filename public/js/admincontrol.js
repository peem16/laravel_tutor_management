
$(document).ready(function() {


  $('#sub-menu1').addClass('active');

  //
  $('#sub1').addClass('active');









  $(document).on('click', '#addroom', function() {


    $.ajax({
      type: "POST",
      url: "getDataroom",
      data: {
        'action':'add',
        'number':$('#Number').val(),
        'amount':$('#Amount').val(),
      'description':$('#Description').val(),
      'selecttype':$('#selecttype').val(),

      },
      dataType: "json",
      success: function(data) {
if((data.numbers)){
  $('#ee1').text("");
  $('#ee1').text(data.numbers);

}

      if ((data.errors)){
        // $('.erroredit').removeClass('hidden');
        //   $('.erroredit').addClass('show');
        $('#ee1').text("");
        $('#ee1').text(data.errors.number);
        $('#ee2').text("");
        $('#ee2').text(data.errors.amount);
        $('#ee3').text("");
        $('#ee3').text(data.errors.description);
        $('#ee4').text("");
        $('#ee4').text(data.errors.selecttype);



      }else{
        //   $('.erroredit').addClass('show');

        if(data=="Success"){

          $('#ee1').text("");

          $('#ee2').text("");

          $('#ee3').text("");

          $('#ee4').text("");


          $('#Number').val('');
            $('#Amount').val('');
              $('#Description').val('');
        viewData();

        }




      }





      }
    });


  });

viewData();

  function viewData(){

$.ajax({
    url: 'getDataroom',
    method: 'POST',
        dataType: 'html',


}).done(function(data){

 var servers = $.parseJSON(data);
$("#dataroom").empty();

        $.each(servers, function(index, value) {




          var tr = "<tr>";
          tr = tr + "<td  style='border-color:#000000;'>" +value.idroom+ "</td>";
          tr = tr + "<td style='border-color:#000000;'>" + value.number + "</td>";
          tr = tr + "<td style='border-color:#000000;'>" + value.amount + "</td>";
          tr = tr + "<td style='border-color:#000000;'>" + value.description + "</td>";
          tr = tr + "<td style='border-color:#000000;'>" + value.typeroom + "</td>";
          tr = tr + "</tr>";
          $('#dataroom').append(tr);

        });
  tableData();
});

    }



function tableData(){

  $('#tableroom').Tabledit({
      url: 'getDataroom',
      eventType: 'dblclick',
      editButton: true,
      deleteButton: true,
       restoreButton: false,
       buttons: {
    edit: {
        class: 'btn btn-sm btn-success ',
        html: '<span class="glyphicon glyphicon-pencil""></span>',
        action: 'edit',
        css: 'background: #000000'

    },
    delete: {
        class: 'btn btn-sm btn-danger',
        html: '<span class="glyphicon glyphicon-trash"></span>',
        action: 'delete'
    },
    save: {
        class: 'btn btn-sm btn-success',
        html: 'Save'
    },
    restore: {
        class: 'btn btn-sm btn-warning',
        html: 'Restore',
        action: 'restore'
    },
    confirm: {
        class: 'btn btn-sm btn-danger',
        html: 'Confirm'
    }
},
      columns: {
          identifier: [0, 'idroom'],
          editable: [ [1, 'number'], [2, 'amount'],[3, 'description'],[4, 'typeroom', '{"ห้องดนตรี": "ห้องดนตรี", "ห้องเรียน": "ห้องเรียน"}']]

      },

        onSuccess: function(data, textStatus, jqXHR) {
          if ((data.errors)){
            // $('.erroredit').removeClass('hidden');
            //   $('.erroredit').addClass('show');

            var tr = "";
  if ((data.errors.number)){

tr =  data.errors.number+"<br>";

  }
  if ((data.errors.amount)){

tr =  tr+data.errors.amount+"<br>";

  }
  if ((data.errors.description)){

tr =  tr+data.errors.description+"<br>";

  }
  if ((data.errors.selecttype)){

tr =  tr+data.errors.selecttype+"<br>";

  }
            var unique_id = $.gritter.add({
                // (string | mandatory) the heading of the notification
                title: '// WARNING ',
                // (string | mandatory) the text inside the notification
                text: tr,
                // (string | optional) the image to display on the left

                // (bool | optional) if you want it to fade out on its own or just sit there
                sticky: true,
                // (int | optional) the time you want it to be alive for before fading out
                time: '',
                // (string | optional) the class name you want to apply to that specific message
                class_name: 'my-sticky-class'
            });

          }else{


              viewData();
            }
        },
        onFail: function(jqXHR, textStatus, errorThrown) {
            console.log('onFail(jqXHR, textStatus, errorThrown)');
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        },

        onAjax: function(action, serialize) {
            console.log('onAjax(action, serialize)');
            console.log(action);
            console.log(serialize);
        }
    });
}


// setInterval(viewData, 10000);


  // 1000 = 1 second



  /* later */




//
//
//     $.ajax({
//       type: "GET",
//       url: "getDataroom",
//
//       dataType: "html",
//       success: function(data) {
//         // var servers = $.parseJSON(data);
//         // console.log(servers);
//         var servers = $.parseJSON(data);
//         // console.log(servers);
//
//         if(servers != '')
//         {
//         $("#dataroom").empty();
//         $.each(servers, function(index, value) {
//
//           var tr = "<tr>";
//           tr = tr + "<td>" +value.idroom+ "</td>";
//           tr = tr + "<td>" + value.number + "</td>";
//           tr = tr + "<td>" + value.amount + "</td>";
//           tr = tr + "<td>" + value.description + "</td>";
//           tr = tr + "</tr>";
//           $('#dataroom').append(tr);
//
//         });
//
//         }
//       }
//     });
//
// }
//




});
