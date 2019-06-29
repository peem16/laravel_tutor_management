<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Response;
use App\Resume;
use App\tutor;
use App\course;
use App\Account;
use Illuminate\Support\Facades\DB;

use App\tutor_detail;
use Validator;
use Illuminate\Support\Facades\Input;

class ResumeController extends Controller
{



  public function resumesubject(Request $req){

    $ee = DB::select('select * from course where idcourse in ('.$req->id.')');





return response()->json($ee);


}






  public function downloadresume(Request $req){

  // dd($req->all());

  if($req->file !== null){


// dd(public_path()."\storage\\Resume\\".$req->file.".jpg");
    if(!$this->downloadfile(public_path()."\storage\\Resume\\".$req->file)){

    // return redirect()->back();



  }




  }



  }



  public function getDataresume(Request $req){

  $resume = Resume::where('Identification_no',$req->id)->first();


if($resume){


  if($resume->status =="ไม่ผ่านการตรวจสอบ"){

    Resume::where('Identification_no',$req->id)->delete();

    return response()->json($resume);


  }else{


    return response()->json($resume);

  }

}else{


  return response()->json("notfound");

}






}







  public function actioncheckresume(Request $req){








if($req->action=='pass'){
  $rules = array(
  'comment' =>  'required',
  'subject0' =>  'required',

  );
  $validator = Validator::make(Input::all(), $rules);
  if ($validator->fails()) {
      return Response::json(array(

              'errors' => $validator->getMessageBag()->toArray(),
      ));

}else{


    $resume = Resume::find($req->id);
    $resume->status = "ผ่านการตรวจสอบ";
    $resume->comment = $req->comment;
  $course = "";
  $sub ="";


  for ($i=0; $i < $req->num; $i++) {



  $sub = "subject".$i;
  if($i==0){

    $course = $req->$sub;


  }else{


    $course = $course.",".$req->$sub;

  }


  }


  // dd($req->$sub);
  $resume->course =$course;


      $resume->save();


      return response()->json("Success");
}


}else if($req->action=='nopass'){

  $rules = array(
  'comment' =>  'required',


  );
  $validator = Validator::make(Input::all(), $rules);
  if ($validator->fails()) {
      return Response::json(array(

              'errors' => $validator->getMessageBag()->toArray(),
      ));

}else{

    // $resume = Resume::find($req->id)->delete();

    $resume = Resume::find($req->id);
    $resume->status = "ไม่ผ่านการตรวจสอบ";
      $resume->comment = $req->comment;
      $resume->save();



    return response()->json("Success");

}
  }

}




public function viewresume(Request $req){

  $resume = Resume::all()->where('status','รอการตรวจสอบ');



  return response()->json($resume);

}




  public function downloadfile($req){



  if(is_file($req)){

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $content_type = finfo_file($finfo,$req);

    finfo_close($finfo);
    $file_name = basename($req).PHP_EOL;

    $size = filesize($req);

    header("Content-Type: $content_type");
    header("Content-Disposition: attachment; filename=$file_name");
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: $size");
    readfile($req);


    return true;


  }else{

    return false;
  }

  }


  public function actiontutor(Request $req){


if($req->action=="pass"){







  $resume = Resume::find($req->id);

  $tutor = new tutor;
$tutor->firstname = $resume->firstname;
$tutor->lastname = $resume->lastname;
$tutor->Identification_no = $resume->Identification_no;
$tutor->phone = $resume->phone;

$tutor->interested_position = $resume->interested_position;


$tutor->idresume = $resume->idresume;


$tutor->Email = $resume->email;
$tutor->ability = $resume->ability;
$tutor->address = $resume->address;
$tutor->sex = $resume->sex;
$tutor->age = $resume->age;
$tutor->profilepic = $resume->profilepic;

$tutor->save();


$sss = explode(',',$resume->course);

foreach ($sss as $key ) {
  $tutor_detail = new tutor_detail;
 $tutor_detail->idtutor = $tutor->idtutor;
 $tutor_detail->idcourse = $key;
 $tutor_detail->save();
}





$resume->status = "รับเข้าสมัคร";
$resume->save();

$account = new Account;
$account->username = $resume->Identification_no;


$getpass = substr($resume->phone,-4);



$account->password = bcrypt($getpass);
$account->idtutor = $tutor->idtutor;
$account->save();


return response()->json("Success");



}else if($req->action=="fail"){

  $rules = array(
  'comment' =>  'required',


  );
  $validator = Validator::make(Input::all(), $rules);
  if ($validator->fails()) {
      return Response::json(array(

              'errors' => $validator->getMessageBag()->toArray(),
      ));

  }else{
  $resume = Resume::find($req->id);
  $resume->status = "ไม่ผ่านการสมัคร";
  $resume->comment = $req->comment;
  $resume->save();
  return response()->json("Success");
}

}





  }

}
