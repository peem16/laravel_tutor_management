<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Auth;

use Illuminate\Http\Request;
use App\webboard;
use App\webboarddetail;


class webboardController extends Controller
{
    //
    public function crudtopicdetail(Request $request){




if($request->action == 'view'){

  $web = webboarddetail::
where('webboard_detail.idboard',$request->id)->get();



    return response()->json($web);
}else if($request->action == 'add'){



  $web = new  webboarddetail;
$web->who =   Auth::user()->firstname." ". Auth::user()->lastname;
$web->Answer = $request->ans;
$web->idboard = $request->id;
$web->save();


  return response()->json("Success");

}








}
    public function crudtopic(Request $request){


if($request->action == "view"){

$web = webboard::all();



  return response()->json($web);



}else if($request->action == "add"){

  $web = new webboard;
$web->Topics = $request->Topics;
$web->Content =  $request->Content;
$web->IDUserAccount =  Auth::user()->IDUserAccount;
$web->save();

  return response()->json("Success");
}else if($request->action == "del"){

webboard::find($request->id)->delete();

  return response()->json("Success");
  }


}


}
