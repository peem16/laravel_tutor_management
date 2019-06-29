<?php

namespace App\Http\Controllers;

use Kreait\Firebase;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Illuminate\Http\Request;
use App\reserve_list;
use App\Account;
use App\course_detail;

use App\course;

use App\timetable;
use Illuminate\Support\Facades\Storage;
use App\testing;
use Illuminate\Support\Facades\Session;
use App\buy_list;
use App\tutor;
use App\tutor_detail;

use App\payment_reserve;
use Illuminate\Support\Facades\DB;
use App\timetabledetail;
use Auth;

class reserveController extends Controller
{
    //


public function  getcd(Request $req){


  $ss = payment_reserve::where('payment_reserve.random_key',$req->key)->get();
$id = "";

foreach ($ss as $key) {
  // code...
$id = $key->idcourse;


}

$ee = DB::select('SELECT DISTINCT grade.* FROM `course_detail`,course,grade WHERE course_detail.idcourse = '.$id.' and course_detail.idcourse = course.idcourse and grade.idGrade = course_detail.idGrade');


  return response()->json($ee);

}



public function  checktest(Request $req){



      $ss = payment_reserve::join('course','course.idcourse','payment_reserve.idcourse')->where([['payment_reserve.random_key',$req->key],['payment_reserve.status','ผ่านการตรวจสอบ']])->get();




$qwe = "";
foreach ($ss as $key ) {

$qwe = $key->idpay_reserve;
$idc = $key->idcourse;
}
if($ss!="[]"){

  if(  testing::where('idpay_reserve',$qwe)->first()){


  return response("1");

  }else{



    $checktutor = tutor_detail::join('course','course.idcourse','tutor_detail.idcourse')->

    where([['tutor_detail.idtutor','=',Auth::user()->idtutor],['course.idcourse','=',$idc]])->get();



if($checktutor!="[]"){

  $zxczxv = DB::select('SELECT DISTINCT  type_course.* FROM course,course_detail,grade,type_course where course.idcourse = course_detail.idcourse
     and course_detail.idGrade = grade.idGrade   and type_course.idtype = grade.idtype and  course.idcourse = '.$idc.' ');


$dataall = array(

  'd1' => $zxczxv,

  'd2' => $ss,



);
  return response()->json($dataall);


  // return response()->json($ss);

}else{
  return response("2");


}


  }

}else{

  return response("0");

}


}


public function  getreportbuy(Request $req){


if($req->action == "all"){

  $ee = DB::select('SELECT course_detail.*,course.name,grade.nameGrade,count(buy_list.Idcourse_detail) as num  from course_detail LEFT JOIN buy_list ON course_detail.Idcourse_detail  = buy_list.Idcourse_detail and buy_list.status = "ผ่านการตรวจสอบ"  LEFT JOIN grade ON course_detail.idGrade  = grade.idGrade LEFT JOIN course ON course.idcourse  = course_detail.idcourse GROUP by course_detail.idcourse,course.name,grade.nameGrade,course_detail.Idcourse_detail,course_detail.idGrade,course_detail.updated_at,course_detail.created_at,course_detail.amount_courses,course_detail.price,course_detail.per_round,course_detail.note,course_detail.Time_length');


}else if($req->action == "where"){

  $ee = DB::select('SELECT course_detail.*,course.name,grade.nameGrade,count(buy_list.Idcourse_detail) as num  from course_detail LEFT JOIN buy_list ON course_detail.Idcourse_detail  = buy_list.Idcourse_detail and buy_list.status = "ผ่านการตรวจสอบ"   LEFT JOIN grade ON course_detail.idGrade  = grade.idGrade LEFT JOIN course ON course.idcourse  = course_detail.idcourse
where buy_list.date_pay like "'.$req->date.'%%"
  GROUP by course_detail.idcourse,course.name,grade.nameGrade,course_detail.Idcourse_detail,course_detail.idGrade,course_detail.updated_at,course_detail.created_at,course_detail.amount_courses,course_detail.price,course_detail.per_round,course_detail.note,course_detail.Time_length');


}




  return response()->json($ee);

}








    public function  getDatabuylist(Request $req){

        if($req->action == "view"){

            $buy = buy_list::join('account','account.IDUserAccount','buy_list.IDUserAccount')


            ->join('student','student.idstudent','account.idstudent')

              ->join('course_detail','buy_list.Idcourse_detail','course_detail.Idcourse_detail')
                      ->join('course','course.idcourse','course_detail.idcourse')
                          ->join('grade','grade.idGrade','course_detail.idGrade')

            ->join('type_course','type_course.idtype','grade.idtype')

            ->select('student.firstname','student.lastname','buy_list.*','course_detail.amount_courses','course_detail.per_round','course_detail.Time_length','course_detail.note','course_detail.price','course.name','grade.nameGrade','type_course.nametype')

            ->orderBy('idbuy', 'asc')->get();


return response()->json($buy);

        }else if($req->action == "pass"){


      $buy = buy_list::find($req->id);

$cd = course_detail::join('grade','grade.idGrade','course_detail.idGrade')->where('Idcourse_detail',$buy->Idcourse_detail)->get();
$ran = null;
foreach ($cd as $key ) {

//
if($key->Isgroup == "1"){

  $ran  = str_random(10);

}else if($key->Isgroup == "2"){




  $ran  = str_random(10);



}else if($key->Isgroup == "3"){





  $ran  = str_random(10);


}
}

//
//
//
//
// }

$acc    = Account::find($buy->idUserAccount);
$buy->status = "ผ่านการตรวจสอบ";


if($buy->keyinput == null){

  $table =  new timetable ;
  $table->Start_time =$buy->time_start;
  $table->End_time =$buy->time_end;
  $table->Start_date =$buy->date_start;
  $table->End_date =$buy->date_end;

  $table->idtutor = $req->idtutor;
  $table->Idcourse_detail =$buy->Idcourse_detail;
  $table->idroom = $req->idroom;


  $table->privatekey = $ran;


  $table->save();

  $table_detail =  new timetabledetail ;
  $table_detail->idstudent = $acc->idstudent;
  $table_detail->id_timetable =$table->id_timetable;
  $table_detail->save();

  $buy->keyinput = $ran;


  $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/tutorchat-ebca0-firebase-adminsdk-alqrj-a464e716e1.json');
  $firebase = (new Factory)
      ->withServiceAccount($serviceAccount)

      ->create();
      $db = $firebase->getDatabase();


$db->getReference('Room/'.$table->id_timetable)->set('');



}else{

    $t = timetable::where('privatekey',$buy->keyinput)->get();



foreach ($t as $key ) {

    $table_detail =  new timetabledetail ;
    $table_detail->idstudent = $acc->idstudent;
    $table_detail->id_timetable = $key->id_timetable;
    $table_detail->save();
}



}





    $buy->save();




return response()->json("Success");

        }else if($req->action == "nopass"){

          $buy = buy_list::find($req->id);
$buy->status = "ไม่ผ่านการตรวจสอบ";


$buy->save();

return response()->json("Success");
        }




}


  public function  confirmbuy(Request $req){


    if($req->hasfile('file')){
      $type = $req->file->getClientOriginalExtension();
      $ran  = str_random(14);




$bill =  buy_list::find($req->idbuy);
$bill->date_pay  = now();
$bill->status = "รอการตรวจสอบ";
$bill->img  = $ran.'.'.$type;

$req->file->storeAs('public/payment_buy',$ran.'.'.$type);

$bill->save();

  return redirect('Transaction');
}

}

  public function  actioncheckpayre(Request $req){



if($req->action == 'pass'){

  $pay = payment_reserve::find($req->id);
$pay->status = "ผ่านการตรวจสอบ";

$pay->random_key  = str_random(10);
$pay->save();

}else if($req->action == 'nopass'){


  $pay = payment_reserve::find($req->id);
  $pay->status = "ไม่ผ่านการตรวจสอบ";
  $pay->save();

}


return response()->json("Success");


  }


    public function getDatapaymentre(){

$getpay = payment_reserve::join('course','course.idcourse','payment_reserve.idcourse')
->join('account','payment_reserve.IDUserAccount','account.IDUserAccount')

->join('student','student.idstudent','account.idstudent')

->select('student.firstname','student.lastname','payment_reserve.datetime','course.name','payment_reserve.*')

->orderBy('payment_reserve.idpay_reserve', 'asc')->get();






    return response()->json($getpay);

    }


    public function reser(Request $req) {


$reser = new payment_reserve;



$reser->reserve_price = 100;
$reser->idUserAccount = Auth::user()->IDUserAccount;
$reser->idcourse   = $req->ids;
$reser->status = "ยังไม่ได้ชำระเงิน";
$reser->save();



}
public function testrecord(Request $req) {


$random = payment_reserve::where('random_key',$req->idtest)->first();


$test = new testing;

$test->datetime=  now();
$test->comment = $req->text;
$test->idtutor =  Auth::user()->idtutor;
$test->idpay_reserve = $random->idpay_reserve;



$test->ask1= $req->lvlknow1;
$test->ask2= $req->lvlknow2;
$test->ask3= $req->lvlknow3;
$test->ask4= $req->lvlknow4;
$test->ask5= $req->lvlknow5;

// $test->score= $req->numberss;

$test->Total= $req->Totalallt;

// $test->idGrade= $req->reconment;
$test->save();

 return back()->withInput();


}



public function confirmreser(Request $req) {


  if($req->hasfile('file')){
    $type = $req->file->getClientOriginalExtension();
    // $type2 = $req->file->getClientOriginalName();


$ran  = str_random(14);

$pay  = payment_reserve::find($req->idreser);
$pay->datetime = now();
$pay->img  = $ran.'.'.$type;
$pay->status = "รอการตรวจสอบการชำระ";

$pay->save();




    $req->file->storeAs('public/payment_reser',$ran.'.'.$type);
    }


    //
    // $ee = DB::select('select payment_reserve.* , testing.lvlknow , course.name from payment_reserve LEFT JOIN testing on testing.idpay_reserve = payment_reserve.idpay_reserve LEFT JOIN course on course.idcourse = payment_reserve.idcourse');
    //
    //
    //
    //
    // $dataall = array(
    //
    //
    //      'trans' => $ee,
    // );
    //



    return redirect('Transaction');





}







}
