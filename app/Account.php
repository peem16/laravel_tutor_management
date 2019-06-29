<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Auth;
use App\emp;
use App\tutor;

use App\student;

class Account extends Authenticatable
{
    //
  use Notifiable;


      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
          'IDUserAccount', 'username', 'password','idstudent','idemp','idtutor','remember_token','QR_code'
      ];
      protected $primaryKey = 'IDUserAccount';
      protected $table = 'account';
      /**
       * The attributes that should be hidden for arrays.
       *
       * @var array
       */
       // public $remember_token=false;
      protected $hidden = [
          'password','remember_token'
      ];


      public function getpositionAttribute(){

    $user = emp::find(Auth::user()->idemp);



        return $user->position;
      }

      public function getfirstnameAttribute(){

if(Auth::user()->idstudent!=""){
  $user = student::find(Auth::user()->idstudent);

          return $user->firstname;


}else if(Auth::user()->idemp!=""){
  $user = emp::find(Auth::user()->idemp);

          return $user->firstname;



}else if(Auth::user()->idtutor!=""){
  $user = tutor::find(Auth::user()->idtutor);

          return $user->firstname;

}



      }

      public function getlastnameAttribute(){

        if(Auth::user()->idstudent!=""){
          $user = student::find(Auth::user()->idstudent);

                  return $user->lastname;


        }else if(Auth::user()->idemp!=""){
          $user = emp::find(Auth::user()->idemp);

                  return $user->lastname;



        }else if(Auth::user()->idtutor!=""){
          $user = tutor::find(Auth::user()->idtutor);

                  return $user->lastname;

        }
      }


}
