<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\course;
use Illuminate\Support\Facades\DB;
use Auth;
use App\reserve_list;
use App\Grade;
use App\payment_reserve;
use App\student;
use App\emp;
use App\News;
use App\buy_list;

use App\tutor;


use DateTime;



class HomeController extends Controller
{









    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('admin');
        $this->checkkk();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

if(Auth::user()){

  if(Auth::user()->idemp!=''){




return view('admin');

  }



}


//       $ee = DB::select('SELECT DISTINCT  course.*,type_course.idtype, payment_reserve.status ,testing.lvlknow ,(select  count(*) from buy_list  where buy_list.idTesting = testing.idTesting and buy_list.status = "ยังไม่ได้ชำระเงิน" ) as buy
// FROM  course
// LEFT JOIN  course_detail on course_detail.idcourse = course.idcourse
//
// LEFT JOIN  grade on course_detail.idGrade = grade.idGrade
//
// LEFT JOIN  type_course on grade.idtype = type_course.idtype
//
//
// LEFT JOIN  payment_reserve on payment_reserve.idcourse = course.idcourse and   '.session::get('IDUserAccount').' =  payment_reserve.idUserAccount  LEFT JOIN testing  on testing.idpay_reserve = payment_reserve.idpay_reserve
//       LEFT JOIN account  on account.IDUserAccount = payment_reserve.idUserAccount');

// dd(Auth::user());

if(Auth::user()){

  $ee = DB::select('SELECT  course.*,payment_reserve.idpay_reserve,testing.*,type_course.idtype,payment_reserve.status,payment_reserve.IDUserAccount FROM course
LEFT join course_detail on course.idcourse = course_detail.idcourse
LEFT join  payment_reserve on course.idcourse = payment_reserve.idcourse and payment_reserve.idUserAccount = '.Auth::user()->IDUserAccount.'
left JOIN grade on course_detail.idGrade = grade.idGrade
LEFT JOIN type_course on type_course.idtype = grade.idtype
  LEFT join testing on testing.idpay_reserve = payment_reserve.idpay_reserve
  LEFT join account on account.IDUserAccount = payment_reserve.IDUserAccount
  and  account.idUserAccount = '.Auth::user()->IDUserAccount.'
  GROUP by course.idcourse');



}else{
    $ee = course::join('course_detail','course.idcourse','course_detail.idcourse')
    ->join('grade','grade.idGrade','course_detail.idGrade')

  ->join('type_course','type_course.idtype','grade.idtype')

  ->select('course.*','type_course.*')

  ->distinct()
    ->get();


}




      // $subjects = course::join('course_detail','course_detail.idcourse','=','course.idcourse')
      //
      //
      // ->join('grade','grade.idGrade','=','course_detail.idGrade')
      //
      // ->join('type_course','type_course.idtype','=','grade.idtype')
      // ->distinct()
      // ->select('course.idcourse','course.name','type_course.idtype','type_course.nametype','course.course_detail')
      // ->get();







      $news = News::orderBy('id_news', 'desc')->limit(3)->get();


      $Grade = Grade::all();



      $dataall = array(


           'subjects' => $ee,
           'Grade' => $Grade,
           'news' => $news,

      );


        return view('home',$dataall);
    }


    public function checkkk(){

    $buy =  buy_list::where('status','=','ยังไม่ได้ชำระเงิน')->get();



foreach ($buy as $key) {


  $strStart  = date("Y-m-d");
  $strEnd   = $key->updated_at;
  $dteStart = new DateTime($strStart);
  $dteEnd   = new DateTime($strEnd);
  $dteDiff  = $dteStart->diff($dteEnd);
  $dated= $dteDiff->format("%d");
  $datem= $dteDiff->format("%m");


  $strEnd  = date("Y-m-d");
  $strStart   = $key->date_start;

$dteStart = new DateTime($strStart);

  $dteEnd   = new DateTime($strEnd);
  $dteDiff2  = $dteStart->diff($dteEnd);
  $dater= $dteDiff2->format("%R");


if($datem==2||$dater=="+"){



  buy_list::where('idbuy','=',$key->idbuy)->delete();

}



  // code...
}



    $reser =  payment_reserve::where('status','=','ยังไม่ได้ชำระเงิน')->get();
    foreach ($reser as $key) {
      $strStart  = date("Y-m-d");
      $strEnd   = $key->updated_at;
      $dteStart = new DateTime($strStart);
      $dteEnd   = new DateTime($strEnd);
      $dteDiff  = $dteStart->diff($dteEnd);
      $dated= $dteDiff->format("%d");
      $datem= $dteDiff->format("%m");



      if($datem==2){



        payment_reserve::where('idpay_reserve','=',$key->idpay_reserve)->delete();

      }

}



}







public function edituser(){

  if(Auth::user()){


  if(Auth::user()->idstudent!=''||Auth::user()->idstudent!=null){

    $user = student::join('account','student.idstudent','account.idstudent')

    ->find(Auth::user()->idstudent);



  }else if(Auth::user()->idemp!=''||Auth::user()->idemp!=null){

    return redirect('/');


    // $user = emp::join('account','employee.idemp','account.idemp')
    //
    // ->find(Auth::user()->idemp);



  }else if(Auth::user()->idtutor!=''||Auth::user()->idtutor!=null){


    $user = tutor::join('account','tutor.idtutor','account.idtutor')

    ->find(Auth::user()->idtutor);



  }

        $dataall = array(


             'user' => $user,
        );




  return view('edituser',$dataall);
}else{
  return redirect('/');


}


}


    public function Transaction(){


if(Auth::user()){

  if(Auth::user()->idstudent!=''){

    $ee = DB::select('select distinct  grade.idtype, payment_reserve.* , testing.idTesting,testing.comment, testing.ask1, testing.ask2, testing.ask3, testing.ask4, testing.ask5,  course.name  from payment_reserve LEFT JOIN testing on
     testing.idpay_reserve = payment_reserve.idpay_reserve LEFT JOIN course on course.idcourse = payment_reserve.idcourse left join course_detail on course_detail.idcourse = course.idcourse
left join grade on course_detail.idGrade = grade.idGrade
        where payment_reserve.idUserAccount = "'.Auth::user()->IDUserAccount.'"
      ORDER BY  payment_reserve.idpay_reserve DESC   LIMIT 5');




     $es = DB::select('select * FROM buy_list,account,course_detail,course,type_course,grade where type_course.idtype = grade.idtype and grade.idGrade = course_detail.idGrade and account.IDUserAccount = buy_list.idUserAccount and course_detail.Idcourse_detail = buy_list.Idcourse_detail and course.idcourse = course_detail.idcourse and buy_list.idUserAccount = "'.Auth::user()->IDUserAccount.'"    ORDER BY  buy_list.idbuy DESC   LIMIT 5 ');





           $dataall = array(


                'trans' => $ee,
                'buy' => $es,
           );


           return view('Transaction2',$dataall);
  }else{

    return redirect('/');

  }
}else{

  return redirect('/');

}








    }

}
