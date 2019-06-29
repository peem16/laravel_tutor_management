<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use App\student;
use App\tutor;
use App\emp;
use App\Account;
use App\Resume;
use QrCode;
use Auth;

use DateTime;
class Register extends Controller
{

    public function registerstudent(Request $req) {



            $rules = array(
            'username' =>  'required|max:16|alpha_num',
            'password' => 'required|max:16|alpha_num',
            'firstname' => 'required',
            'lastname' => 'required',
            'sex' => 'required',
            'age' => 'required',
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


      $find = Account::where('username',$req->username)->get();

      if ($find->count()) {
        return Response::json(array(

                  'usernamemes' => 'ชื่อผู้ใช้งานถูกใช้ไปแล้ว',
        ));

      }else{



$student = new student;
$student->firstname = $req->firstname;
$student->lastname = $req->lastname;
$student->sex = $req->sex;
$student->age = $req->age;

$student->Email = $req->email;
$student->phone = $req->phone;
$student->address = $req->address;




$student->save();

$account = new Account;
$account->username = $req->username;
$account->password =  bcrypt($req->password);
$account->idstudent = $student->idstudent;

$ran  = str_random(10);


$account->QR_code  = $ran.'.png';

$account->save();






        $plaintext = $account->IDUserAccount;
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
}
    }



    public function registertutor(Request $req) {


      $rules = array(
      'firstName' => 'required',
      'lastName' => 'required',
      'idcard' => 'required|digits:13|numeric',
      'phone' => 'required|digits_between:9,10|numeric',
      'position' => 'required',
      'email' => 'required|max:30|Email',
      'ability' => 'required',
      'address' => 'required',
      'sex' => 'required',
      'age' => 'required',
      'Resume' => 'required|file',
      'IDCardPhoto' => 'required|file',
      'Pic' => 'required|file',

      );

      $validator = Validator::make(Input::all(), $rules);
      if ($validator->fails()) {
          return Response::json(array(

                  'errors' => $validator->getMessageBag()->toArray(),
          ));

    } else {

$find = resume::where('Identification_no',$req->idcard)->get();

if ($find->count()) {
  return Response::json(array(

            'idcard' => 'เลขประชาชนนี้ถูกใช้ไม่แล้ว',
  ));

}else{

  //
  $resume = new resume;
  $resume->firstname = $req->firstName;
  $resume->lastname = $req->lastName;
  $resume->Identification_no = $req->idcard;
  $resume->phone = $req->phone;
  $resume->interested_position = $req->position;
  $resume->email = $req->email;
  $resume->ability = $req->ability;
  $resume->address = $req->address;
  $resume->sex = $req->sex;
  $resume->age = $req->age;

  $resume->status = "รอการตรวจสอบ";



  date_default_timezone_set("Asia/Bangkok");
  setlocale(LC_ALL,"hu_HU.UTF8");
  $strStart  = date("Y-m-d");
  $dteStart = new DateTime($strStart);

  $ran  = str_random(10);

  if($req->hasfile('Resume')){
    $type = $req->Resume->getClientOriginalExtension();

      $filename = 'Resume'.$strStart.$ran.'.'.$type;
      $resume->resume_file = $filename;




      $req->Resume->storeAs('public/Resume',$filename);
    }




    if($req->hasfile('IDCardPhoto')){
      $type = $req->IDCardPhoto->getClientOriginalExtension();


        $filename = 'IDCardPhoto'.$ran.'.'.$type;
        $resume->Identification_file = $filename;

        $req->IDCardPhoto->storeAs('public/Resume',$filename);
      }


  if($req->hasfile('Pic')){
    $type = $req->Pic->getClientOriginalExtension();


      $filename = 'Pic'.$strStart.$ran.'.'.$type;
      $resume->profilepic = $filename;

      $req->Pic->storeAs('public/Pic',$filename);
    }




      $resume->save();
      return response()->json("Success");

}





}


    }

}
