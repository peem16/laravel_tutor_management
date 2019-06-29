<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Auth;
use QrCode;
use Illuminate\Support\Facades\DB;
use Response;
use Validator;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use App\student;
use App\account;
use App\tutor;
use App\tutor_detail;

use App\emp;



class StudentController extends Controller
{
    //


public function crudstudent(Request $req){


if($req->action == "view"){


  $student = student::join('account','account.idstudent','student.idstudent')->get();



    return response()->json($student);

}else if($req->action == "add"){


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

  );

  $validator = Validator::make(Input::all(), $rules);
  if ($validator->fails()) {
      return Response::json(array(

              'errors' => $validator->getMessageBag()->toArray(),
      ));

} else {

$student = new student;
$student->firstname = $req->firstname;
$student->lastname = $req->lastname;
$student->sex = $req->sex;
$student->age = $req->age;
$student->Email = $req->email;
$student->phone = $req->phone;
$student->address = $req->address;
$student->save();


$acc = new account;
$acc->username = $req->username;

$acc->password = bcrypt($req->password);
$acc->idstudent = $student->idstudent;


$ran  = str_random(10);

$acc->QR_code  = $ran.'.png';


$acc->save();

  $plaintext = $acc->IDUserAccount;

  $password = 'eakqtutor2018';
  $method = 'aes-256-cbc';

  // Must be exact 32 chars (256 bit)
  $password = substr(hash('sha256', $password, true), 0, 32);

  // IV must be exact 16 chars (128 bit)
  $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

  // av3DYGLkwBsErphcyYp+imUW4QKs19hUnFyyYcXwURU=
  $encrypted = base64_encode(openssl_encrypt($plaintext, $method, $password, OPENSSL_RAW_DATA, $iv));

  // My secret message 1234

  // $decrypted = openssl_decrypt(base64_decode($encrypted), $method, $password, OPENSSL_RAW_DATA, $iv);





QrCode::format('png')->size(1000)->color(36,169,226)->generate($encrypted, '../public/storage/QR/'.$ran.'.png');

return response()->json("Success");
}

}else if($req->action == "edit"){



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

    );

    $validator = Validator::make(Input::all(), $rules);
    if ($validator->fails()) {
        return Response::json(array(

                'errors' => $validator->getMessageBag()->toArray(),
        ));

  } else {

  $student = student::find($req->id);
  $student->firstname = $req->firstname;
  $student->lastname = $req->lastname;
  $student->sex = $req->sex;
  $student->age = $req->age;
  $student->Email = $req->email;
  $student->phone = $req->phone;
  $student->address = $req->address;
  $student->save();

  $acc = account::where('idstudent',$req->id)->first();


    $acc->username = $req->username;
    if($req->password){


      $acc->password =  bcrypt($req->password);


    }
    $acc->idstudent = $student->idstudent;
    $acc->save();




  return response()->json("Success");
}

}else if($req->action == "del"){



  $acc = account::where('idstudent','=',$req->id)->delete();
//


  $student = student::find($req->id)->delete();


  return response()->json("Success");

}





}


public function subjecttutor(Request $req){


$tutor = tutor_detail::where('idtutor',$req->id)->get();


return response()->json($tutor);

}


    public function changepic(Request $req){
if($req->who =='student'){

  $studen  = student::find($req->id);

}else if($req->who =='tutor'){

  $studen  = tutor::find($req->id);


}




      date_default_timezone_set("Asia/Bangkok");
      setlocale(LC_ALL,"hu_HU.UTF8");
      $strStart  = date("Y-m-d");


      if($req->hasfile('Pic')){

        if( $studen->profilepic!=""){
 Storage::delete('public/Pic/'.$studen->profilepic);
        }


        $type = $req->Pic->getClientOriginalExtension();


          $filename = 'Pic'.$strStart.$studen->firstName.$studen->lastName.'.'.$type;
          $studen->profilepic = $filename;

          $req->Pic->storeAs('public/Pic',$filename);

            $studen->save();
        }




}


    public function crumuser(Request $req){




if($req->action == 'edit'){

  if($req->who == 'student'){

    $studen  = student::find($req->id);
    $studen->firstname = $req->firstname;
    $studen->lastname = $req->lastname;
    $studen->sex = $req->sex;
    $studen->age = $req->age;
    $studen->Email = $req->email;
    $studen->phone = $req->phone;
    $studen->address = $req->address;
    $studen->save();

    $studen2  = account::where('idstudent',$req->id)->first();
    $studen2->username = $req->username;

    if($req->password!=""){
      $studen2->password =  bcrypt($req->password);
    }


    $studen2->save();
  }else if($req->who == 'tutor'){

    $studen  = tutor::find($req->id);
    $studen->firstname = $req->firstname;
    $studen->lastname = $req->lastname;
    $studen->sex = $req->sex;
    $studen->age = $req->age;
    $studen->Email = $req->email;
    $studen->phone = $req->phone;
    $studen->address = $req->address;
    $studen->save();

    $studen2  = account::where('idtutor',$req->id)->first();
    $studen2->username = $req->username;

    if($req->password!=""){
      $studen2->password =  bcrypt($req->password);
    }


    $studen2->save();



  }






return response()->json("Success");


}





    }






}
