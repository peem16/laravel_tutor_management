<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Illuminate\Support\Facades\DB;
use Response;
use Validator;
use App\type_course;
use App\course;
use App\resume;
use App\Room;
use App\Account;

use App\station;


use App\emp;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function __construct()
     {
         $this->middleware('emp');
     }


     public function Subject()
     {


       $type = type_course::all();


       $subjects = course::join('course_detail','course_detail.idcourse','=','course.idcourse')


       ->join('grade','grade.idGrade','=','course_detail.idGrade')

       ->join('type_course','type_course.idtype','=','grade.idtype')
       ->distinct()
       ->select('course.idcourse','course.name','type_course.idtype','type_course.nametype','course.course_detail')
       ->get();





               $dataall = array(

                   'type' => $type,
                    'subjects' => $subjects,
               );


       return view('Subjects',$dataall);
     }




public function allow_tutor()
{
  $resume = resume::all()->where('status','ผ่านการตรวจสอบ');
  $dataall = array(


       'resume' => $resume,
  );




  return view('allow_tutor',$dataall);


}




public function tutor_management()
{


  $course = course::all();

  $dataall = array(


       'course' => $course
  );


  return view('tutor_management',$dataall);




}

public function employee_management()
{

  $emp = emp::all();




  return view('employee_management',$emp);


}
     public function Checkresume()
     {

       $course = course::all();

       $resume = resume::all()->where('status','รอการตรวจสอบ');
       $dataall = array(


            'resume' => $resume,
            'course' => $course
       );



       return view('Checkresume',$dataall);
     }



     public function paymentcheck()
     {

      // $pay = payment_reserve::all();
      //
      //
      //  $dataall = array(
      //
      //
      //       'pay' => $pay,
      //  );



       return view('paymentcheck');
     }

    public function index()
    {
      return view('admin');
    }
    public function getstation()
    {


    $ee = station::all();
    return response()->json($ee);

    }
    public function editstation(Request $request)
    {
    $asd =   DB::select('SELECT * from station');

$id = "";
foreach ($asd as  $value) {
  $id = $value->id_station;


}
if($id){


$station =  station::find($id);
$station->name_station = $request->namesta;
$station->latitude  = $request->latitude;
$station->longitude  = $request->Longitude;
$station->Singup_distance  = $request->dis;
$station->IDUserAccount  = Auth::user()->IDUserAccount;
$station->save();

return response()->json("success");

}else{
  $station = new station;
$station->name_station = $request->namesta;
$station->latitude  = $request->latitude;
$station->longitude  = $request->Longitude;
$station->Singup_distance  = $request->dis;
$station->IDUserAccount  = Auth::user()->IDUserAccount;
$station->save();

return response()->json("success");


}


    }


    public function getDataroom(Request $request)
    {


if($request->action == 'edit'){

  $rules = array(
    'number' =>  'required|numeric',
    'amount' => 'required|numeric',
  // 'description' => 'required',
  'typeroom' => 'required',


  );

  $validator = Validator::make(Input::all(), $rules);
  if ($validator->fails()) {
      return Response::json(array(

              'errors' => $validator->getMessageBag()->toArray(),
      ));

} else {




$Room = Room::where('idroom',$request->idroom)->first();



$Room->number = $request->number;
$Room->amount = $request->amount;
$Room->description = $request->description;
$Room->typeroom = $request->typeroom;
$Room->save();

}
}else if($request->action == 'delete'){

  $Room = Room::find($request->idroom)->delete();



}else if($request->action == 'add'){

  $rules = array(
    'number' =>  'required|numeric',
    'amount' => 'required|numeric',
  // 'description' => 'required',
  'selecttype' => 'required',


  );

  $validator = Validator::make(Input::all(), $rules);
  if ($validator->fails()) {
      return Response::json(array(

              'errors' => $validator->getMessageBag()->toArray(),
      ));

} else {

$find = Room::where('number',$request->number)->get();

if ($find->count()) {
  return Response::json(array(

            'numbers' => 'number has been taken',
  ));
}else{

  $Room = new Room;

  $Room->number = $request->number;
  $Room->amount = $request->amount;
  $Room->description = $request->description;
  $Room->typeroom = $request->selecttype;
  $Room->save();

        return response()->json("Success");
}



}
}


  $Room = Room::orderBy('number','asc')->get();;


      return response()->json($Room);

    }





    public function getDataemp(Request $request)
    {


if($request->action == 'edit'){


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
  'position' => 'required',

  );

  $validator = Validator::make(Input::all(), $rules);
  if ($validator->fails()) {
      return Response::json(array(

              'errors' => $validator->getMessageBag()->toArray(),
      ));

}else{


  $account = Account::find($request->ida);
  $account->username = $request->username;
  if($request->password){

    $account->password =  bcrypt($request->password);

  }
  $account->save();

  $emp =  emp::find($account->idemp);
  $emp->firstname = $request->firstname;
  $emp->lastname = $request->lastname;
  $emp->email = $request->email;
  $emp->sex = $request->sex;
  $emp->age = $request->age;
  $emp->phone = $request->phone;
  $emp->address = $request->address;
  $emp->position = $request->position;

  $emp->save();

}


}else if($request->action == 'delete'){


  $account = Account::find($request->ida);

   $emp =  emp::find($account->idemp)->delete();
   $account = Account::find($request->ida)->delete();


}else if($request->action == 'add'){

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
  'position' => 'required',

  );

  $validator = Validator::make(Input::all(), $rules);
  if ($validator->fails()) {
      return Response::json(array(

              'errors' => $validator->getMessageBag()->toArray(),
      ));

}else{


$emp = new emp;
$emp->firstname = $request->firstname;
$emp->lastname = $request->lastname;
$emp->email = $request->email;
$emp->sex = $request->sex;
$emp->age = $request->age;
$emp->phone = $request->phone;
$emp->address = $request->address;
$emp->position = $request->position;

$emp->save();

$account = new Account;
$account->username = $request->username;
$account->password =  bcrypt($request->password);
$account->idemp = $emp->idemp;
$account->save();




}
}


  $emp = emp::join('account','account.idemp','=','employee.idemp')->get();


      return response()->json($emp);

    }




















    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
