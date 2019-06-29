$(document).ready(function() {


loadsubject() ;
	function loadsubject() {

    if($("#who").val()=="tutor"){

      $.ajax({
    		type: "POST",
    		url: "subject_to_tutor",
    			data: {

    				'id':$('#id').val(),


    		},
    		dataType: 'html',


    		success: function(data) {
    			var servers = $.parseJSON(data);
    			var num= 0;
    	$.each(servers, function(index, value) {

    	if(num==0){

    	$('#subject').append(value.name);


    	}else{
    	$('#subject').append("และ"+value.name);


    	}
    	num++;


    	});




    		}

    	});

    }else{


    }

	}







  $(document).on('click', '#submitedit', function() {


    var sex;
    if(document.getElementById("group1.1").checked){

    sex = 'male';

    }else if(document.getElementById("group1.2").checked){

    sex = 'female';

    }
    $.ajax({
      type: "POST",
      url: "crumuser",
        data: {

          'action': 'edit',
          'id':$('#id').val(),
          'who':$('#who').val(),


          'username':$('#username').val(),
          'password':$('#passwordw').val(),
        'firstname':$('#firstname').val(),
        'lastname':$('#lastname').val(),
        'phone':$('#phone').val(),
        'email':$('#email2').val(),
        'age':$('#age').val(),
        'sex':sex,
        'address':$('#address').val(),



      },
      dataType: "Json",


      success: function(data) {

if(data=="Success"){


  location.reload();

}





      }

    });


});





});
