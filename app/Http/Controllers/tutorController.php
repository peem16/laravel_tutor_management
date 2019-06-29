<?php

namespace App\Http\Controllers;
use Auth;
use DateTime;

use Illuminate\Http\Request;
use App\tutor;
use App\tutor_detail;
use App\course;
use App\Account;
use Validator;
use Illuminate\Support\Facades\Input;
use Response;

use App\timetable;
use Illuminate\Support\Facades\DB;
class tutorController extends Controller
{
    //

public function getcheckkk(){



          $sql2 = DB::select("SELECT * from timetable,course_detail where timetable.Idcourse_detail = course_detail.Idcourse_detail");
          $amount ="";
          $Start_date = "";
            $End_time = "";
                $id_timetable ="";
                date_default_timezone_set("Asia/Bangkok");

                $asdzxc  = date("Y-m-d");



                  $strStart  = date("Y-m-d H:i:s");

                  $timecheck  = date("H:i:s");

                  $dteStart = new DateTime($strStart);


  foreach ($sql2 as  $value) {


    $amount =  $value->amount_courses;
    $Start_date  = $value->Start_date;
    $End_time  = $value->End_time;
    $id_timetable  = $value->id_timetable;

    $sql2 = DB::select("SELECT count(*) as num from tutor_leave where  id_timetable = '$id_timetable' and status = 'false'");
    $num = 0;

    $resultArray = array();
    foreach ($sql2 as $key ) {
      // code...

    $num = $num+$key->num;

    }
$amount = $amount + $num;

    for ($i=0; $i < $amount; $i++) {






      $date1   = new DateTime($Start_date);


      $dteDiff  = $date1->diff($dteStart);

       $dater= $dteDiff->format("%R");
       $dated= $dteDiff->format("%d");

       if($dater=='+'){

  if(($dated==0&&$timecheck > $End_time)||$dated>0){

    $sql1234 = DB::select("SELECT * FROM `timetable` left join tutor_leave on  timetable.id_timetable = tutor_leave.Id_timetable and tutor_leave.datetime = '$Start_date'  where timetable.id_timetable = '$id_timetable'   ");


  foreach ($sql1234 as $value2) {
    // code...

    if($value2->idtutor_of_study==null){



    DB::select("INSERT INTO tutor_leave ( `datetime`, `updated_at`, `created_at`, `Id_timetable`, `status`) VALUES  ('$Start_date','$asdzxc','$asdzxc','$id_timetable','missing')");




    }

  }
$sql44 = DB::select("SELECT date_of_study.*,timetable_detail.Idtimetable_deteil ,tutor_leave.idtutor_of_study from timetable_detail
 left join date_of_study on timetable_detail.Idtimetable_deteil = date_of_study.Idtimetable_deteil and date_of_study.datetime like '$Start_date %'
  left join tutor_leave on timetable_detail.id_timetable = tutor_leave.Id_timetable and tutor_leave.datetime = '$Start_date' and (tutor_leave.status = 'missing' or tutor_leave.status = 'false' )
where timetable_detail.id_timetable = '$id_timetable' ");


foreach ($sql44 as $value5) {


  if($value5->iddate_of_study){


  }else{



  $id = $value5->Idtimetable_deteil;

  if($value5->idtutor_of_study){

    DB::select("INSERT INTO date_of_study ( `datetime`, `status`, `Idtimetable_deteil`, `updated_at`, `created_at`) VALUES  ('$Start_date','invalid','$id','$asdzxc','$asdzxc')");

  }else{

  DB::select("INSERT INTO date_of_study ( `datetime`, `status`, `Idtimetable_deteil`, `updated_at`, `created_at`) VALUES  ('$Start_date','false','$id','$asdzxc','$asdzxc')");

  }



  }



}



  }


       }
       $Start_date =  date( "Y-m-d",strtotime( $Start_date." +7 day" ));

    }

  }

}


public function reportcheckstuden(){
  $this->getcheckkk();


    if(Auth::user()){

      if(Auth::user()->idemp!=''||Auth::user()->idemp!=null){

        return view('reportcheckstuden');











      }else{
        return redirect('/');



      }
    }else{
      return redirect('/');



    }


}


    public function getdetailtimetable(Request $req){



      $sql2 = DB::select("SELECT * from timetable_detail left join evaluation on evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  where timetable_detail.id_timetable = '$req->id' ");




        return response()->json($sql2);

}

public function getstudencomedetail_date_over(Request $req){




    $res = DB::select("SELECT * from timetable_detail left join timetable on timetable.id_timetable = timetable_detail.id_timetable
       left join student on student.idstudent = timetable_detail.idstudent
       left join date_of_study on date_of_study.Idtimetable_deteil = timetable_detail.Idtimetable_deteil

        and date_of_study.datetime like '$req->date %'  where timetable.id_timetable ='$req->id'   group by  timetable_detail.idstudent ");







    return response()->json($res);



}

public function getstudencomedetail_over(Request $req){


  $sql = DB::select("SELECT * from timetable_overtime where timetable_overtime.id_timetable =  '$req->id'");







      return response()->json($sql);

}


    public function gettutorall(Request $req){


          $tutor = tutor::all();





          return response()->json($tutor);



}

public function gettutor_compensate(Request $req){


  $sql = DB::select("SELECT * from tutor_leave,tutor_compensate,tutor where tutor.idtutor = tutor_compensate.id_tutor  and tutor_leave.Id_timetable = '$req->id'
     and tutor_leave.idtutor_of_study = tutor_compensate.idtutor_of_study  and tutor_compensate.datetime like '$req->date'");



     $res = DB::select("SELECT * from timetable
       left join timetable_detail on timetable.id_timetable = timetable_detail.id_timetable
       left join student on timetable_detail.idstudent =  student.idstudent
       left join date_of_study on  timetable_detail.Idtimetable_deteil = date_of_study.Idtimetable_deteil and date_of_study.datetime like '$req->date %'
        where timetable.id_timetable = '$req->id' ");




        $dataall = array(

          'tutor' => $sql,

          'detail' => $res,


        );



  return response()->json($dataall);



}

public function getstudencomedetail(Request $req){


$sql = DB::select("SELECT * from timetable,course_detail where course_detail.Idcourse_detail = timetable.Idcourse_detail and id_timetable = '$req->id'");


$sql2 = DB::select("SELECT count(*) as num from tutor_leave where  id_timetable = '$req->id' and status = 'false'");
$num = 0;

$resultArray = array();
foreach ($sql2 as $key ) {
  // code...

$num = $num+$key->num;


}

foreach ($sql as $key ) {

$num = $num+$key->amount_courses;


$num2 = $key->amount_courses;

$Start_date = $key->Start_date;

for ($i=0; $i < $num ; $i++) {
  $arrCol = array();


$res = DB::select("SELECT tutor_leave.*,tutor_compensate.id_tutor_compensate from timetable
  left join timetable_detail on timetable.id_timetable = timetable_detail.id_timetable
  left join student on timetable_detail.idstudent =  student.idstudent
  left join date_of_study on  timetable_detail.Idtimetable_deteil = date_of_study.Idtimetable_deteil and date_of_study.datetime like '$Start_date %'

    left join tutor_leave on timetable.id_timetable =  tutor_leave.id_timetable  and  tutor_leave.datetime = '$Start_date'
     left join tutor_compensate on tutor_leave.idtutor_of_study = tutor_compensate.idtutor_of_study
   where timetable.id_timetable = '$req->id' ");

foreach ($res as $key2 ) {
  // $arrCol[$Start_date][$i][1] = $key2;
  if($key2->idtutor_of_study){



if($key2->status == "leave" ){

  if($key2->id_tutor_compensate){

  $arrCol[$Start_date] = 'missing';
}else{

  $arrCol[$Start_date] = 'leave';

}

}else if($key2->status == "missing"){

  $arrCol[$Start_date] = 'missing';


}else if($key2->status == "false"){
  $arrCol[$Start_date] = 'false';


}else if($key2->status == "true"){
  $arrCol[$Start_date] = 'true';


}




  }else{


    $arrCol[$Start_date] = 'true';

  }

}



array_push($resultArray,$arrCol);



    $Start_date =  date( "Y-m-d",strtotime( $Start_date." +7 day" ) ) ;
}


}





$slqall = DB::select("SELECT count( date_of_study.status = 'true' and timetable.id_timetable = '$req->id'   )  as num,student.* from timetable left join timetable_detail on timetable.id_timetable = timetable_detail.id_timetable  left join student on timetable_detail.idstudent =  student.idstudent   left join date_of_study on  timetable_detail.Idtimetable_deteil = date_of_study.Idtimetable_deteil  and date_of_study.status = 'true'   where timetable.id_timetable = '$req->id'  group by  timetable_detail.idstudent ");





$dataall = array(

  'am' => $num2,

  'detail' => $resultArray,

     'all' => $slqall,

);



    return response()->json($dataall);






return response()->json($dataall);
}


public function getstudencomedetail_date(Request $req){


  $sql = DB::select("SELECT * from timetable,course_detail where course_detail.Idcourse_detail = timetable.Idcourse_detail and id_timetable = '$req->id'");


  $sql2 = DB::select("SELECT count(*) as num from tutor_leave where  id_timetable = '$req->id' and status = 'false'");
  $num = 0;

  $resultArray = array();
  foreach ($sql2 as $key ) {
    // code...

  $num = $num+$key->num;

  }

  foreach ($sql as $key ) {
  $num = $num+$key->amount_courses;

  $Start_date = $key->Start_date;

  for ($i=0; $i < $num ; $i++) {
    $arrCol = array();


  $res = DB::select("SELECT * from timetable_detail left join timetable on timetable.id_timetable = timetable_detail.id_timetable left join student on student.idstudent = timetable_detail.idstudent  left join date_of_study on date_of_study.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and date_of_study.datetime like '$Start_date %'  where timetable.id_timetable ='$req->id'   group by  timetable_detail.idstudent ");




if($req->date == $Start_date){

  $sql999 = DB::select("SELECT *  from tutor_leave left join tutor_compensate on tutor_leave.idtutor_of_study = tutor_compensate.idtutor_of_study where  tutor_leave.id_timetable = '$req->id' and  tutor_leave.datetime  =  '$Start_date'");

$oo = "true";
  foreach ($sql999 as $key4 ) {

if($key4->status == "missing"){

  $oo = "missing";

}else if($key4->status == "leave"){

if($key4->id_tutor_compensate){

  $oo = "missing";

}else{

  $oo = "leave";

}


}else if($key4->status == "false"){
  $oo = "false";


}

}
  $dataall = array(

    'am' => $num,


    'detail' => $res,

    'check' => $oo,

  );
  return response()->json($dataall);

}




      $Start_date =  date( "Y-m-d",strtotime( $Start_date." +7 day" ) ) ;
  }


  }



  return response()->json($resultArray);


}






public function getstudencome(Request $req){




$sql = DB::select("SELECT * from timetable,course_detail,course,grade,tutor where  timetable.idtutor =  '$req->id' and  course_detail.Idcourse_detail = timetable.Idcourse_detail and course.idcourse = course_detail.idcourse and grade.idGrade = course_detail.idGrade and tutor.idtutor = timetable.idtutor order by timetable.id_timetable desc");

// $sql2 = DB::select("SELECT * from timetable,course_detail,course,grade,tutor,tutor_compensate,tutor_leave where tutor_leave.Id_timetable = timetable.Id_timetable and  tutor_compensate.idtutor_of_study = tutor_leave.idtutor_of_study and  timetable.idtutor =  '$req->id' and  course_detail.Idcourse_detail = timetable.Idcourse_detail and course.idcourse = course_detail.idcourse and grade.idGrade = course_detail.idGrade and tutor.idtutor = timetable.idtutor order by timetable.id_timetable desc");
//
//
// dd($sql2);
return response()->json($sql);
}


  public function getreporttutor(Request $req){

    //
    // $tutor_detail=     timetable::join('timetable_detail','timetable_detail.id_timetable','timetable.id_timetable')
    //     ->join('evaluation','evaluation.Idtimetable_deteil','timetable_detail.Idtimetable_deteil')
    //       ->join('student','student.idstudent','timetable_detail.idstudent')
    //         ->join('course_detail','course_detail.Idcourse_detail','timetable.Idcourse_detail')
    //         ->join('course','course.idcourse','course_detail.idcourse')
    //             ->join('grade','grade.idGrade','course_detail.idGrade')
    //
    //                     ->join('tutor','tutor.idtutor','timetable.idtutor')
    //                     ->select('student.idstudent as idstudent','student.firstname as firstnameS','student.lastname as lastnameS','grade.*','course.*','course_detail.*','tutor.*','evaluation.*','timetable_detail.*','timetable.*')
    //       ->get();
    // //



    $sql = DB::select("SELECT DISTINCT t.*,course.*,grade.*,
    (SELECT count(*) from evaluation,timetable,timetable_detail where ask1 = '5' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum1_1,
    (SELECT count(*) from evaluation,timetable,timetable_detail where ask1 = '4' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum1_2,
    (SELECT count(*) from evaluation,timetable,timetable_detail where ask1 = '3' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum1_3,
    (SELECT count(*) from evaluation,timetable,timetable_detail where ask1 = '2' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum1_4 ,
    (SELECT count(*) from evaluation,timetable,timetable_detail where ask1 = '1' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum1_5 ,
    (SELECT count(*) from evaluation,timetable_detail,timetable where t.id_timetable = timetable.id_timetable and  evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable  and evaluation.who = '1') as sum ,
    (SELECT count(*) from evaluation,timetable,timetable_detail where ask2 = '5' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum2_1,
    (SELECT count(*) from evaluation,timetable,timetable_detail where ask2 = '4' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum2_2,
    (SELECT count(*) from evaluation,timetable,timetable_detail where ask2 = '3' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum2_3,
    (SELECT count(*) from evaluation,timetable,timetable_detail where ask2 = '2' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum2_4 ,
    (SELECT count(*) from evaluation,timetable,timetable_detail where ask2 = '1' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum2_5,

    (SELECT count(*) from evaluation,timetable,timetable_detail where ask3 = '5' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum3_1,
    (SELECT count(*) from evaluation,timetable,timetable_detail where ask3 = '4' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum3_2,
    (SELECT count(*) from evaluation,timetable,timetable_detail where ask3 = '3' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum3_3,
    (SELECT count(*) from evaluation,timetable,timetable_detail where ask3 = '2' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum3_4 ,
    (SELECT count(*) from evaluation,timetable,timetable_detail where ask3 = '1' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum3_5 ,

    (SELECT count(*) from evaluation,timetable,timetable_detail where ask4 = '5' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum4_1,
    (SELECT count(*) from evaluation,timetable,timetable_detail where ask4 = '4' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum4_2,
    (SELECT count(*) from evaluation,timetable,timetable_detail where ask4 = '3' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum4_3,
    (SELECT count(*) from evaluation,timetable,timetable_detail where ask4 = '2' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum4_4 ,
    (SELECT count(*) from evaluation,timetable,timetable_detail where ask4 = '1' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum4_5 ,

    (SELECT count(*) from evaluation,timetable,timetable_detail where ask5 = '5' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum5_1,
    (SELECT count(*) from evaluation,timetable,timetable_detail where ask5 = '4' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1' ) as sum5_2,
    (SELECT count(*) from evaluation,timetable,timetable_detail where ask5 = '3' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum5_3,
    (SELECT count(*) from evaluation,timetable,timetable_detail where ask5 = '2' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum5_4 ,
    (SELECT count(*) from evaluation,timetable,timetable_detail where ask5 = '1' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum5_5



from evaluation,timetable_detail,timetable t ,course_detail,course,grade
 where t.id_timetable = timetable_detail.id_timetable and
  timetable_detail.Idtimetable_deteil = evaluation.Idtimetable_deteil and
  course_detail.Idcourse_detail = t.Idcourse_detail and
   grade.idGrade = course_detail.idGrade  and
   course.idcourse = course_detail.idcourse and evaluation.who = '1' and t.idtutor   =  '$req->id'
   group by  t.id_timetable order by  t.id_timetable");




// SELECT DISTINCT t.*, (SELECT count(*) from evaluation,timetable where ask1 = 'ดีมาก' and t.id_timetable = timetable.id_timetable) as sum1,(SELECT count(*) from evaluation,timetable where ask1 = 'ดี' and t.id_timetable = timetable.id_timetable) as sum2,(SELECT count(*) from evaluation,timetable where ask1 = 'ปานกลาง' and t.id_timetable = timetable.id_timetable) as sum3,(SELECT count(*) from evaluation,timetable where ask1 = 'พอใช้' and t.id_timetable = timetable.id_timetable) as sum4 ,(SELECT count(*) from evaluation,timetable where ask1 = 'แย่' and t.id_timetable = timetable.id_timetable) as sum5,(SELECT count(*) from evaluation ) as sumall from evaluation,timetable_detail,timetable t ,course_detail,course,grade where t.id_timetable = timetable_detail.id_timetable and timetable_detail.Idtimetable_deteil = evaluation.Idtimetable_deteil and course_detail.Idcourse_detail = t.Idcourse_detail and grade.idGrade = course_detail.idGrade order by t.id_timetable
//








return response()->json($sql);
  }



    public function getreporttutor2(Request $req){

      //
      // $tutor_detail=     timetable::join('timetable_detail','timetable_detail.id_timetable','timetable.id_timetable')
      //     ->join('evaluation','evaluation.Idtimetable_deteil','timetable_detail.Idtimetable_deteil')
      //       ->join('student','student.idstudent','timetable_detail.idstudent')
      //         ->join('course_detail','course_detail.Idcourse_detail','timetable.Idcourse_detail')
      //         ->join('course','course.idcourse','course_detail.idcourse')
      //             ->join('grade','grade.idGrade','course_detail.idGrade')
      //
      //                     ->join('tutor','tutor.idtutor','timetable.idtutor')
      //                     ->select('student.idstudent as idstudent','student.firstname as firstnameS','student.lastname as lastnameS','grade.*','course.*','course_detail.*','tutor.*','evaluation.*','timetable_detail.*','timetable.*')
      //       ->get();
      // //


  // $sql = DB::select("SELECT student.*,testing.total as t1 ,evaluation.total as t2  from timetable_detail,student,account,evaluation,timetable,course_detail,course,payment_reserve,testing where timetable_detail.id_timetable = '$req->id'
  //    and student.idstudent = timetable_detail.idstudent and account.idstudent = student.idstudent and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil and
  //  timetable.id_timetable = timetable_detail.id_timetable and course_detail.Idcourse_detail = timetable.Idcourse_detail and course.idcourse = course_detail.idcourse and payment_reserve.idUserAccount = account.idUserAccount and payment_reserve.idcourse = course_detail.idcourse
  //  and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil and testing.idpay_reserve = payment_reserve.idpay_reserve and evaluation.who = 2");





   $sql = DB::select("SELECT student.*,testing.Total  as t1 ,testing.ask1 as bf1 ,testing.ask2 as bf2 ,testing.ask3 as bf3 ,testing.ask4 as bf4 ,testing.ask5 as bf5 ,evaluation.ask1 as af1 ,evaluation.ask2 as af2
     ,evaluation.ask3 as af3,evaluation.ask4 as af4,evaluation.ask5 as af5, evaluation.Total as t2 from timetable_detail
     left join student on student.idstudent = timetable_detail.idstudent
     left join account on account.idstudent = student.idstudent
     left join evaluation on evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil and evaluation.who = 2
     left join timetable on  timetable.id_timetable = timetable_detail.id_timetable
     left join course_detail on course_detail.Idcourse_detail = timetable.Idcourse_detail
     left join course on course.idcourse = course_detail.idcourse
      left join payment_reserve on payment_reserve.idUserAccount = account.idUserAccount and payment_reserve.idcourse = course_detail.idcourse
      left join testing on testing.idpay_reserve = payment_reserve.idpay_reserve where  timetable_detail.id_timetable = '$req->id'");






  // SELECT DISTINCT t.*, (SELECT count(*) from evaluation,timetable where ask1 = 'ดีมาก' and t.id_timetable = timetable.id_timetable) as sum1,(SELECT count(*) from evaluation,timetable where ask1 = 'ดี' and t.id_timetable = timetable.id_timetable) as sum2,(SELECT count(*) from evaluation,timetable where ask1 = 'ปานกลาง' and t.id_timetable = timetable.id_timetable) as sum3,(SELECT count(*) from evaluation,timetable where ask1 = 'พอใช้' and t.id_timetable = timetable.id_timetable) as sum4 ,(SELECT count(*) from evaluation,timetable where ask1 = 'แย่' and t.id_timetable = timetable.id_timetable) as sum5,(SELECT count(*) from evaluation ) as sumall from evaluation,timetable_detail,timetable t ,course_detail,course,grade where t.id_timetable = timetable_detail.id_timetable and timetable_detail.Idtimetable_deteil = evaluation.Idtimetable_deteil and course_detail.Idcourse_detail = t.Idcourse_detail and grade.idGrade = course_detail.idGrade order by t.id_timetable
  //








  return response()->json($sql);
    }

  public function subject_to_tutor(Request $req){

    $tutor = tutor::join('tutor_detail','tutor_detail.idtutor','tutor.idtutor')->join('course','course.idcourse','tutor_detail.idcourse')->

    where('tutor_detail.idtutor',$req->id)->get();



    return response()->json($tutor);

}


    public function gettutoroncourse(Request $req){



   $course = course::where('name',$req->namesubject)->get();
$tutor_detail = "";
foreach ($course as $key) {

  $tutor_detail = tutor_detail::join('tutor','tutor.idtutor','tutor_detail.idtutor')

  ->where('idcourse',$key->idcourse)->get();

}



return response()->json($tutor_detail);

}
public function crudtutor(Request $req){





if($req->action =='view'){


  $tutor = tutor::join('account','tutor.idtutor','account.idtutor')->get();



  return response()->json($tutor);
}else if($req->action =='add'){


  $rules = array(
  'username' =>  'required|max:16|alpha_num',
  'password' => 'required|max:16|alpha_num',
  'firstname' => 'required',
  'lastname' => 'required',
  'sex' => 'required',
'age' => 'required|numeric',
  'email' => 'required|max:30|Email',
  'phone' => 'required|digits_between:9,10|numeric',
  'address' => 'required',
  'ability' => 'required',
  'interested_position' => 'required',

  'Identification_no' => 'required',
  'checksub' => 'required',


  );

  $validator = Validator::make(Input::all(), $rules);
  if ($validator->fails()) {
      return Response::json(array(

              'errors' => $validator->getMessageBag()->toArray(),
      ));

}else{





  date_default_timezone_set("Asia/Bangkok");
  setlocale(LC_ALL,"hu_HU.UTF8");
  $strStart  = date("Y-m-d");

$tutor = new tutor;

$tutor->firstname = $req->firstname;
$tutor->lastname = $req->lastname;
$tutor->sex = $req->sex;
$tutor->age = $req->age;
$tutor->Email = $req->email;
$tutor->phone = $req->phone;
$tutor->address = $req->address;
$tutor->ability = $req->ability;
$tutor->interested_position = $req->interested_position;
$tutor->Identification_no =  $req->Identification_no;

if($req->hasfile('Pic')){
  $type = $req->Pic->getClientOriginalExtension();


    $filename = 'Pic'.$strStart.$req->firstName.$req->lastName.'.'.$type;
    $tutor->profilepic = $filename;

    $req->Pic->storeAs('public/Resume',$filename);
  }




$tutor->save();

$sss = explode(',',$req->checksub);

foreach ($sss as $key) {
  # code...

  $tutor_detail = new tutor_detail;
  $tutor_detail->idtutor = $tutor->idtutor;
  $tutor_detail->idcourse = $key;

  $tutor_detail->save();



}

$account = new Account;
$account->username = $req->username;
$account->password = bcrypt($req->password);


$account->idtutor = $tutor->idtutor;
$account->save();



return response()->json("Success");

}

}else if($req->action =='edit'){



  $rules = array(
  'username' =>  'required|max:16|alpha_num',
  'password' => 'max:16',
  'firstname' => 'required',
  'lastname' => 'required',
  'sex' => 'required',
'age' => 'required|numeric',
  'email' => 'required|max:30|Email',
  'phone' => 'required|digits_between:9,10|numeric',
  'address' => 'required',
  'ability' => 'required',
  'interested_position' => 'required',

  'Identification_no' => 'required',
  'checksub' => 'required',


  );

  $validator = Validator::make(Input::all(), $rules);
  if ($validator->fails()) {
      return Response::json(array(

              'errors' => $validator->getMessageBag()->toArray(),
      ));

}else{



  $tutor =  tutor::find($req->idtutor);

  $tutor->firstname = $req->firstname;
  $tutor->lastname = $req->lastname;
  $tutor->sex = $req->sex;
  $tutor->age = $req->age;
  $tutor->Email = $req->email;
  $tutor->phone = $req->phone;
  $tutor->address = $req->address;
  $tutor->ability = $req->ability;
  $tutor->interested_position = $req->interested_position;
  $tutor->Identification_no =  $req->Identification_no;


  $tutor->save();


  $account =  Account::where('idtutor',$req->idtutor)->first();
  $account->username = $req->username;

  if($req->password){
    $account->password = bcrypt($req->password);


  }
  $account->save();



  $sss = explode(',',$req->checksub);

  $tutor_detail = tutor_detail::where('idtutor',$req->idtutor)->delete();


  foreach ($sss as $key) {
    # code...

    $tutor_detail = new tutor_detail;
    $tutor_detail->idtutor = $tutor->idtutor;
    $tutor_detail->idcourse = $key;

    $tutor_detail->save();



  }



  return response()->json("Success");
}
}else if($req->action =='del'){


  tutor_detail::where('idtutor',"=",$req->idtutor)->delete();
//


 Account::where('idtutor',"=",$req->idtutor)->delete();
//
//
 tutor::where('idtutor',"=",$req->idtutor)->delete();









  return response()->json("Success");

}





}


}
