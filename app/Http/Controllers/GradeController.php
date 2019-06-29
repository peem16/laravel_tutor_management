<?php

namespace App\Http\Controllers;
use Auth;
use Response;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\type_course;
use App\Grade;
use App\Course_detail;


class GradeController extends Controller
{

  public function getgrade(Request $request)
  {



     $Grade = Grade::where('idtype',$request->idGrade)->get();






          return response()->json($Grade);



}
public function crudgrade(Request $request)
{

if($request->action == 'view'){


  $Grade = Grade::all();

  return response()->json($Grade);

}else if($request->action == 'add'){



    $rules = array(
    'nameGrade' =>  'required',
    'idtype' =>  'required',
    'group' =>  'required',

    );

    $validator = Validator::make(Input::all(), $rules);
    if ($validator->fails()) {
        return Response::json(array(

                'errors' => $validator->getMessageBag()->toArray(),
        ));

  } else {

    $find = Grade::where('nameGrade',$request->nameGrade)->get();

    if ($find->count()) {
      return Response::json(array(

                'nameGrades' => 'nameGrade has been taken',
      ));
    }else{

  $Grade = new Grade;
  $Grade->nameGrade = $request->nameGrade;
  $Grade->idtype =  $request->idtype;
  $Grade->Isgroup =  $request->group;

 $Grade->save();



return response()->json("Success");
}
}

}else if($request->action == 'edit'){
  $rules = array(
  'nameGrade' =>  'required',
  'idtype' =>  'required',
  'group' =>  'required',

  );

  $validator = Validator::make(Input::all(), $rules);
  if ($validator->fails()) {
      return Response::json(array(

              'errors' => $validator->getMessageBag()->toArray(),
      ));

} else {

  $Grade =  Grade::find($request->idgrade);
  $Grade->nameGrade = $request->nameGrade;
  $Grade->idtype =  $request->idtype;
    $Grade->Isgroup =  $request->group;
$Grade->save();

return response()->json("Success");
}



}else if($request->action == 'del'){


  $Grade =  Grade::find($request->idgrade)->delete();

  return response()->json("Success");



}






}

public function getgradesubjects2(Request $request)
{


   $Manygrade = Course_detail::join('grade','grade.idGrade','Course_detail.idGrade')

   ->where('Course_detail.idcourse',$request->idcourse)->orderBy('grade.idGrade')->get();






        return response()->json($Manygrade);



}

public function getgradesubjects(Request $request)
{


   $Manygrade = Course_detail::where('idcourse',$request->idsubjects)->orderBy('idGrade')->get();






        return response()->json($Manygrade);



}
}
