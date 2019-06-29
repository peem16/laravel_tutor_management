
$(document).ready(function() {






  $(document).on('click', '#btns', function() {


    $.ajax({
      type: "POST",
      url: "getDataresume",
      data: {
'id':$('#identification').val(),

      },

      success: function(data) {

if(data.status=="รับเข้าสมัคร"){

  $('#Resume').html('คุณ'+data.firstname+" "+data.lastname+"ผ่านการรับเลือกเข้าทำงาน  ยูเซอร์เนมของคุณคือ เลขประจำตัวประชาชน  รหัสสำหรับเข้าสู่ระบบของคุณคือ 4 ตัวหลังของเบอร์โทรศัพท์ ");

}else if(data.status=="ไม่ผ่านการตรวจสอบ"){

  $('#Resume').html('คุณ'+data.firstname+" "+data.lastname+" ไม่ผ่านการรับเลือก สาเหตุ "+data.comment+"");

}else if(data.status=="ไม่ผ่านการสมัคร"){

  $('#Resume').html('คุณ'+data.firstname+" "+data.lastname+" ไม่ผ่านการรับเลือก สาเหตุ "+data.comment+"");

}else if(data.status=="รอการตรวจสอบ"||data.status=="ผ่านการตรวจสอบ"){

  $('#Resume').html('สถานะ :รอการตรวจสอบ');


}else {

  $('#Resume').html('ค้นหาไม่พบ');


}


      }
    });


  });


});
