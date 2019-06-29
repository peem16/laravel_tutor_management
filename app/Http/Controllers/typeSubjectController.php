<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

use App\type_course;
use Response;
use Validator;
use App\Typesubjects;

class typeSubjectController extends Controller
{
    //



public function crudtype(Request $request){



if($request->action == 'view'){


   $type= type_course::all();
  return response()->json($type);

}else if($request->action == 'add'){

  $rules = array(
    'nametype' =>  'required',



  );

  $validator = Validator::make(Input::all(), $rules);
  if ($validator->fails()) {
      return Response::json(array(

              'errors' => $validator->getMessageBag()->toArray(),
      ));

} else {
  $find = type_course::where('nametype',$request->nametype)->get();

  if ($find->count()) {
    return Response::json(array(

              'nametypes' => 'nametypes has been taken',
    ));
  }else{

  $type = new type_course;

  $type->nametype = $request->nametype;
$type->save();
return response()->json("Success");
}
}
}else if($request->action == 'edit'){

  $rules = array(
    'nametype' =>  'required',



  );

  $validator = Validator::make(Input::all(), $rules);
  if ($validator->fails()) {
      return Response::json(array(

              'errors' => $validator->getMessageBag()->toArray(),
      ));

} else {



  $type = type_course::find($request->idtype);
  $type->nametype = $request->nametype;
  $type->save();

  return response()->json("Success");

}
}else if($request->action == 'del'){



  $type = type_course::find($request->idtype)->delete();

  return response()->json("Success");



}



}



}
