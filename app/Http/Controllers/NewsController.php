<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    //

    public function crudNews(Request $request){


if($request->action=="view"){

  $new = News::join('employee','employee.idemp','News.idemp')->get();

  return response()->json($new);



}else if($request->action=="add"){




  $rules = array(
    'Topics' =>  'required',
    // 'Content' =>  'required',
    'pic' =>  'required|file',

  );

  $validator = Validator::make(Input::all(), $rules);
  if ($validator->fails()) {
      return Response::json(array(

              'errors' => $validator->getMessageBag()->toArray(),
      ));

} else {


$nes  = new News;
$nes->Topics = $request->Topics;
$nes->Content = $request->Content;
$nes->idemp =  Auth::user()->idemp;


date_default_timezone_set("Asia/Bangkok");
setlocale(LC_ALL,"hu_HU.UTF8");
$strStart  = date("Y-m-d");

if($request->hasfile('pic')){
  $type = $request->pic->getClientOriginalExtension();


    $filename = 'Pic'.$strStart.$request->Topics.'.'.$type;
    $nes->pic = $filename;

    $request->pic->storeAs('public/News',$filename);
  }







$nes->save();

return response()->json("Success");
}

}else if($request->action=="edit"){
  $rules = array(
    'Topics' =>  'required',
    // 'Content' =>  'required',
    'pic' =>  'required|file',

  );

  $validator = Validator::make(Input::all(), $rules);
  if ($validator->fails()) {
      return Response::json(array(

              'errors' => $validator->getMessageBag()->toArray(),
      ));

} else {


$nes = News::find($request->id);
$nes->Topics = $request->Topics;
$nes->Content = $request->Content;
$nes->idemp = Auth::user()->idemp;


  date_default_timezone_set("Asia/Bangkok");
  setlocale(LC_ALL,"hu_HU.UTF8");
  $strStart  = date("Y-m-d");

  if($request->hasfile('pic')){
    Storage::delete('public/News/'.$nes->pic);

    $type = $request->pic->getClientOriginalExtension();


      $filename = 'Pic'.$strStart.$request->Topics.'.'.$type;
      $nes->pic = $filename;

      $request->pic->storeAs('public/News',$filename);
    }








$nes->save();
return response()->json("Success");
}
}else if($request->action=="del"){

  News::find($request->id)->delete();

Storage::delete('public/News/'.$request->pic);

  return response()->json("Success");


}





}

}
