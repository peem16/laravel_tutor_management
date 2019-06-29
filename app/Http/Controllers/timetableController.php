<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\type_course;
use App\room;
use App\timetable;
use App\Course_detail;
use App\Grade;
use App\tutor;
use App\timetabledetail;
use App\buy_list;
use Auth;

use Illuminate\Support\Facades\Session;
use DateTime;

class timetableController extends Controller
{
    //

public function checkselecttime(Request $request){


  $time1 = new DateTime($request->time1);


$time11 =     $time1->format('H:i:s');




  $time2 = new DateTime($request->time2);

      $time22 =     $time2->format('H:i:s');



$time22 = date('H:i:s', strtotime($time22. '- 5 minutes') );

  $amount = $request->amount;


  $dteStart = new DateTime($request->date1);

  $dteend = new DateTime($request->date2);




  // $ww = date_format($dteStart,"Y-m-d");
  // $ww =  date( "Y-m-d",strtotime( $ww ) ) ;
$date1 = $dteStart->format('Y-m-d');
$date2 = $dteend->format('Y-m-d');

$datetest= $dteStart->format('Y-m-d');


  $room  = "";
  $tech =  "";
  $num = 0;




    $ids =   Auth::user()->idstudent;



$check = true;

  for($i=0;$i<$amount;$i++){



$ss = DB::select("select * FROM timetable,room,course_detail WHERE course_detail.Idcourse_detail = timetable.Idcourse_detail and room.idroom = timetable.idroom and (( '$date1' BETWEEN Start_date and End_date) or ('$date2' BETWEEN End_date and Start_date))  and  ((`Start_time` BETWEEN '$time11' and '$time22') or (`End_time` BETWEEN '$time22' and '$time11  ')) ");


    foreach ($ss as $key ) {
      $date99 = $key->Start_date;


      for($c=0;$c<$key->amount_courses;$c++){

     if($date99 == $datetest){

       // $check = false;


       $tttt  = DB::select("select * FROM timetable,timetable_detail where timetable.id_timetable  = timetable_detail.id_timetable and timetable_detail.idstudent = '$ids' and timetable.id_timetable = '$key->id_timetable' ");


       foreach ($tttt as $key2) {
       $check = false;


       }

     }else{



     }

        $date99 =  date( "Y-m-d",strtotime( $date99." +7 day" ) ) ;

     }


    }



    $datetest =  date( "Y-m-d",strtotime( $datetest." +7 day" ) ) ;
}






return response()->json($check);


}






    public function gettimetablewtf(Request $request){


    $date1  = date("Y-m-d");

$date = date('Y-m-d',strtotime($date1 . "+3 days"));



// $ss = timetable::join('course_detail','course_detail.Idcourse_detail','timetable.Idcourse_detail')->where([['timetable.Idcourse_detail',$request->id],['Start_date','>=',$date]])->get();


$sql = DB::select("SELECT timetable.*,course_detail.*,count(timetable_detail.id_timetable) as num ,room.* from timetable ,timetable_detail,course_detail,room
 where timetable.id_timetable = timetable_detail.id_timetable and timetable.Idcourse_detail = '$request->id' and timetable.Idcourse_detail = course_detail.Idcourse_detail and room.idroom = timetable.idroom
  and  timetable.Start_date >= '$date'  group by timetable.id_timetable");


return response()->json($sql);

}












public function getkey(Request $request){



    // $table = timetable::where([['privatekey',$request->key],['Idcourse_detail',$request->id]])->get();

  $table = DB::select("SELECT room.* , timetable.* ,count(timetable_detail.id_timetable) as num
   from timetable,timetable_detail,room where room.idroom = timetable.idroom and timetable.id_timetable = timetable_detail.id_timetable
   and timetable.privatekey = '$request->key'  and timetable.Idcourse_detail = '$request->id'
   group by timetable.id_timetable");


$ss = "";
foreach ($table as $key2) {
  // code...


      $strStart  = date("Y-m-d");
      $strEnd   = $key2->Start_date;
      $dteStart = new DateTime($strStart);
      $dteEnd   = new DateTime($strEnd);
      $dteDiff  = $dteStart->diff($dteEnd);
      $dated= $dteDiff->format("%d");
      $datem= $dteDiff->format("%m");
      $datey= $dteDiff->format("%y");
  $dater= $dteDiff->format("%R");


// dd($dated);
// dd($dated);

// print($dated);
// print($datem);
// print($datey);
// print($dater);


      if($dater=='+'&&$dated<3&&$datem==0&&$datey==0){





        return response("timeout");



  }else{


$tabel2 =     timetable::join('course_detail','course_detail.Idcourse_detail','timetable.Idcourse_detail')
    ->join('grade','grade.idGrade','course_detail.idGrade')->join('room','timetable.idroom','room.idroom')->where('course_detail.Idcourse_detail',$request->id)->first();



if($tabel2->Isgroup == '1'){

foreach ($table as $key) {
// code...

$ss =  timetabledetail::Where('id_timetable',$key->id_timetable)->count();


}

}else{


if($tabel2->Isgroup == 2||$tabel2->Isgroup == 3){
  foreach ($table as $key) {

  $ss =  timetabledetail::Where('id_timetable',$key->id_timetable)->count();

if($ss < $key->amount){

  $check = "true";


}else{

  $check = "false";

}
}

}
if($check=="true"){

  return response()->json($table);

}else{
return response("full");

}




}





  }

}


if($ss == '2'){

return response("full");


}else if($ss == '1') {

return response()->json($table);

}


else{

return response("notfound");

}



}



      public function gettutorandroom(Request $request){


if($request->key!=""){




    $table = timetable::join('room','room.idroom','timetable.idroom')->join('tutor','tutor.idtutor','timetable.idtutor')->join('course_detail','timetable.Idcourse_detail','course_detail.Idcourse_detail')->where('privatekey',$request->key)->get();



foreach ($table as $key ) {


if($key->Isgroup==0){

  $room = room::where([['idroom',$key->idroom],['amount',">=",'1']])->get();

}else if($key->Isgroup==1){
  $room = room::where([['idroom',$key->idroom],['amount',">=",'2']])->get();



}else{

  $room = room::where([['idroom',$key->idroom],['amount',">=",'3']])->get();


}



  $tutor = tutor::where('idtutor',$key->idtutor)->get();

}



$dataall = array(


  'room' => $room,

     'tech' => $tutor,
);



    return response()->json($dataall);

}else{





          $buy = buy_list::find($request->id);
          $cd = Course_detail::find($buy->Idcourse_detail);

          $time1 = new DateTime($buy->time_start);


          $time11 =     $time1->format('H:i:s');



            $time2 = new DateTime($buy->time_end);

              $time22 =     $time2->format('H:i:s');



              $time22 = date('H:i:s', strtotime($time22. '+ 5 minutes') );


              $time11 = date('H:i:s', strtotime($time11. '+ 5 minutes') );
              //

              $time222 = date('H:i:s', strtotime($time22. '- 10 minutes') );


              $time111 = date('H:i:s', strtotime($time11. '- 10 minutes') );


          $amount = $cd->amount_courses;


          $dteStart = new DateTime($buy->date_start);
          $dteend = new DateTime($buy->date_end);


$datetest= $dteStart->format('Y-m-d');


          // $ww = date_format($dteStart,"Y-m-d");
          // $ww =  date( "Y-m-d",strtotime( $ww ) ) ;
        $date1 = $dteStart->format('Y-m-d');
        $date2 = $dteend->format('Y-m-d');
          //
          $room  = "";
          $tech =  "";
          $num = 0;



/////////////////////////////

$check = true;

        for($i=0;$i<$amount;$i++){


          $ss = DB::select("select * FROM timetable,room,course_detail WHERE course_detail.Idcourse_detail = timetable.Idcourse_detail and room.idroom = timetable.idroom and (( '$date1'  BETWEEN Start_date and End_date) or  ( '$date2'  BETWEEN End_date and Start_date))  and
           (( '$time11'    BETWEEN  Start_time and End_time ) or ( '$time22'    BETWEEN End_time  and Start_time )or ( '$time111'    BETWEEN  End_time and Start_time ) or ( '$time222'    BETWEEN Start_time  and End_time ) ) ");

          foreach ($ss as $key ) {

            $date99 = $key->Start_date;

            for($c=0;$c<$key->amount_courses;$c++){

           if($date99 == $datetest){

             if($num==0){

               $room = $key->idroom;

             }else{


               $room = $room .",".$key->idroom;

             }

             if($num==0){

               $tech = $key->idtutor;

             }else{

               $tech = $tech .",".$key->idtutor;
             }

             $num++;

             // $tttt  = DB::select("select * FROM timetable,timetable_detail where timetable.id_timetable  = timetable_detail.id_timetable and timetable_detail.idstudent = '$ids' and timetable.id_timetable = '$key->id_timetable' ");
             //
             //
             // foreach ($tttt as $key2) {
             // $check = false;
             //
             //
             // }

           }else{



           }

              $date99 =  date( "Y-m-d",strtotime( $date99." +7 day" ) ) ;

           }


          }



          $datetest =  date( "Y-m-d",strtotime( $datetest." +7 day" ) ) ;
}
//           for($i=0;$i<$amount;$i++){
//
//
//
//            $ss  = DB::select("select * FROM timetable,room WHERE room.idroom = timetable.idroom and ((`Start_date` BETWEEN '$date1' and '$date2') or (`End_date` BETWEEN '$date2' and '$date1'))  and  ((`Start_time` BETWEEN '$time11' and '$time22') or (`End_time` BETWEEN '$time22' and '$time11  ')) ");
//
//            foreach ($ss as $key) {
//
//            if($num==0){
//
//              $room = $key->idroom;
//
//            }else{
//
//
//              $room = $room .",".$key->idroom;
//
//            }
//
//            if($num==0){
//
//              $tech = $key->idtutor;
//
//            }else{
//
//              $tech = $tech .",".$key->idtutor;
//            }
//
//            $num++;
//
//
//
//
//            }
//
//
//
//
//
//
//                      $date2 =  date( "Y-m-d",strtotime( $date2." +7 day" ) ) ;
// }



  $g =   Grade::find($cd->idGrade);


  if($g->idtype=="1"){


if($g->Isgroup==0){

  if($room==null){
    $roomemty =   DB::select("select * FROM room  where typeroom = 'ห้องดนตรี' and amount >= 1 ");

  }else{
    $roomemty =   DB::select("select * FROM room WHERE idroom not in ($room) and typeroom = 'ห้องดนตรี'  and amount >= 1 ");


  }

}else if($g->Isgroup==1){

  if($room==null){
    $roomemty =   DB::select("select * FROM room  where typeroom = 'ห้องดนตรี' and amount >= 2 ");

  }else{
    $roomemty =   DB::select("select * FROM room WHERE idroom not in ($room) and typeroom = 'ห้องดนตรี'  and amount >= 2 ");


  }

}else if($g->Isgroup==2){

  if($room==null){
    $roomemty =   DB::select("select * FROM room  where typeroom = 'ห้องดนตรี' and amount >= 3 ");

  }else{
    $roomemty =   DB::select("select * FROM room WHERE idroom not in ($room) and typeroom = 'ห้องดนตรี'  and amount >= 3 ");


  }

}

  }else{



    if($room==null){

      $roomemty =   DB::select("select * FROM room where typeroom = 'ห้องเรียน'  and amount >= 3 ");

    }else{
      $roomemty =   DB::select("select * FROM room WHERE idroom not in ($room) and typeroom = 'ห้องเรียน'  and amount >= 3 ");


    }



  }



if($tech==null){
  $techemty =   DB::select("select * FROM tutor,tutor_detail where tutor.idtutor  = tutor_detail.idtutor  and tutor_detail.idcourse = $cd->idcourse" );

}else{
  $techemty =   DB::select("select * FROM tutor,tutor_detail WHERE tutor.idtutor not in ($tech) and tutor.idtutor   = tutor_detail.idtutor and tutor_detail.idcourse = $cd->idcourse" );


}

$dataall = array(

'tech' => $techemty,
     'room' => $roomemty,
);



  return response()->json($dataall);
}

}
public function getsumtimetable2(Request $request){

  $time1 = new DateTime($request->time1);


$time11 =     $time1->format('H:i:s');



  $time2 = new DateTime($request->time2);

      $time22 =     $time2->format('H:i:s');




$time22 = date('H:i:s', strtotime($time22. '- 5 minutes') );

  $amount = $request->amount;
  $dteStart = new DateTime($request->data1);
  $dteend = new DateTime($request->data2);





  // $ww = date_format($dteStart,"Y-m-d");
  // $ww =  date( "Y-m-d",strtotime( $ww ) ) ;
$date1 = $dteStart->format('Y-m-d');
$date2 = $dteend->format('Y-m-d');

$datetest= $dteStart->format('Y-m-d');


  $room  = "";
  $tech =  "";
  $num = 0;

  $check = true;

$it = $request->it;

          for($i=0;$i<$amount;$i++){


            $ss = DB::select("select * FROM timetable,room,course_detail WHERE timetable.id_timetable  != '$it'  and course_detail.Idcourse_detail = timetable.Idcourse_detail and room.idroom = timetable.idroom and (( '$date1' BETWEEN Start_date and End_date) or ('$date2' BETWEEN End_date and Start_date))  and  ((`Start_time` BETWEEN '$time11' and '$time22') or (`End_time` BETWEEN '$time22' and '$time11  ')) ");

            foreach ($ss as $key ) {

              $date99 = $key->Start_date;

              for($c=0;$c<$key->amount_courses;$c++){

             if($date99 == $datetest){

               if($num==0){

                 $room = $key->idroom;

               }else{


                 $room = $room .",".$key->idroom;

               }

               if($num==0){

                 $tech = $key->idtutor;

               }else{

                 $tech = $tech .",".$key->idtutor;
               }

               $num++;
               $tttt  = DB::select("select * FROM timetable,timetable_detail where timetable.id_timetable  = timetable_detail.id_timetable and timetable.id_timetable = '$key->id_timetable' ");


               foreach ($tttt as $key2) {

                 $tttt2  = DB::select("select * FROM timetable,timetable_detail where timetable.id_timetable  = timetable_detail.id_timetable and timetable.id_timetable = '$it' ");
                 foreach ($tttt2 as $key3) {

               if($key2->idstudent == $key3->idstudent){
                 $check = false;


               }

                 }

               }




             }else{



             }

                $date99 =  date( "Y-m-d",strtotime( $date99." +7 day" ) ) ;

             }


            }



            $datetest =  date( "Y-m-d",strtotime( $datetest." +7 day" ) ) ;
  }

  $g =   Grade::find($request->idgrate);


  if($g->idtype=="1"){

    if($room==null){
      $roomemty =   DB::select("select * FROM room  where typeroom = 'ห้องดนตรี' ");

    }else{
      $roomemty =   DB::select("select * FROM room WHERE idroom not in ($room) and typeroom = 'ห้องดนตรี' ");


    }
  }else{
    if($room==null){

      $roomemty =   DB::select("select * FROM room where typeroom = 'ห้องเรียน' ");

    }else{
      $roomemty =   DB::select("select * FROM room WHERE idroom not in ($room) and typeroom = 'ห้องเรียน' ");


    }

  }



if($tech==null){
  $techemty =   DB::select("select * FROM tutor,tutor_detail where tutor.idtutor  = tutor_detail.idtutor  and tutor_detail.idcourse = $request->course" );

}else{
  $techemty =   DB::select("select * FROM tutor,tutor_detail WHERE tutor.idtutor not in ($tech) and tutor.idtutor   = tutor_detail.idtutor and tutor_detail.idcourse = $request->course" );


}


if($check==true){
  $dataall = array(


    'room' => $roomemty,

       'techemty' => $techemty,
  );
  return response()->json($dataall);

}else{


  return response()->json($check);

}



}


      public function getsumtimetable(Request $request){


        $time1 = new DateTime($request->time1);


    $time11 =     $time1->format('H:i:s');

    $time111 =     $time1->format('H:i:s');


        $time2 = new DateTime($request->time2);

            $time22 =     $time2->format('H:i:s');

            $time222 =     $time2->format('H:i:s');



$time22 = date('H:i:s', strtotime($time22. '+ 5 minutes') );


$time11 = date('H:i:s', strtotime($time11. '+ 5 minutes') );
//

$time222 = date('H:i:s', strtotime($time22. '- 10 minutes') );


$time111 = date('H:i:s', strtotime($time11. '- 10 minutes') );
// $time222 = date('H:i:s', strtotime($time222. '- 5 minutes') );
//
//
// $time111 = date('H:i:s', strtotime($time111. '- 5 minutes') );
//

// dd($time11);
        $amount = $request->amount;
        $dteStart = new DateTime($request->data1);
        $dteend = new DateTime($request->data2);





        // $ww = date_format($dteStart,"Y-m-d");
        // $ww =  date( "Y-m-d",strtotime( $ww ) ) ;
      $date1 = $dteStart->format('Y-m-d');
      $date2 = $dteend->format('Y-m-d');

$datetest= $dteStart->format('Y-m-d');


        $room  = "";
        $tech =  "";
        $num = 0;



          $ids =   Auth::user()->idstudent;


$check = true;

        for($i=0;$i<$amount;$i++){


          $ss = DB::select("select * FROM timetable,room,course_detail WHERE course_detail.Idcourse_detail = timetable.Idcourse_detail and room.idroom = timetable.idroom and (( '$date1'  BETWEEN Start_date and End_date) or  ( '$date2'  BETWEEN End_date and Start_date))  and
           (( '$time11'    BETWEEN  Start_time and End_time ) or ( '$time22'    BETWEEN End_time  and Start_time )or ( '$time111'    BETWEEN  End_time and Start_time ) or ( '$time222'    BETWEEN Start_time  and End_time ) ) ");

// dd($ss);
// echo "select * FROM timetable,room,course_detail WHERE course_detail.Idcourse_detail = timetable.Idcourse_detail and room.idroom = timetable.idroom and (( '$date1'  BETWEEN Start_date and End_date) or  ( '$date2'  BETWEEN End_date and Start_date))  and  (( '$time11'    BETWEEN  Start_time and End_time ) or ( '$time22'    BETWEEN End_time  and Start_time )) ";
          // echo "select * FROM timetable,room,course_detail WHERE course_detail.Idcourse_detail = timetable.Idcourse_detail and room.idroom = timetable.idroom and (( Start_date BETWEEN '$date1' and End_date) or (End_date BETWEEN '$date2' and Start_date))  and  (( Start_time BETWEEN '$time11' and  '$time22') or (`End_time` BETWEEN '$time22' and '$time11')) ";
          // $ss = DB::select("select * FROM timetable,room,course_detail WHERE course_detail.Idcourse_detail = timetable.Idcourse_detail and room.idroom = timetable.idroom and (( Start_date BETWEEN End_date  and '$date1') or (End_date BETWEEN '$date2' and Start_date))  and  (( Start_time BETWEEN '$time11' and '$time22') or (`End_time` BETWEEN '$time22' and '$time11  ')) ");
// echo "select * FROM timetable,room,course_detail WHERE course_detail.Idcourse_detail = timetable.Idcourse_detail and room.idroom = timetable.idroom and (( Start_date BETWEEN End_date  and '$date1') or (End_date BETWEEN '$date2' and Start_date))  and  (( Start_time BETWEEN '$time11' and  '$time11') or (`End_time` BETWEEN '$time22' and '$time22')) ";
          foreach ($ss as $key ) {
            $date99 = $key->Start_date;

            $sql2 = DB::select("SELECT count(*) as num from tutor_leave where  id_timetable = '$key->id_timetable' and status = 'false'");
            $num_count = 0;

            foreach ($sql2 as $key3 ) {
              // code...

            $num_count = $num_count+$key3->num;


            }



$num_count = $num_count + $key->amount_courses;
            for($c=0;$c<$num_count;$c++){

           if($date99 == $datetest){
             //



             if($num==0){

               $room = $key->idroom;

             }else{


               $room = $room .",".$key->idroom;

             }

             if($num==0){

               $tech = $key->idtutor;

             }else{

               $tech = $tech .",".$key->idtutor;
             }

             $num++;

             $tttt  = DB::select("select * FROM timetable,timetable_detail where timetable.id_timetable  = timetable_detail.id_timetable and timetable_detail.idstudent = '$ids' and timetable.id_timetable = '$key->id_timetable' ");

// echo "select * FROM timetable,timetable_detail where timetable.id_timetable  = timetable_detail.id_timetable and timetable_detail.idstudent = '$ids' and timetable.id_timetable = '$key->id_timetable' ";
             foreach ($tttt as $key2) {
             $check = false;


             }

        $tttt2  = DB::select("select * FROM timetable,timetable_detail,timetable_overtime  where timetable_overtime.id_timetable = timetable.id_timetable and  timetable.id_timetable  = timetable_detail.id_timetable and timetable_detail.idstudent = '$ids' and timetable_overtime.id_timetable = '$key->id_timetable' ");


        foreach ($tttt2 as $key3) {
          if($time11 == $key3->date){

  $check = false;



          }


        }



           }else{





           }

              $date99 =  date( "Y-m-d",strtotime( $date99." +7 day" ) ) ;

           }
           $vxzc  = DB::select("SELECT * from timetable_overtime ,timetable,timetable_detail where timetable_overtime.id_timetable = timetable.id_timetable and  timetable_overtime.id_timetable =  '$key->id_timetable' and  timetable.id_timetable  = timetable_detail.id_timetable and timetable_detail.idstudent = '$ids'
          ");

           foreach ($vxzc as $key3) {


           // $check = false;
           $date  =  $key3->date;

           if($date==$datetest){
            $check = false;


           }




           }

          }


          $datetest =  date( "Y-m-d",strtotime( $datetest." +7 day" ) ) ;
}




$vxzc  = DB::select("SELECT timetable_overtime.* from timetable_overtime ,timetable,timetable_detail where timetable_overtime.id_timetable = timetable.id_timetable and  timetable.id_timetable  = timetable_detail.id_timetable and  timetable_overtime.id_timetable  = timetable.id_timetable
  and timetable_detail.idstudent = '$ids'  and (( '$date1'  BETWEEN timetable_overtime.date and timetable_overtime.date) or  ( '$date2'  BETWEEN timetable_overtime.date and timetable_overtime.date)) and (( '$time11'    BETWEEN  timetable_overtime.Start_time and timetable_overtime.End_time )
  or ( '$time22'    BETWEEN timetable_overtime.End_time  and timetable_overtime.Start_time )or ( '$time111'    BETWEEN  timetable_overtime.End_time and timetable_overtime.Start_time )
  or ( '$time222'    BETWEEN  timetable_overtime.Start_time  and timetable_overtime.End_time ) ) ");

foreach ($vxzc as $key3) {



 $check = false;



}

//
//
//
// foreach ($ss as $key ) {
//
//
// $date99 = $key->Start_date;
//
// for($i=0;$i<$key->amount_courses;$i++){
//
// if($date99 == ){
//
//
// }else{
//
//
// }
//
//    $date99 =  date( "Y-m-d",strtotime( $key->Start_date." +7 day" ) ) ;
//
// }
//
//

//         for($i=0;$i<$amount;$i++){
//
//
//
//
//
//          $ss  = DB::select("select * FROM timetable,room WHERE room.idroom = timetable.idroom and ((`Start_date` BETWEEN '$date1' and '$date2') or (`End_date` BETWEEN '$date2' and '$date1'))  and  ((`Start_time` BETWEEN '$time11' and '$time22') or (`End_time` BETWEEN '$time22' and '$time11  ')) ");
//
// foreach ($ss as $key) {
//
//
//
//
// if($num==0){
//
//   $room = $key->idroom;
//
// }else{
//
//
//   $room = $room .",".$key->idroom;
//
// }
//
// if($num==0){
//
//   $tech = $key->idtutor;
//
// }else{
//
//   $tech = $tech .",".$key->idtutor;
// }
//
// $num++;
//
// //
// $tttt  = DB::select("select * FROM timetable,timetable_detail where timetable.id_timetable  = timetable_detail.id_timetable and timetable_detail.idstudent = '$ids' and timetable.id_timetable = '$key->id_timetable' ");
//
//
// foreach ($tttt as $key2) {
// $check = false;
//
//
// }
//
//
// }
//
//
//
//           $date1 =  date( "Y-m-d",strtotime( $date1." +7 day" ) ) ;
//
//
//
//         }

///////////ข้างล่างไม่ลบ
//
  $g =   Grade::find($request->idgrate);


  if($g->idtype=="1"){

    if($room==null){
      $roomemty =   DB::select("select * FROM room  where typeroom = 'ห้องดนตรี' ");

    }else{
      $roomemty =   DB::select("select * FROM room WHERE idroom not in ($room) and typeroom = 'ห้องดนตรี' ");


    }
  }else{
    if($room==null){

      $roomemty =   DB::select("select * FROM room where typeroom = 'ห้องเรียน' ");

    }else{
      $roomemty =   DB::select("select * FROM room WHERE idroom not in ($room) and typeroom = 'ห้องเรียน' ");


    }

  }



if($tech==null){
  $techemty =   DB::select("select * FROM tutor,tutor_detail where tutor.idtutor  = tutor_detail.idtutor  and tutor_detail.idcourse = $request->course" );

}else{
  $techemty =   DB::select("select * FROM tutor,tutor_detail WHERE tutor.idtutor not in ($tech) and tutor.idtutor   = tutor_detail.idtutor and tutor_detail.idcourse = $request->course" );


}




if($roomemty==null || $techemty==null){


  return response()->json("no");

// ไม่เจอห้องและครู
}else if ($check==false){
  return response()->json("not");



}else{


  $ss = DB::select("select * FROM timetable,timetable_overtime,timetable_detail where  timetable_detail.id_timetable = timetable.id_timetable and  timetable_overtime.id_timetable = timetable.id_timetable  and timetable_detail.idstudent = '$ids'");


  foreach ($ss as $key3) {
    if($request->data1 == $key3->date){


if( $request->time1 >= $key3->Start_time  && $request->time2  <= $key3->End_time  ){

  $check = false;


}else{



}

    }



  }

  if($check==false){

    return response()->json("not");


  }else{

    return response()->json("yes");

  }



}
//
//

      }


      public function buycourse(Request $request)
      {


          $buy = new buy_list;
          $buy->datetime = now();
            $buy->buy_price = $request->price;
              $buy->status = "ยังไม่ได้ชำระเงิน";
                $buy->Idcourse_detail =  $request->id;
                  $buy->idUserAccount=   Auth::user()->IDUserAccount;
                    $buy->idTesting =  $request->test;


$buy->date_start =  $request->data1;
$buy->date_end =  $request->data2;
$buy->time_start =  $request->time1;
$buy->time_end =  $request->time2;



$buy->keyinput =  $request->keyinput;


                  $buy->save();

  return response()->json("Success");
      }



      public function showtimetablewhere($id)
      {


        $table =  timetable::join('course_detail','course_detail.Idcourse_detail','timetable.Idcourse_detail')

        ->join('course','course.idcourse','course_detail.idcourse')

        ->join('room','room.idroom','timetable.idroom')
          ->join('tutor','tutor.idtutor','timetable.idtutor')
          ->where('course_detail.Idcourse_detail',$id)

        ->get();


      	// $scheduler->set_options("type", $list);
      	// $scheduler->render_table("timetable","id_timetable","Start_time,End_time,Start_date,End_date");

      // 	 $data = array(
      // 	    array('id'=>'1261150507', 'start_date'=>'2018-01-02 07:00','end_date'=>'2018-01-02 09:00', 'text'=>'Cat On a Hot Tin Roof' ,'details'=>'Novello Theatre')	);
      //
      // $scheduler->render_array($data, "id", "start_date,end_date");



  $data = array();
  $ss= 0;
  $id = 0;
  foreach ($table as $key ) {

  $amount = $key->amount_courses;
  $dteStart = new DateTime($key->Start_date);
  $ww = date_format($dteStart,"Y-m-d");

  $ww =  date( "Y-m-d",strtotime( $ww ) ) ;

  for($i=0;$i<$amount;$i++){




        $a=array('id'=>$id,'start_date'=>$ww.' '.$key->Start_time,'end_date'=>$ww.' '.$key->End_time,'text'=>'วิชา '.$key->name.'  ห้อง'.$key->number.' <br> ครู  '.$key->firstname.' '.$key->lastname.'' ,'subject'=>'english');

        array_push($data,$a);
        $ww =  date( "Y-m-d",strtotime( $ww." +7 day" ) ) ;

        $id++;
  }











  }




        return response()->json($data);

      }


    public function showtimetable()
    {

      $table =  timetable::join('course_detail','course_detail.Idcourse_detail','timetable.Idcourse_detail')

      ->join('course','course.idcourse','course_detail.idcourse')

      ->join('room','room.idroom','timetable.idroom')
        ->join('tutor','tutor.idtutor','timetable.idtutor')
      ->get();


    	// $scheduler->set_options("type", $list);
    	// $scheduler->render_table("timetable","id_timetable","Start_time,End_time,Start_date,End_date");

    // 	 $data = array(
    // 	    array('id'=>'1261150507', 'start_date'=>'2018-01-02 07:00','end_date'=>'2018-01-02 09:00', 'text'=>'Cat On a Hot Tin Roof' ,'details'=>'Novello Theatre')	);
    //
    // $scheduler->render_array($data, "id", "start_date,end_date");
$data = array();
$ss= 0;
$id = 0;
foreach ($table as $key ) {

$amount = $key->amount_courses;
$dteStart = new DateTime($key->Start_date);
$ww = date_format($dteStart,"Y-m-d");

$ww =  date( "Y-m-d",strtotime( $ww ) ) ;

for($i=0;$i<$amount;$i++){




      $a=array('id'=>$id,'start_date'=>$ww.' '.$key->Start_time,'end_date'=>$ww.' '.$key->End_time,'text'=>'วิชา '.$key->name.' <br> ห้อง'.$key->number.' ครู  '.$key->firstname.' '.$key->lastname.'' ,'details'=>'Novello Theatre');

      array_push($data,$a);
      $ww =  date( "Y-m-d",strtotime( $ww." +7 day" ) ) ;

      $id++;
}











}




      return response()->json($data);

    }




public function crudtimetable(Request $request)
{



if($request->action=="add"){

  $table = new timetable;
  $table->Start_time =$request->times1;
    $table->End_time =$request->timee2;
      $table->Start_date =$request->dates1;
        $table->End_date =$request->datee2;
          $table->idtutor = $request->idtutor;
          $table->Idcourse_detail = $request->iddetail;
          $table->idroom = $request->idroom;
          $table->save();


}else if($request->action=="view"){


$table =  timetable::join('course_detail','course_detail.Idcourse_detail','timetable.Idcourse_detail')

->join('course','course.idcourse','course_detail.idcourse')
->join('room','room.idroom','timetable.idroom')
->join('tutor','tutor.idtutor','timetable.idtutor')
->join('grade','grade.idGrade','course_detail.idGrade')
->join('type_course','type_course.idtype','grade.idtype')

->get();


return response()->json($table);


}else if($request->action=="edit"){


  $table =  timetable::find($request->id);
  $table->Start_time =$request->times1;
    $table->End_time =$request->timee2;
      $table->Start_date =$request->dates1;
        $table->End_date =$request->datee2;
          $table->idtutor = $request->idtutor;
          $table->Idcourse_detail = $request->iddetail;
          $table->idroom = $request->idroom;
          $table->save();



}else if($request->action=="del"){


  $table =  timetable::find($request->id)->delete();



}



}


public function timetable(){

  if(Auth::user()){


  if(Auth::user()->idemp!=''||Auth::user()->idemp!=null){


               $type = type_course::all();
               $room = room::all();



                      $dataall = array(


                        'room' => $room,

                           'type' => $type,
                      );

                  return view('timetable2',$dataall);

  }else{
    return redirect('/');



  }

}else{
  return redirect('/');

}





}



}
