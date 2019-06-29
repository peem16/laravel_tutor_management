<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\emp;
use App\student;
use App\tutor;
use Illuminate\Support\Facades\Session;
use App\Account;



class loginController extends Controller
{
    //




    public function login(Request $request)
    {

$acc = Account::where([['username',$request->username],['password',$request->password]])->get();



  foreach ($acc as $key ) {
    session::put('IDUserAccount',$key->IDUserAccount);
    session::put('idstudent',$key->idstudent);
    session::put('idemp',$key->idemp);
    session::put('idtutor',$key->idtutor);
    session::put('username',$key->username);


  }
  if(session::get('idstudent')!=''){

    $s = student::find(session::get('idstudent'));
    session::put('firstname',$s->firstname);
    session::put('lastname',  $s->lastname);
    //

  }else if(session::get('idemp')!=''){


    $s = emp::find(session::get('idemp'));


    session::put('firstname',$s->firstname);
    session::put('lastname',  $s->lastname);

    session::put('position',  $s->position);








  }else if(session::get('idtutor')!=''){


    $s = tutor::find(session::get('idtutor'));
    session::put('firstname',$s->firstname);
    session::put('lastname',  $s->lastname);

  }


  // $qr = QrCode::generate('My First QR code');

if(session::get('username')!=''){

  return redirect('home');


}else{

  return redirect('/');

}









  }

  public function logout(Request $request)
  {



session()->flush();

return redirect('home');


}




}
