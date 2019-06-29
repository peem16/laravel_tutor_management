<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\course;

use App\Course_detail;


class SubjectController extends Controller
{
    //


  public function subdatailsubject(Request $request){



    $subjects = course::join('course_detail','course_detail.idcourse','=','course.idcourse')


    ->join('grade','grade.idGrade','=','course_detail.idGrade')

    ->join('type_course','type_course.idtype','=','grade.idtype')


    ->select('course_detail.idGrade','grade.nameGrade','course_detail.*','course.name','grade.idGrade','course.idcourse')
    ->where([['course.name',$request->id],['grade.idGrade',$request->idg]])

    ->get();



    return response()->json($subjects);


      }
    public function subsubject(Request $request){



        $subjects = course::join('course_detail','course_detail.idcourse','=','course.idcourse')


        ->join('grade','grade.idGrade','=','course_detail.idGrade')

        ->join('type_course','type_course.idtype','=','grade.idtype')

        ->distinct()
        ->select('course_detail.idGrade','grade.nameGrade')
        ->where('course.name',$request->id)

        ->get();




return response()->json($subjects);

    }




      public function crumsubject(Request $request)
      {



  # code...




if($request->action == 'add'){



  $Subjects = new course;

  $Subjects->name= $request->namesubject;
  $Subjects->course_detail= $request->detailsubject;


   $Subjects->save();
   $g = explode(',',$request->idGrade);


$pp = 0;

$sss = explode(',',$request->array);



foreach ($g as $key) {


  // print( $key);


for ($c=0; $c < $sss[$pp]; ) {





  $amount_courses = 'amount'.$key.'_'.($c+1);
  $per_round = 'per_round'.$key.'_'.($c+1);
  $Time_length = 'Time_length'.$key.'_'.($c+1);
  $price = 'price'.$key.'_'.($c+1);
  $note = 'note'.$key.'_'.($c+1);




  $Manygrade = new Course_detail;
  $Manygrade->idcourse =   $Subjects->idcourse;
  $Manygrade->idGrade =  $key;
  $Manygrade->amount_courses= $request->$amount_courses;
  $Manygrade->per_round=  $request->$per_round;
  $Manygrade->Time_length=  $request->$Time_length;
  $Manygrade->price=  $request->$price;
  $Manygrade->note= $request->$note;
  $Manygrade->save();



  $c++;
}
$pp++;

}



   return response()->json('addsuccess');


}else if($request->action == 'edit'){


  $Subjects = course::find($request->idsubjects);
  $Subjects->name= $request->namesubject;
  $Subjects->course_detail= $request->detailsubject;


   $Subjects->save();
   $g = explode(',',$request->idGrade);


$pp = 0;

$sss = explode(',',$request->array);
//
// $Manygrade = Manygrade::where('idsubjects',$request->idsubjects)->get();
//
// foreach ($Manygrade as $key) {
//
// print($key->idmanygrade);
//
//
//
//
//
// }

foreach ($g as $key) {


  // print( $key);


for ($c=0; $c < $sss[$pp]; ) {





  $amount_courses = 'amount'.$key.'_'.($c+1);
  $per_round = 'per_round'.$key.'_'.($c+1);
  $Time_length = 'Time_length'.$key.'_'.($c+1);
  $price = 'price'.$key.'_'.($c+1);
  $note = 'note'.$key.'_'.($c+1);
  $idmanygrade = 'idmanygrade'.$key.'_'.($c+1);



if($request->$idmanygrade!==null){


  $Manygrade = Course_detail::find($request->$idmanygrade);

  $Manygrade->idcourse =  $Subjects->idcourse;
  $Manygrade->idGrade =  $key;
  $Manygrade->amount_courses= $request->$amount_courses;
  $Manygrade->per_round=  $request->$per_round;
  $Manygrade->Time_length=  $request->$Time_length;
  $Manygrade->price=  $request->$price;
  $Manygrade->note= $request->$note;
  $Manygrade->save();
}else{

  $Manygrade = new Course_detail;

  $Manygrade->idcourse =   $Subjects->idcourse;
  $Manygrade->idGrade =  $key;
  $Manygrade->amount_courses= $request->$amount_courses;
  $Manygrade->per_round=  $request->$per_round;
  $Manygrade->Time_length=  $request->$Time_length;
  $Manygrade->price=  $request->$price;
  $Manygrade->note= $request->$note;
  $Manygrade->save();


}










  $c++;
}
$pp++;

}


   return response()->json('editsuccess');

}else if($request->action == 'del'){



  $Manygrade = course_detail::where('idcourse',$request->idsubjects)->delete();



  $Subjects = course::where('idcourse',$request->idsubjects)->delete();



  return response()->json('deletesuccess');

}else {

if($request->where){


  $subjects = course::join('course_detail','course_detail.idcourse','=','course.idcourse')


  ->join('grade','grade.idGrade','=','course_detail.idGrade')

  ->join('type_course','type_course.idtype','=','grade.idtype')

  ->distinct()
  ->select('course.idcourse','course.name','type_course.idtype','type_course.nametype','course.course_detail')
  ->where('type_course.idtype',$request->where)

  ->get();

}else{

  $subjects = course::join('course_detail','course_detail.idcourse','=','course.idcourse')


  ->join('grade','grade.idGrade','=','course_detail.idGrade')

  ->join('type_course','type_course.idtype','=','grade.idtype')
  ->distinct()
  ->select('course.idcourse','course.name','type_course.idtype','type_course.nametype','course.course_detail')
  ->get();



}


     return response()->json($subjects);



    }


}

}
