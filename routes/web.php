<?php
use App\course;
use Illuminate\Support\Facades\DB;
use App\Grade;
use Illuminate\Support\Facades\Session;
use App\News;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
// */


Route::get('help', function () {
    return view('help');
});



Route::get('loginbackend', function () {
    return view('loginbackend');
});

// */

Route::get('station', function () {
    return view('station');
});


Route::get('tutorcheck', function () {
    return view('tutorcheck');
});

Route::get('/Resume', function () {
    return view('Resume');
});


Route::get('reportcheckstuden', 'tutorController@reportcheckstuden');
Route::post('gettutor_compensate', 'tutorController@gettutor_compensate');


// Route::get('/reportcheckstuden', function () {
//
//     if(Auth::user()){
//
//       if(Auth::user()->idemp!=''||Auth::user()->idemp!=null){
//
//         return view('reportcheckstuden');
//
//
//
//
//
//
//
//
//
//
//
//       }else{
//         return redirect('/');
//
//
//
//       }
//     }else{
//       return redirect('/');
//
//
//
//     }
// });




Route::get('/', function () {


if(Auth::user()){

  $ee = DB::select('SELECT  course.*,payment_reserve.idpay_reserve,testing.*,type_course.idtype,payment_reserve.status,payment_reserve.IDUserAccount FROM course
LEFT join course_detail on course.idcourse = course_detail.idcourse
LEFT join  payment_reserve on course.idcourse = payment_reserve.idcourse and payment_reserve.idUserAccount = '.Auth::user()->IDUserAccount.' and payment_reserve.status != "ไม่ผ่านการตรวจสอบ"
left JOIN grade on course_detail.idGrade = grade.idGrade
LEFT JOIN type_course on type_course.idtype = grade.idtype
  LEFT join testing on testing.idpay_reserve = payment_reserve.idpay_reserve
  LEFT join account on account.IDUserAccount = payment_reserve.IDUserAccount
  and  account.idUserAccount = '.Auth::user()->IDUserAccount.'
  GROUP by course.idcourse');


}else{
    $ee = course::join('course_detail','course.idcourse','course_detail.idcourse')
    ->join('grade','grade.idGrade','course_detail.idGrade')

  ->join('type_course','type_course.idtype','grade.idtype')

  ->select('course.*','type_course.*')

  ->distinct()
    ->get();


}

//


//   $ee = course::leftjoin('course_detail','course.idcourse','course_detail.idcourse')
//   ->leftjoin('grade','course_detail.idGrade','grade.idGrade')
//
//   ->leftjoin('payment_reserve','grade.idGrade','course_detail.idGrade')
//   ->leftjoin('account','account.IDUserAccount','payment_reserve.IDUserAccount')
// ->select('course.*','grade.idtype','payment_reserve.idpay_reserve')
// ->groupby('course.idcourse','course.name','course.updated_at','course.created_at','course.course_detail','grade.idtype','grade.updated_at','grade.created_at','grade.Isgroup','payment_reserve.idpay_reserve')
//   ->get();


//
//
//   $ee = course::join('course_detail','course.idcourse','course_detail.idcourse')
//   ->join('grade','grade.idGrade','course_detail.idGrade')
//
// ->join('type_course','type_course.idtype','grade.idtype')
// ->select('course.*','type_course.*')
// ->distinct()
//   ->get();



// dd($ee);







    $news = News::orderBy('id_news', 'desc')->limit(3)->get();




        $Grade = Grade::all();



        $dataall = array(


             'subjects' => $ee,
             'Grade' => $Grade,

             'news' => $news,
        );

    return view('home',$dataall);
});


Route::get('getstation', 'AdminController@getstation');
Route::post('editstation', 'AdminController@editstation');


//
// Route::get('index3', function () {
//     return view('index3');
// });
Route::post('getstudencomedetail_date', 'tutorController@getstudencomedetail_date');


Route::post('checkselecttime', 'timetableController@checkselecttime');

Route::post('getstudencomedetail', 'tutorController@getstudencomedetail');
Route::post('getstudencomedetail_over', 'tutorController@getstudencomedetail_over');
Route::post('getstudencomedetail_date_over', 'tutorController@getstudencomedetail_date_over');

Route::post('getstudencome', 'tutorController@getstudencome');


Route::post('getsumtimetable', 'timetableController@getsumtimetable');
Route::post('getsumtimetable2', 'timetableController@getsumtimetable2');


Route::post('crudtopicdetail', 'webboardController@crudtopicdetail');


Route::post('crudtopic', 'webboardController@crudtopic');

Route::post('getdetailtimetable', 'tutorController@getdetailtimetable');


Route::post('gettutorall', 'tutorController@gettutorall');


Route::post('getkey', 'timetableController@getkey');


Route::post('registerstudent', 'Register@registerstudent');


Route::post('getreporttutor2', 'tutorController@getreporttutor2');

Route::post('getreporttutor', 'tutorController@getreporttutor');


Route::post('resumesubject', 'ResumeController@resumesubject');



Route::post('subject_to_tutor', 'tutorController@subject_to_tutor');





Route::post('crumuser', 'StudentController@crumuser');

Route::post('changepic', 'StudentController@changepic');

Route::post('subjecttutor', 'StudentController@subjecttutor');

Route::post('crudstudent', 'StudentController@crudstudent');


Route::post('getreportbuy', 'reserveController@getreportbuy');


Route::post('checktest', 'reserveController@checktest');


Route::post('getcd', 'reserveController@getcd');


Route::post('getDatabuylist', 'reserveController@getDatabuylist');




Route::post('buycourse', 'timetableController@buycourse');



Route::post('gettutorandroom', 'timetableController@gettutorandroom');





Route::post('crudtimetable', 'timetableController@crudtimetable');

Route::get('showtimetable', 'timetableController@showtimetable');



Route::get('showtimetablewhere{id}', 'timetableController@showtimetablewhere');

Route::post('gettimetablewtf', 'timetableController@gettimetablewtf');



Route::post('testrecord', 'reserveController@testrecord');

Route::post('registertutor', 'Register@registertutor');

Route::post('getDataroom', 'AdminController@getDataroom');

Route::post('getDataemp', 'AdminController@getDataemp');


Route::post('/downloadresume','ResumeController@downloadresume')->name('downloadresume');


Route::post('gettutoroncourse','tutorController@gettutoroncourse');


Route::post('crudtutor','tutorController@crudtutor');



Route::post('crudNews','NewsController@crudNews')->name('crudNews');



Route::post('getDataresume','ResumeController@getDataresume')->name('getDataresume');


Route::post('/actioncheckresume','ResumeController@actioncheckresume')->name('actioncheckresume');

Route::post('/viewresume','ResumeController@viewresume')->name('viewresume');


Route::post('getgradesubjects2', 'GradeController@getgradesubjects2');

Route::post('getgradesubjects', 'GradeController@getgradesubjects');

Route::post('getgrade', 'GradeController@getgrade');

Route::post('crudgrade', 'GradeController@crudgrade');

Route::post('crumsubject', 'SubjectController@crumsubject');


Route::post('crudtype', 'typeSubjectController@crudtype');



Route::post('subsubject', 'SubjectController@subsubject');
Route::post('subdatailsubject', 'SubjectController@subdatailsubject');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/actiontutor','ResumeController@actiontutor')->name('actiontutor');


Route::post('confirmreser','reserveController@confirmreser')->name('confirmreser');



Route::post('confirmbuy','reserveController@confirmbuy')->name('confirmbuy');


Route::get('getDatapaymentre', 'reserveController@getDatapaymentre');




Route::post('actioncheckpayre', 'reserveController@actioncheckpayre');
//
// Route::post('loginc', 'loginController@login')->name('loginc');
// Route::post('logoutc', 'loginController@logout')->name('logoutc');




Route::group(['middleware'=>'web'],function(){

  Route::get('paymentcheckbuy', function () {
if(Auth::user()){

  if(Auth::user()->idemp!=''||Auth::user()->idemp!=null){

    return view('paymentcheckbuy');

  }else{
    return redirect('/');



  }
}else{
  return redirect('/');



}



  });
  Route::auth();
  Route::resource('admin','AdminController');
  Route::get('Subjects', 'AdminController@Subject');
  Route::get('Checkresume', 'AdminController@Checkresume');
  Route::get('allow_tutor', 'AdminController@allow_tutor');

  Route::get('edituser', 'HomeController@edituser');

  Route::get('Transaction', 'HomeController@Transaction');



Route::get('tutor_management', 'AdminController@tutor_management');


  Route::get('employee_management', 'AdminController@employee_management');
  Route::post('reser','reserveController@reser');


Route::get('paymentcheck', 'AdminController@paymentcheck');

Route::get('room', function () {

  if(Auth::user()){

  if(Auth::user()->idemp!=''||Auth::user()->idemp!=null){

    return view('room');

  }else{
    return redirect('/');



  }

}else{
  return redirect('/');


}
});

Route::get('main', function () {
  if(Auth::user()){

  if(Auth::user()->idemp!=''||Auth::user()->idemp!=null){

    return view('mainadmin');

  }else{
    return redirect('/');



  }
}else{

  return redirect('/');

}

});

Route::get('testing', function () {

  if(Auth::user()){


if(Auth::user()->idtutor!=''||Auth::user()->idtutor!=null){

  return view('testing2');

}else{
  return redirect('/');



}

}else{
  return redirect('/');


}

});




Route::get('timetableshow', function () {
    return view('01_basic_init');
});

Route::get('newsmanagement', function () {

  if(Auth::user()){


  if(Auth::user()->idemp!=''||Auth::user()->idemp!=null){

    return view('newsmanagement');

  }else{
    return redirect('/');



  }
}else{
  return redirect('/');


}


});
Route::get('/student_management', function () {

  if(Auth::user()){


  if(Auth::user()->idemp!=''||Auth::user()->idemp!=null){

    return view('student_management');

  }else{
    return redirect('/');



  }
}else{
  return redirect('/');


}


});

Route::get('webboarddetail{id}', function ($id) {


  $data  = App\webboard::findOrFail($id);

  $dataall = array(


       'data' => $data,
  );

    return view('webboarddetail',$dataall);


});

Route::get('timetable', 'timetableController@timetable');

Route::get('reportbuy', function () {


  if(Auth::user()){

  if(Auth::user()->idemp!=''||Auth::user()->idemp!=null){

    return view('reportbuy');

  }else{
    return redirect('/');



  }
}else{
  return redirect('/');

}


});

Route::get('reporttutor', function () {

if(Auth::user()){

if(Auth::user()->idemp!=''||Auth::user()->idemp!=null){

    return view('reporttutor');

  }else{
    return redirect('/');



  }

}else{
  return redirect('/');


}

});

Route::get('reporttutor2', function () {

if(Auth::user()){

    if(Auth::user()->idemp!=''||Auth::user()->idemp!=null){

      return view('reporttutor2');

    }else{
      return redirect('/');



    }
  }else{
    return redirect('/');


  }

});

Route::get('webboard', function () {
    return view('webboard');
});
});
