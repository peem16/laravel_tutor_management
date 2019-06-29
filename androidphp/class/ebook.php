<?php
    header("Content-Type:text/html; charset=utf-8");
    include ('class/config.php');


    	include ('php-qrcode-master/lib/full/qrlib.php');


    class ebook extends config {

      public $host;
  		public $user;
  		public $pass;
  		public $db;
  		public $conn;
  		public $borrow_day;
  		public $max_device;


      function __construct() {
                 parent::__construct();


             }



        private function f_query($strSQL) {


            $strQuery = mysqli_query($this -> connect(),$strSQL ) or die(mysqli_error());
            $length = mysqli_num_fields($strQuery) or die(mysqli_error());
            $result = array();


            // while($get_info = mysqli_fetch_row($strQuery))
            // {
            //     foreach ($get_info as $field)
            //     {
            //         echo "<td>" . $field . "</td>";
            //     }
            //
            //     echo '</tr>';
            // }
            while($get_info=mysqli_fetch_array($strQuery))
            {
                foreach ($get_info as $key => $val)
                    {
                        // echo "<td>" .$key. ': ' . $val . "</td>";
if(gettype($key)!='integer'){
  $column[$key] = $val;


}

                    }
                    array_push($result, $column);


            }

            // while ($obj = mysqli_fetch_array($strQuery)) {
            //
            //     $column = array();
            //
            //
            //     for ($i = 0; $i < $length; $i++) {
            //         $column[mysqli_fetch_field($strQuery, $i)] = $obj[$i];
            //     }
            //
            // }



            $this -> Close();

            if (count($result) > 0) {

                return $result;

            } else {
                return null;
            }
        }

        private function f_output($status, $desc = null, $result = null) {
            $obj = new stdClass();
            $obj -> status = $status;
            $obj -> desc = $desc;
            $obj -> result = $result;
            return json_encode($obj);

        }

        private function f_output2($status, $desc = null, $result = null, $result2 = null) {
            $obj = new stdClass();
            $obj -> status = $status;
            $obj -> desc = $desc;
            $obj -> result = $result;
            $obj -> result2 = $result2;

            return json_encode($obj);

        }
        public function getmap(){


          $sql=  "SELECT * from station";


              $objMem = $this -> f_query($sql);

              if ($objMem) {
                  echo $this -> f_output("true", "Found", $objMem);

              } else {
                  echo $this -> f_output("false", "Member not found");
              }


}



    public function  getCheckbtn(){

      $idtable =    $this -> idtable ;
      $idtutor =    $this -> idtutor ;



      date_default_timezone_set("Asia/Bangkok");

      $datetime_current=date("Y-m-d H:i:s");



    $sqlq = "SELECT * from timetable,course_detail where timetable.Idcourse_detail = course_detail.Idcourse_detail and  timetable.id_timetable  =  '$idtable'";

            $result2 = mysqli_query($this -> connect(),$sqlq ) or die(mysqli_error());

            while ($value1 = mysqli_fetch_assoc($result2)) {



                      $amount = $value1['amount_courses'];
                      $sql789 ="SELECT * from tutor_leave where Id_timetable = '$idtable' and status = 'false'";

                      $result789 = mysqli_query($this -> connect(),$sql789 ) or die(mysqli_error());


                      $row_cnt = $result789->num_rows;

                    $amount =  $row_cnt+$amount;

                      $Start_date = $value1['Start_date'];
                      $End_date = $value1['End_date'];
                      $Start_time = $value1['Start_time'];
                      $End_time = $value1['End_time'];

                      $asd = "true";
                      $dates = "";
                        for ($i=0; $i < $amount ; $i++) {

                          $date1   = new DateTime($Start_date);
                          $date2   = new DateTime($datetime_current);


                          $dteDiff  = $date1->diff($date2);

                           $dater= $dteDiff->format("%R");
                           $dated= $dteDiff->format("%d");

                           $dateh= $dteDiff->format("%h");




                  if($dater=="-"&&$asd == "true"){

                      $dates = $Start_date;
                          $asd = "false";

                      }


                          $Start_date =  date( "Y-m-d",strtotime( $Start_date." +7 day" ) ) ;

                        }



            }


            $sql = "SELECT * from timetable_request where dateout = '$dates' and id_timetable = '$idtable'";

            $objMem = $this -> f_query($sql);

            if ($objMem) {
                echo $this -> f_output("true", "Found", "");

            } else {
                echo $this -> f_output("false", "Member not found");
            }

    }

    public function le(){

      $idtable =    $this -> idtable ;
      $idtutor =    $this -> idtutor ;


      $strStart  = date("Y-m-d H:i:s");
      date_default_timezone_set("Asia/Bangkok");





    }
        public function getcheckkk(){


	error_reporting(~E_NOTICE);

$sql=  "SELECT * from timetable,course_detail where
 timetable.Idcourse_detail = course_detail.Idcourse_detail";


 $result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

    $amount ="";
    $Start_date = "";
      $End_time = "";
          $id_timetable ="";
          date_default_timezone_set("Asia/Bangkok");

          $asdzxc  = date("Y-m-d");



            $strStart  = date("Y-m-d H:i:s");

            $timecheck  = date("H:i:s");

            $dteStart = new DateTime($strStart);








    while ($value0 = mysqli_fetch_assoc($result)) {


      $course =  $value0['idcourse'];


      $amount =  $value0['amount_courses'];
      $Start_date  = $value0['Start_date'];

      $Start_time  = $value0['Start_time'];

      $Start_time_add = date('H:i:s',strtotime($Start_time . "-15 minutes"));



      $End_time  = $value0['End_time'];
      $id_timetable  = $value0['id_timetable'];

      $idtutor  = $value0['idtutor'];

      // print_r($End_time);

   // $Start_date =  date( "H:i:s",strtotime( $End_time));

      //
      // echo date_format($Start_date, 'Y-m-d H:i:s');;
    //   $dteDiff  = $dteStart->diff($dteEnd);
    //
    // $dater= $dteDiff->format("%R");
    $sql789 ="SELECT * from tutor_leave where Id_timetable = '$id_timetable' and status = 'false' ";

    $result789 = mysqli_query($this -> connect(),$sql789 ) or die(mysqli_error());


    $row_cnt = $result789->num_rows;

    $amount = $amount+$row_cnt;




for ($i=0; $i < $amount; $i++) {




$date1   = new DateTime($Start_date);


$dteDiff  = $date1->diff($dteStart);

 $dater= $dteDiff->format("%R");
 $dated= $dteDiff->format("%d");

if($dater=='+'){





if(($dated==0&&$timecheck > $Start_time)||$dated>0){


  $sql1234 = "SELECT * FROM `timetable` left join tutor_leave on  timetable.id_timetable = tutor_leave.Id_timetable and tutor_leave.datetime = '$Start_date'  where timetable.id_timetable = '$id_timetable'   ";
  $resultasd = mysqli_query($this -> connect(),$sql1234 ) or die(mysqli_error());


  while ($value0 = mysqli_fetch_assoc($resultasd)) {

  if($value0['idtutor_of_study']==null){


$sqlzxcsd = "SELECT * from timetable_overtime where id_timetable = '$id_timetable' and timetable_overtime.check  != 'true' ";


$objMemasd = $this -> f_query($sqlzxcsd);

if ($objMemasd) {
  $result123 = mysqli_query($this -> connect(),$sqlzxcsd ) or die(mysqli_error());

  while ($value77 = mysqli_fetch_assoc($result123)) {

    $SQL789 = "INSERT INTO tutor_leave ( `datetime`, `updated_at`, `created_at`, `Id_timetable`, `status`,idtutor) VALUES  ('$Start_date','$asdzxc','$asdzxc','$id_timetable','leave','$idtutor')";


$rrr = $value77['id_timetable_overtime'];

      $sqloo = "UPDATE `timetable_overtime` SET `check` = 'true' WHERE id_timetable_overtime = '$rrr'";
  mysqli_query($this -> connect(),$sqloo ) or die(mysqli_error());
  }


} else {
  $SQL789 = "INSERT INTO tutor_leave ( `datetime`, `updated_at`, `created_at`, `Id_timetable`, `status`,idtutor) VALUES  ('$Start_date','$asdzxc','$asdzxc','$id_timetable','missing','$idtutor')";


}







    mysqli_query($this -> connect(),$SQL789 ) or die(mysqli_error());
    $last_id =   mysqli_insert_id($this->conn);



    $ss = "select * FROM timetable,room,course_detail WHERE course_detail.Idcourse_detail = timetable.Idcourse_detail
    and room.idroom = timetable.idroom and (( '$Start_date' BETWEEN Start_date and End_date) or ('$Start_date' BETWEEN End_date and Start_date))
     and  ((`Start_time` BETWEEN '$Start_time' and '$End_time') or (`End_time` BETWEEN '$End_time' and '$Start_time  ')) ";

    $result2 = mysqli_query($this -> connect(),$ss ) or die(mysqli_error());
$tec = 0;
$numss = 0;
    while ($value1 = mysqli_fetch_assoc($result2)) {


if($numss==0){

  $idroom = $value1['idroom'];

}else{

  $idroom = $idroom.",".$value1['idroom'];

}
if($numss==0){

  $idtutor = $value1['idtutor'];


}else{

  $idtutor = $idtutor.",".$value1['idtutor'];

}

$numss++;
    }

    if($idtutor==""){
$kkk = 0;
      $techemty =   "SELECT * FROM tutor,tutor_detail where tutor.idtutor  = tutor_detail.idtutor  and tutor_detail.idcourse = $course";

      $techemty = mysqli_query($this -> connect(),$techemty ) or die(mysqli_error());
  while ($value3 = mysqli_fetch_assoc($techemty)) {

    $n = $value3['idtutor'];

                     $sqk = "SELECT * from tutor_compensate where datetime like '$Start_date' and '$Start_time' BETWEEN Start_time and End_time and id_tutor  = '$n' ";


                      $vv = mysqli_query($this -> connect(),$sqk ) or die(mysqli_error());

        $row_cnt = $vv->num_rows;
        if($row_cnt==0){
if($tec==""){


  $tec = $value3['idtutor'];

}else{

  $tec = $tec.",".$value3['idtutor'];


}
$kkk++;
}


  }





    }else{

      $techemty =   "SELECT * FROM tutor,tutor_detail  WHERE tutor.idtutor not in ($idtutor) and tutor.idtutor   = tutor_detail.idtutor and tutor_detail.idcourse = $course";


      // $techemty =   "SELECT * FROM tutor left join tutor_detail on tutor_detail.idtutor_detail = tutor.id_tutor
      // left join tutor_compensate on tutor_compensate.id_tutor = tutor.idtutor WHERE tutor.idtutor not in ($idtutor) = tutor_detail.idcourse = $course ";
//
// $techemty = "SELECT tutor.* FROM tutor left join tutor_detail on tutor_detail.idtutor_detail = tutor.idtutor and  tutor.idtutor not in ($idtutor) and tutor_detail.idcourse ='$course'
// left join tutor_compensate on tutor_compensate.id_tutor = tutor.idtutor and tutor_compensate.datetime != '$Start_date'";

                    $techemty = mysqli_query($this -> connect(),$techemty ) or die(mysqli_error());
                    $kkk = 0;

                while ($value3 = mysqli_fetch_assoc($techemty)) {

$n = $value3['idtutor'];

                 $sqk = "SELECT * from tutor_compensate where datetime like '$Start_date' and '$Start_time' BETWEEN Start_time and End_time and id_tutor  = '$n' ";


                  $vv = mysqli_query($this -> connect(),$sqk ) or die(mysqli_error());


                  $row_cnt = $vv->num_rows;


if($row_cnt==0){

  if($tec==""){



    $tec = $value3['idtutor'];



  }else{

    $tec = $tec.",".$value3['idtutor'];


  }
  $kkk++;

}else{


}




                }



    }

$kkk= $kkk-1;
    $gg =  rand(0, $kkk);

    $g2 = explode(',',$tec);


if(!$g2[$gg]){

  $In = "INSERT INTO tutor_compensate_management ( datetime,id_timetable) VALUES ('$Start_date','$id_timetable')";

   mysqli_query($this -> connect(),$In ) or die(mysqli_error());
}else{

  $In = "INSERT INTO tutor_compensate ( `id_tutor`, `idtutor_of_study`, `datetime`,Start_time,End_time) VALUES ('$g2[$gg]','$last_id','$Start_date','$Start_time','$End_time')";

   mysqli_query($this -> connect(),$In ) or die(mysqli_error());
}

  }


}

  if(($dated==0&&$timecheck > $End_time)||$dated>0){







$sql2 = "SELECT date_of_study.*,timetable_detail.Idtimetable_deteil ,tutor_leave.idtutor_of_study from timetable_detail
 left join date_of_study on timetable_detail.Idtimetable_deteil = date_of_study.Idtimetable_deteil and date_of_study.datetime like '$Start_date %'
  left join tutor_leave on timetable_detail.id_timetable = tutor_leave.Id_timetable and tutor_leave.datetime = '$Start_date' and ( tutor_leave.status = 'false' or tutor_leave.status = 'leave' )
where timetable_detail.id_timetable = '$id_timetable' ";


$result4 = mysqli_query($this -> connect(),$sql2 ) or die(mysqli_error());


while ($value0 = mysqli_fetch_assoc($result4)) {


if($value0['iddate_of_study']){


}else{



$id = $value0['Idtimetable_deteil'];

if($value0['idtutor_of_study']){

  $SQL789 = "INSERT INTO date_of_study ( `datetime`, `status`, `Idtimetable_deteil`, `updated_at`, `created_at`) VALUES  ('$Start_date','invalid','$id','$asdzxc','$asdzxc')";

}else{

  $SQL789 = "INSERT INTO date_of_study ( `datetime`, `status`, `Idtimetable_deteil`, `updated_at`, `created_at`) VALUES  ('$Start_date','false','$id','$asdzxc','$asdzxc')";

}



mysqli_query($this -> connect(),$SQL789 ) or die(mysqli_error());


}

}


// $sql1234 = "SELECT * from timetable
// left join tutor_leave on timetable.Id_timetable = tutor_leave.Id_timetable and tutor_leave.datetime like '$Start_date %' and
//   timetable.id_timetable = '$id_timetable'     ";









}




}




}


// echo "<br>".$Start_date."<br>";
$Start_date =  date( "Y-m-d",strtotime( $Start_date." +7 day" ));

  // code...
}







    }














}


public function getDATE(){
  $iduac =    $this -> iduac ;


  $sql = "select * from account where account.IDUserAccount = $iduac ";

      $result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

      $who = "";
      $id = "";
        while ($value0 = mysqli_fetch_assoc($result)) {

    if($value0['idstudent']!=""){

      $who  = "student";
      $id  = $value0['idstudent'];

    }else if($value0['idtutor']!=""){

      $who  = "tutor";
    $id  = $value0['idtutor'];
    }

        }


if($who=="student"){
//
$sql = "SELECT * from timetable,timetable_detail,course_detail,course where course.idcourse = course_detail.idcourse  and timetable.Idcourse_detail = course_detail.Idcourse_detail
and timetable_detail.id_timetable  = timetable.id_timetable and timetable_detail.idstudent = '$id' ";
// echo $sql;
$objMem = $this -> f_query($sql);

$result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

$amount = "";
$Start_date = "";
  $resultarray = array();
while ($value0 = mysqli_fetch_assoc($result)) {

  $namecourse =  $value0['name'];


 $amount =  $value0['amount_courses'];
 $Start_date  = $value0['Start_date'];
 $Start_time  = $value0['Start_time'];

$asd = $value0['id_timetable'];

 $sql789 ="SELECT * from tutor_leave where Id_timetable = '$asd' and status = 'false' ";

 $result789 = mysqli_query($this -> connect(),$sql789 ) or die(mysqli_error());


 $row_cnt = $result789->num_rows;

 $amount2 = $amount;

 $amount = $amount+$row_cnt;

$numpp = 0;
for ($i=0; $i < $amount; $i++) {


    $sql789 ="SELECT * from tutor_leave where Id_timetable = '$asd' and status = 'false' and  datetime = '$Start_date' ";

    $result789 = mysqli_query($this -> connect(),$sql789 ) or die(mysqli_error());
    $row = $result789->num_rows;
$numpp = $numpp+$row;
if($row == 0){

$row = (int)$i-(int)$numpp;

  $column[$row."day"] = $Start_date   ;


}




   $Start_date =  date( "Y-m-d",strtotime( $Start_date." +7 day" ));

}
$column["time"] = $Start_time   ;
$column["amount"] = $amount2   ;

$column["name"] = $namecourse   ;


array_push($resultarray, $column);


}

echo $this -> f_output("true", "",$resultarray);

}else if($who=="tutor"){


  $sql = "SELECT * from timetable,course_detail,course where  course.idcourse = course_detail.idcourse  and timetable.Idcourse_detail = course_detail.Idcourse_detail
  and  timetable.idtutor = '$id'  ";


  $result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

  $amount = "";
  $Start_date = "";
    $resultarray = array();
  while ($value0 = mysqli_fetch_assoc($result)) {

    $namecourse =  $value0['name'];

$amount =  $value0['amount_courses'];
$Start_date = $value0['Start_date'];
 $Start_time  = $value0['Start_time'];


 $asd = $value0['id_timetable'];

  $sql789 ="SELECT * from tutor_leave where Id_timetable = '$asd' and status = 'false' ";

  $result789 = mysqli_query($this -> connect(),$sql789 ) or die(mysqli_error());


  $row_cnt = $result789->num_rows;
  $amount2 = $amount;

  $amount = $amount+$row_cnt;
$numpp= 0;
for ($i=0; $i < $amount; $i++) {
  // code...

      $sql789 ="SELECT * from tutor_leave where Id_timetable = '$asd' and status = 'false' and  datetime = '$Start_date' ";

      $result789 = mysqli_query($this -> connect(),$sql789 ) or die(mysqli_error());
      $row = $result789->num_rows;
  $numpp = $numpp+$row;
  if($row == 0){

  $row = (int)$i-(int)$numpp;

    $column[$row."day"] = $Start_date   ;


  }




   $Start_date =  date( "Y-m-d",strtotime( $Start_date." +7 day" ));
}
$column["time"] = $Start_time   ;
$column["amount"] = $amount2   ;
$column["name"] = $namecourse   ;

array_push($resultarray, $column);

  }

  echo $this -> f_output("true", "",$resultarray);

}



}



      public function register() {
    $user =    $this -> username ;
  $pass =    $this -> password ;

  $first =    $this -> firstname ;
  $last =    $this -> lastname ;
  $age =    $this -> age ;
  $email =    $this -> email ;
  $phone =    $this -> phone ;
  $address =    $this -> address ;
  $sex =    $this -> sex ;

        function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
      {
          $pieces = [];
          $max = mb_strlen($keyspace, '8bit') - 1;
          for ($i = 0; $i < $length; ++$i) {
              $pieces []= $keyspace[random_int(0, $max)];
          }
          return implode('', $pieces);
      }

 $ran = random_str(10);


$ran = $ran.'.'."png";



  $sql = "insert into student ( `firstname`, `lastname`, `sex`, `age`, `Email`, `phone`, `address`) values ('$first','$last','$sex',$age,'$email','$phone','$address')";


mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

$last_id =   mysqli_insert_id($this->conn);

$PASSWORD =  password_hash($pass, PASSWORD_BCRYPT);





$sql ="insert into account ( `username`, `password`, `idstudent`,`QR_code` ) VALUES ('$user','$PASSWORD','$last_id','$ran')";






	$result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());


  $last_id =   mysqli_insert_id($this->conn);


  $plaintext = $last_id;
  $password = 'eakqtutor2018';
  $method = 'aes-256-cbc';

  // Must be exact 32 chars (256 bit)
  $password = substr(hash('sha256', $password, true), 0, 32);

  // IV must be exact 16 chars (128 bit)
  $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

  // av3DYGLkwBsErphcyYp+imUW4QKs19hUnFyyYcXwURU=
  $encrypted = base64_encode(openssl_encrypt($plaintext, $method, $password, OPENSSL_RAW_DATA, $iv));




        $dataText   =  $encrypted;



        // $svgTagId   = 'id-of-svg';


        // it is saved to file but also returned from function
        $svgCode = QRcode::png($dataText, "../public/storage/QR/".$ran, QR_ECLEVEL_H);







  if($result == true){
  echo $this -> f_output("true", "");
  }else {
    echo $this -> f_output("false", "");
  }
      }

  public function getnews() {

$sql = 'select * from news order by id_news desc LIMIT 3 ';


    $objMem = $this -> f_query($sql);

    if ($objMem) {
        echo $this -> f_output("true", "Found", $objMem);

    } else {
        echo $this -> f_output("false", "Member not found");
    }


  }

  public function selectchat() {
    $IDUserAccount=    $this -> IDUserAccount ;



$sql = "SELECT * from account where IDUserAccount = '$IDUserAccount' ";
$result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

$who = "";

$id = "";
  while ($value0 = mysqli_fetch_assoc($result)) {

if($value0['idstudent']!=""){

$who  = "student";
$id  = $value0['idstudent'];
}else if($value0['idtutor']!=""){

$who  = "tutor";
$id  = $value0['idtutor'];


}

  }


  if($who=="tutor"){

    $sql = "SELECT * from timetable_detail,timetable,room,course_detail,course where course.idcourse = course_detail.idcourse and course_detail.Idcourse_detail = timetable.Idcourse_detail and room.idroom =timetable.idroom  and timetable.idtutor = '$id' and timetable.id_timetable = timetable_detail.id_timetable ";


  }else if($who=="student"){

    $sql = "SELECT * from timetable_detail,timetable,room,course_detail,course where course.idcourse = course_detail.idcourse and course_detail.Idcourse_detail = timetable.Idcourse_detail and  room.idroom =timetable.idroom and timetable_detail.idstudent = '$id' and timetable.id_timetable = timetable_detail.id_timetable ";

  }
// echo $sql;

  $objMem = $this -> f_query($sql);

   if ($objMem) {
       echo $this -> f_output("true", "Found", $objMem);

   } else {
       echo $this -> f_output("false", "Member not found");
   }


}


  public function getkey() {

    $num= "";


    $idcd=    $this -> idcd ;
    $key=    $this -> key ;

// $sql = "SELECT * from timetable Where privatekey = '$key' and Idcourse_detail = '$idcd' ";

//
$sql = "SELECT room.* , timetable.* ,count(timetable_detail.id_timetable) as num
 from timetable,timetable_detail,room where room.idroom = timetable.idroom and timetable.id_timetable = timetable_detail.id_timetable
 and timetable.privatekey = '$key'  and timetable.Idcourse_detail = '$idcd'
 group by timetable.id_timetable";




$result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

$Start_date = "";
$idtimetable = "";
  while ($value0 = mysqli_fetch_assoc($result)) {

if($value0['Start_date']!=""){

$Start_date  = $value0['Start_date'];
$idtimetable  = $value0['id_timetable'];

}

  }

if($Start_date!="") {





  $strStart  = date("Y-m-d");
  $strEnd   = $Start_date;
  $dteStart = new DateTime($strStart);
  $dteEnd   = new DateTime($strEnd);
  $dteDiff  = $dteStart->diff($dteEnd);
  $dated= $dteDiff->format("%d");
  $datem= $dteDiff->format("%m");
  $datey= $dteDiff->format("%y");
$dater= $dteDiff->format("%R");


  if($dater=='+'&&$dated<3&&$datem==0&&$datey==0){


      echo $this -> f_output("timeout", "Member not found");


  }else{

$sql2 = "SELECT * from timetable ,course_detail,grade where timetable.Idcourse_detail = course_detail.Idcourse_detail
and grade.idGrade = course_detail.idGrade  and course_detail.Idcourse_detail = '$idcd' ";

$result2 = mysqli_query($this -> connect(),$sql2 ) or die(mysqli_error());

$Isgroup = "";
  while ($value0 = mysqli_fetch_assoc($result2)) {



$Isgroup  = $value0['Isgroup'];



  }


  if($Isgroup=='1'){


$sql3 =  "SELECT count(*) as num from timetable_detail where id_timetable = '$idtimetable'";



$result3 = mysqli_query($this -> connect(),$sql3 ) or die(mysqli_error());

$num= "";

while ($value0 = mysqli_fetch_assoc($result3)) {


$num  = $value0['num'];




}

  }else{

    $objMem = $this -> f_query($sql);


         echo $this -> f_output("true", "Found", $objMem);

  }

  if($num == '2'){
  echo $this -> f_output("FULL", "Member not found");

}else if($num == '1'){

  $objMem = $this -> f_query($sql);


       echo $this -> f_output("true", "Found", $objMem);

}


  }
}else{

  echo $this -> f_output("notfound", "Member not found");

}

  }

  public function gettimetable_type2() {
  $icd=    $this -> icd ;

  $date1  = date("Y-m-d");

  $date = date('Y-m-d',strtotime($date1 . "+3 days"));



// $sql = "SELECT * from timetable where Idcourse_detail =  '$icd' and   Start_date >=  '$date'";

$sql ="SELECT timetable.*,course_detail.*,count(timetable_detail.id_timetable) as num ,room.* from timetable ,timetable_detail,course_detail,room
 where timetable.id_timetable = timetable_detail.id_timetable and timetable.Idcourse_detail = '$icd' and timetable.Idcourse_detail = course_detail.Idcourse_detail and room.idroom = timetable.idroom
  and  timetable.Start_date >= '$date'  group by timetable.id_timetable";



          $objMem = $this -> f_query($sql);

           if ($objMem) {
               echo $this -> f_output("true", "Found", $objMem);

           } else {
               echo $this -> f_output("false", "Member not found");
           }


  }


  public function edituser() {

  $IDUserAccount=    $this -> IDUserAccount ;
  $first=    $this -> first ;
    $last=    $this -> last ;
      $email=    $this -> email ;
        $phone=    $this -> phone ;
          $address=    $this -> address ;


$sql = "select * from account where account.IDUserAccount = $IDUserAccount ";

    $result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

    $who = "";
      while ($value0 = mysqli_fetch_assoc($result)) {

  if($value0['idstudent']!=""){

    $who  = "student";

  }else if($value0['idtutor']!=""){

    $who  = "tutor";

  }

      }

if($who=="tutor"){

  $sql = "UPDATE account,tutor SET tutor.firstname = '$first' , tutor.lastname ='$last', tutor.Email ='$email' , tutor.phone	 ='$phone', tutor.address	 ='$address'  where account.idtutor = tutor.idtutor and account.IDUserAccount = $IDUserAccount ";

 mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

  echo $this -> f_output("true", "Found", "");
}else if($who=="student"){

  $sql = "UPDATE account,student SET student.firstname = '$first' , student.lastname ='$last', student.Email ='$email' , student.phone	 ='$phone', student.address	 ='$address'  where account.idstudent = student.idstudent and account.IDUserAccount = $IDUserAccount ";
 mysqli_query($this -> connect(),$sql ) or die(mysqli_error());
  echo $this -> f_output("true", "Found", "");
}else{
  echo $this -> f_output("false", "Member not found");


}








}
public function assessment_tutor(){

  $idtutor=    $this -> idtutor ;
  $who=    $this -> Idtimetable_deteil ;

  $ask1=    $this -> ask1 ;
  $ask2=    $this -> ask2 ;
  $ask3=    $this -> ask3 ;
  $ask4=    $this -> ask4 ;
    $ask5=    $this -> ask5;

  $context=    $this -> context;
  // $number=    $this -> number;
  $Total=    $this -> Total;


$sql = "INSERT into evaluation (`ask1`, `ask2`, `ask3`, `ask4`, `ask5`, `Idtimetable_deteil`,Content,who,view,Total) VALUES ('$ask1','$ask2','$ask3','$ask4','$ask5','$who','$context','2','true','$Total') ";

mysqli_query($this -> connect(),$sql ) or die(mysqli_error());




             echo $this -> f_output("true", "Found", "");

}


public function assessment(){

  $idstudent=    $this -> idstudent ;
  $id_timetable=    $this -> id_timetable ;

  $ask1=    $this -> ask1 ;
  $ask2=    $this -> ask2 ;
  $ask3=    $this -> ask3 ;
  $ask4=    $this -> ask4 ;
    $ask5=    $this -> ask5;
    $context=    $this -> context;

    $context2=    $this -> context2;


$sql = "SELECT * from timetable_detail where idstudent =  '$idstudent'  and id_timetable =  '$id_timetable' ";



$result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

$who = "";
while ($value0 = mysqli_fetch_assoc($result)) {


$who  = $value0['Idtimetable_deteil'];


}



$sql = "INSERT into evaluation (`ask1`, `ask2`, `ask3`, `ask4`, `ask5`, `Idtimetable_deteil`,Content,who,view,Content2) VALUES ('$ask1','$ask2','$ask3','$ask4','$ask5','$who','$context','1','true','$context2') ";

mysqli_query($this -> connect(),$sql ) or die(mysqli_error());




             echo $this -> f_output("true", "Found", "");

}




  public function finalcoures() {

    $idstudent=    $this -> idstudent ;
    $id_timetable=    $this -> id_timetable ;

    date_default_timezone_set("Asia/Bangkok");

    $datetime_current=date("Y-m-d");

    $time_current=date("H:i:s");


    // //
    // $sql = "SELECT *,COUNT(date_of_study.Idtimetable_deteil) as num from course_detail, timetable_detail ,date_of_study,timetable   where timetable_detail.id_timetable = '$id_timetable'  and  timetable_detail.idstudent = '$idstudent' and   timetable_detail.Idtimetable_deteil = date_of_study.Idtimetable_deteil  and timetable.id_timetable = timetable_detail.id_timetable and course_detail.Idcourse_detail = timetable.Idcourse_detail
    //  GROUP by timetable_detail.Idtimetable_deteil , date_of_study.Idtimetable_deteil  HAVING num >= course_detail.amount_courses";
    //
$sql2 = "SELECT * from timetable_detail,evaluation where  timetable_detail.Idtimetable_deteil = evaluation.Idtimetable_deteil and timetable_detail.idstudent = $idstudent and evaluation.who = '1' and timetable_detail.id_timetable  = '$id_timetable'";


$objMem2 = $this -> f_query($sql2);

 if ($objMem2) {

 echo $this -> f_output("false", "Member not found1");



 } else {

   $sql = "SELECT * from timetable where id_timetable = '$id_timetable' and  ('$time_current' >= End_time and '$datetime_current ' = End_date) or ( '$datetime_current ' > End_date)";

           $objMem = $this -> f_query($sql);

            if ($objMem) {
                echo $this -> f_output("true", "Found", $objMem);

            } else {
                echo $this -> f_output("false", "Member not found2");
            }

 }








  }
public function leavetutor_fix(){

  $id_timetable=    $this -> timetable ;
  $idtutor=    $this -> tutor ;

  $content=    $this -> content ;

$sal = "SELECT * from timetable,course_detail where timetable.Idcourse_detail = course_detail.Idcourse_detail  and timetable.id_timetable = '$id_timetable'";



$result = mysqli_query($this -> connect(),$sal ) or die(mysqli_error());

$Start_time = "";
$End_time  = "";
$Start_date ="";
$End_date = "";



while ($value0 = mysqli_fetch_assoc($result)) {


$Start_time = $value0['Start_time'];
$End_time  = $value0['End_time'];
$Start_date = $value0['Start_date'];
$End_date = $value0['End_date'];

$course = $value0['idcourse'];





}



date_default_timezone_set("Asia/Bangkok");

$datetime_current=date("Y-m-d");



      $SQL789 = "INSERT INTO tutor_leave ( content,`datetime`, `updated_at`, `created_at`, `Id_timetable`, `status`,idtutor) VALUES  ('$content','$Start_date','$datetime_current','$datetime_current','$id_timetable','leave','$idtutor')";



      mysqli_query($this -> connect(),$SQL789 ) or die(mysqli_error());
      $last_id =   mysqli_insert_id($this->conn);
  //
  //
  //
      $ss = "select * FROM timetable,room,course_detail WHERE course_detail.Idcourse_detail = timetable.Idcourse_detail
      and room.idroom = timetable.idroom and (( '$Start_date' BETWEEN Start_date and End_date) or ('$Start_date' BETWEEN End_date and Start_date))
       and  ((`Start_time` BETWEEN '$Start_time' and '$End_time') or (`End_time` BETWEEN '$End_time' and '$Start_time  ')) ";
  //

      $result2 = mysqli_query($this -> connect(),$ss ) or die(mysqli_error());
  $tec = 0;
  $numss = 0;
      while ($value1 = mysqli_fetch_assoc($result2)) {


  if($numss==0){

    $idroom = $value1['idroom'];

  }else{

    $idroom = $idroom.",".$value1['idroom'];

  }
  if($numss==0){

    $idtutor = $value1['idtutor'];


  }else{

    $idtutor = $idtutor.",".$value1['idtutor'];

  }

  $numss++;
      }


      if($idtutor==""){
  $kkk = 0;
        $techemty =   "SELECT * FROM tutor,tutor_detail where tutor.idtutor  = tutor_detail.idtutor  and tutor_detail.idcourse = $course";

        $techemty = mysqli_query($this -> connect(),$techemty ) or die(mysqli_error());
    while ($value3 = mysqli_fetch_assoc($techemty)) {

      $n = $value3['idtutor'];

                       $sqk = "SELECT * from tutor_compensate where datetime like '$Start_date' and '$Start_time' BETWEEN Start_time and End_time and id_tutor  = '$n' ";


                        $vv = mysqli_query($this -> connect(),$sqk ) or die(mysqli_error());

          $row_cnt = $vv->num_rows;
          if($row_cnt==0){
  if($tec==""){


    $tec = $value3['idtutor'];

  }else{

    $tec = $tec.",".$value3['idtutor'];


  }
  $kkk++;
  }


    }





      }else{

        $techemty =   "SELECT * FROM tutor,tutor_detail  WHERE tutor.idtutor not in ($idtutor) and tutor.idtutor   = tutor_detail.idtutor and tutor_detail.idcourse = $course";


        // $techemty =   "SELECT * FROM tutor left join tutor_detail on tutor_detail.idtutor_detail = tutor.id_tutor
        // left join tutor_compensate on tutor_compensate.id_tutor = tutor.idtutor WHERE tutor.idtutor not in ($idtutor) = tutor_detail.idcourse = $course ";
  //
  // $techemty = "SELECT tutor.* FROM tutor left join tutor_detail on tutor_detail.idtutor_detail = tutor.idtutor and  tutor.idtutor not in ($idtutor) and tutor_detail.idcourse ='$course'
  // left join tutor_compensate on tutor_compensate.id_tutor = tutor.idtutor and tutor_compensate.datetime != '$Start_date'";

                      $techemty = mysqli_query($this -> connect(),$techemty ) or die(mysqli_error());
                      $kkk = 0;

                  while ($value3 = mysqli_fetch_assoc($techemty)) {

  $n = $value3['idtutor'];

                   $sqk = "SELECT * from tutor_compensate where datetime like '$Start_date' and '$Start_time' BETWEEN Start_time and End_time and id_tutor  = '$n' ";


                    $vv = mysqli_query($this -> connect(),$sqk ) or die(mysqli_error());


                    $row_cnt = $vv->num_rows;


  if($row_cnt==0){

    if($tec==""){



      $tec = $value3['idtutor'];



    }else{

      $tec = $tec.",".$value3['idtutor'];


    }
    $kkk++;

  }else{


  }




                  }



      }

  $kkk= $kkk-1;
      $gg =  rand(0, $kkk);

      $g2 = explode(',',$tec);


  if(!$g2[$gg]){

    $In = "INSERT INTO tutor_compensate_management ( datetime,id_timetable) VALUES ('$Start_date','$id_timetable')";

     mysqli_query($this -> connect(),$In ) or die(mysqli_error());
  }else{

    $In = "INSERT INTO tutor_compensate ( `id_tutor`, `idtutor_of_study`, `datetime`,Start_time,End_time) VALUES ('$g2[$gg]','$last_id','$Start_date','$Start_time','$End_time')";

     mysqli_query($this -> connect(),$In ) or die(mysqli_error());
  }
  //
  echo $this -> f_output("true", "Member not found");


}








  public function leavetutor() {
    $tutor =    $this -> tutor ;

      $timetable2 =    $this -> timetable ;

               $content =    $this -> content ;

               $date =    $this -> date ;

    date_default_timezone_set("Asia/Bangkok");

    $datetime_=date("Y-m-d H:i:s");
    $datetime_current=$date;




$sql  = "SELECT * from timetable where Id_timetable = '$timetable2'";
$result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

$b  = "true";

$dateend = "";
$time1= "";
$time2= "";
$idroom = "";
$idtutor= "";
while ($value0 = mysqli_fetch_assoc($result)) {

$dateend  = $value0['End_date'];
$time1  = $value0['Start_time'];

$time2  = $value0['End_time'];
$idroom= $value0['idroom'];
$idtutor= $value0['idtutor'];
}

$time2 = date('H:i:s', strtotime($time2. '+ 5 minutes') );


$time1 = date('H:i:s', strtotime($time1. '+ 5 minutes') );
//

$time22 = date('H:i:s', strtotime($time2. '- 10 minutes') );


$time11 = date('H:i:s', strtotime($time1. '- 10 minutes') );
$dateend = date('Y-m-d',strtotime($dateend . "+7 days"));

$idstudent= "";
$sql2 = "SELECT * from timetable , course_detail , course, room, tutor where timetable.Idcourse_detail = course_detail.Idcourse_detail and timetable.idroom = room.idroom and timetable.idtutor = tutor.idtutor and course.idcourse = course_detail.idcourse";

$result2 = mysqli_query($this -> connect(),$sql2 ) or die(mysqli_error());

while ($value0 = mysqli_fetch_assoc($result2)) {
$amount = '';
$amount = $value0['amount_courses'];
$tutor = $value0['idtutor'];
$room = $value0['idroom'];

$Start = $value0['Start_time'];
$End= $value0['End_time'];

$ww =  date( "Y-m-d",strtotime(  $value0['Start_date'] ) ) ;
$ww2 =  date( "Y-m-d",strtotime(  $value0['End_date'] ) ) ;

$timetable = $value0['id_timetable'];


$sql789 ="SELECT * from tutor_leave where Id_timetable = '$timetable' and status = 'false'";

$result789 = mysqli_query($this -> connect(),$sql789 ) or die(mysqli_error());


$row_cnt = $result789->num_rows;
$amount = $amount+$row_cnt;
$numsss = 0;
for($i=0;$i<$amount;$i++){

if($ww ==  $dateend){

// $sql99  = "select * FROM timetable,room WHERE (timetable.idtutor = '$idtutor' or  timetable.idroom = '$idroom')  and room.idroom = timetable.idroom and (( '$ww'  BETWEEN Start_date  and End_date ) or ( '$ww'  BETWEEN `End_date`  and Start_date ))  and  (( '$time1'  BETWEEN `Start_time` and `End_time` ) or ( '$time1'  BETWEEN `End_time` and `Start_time`) or ( '$time2' BETWEEN `Start_time` and `End_time`  ') or ( '$time2' BETWEEN `End_time`  and `Start_time`  ')) ";

$sql99 = "select * FROM timetable,room,course_detail WHERE course_detail.Idcourse_detail = timetable.Idcourse_detail and room.idroom = timetable.idroom and (( '$ww'  BETWEEN Start_date and End_date) or  ( '$ww'  BETWEEN End_date and Start_date))  and
 (( '$time1'    BETWEEN  Start_time and End_time ) or ( '$time2'    BETWEEN End_time  and Start_time )or ( '$time11'    BETWEEN  End_time and Start_time ) or ( '$time22'    BETWEEN Start_time  and End_time ) ) ";
// echo $sql99;

$objMem = $this -> f_query($sql99);

if ($objMem) {

  $result99 = mysqli_query($this -> connect(),$sql99 ) or die(mysqli_error());
  while ($value99 = mysqli_fetch_assoc($result99)) {

$idtutor2 =  $value99['idtutor'];
$idroom2 =  $value99['idroom'];
$id_timetable2 =  $value99['id_timetable'];

if($idtutor2== $idtutor){

  $b = "false";


}
if($idroom2== $idroom){

  $b = "false";


}

$tttt = "select * FROM timetable,timetable_detail where timetable.id_timetable  = timetable_detail.id_timetable and timetable.id_timetable = '$id_timetable2' ";


    $result3 = mysqli_query($this -> connect(),$tttt ) or die(mysqli_error());

    while ($value3 = mysqli_fetch_assoc($result3)) {



      if($numsss==0){

        $idstudent = $value3['idstudent'];

      }else{

        $idstudent = $idstudent .",".$value3['idstudent'];
      }




$numsss++;





}


}

    // echo $this -> f_output("false", "Member not found");
} else {
  // echo $this -> f_output("true", "Found", $objMem);

}




}





$ww =  date( "Y-m-d",strtotime( $ww." +7 day" ) ) ;



}



}

          $asd = "SELECT * from timetable_overtime ,timetable,timetable_detail where timetable_overtime.id_timetable = timetable.id_timetable
           and  timetable_overtime.id_timetable =  '$timetable2' and  timetable.id_timetable  = timetable_detail.id_timetable and timetable_overtime.date like '$dateend' and

            (( '$time1'    BETWEEN  timetable_overtime.Start_time and timetable_overtime.End_time ) or ( '$time2'    BETWEEN timetable_overtime.End_time  and timetable_overtime.Start_time )or ( '$time11'    BETWEEN  timetable_overtime.End_time and timetable_overtime.Start_time ) or ( '$time22'    BETWEEN timetable_overtime.Start_time  and timetable_overtime.End_time ) ) ";

          $result5 = mysqli_query($this -> connect(),$asd ) or die(mysqli_error());

          while ($value5 = mysqli_fetch_assoc($result5)) {


            if($numsss==0){

              $idstudent = $value5['idstudent'];

            }else{

              $idstudent = $idstudent .",".$value5['idstudent'];
            }


            $numsss++;



          }



if($idstudent!=""){

$sql = "SELECT * from timetable_detail where idstudent in ($idstudent) and id_timetable = '$timetable2' ";


          $result3 = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

          while ($value3 = mysqli_fetch_assoc($result3)) {

            $b = "false";



}


}


if($b == "true"){


  date_default_timezone_set("Asia/Bangkok");

  $datetime_current=date("Y-m-d H:i:s");



$sqlq = "SELECT * from timetable,course_detail where timetable.Idcourse_detail = course_detail.Idcourse_detail and  timetable.id_timetable  =  '$timetable2'";

        $result2 = mysqli_query($this -> connect(),$sqlq ) or die(mysqli_error());

        while ($value1 = mysqli_fetch_assoc($result2)) {



                  $amount = $value1['amount_courses'];
                  $sql789 ="SELECT * from tutor_leave where Id_timetable = '$timetable2' and status = 'false'";

                  $result789 = mysqli_query($this -> connect(),$sql789 ) or die(mysqli_error());


                  $row_cnt = $result789->num_rows;

                $amount =  $row_cnt+$amount;

                  $Start_date = $value1['Start_date'];
                  $End_date = $value1['End_date'];
                  $Start_time = $value1['Start_time'];
                  $End_time = $value1['End_time'];

                  $asd = "true";
                  $dates = "";
                    for ($i=0; $i < $amount ; $i++) {

                      $date1   = new DateTime($Start_date);
                      $date2   = new DateTime($datetime_current);


                      $dteDiff  = $date1->diff($date2);

                       $dater= $dteDiff->format("%R");
                       $dated= $dteDiff->format("%d");

                       $dateh= $dteDiff->format("%h");


              //         if($dater=='-'&&$dated>=1&&$dateh>1){
              //           $opo =  "2";
              //
              //     }else if($dater=='-'&&$dated==0&&$dateh>1){
              //
              //       $opo =  "1";
              //
              //   }
              //   if($dater=='+'&&$dated=="0"){
              //     $opo =  "0";
              //
              // }

              if($dater=="-"&&$asd == "true"&&$dated<=5){

                  $dates = $Start_date;
                      $asd = "false";

                  }

        if($dater=="+"){

        $dates = $Start_date;


    }

                      $Start_date =  date( "Y-m-d",strtotime( $Start_date." +7 day" ) ) ;

                    }



        }



 $sql = "INSERT INTO tutor_leave (`datetime`, `content`, `updated_at`, `created_at`, `Id_timetable`,status,idtutor) VALUES ('$dates','$content','$datetime_','$datetime_','$timetable2','false','$tutor')";



 mysqli_query($this -> connect(),$sql ) or die(mysqli_error());



$sql = "UPDATE timetable SET End_date = '$dateend' where Id_timetable = '$timetable2' ";

mysqli_query($this -> connect(),$sql ) or die(mysqli_error());
echo $this -> f_output("true", "","");
}else{

    echo $this -> f_output("false", "Member not found");


}
}
public function leavecheck() {
      $Idtimetable_deteil =    $this -> Idtimetable_deteil ;

      date_default_timezone_set("Asia/Bangkok");

      $datetime_current=date("Y-m-d");




      $sql = "SELECT * from timetable,course_detail,timetable_detail where timetable.Idcourse_detail = course_detail.Idcourse_detail and timetable_detail.id_timetable = timetable.id_timetable and timetable_detail.Idtimetable_deteil = '$Idtimetable_deteil'";


      $result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

      $amount = "";
      $Start_date = "";
      $timetable= "";
      while ($value0 = mysqli_fetch_assoc($result)) {


      $Start_date  = $value0['Start_date'];

      $amount  = $value0['amount_courses'];
$timetable =  $value0['id_timetable'];
      }

      $check = "false";


      $sql789 ="SELECT * from tutor_leave where Id_timetable = '$timetable' and status = 'false'";

      $result789 = mysqli_query($this -> connect(),$sql789 ) or die(mysqli_error());


      $row_cnt = $result789->num_rows;

      $amount = $amount+$row_cnt;


      for($i=0;$i<$amount;$i++){



      if($datetime_current == $Start_date){

        $check = "true";


      }

        $Start_date =  date( "Y-m-d",strtotime( $Start_date." +7 day" ) ) ;


      }



if($check == "true"){


  $sql = "SELECT * from date_of_study where Idtimetable_deteil = '$Idtimetable_deteil' and  datetime like '$datetime_current %'";


  $objMem = $this -> f_query($sql);

  if ($objMem) {
    echo $this -> f_output("false", "Found", "");

  } else {
    echo $this -> f_output("true", "Member not found");
  }

}else{


  echo $this -> f_output("false", "Found", "");

}



}

public function leavechecktutor() {

  $timetable =    $this -> timetable ;
  date_default_timezone_set("Asia/Bangkok");

  $datetime_current=date("Y-m-d");


  $time_current=date("H:i:s");




  $sql = "SELECT * from timetable,course_detail where timetable.Idcourse_detail = course_detail.Idcourse_detail and timetable.id_timetable = '$timetable'";


        $result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

        $amount = "";
        $Start_date = "";
        while ($value0 = mysqli_fetch_assoc($result)) {


        $Start_date  = $value0['Start_date'];

        $amount  = $value0['amount_courses'];

        }
        $sql789 ="SELECT * from tutor_leave where Id_timetable = '$timetable' and ( status = 'false'|| status = 'leave')";

        $result789 = mysqli_query($this -> connect(),$sql789 ) or die(mysqli_error());


        $row_cnt = $result789->num_rows;

        $amount = $amount+$row_cnt;

        $check = "false";

        for($i=0;$i<$amount;$i++){



        if($datetime_current == $Start_date){

          $check = "true";


        }

          $Start_date =  date( "Y-m-d",strtotime( $Start_date." +7 day" ) ) ;


        }



if($check == "true"){


  $sql = "SELECT * from tutor_leave where Id_timetable = '$timetable' and tutor_leave.
  datetime  = '$datetime_current' and (tutor_leave.status = 'false'||tutor_leave.status = 'leave') ";

// echo $sql;
  $objMem = $this -> f_query($sql);

  if ($objMem) {
  echo $this -> f_output("false", "Found", "");

  } else {

  $sql2 = "SELECT * from tutor_leave where Id_timetable = '$timetable' and tutor_leave.datetime  = '$datetime_current' and tutor_leave.status = 'true' ";



  $objMem2 = $this -> f_query($sql2);

  if ($objMem2) {

    echo $this -> f_output("true", "Member not found");

  }else{

    echo $this -> f_output("true_hide", "Member not found");

  }
  }

}else{

$sql = "SELECT * from timetable_overtime where  id_timetable ='$timetable'";
$result789 = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());
$check = "false";
while ($value0 = mysqli_fetch_assoc($result789)) {

  $Start_date  = $value0['date'];
if($datetime_current==$Start_date){

  $check = "true";

}

}
if($check=="true"){

  $sql2 = "SELECT * from tutor_leave where Id_timetable = '$timetable' and tutor_leave.datetime  = '$datetime_current' and tutor_leave.status = 'true' ";



  $objMem2 = $this -> f_query($sql2);

  if ($objMem2) {

    echo $this -> f_output("true", "Member not found");

  }else{

    echo $this -> f_output("true_hide", "Member not found");

  }


}else{

  echo $this -> f_output("not", "Found", "");

}





}














}
public function cmon() {

  $idtutor =    $this -> idtutor ;

  $id_timetable =    $this -> id_timetable ;


  date_default_timezone_set("Asia/Bangkok");

  $datetime_current=date("Y-m-d H:i:s");



$sql = "INSERT INTO `tutor_leave`( `datetime`, `content`, `updated_at`, `created_at`, `Id_timetable`, `status`,idtutor) VALUES ('$datetime_current','','$datetime_current','$datetime_current','$id_timetable','true','$idtutor') ";

mysqli_query($this -> connect(),$sql ) or die(mysqli_error());


echo $this -> f_output("true", "");

}

public function leavefind() {



    $id_timetable=    $this -> timetable ;
    $idtutor=    $this -> tutor ;

$idtutor2 = "";

  $sal = "SELECT * from timetable,course_detail where timetable.Idcourse_detail = course_detail.Idcourse_detail  and timetable.id_timetable = '$id_timetable'";



  $result = mysqli_query($this -> connect(),$sal ) or die(mysqli_error());

  $Start_time = "";
  $End_time  = "";
  $Start_date ="";
  $End_date = "";



  while ($value0 = mysqli_fetch_assoc($result)) {

    $Start_time2 = $value0['Start_time'];
    $End_time2  = $value0['End_time'];
    $idroom  = $value0['idroom'];

  $Start_time = $value0['Start_time'];
  $End_time  = $value0['End_time'];
  $Start_date = $value0['Start_date'];
  $End_date = $value0['End_date'];

  $course = $value0['idcourse'];





  }



  date_default_timezone_set("Asia/Bangkok");

  $datetime_current=date("Y-m-d");



    //     $SQL789 = "INSERT INTO tutor_leave ( content,`datetime`, `updated_at`, `created_at`, `Id_timetable`, `status`,idtutor) VALUES  ('$content','$Start_date','$datetime_current','$datetime_current','$id_timetable','leave','$idtutor')";
    //
    //
    //
    //     mysqli_query($this -> connect(),$SQL789 ) or die(mysqli_error());
    //     $last_id =   mysqli_insert_id($this->conn);
    // //
    //
    //
    // $End_time = date('H:i:s', strtotime($End_time. '+ 5 minutes') );
    // $Start_time = date('H:i:s', strtotime($Start_time. '+ 5 minutes') );
    //
    $time2 = date('H:i:s', strtotime($End_time. '+ 5 minutes') );


    $time1 = date('H:i:s', strtotime($Start_time. '+ 5 minutes') );
    //

    $time22 = date('H:i:s', strtotime($time2. '- 10 minutes') );


    $time11 = date('H:i:s', strtotime($time1. '- 10 minutes') );

    // $ss =     "select * FROM timetable,room,course_detail WHERE course_detail.Idcourse_detail = timetable.Idcourse_detail and room.idroom = timetable.idroom and (( '$Start_date'  BETWEEN Start_date and End_date) or  ( '$End_date'  BETWEEN End_date and Start_date))  and
    //      (( '$Start_time'    BETWEEN  Start_time and End_time ) or ( '$End_time'    BETWEEN End_time  and Start_time )or ( '$Start_time'    BETWEEN  End_time and Start_time ) or ( '$End_time'    BETWEEN Start_time  and End_time ) ) ";

         $ss = "select * FROM timetable,room,course_detail WHERE course_detail.Idcourse_detail = timetable.Idcourse_detail and room.idroom = timetable.idroom and (( '$Start_date'  BETWEEN Start_date and End_date) or ( '$Start_date'  BETWEEN End_date and Start_date) or
          ( '$End_date'  BETWEEN End_date and Start_date) or   ( '$End_date'  BETWEEN Start_date and End_date))  and
          (( '$time1'    BETWEEN  Start_time and End_time ) or ( '$time2'    BETWEEN End_time  and Start_time )or ( '$time11'    BETWEEN  End_time and Start_time ) or ( '$time22'    BETWEEN Start_time  and End_time ) ) ";


          $tec = 0;
          $numss = 0;
        $result2 = mysqli_query($this -> connect(),$ss ) or die(mysqli_error());

        while ($value1 = mysqli_fetch_assoc($result2)) {


    if($numss==0){

      $idroom = $value1['idroom'];

    }else{

      $idroom = $idroom.",".$value1['idroom'];

    }
    if($numss==0){

      $idtutor2 = $value1['idtutor'];


    }else{

      $idtutor2 = $idtutor2.",".$value1['idtutor'];

    }

    $numss++;
        }



$kkkk = 0;
if($idtutor2==""){

  $techemty =   "SELECT * FROM tutor,tutor_detail where tutor.idtutor  = tutor_detail.idtutor  and tutor_detail.idcourse = $course";

  $techemty = mysqli_query($this -> connect(),$techemty ) or die(mysqli_error());
while ($value0 = mysqli_fetch_assoc($techemty)) {

if($tec==""){


$tec = $value0['idtutor'];

}else{

$tec = $tec.",".$value0['idtutor'];


}
$kkkk++;

}





}else{

  $techemty =   "SELECT * FROM tutor,tutor_detail WHERE tutor.idtutor not in ($idtutor2) and tutor.idtutor   = tutor_detail.idtutor and tutor_detail.idcourse = $course";


                $techemty = mysqli_query($this -> connect(),$techemty ) or die(mysqli_error());
            while ($value0 = mysqli_fetch_assoc($techemty)) {

          if($tec==""){


            $tec = $value0['idtutor'];

          }else{

            $tec = $tec.",".$value0['idtutor'];


          }

          $kkkk++;

            }

}


$sqls = "SELECT * from timetable,course_detail where course_detail.Idcourse_detail = timetable.Idcourse_detail and  timetable.id_timetable = '$id_timetable'";

$time = mysqli_query($this -> connect(),$sqls ) or die(mysqli_error());
while ($value0 = mysqli_fetch_assoc($time)) {

  $amount  = $value0['amount_courses'];
  $date  = $value0['Start_date'];


  $sql789 ="SELECT * from tutor_leave where Id_timetable = '$id_timetable' and status = 'false' ";

  $result789 = mysqli_query($this -> connect(),$sql789 ) or die(mysqli_error());


  $row_cnt = $result789->num_rows;

  $amount = $amount+ $row_cnt;
$datetrue = "";
$Rate = 0;
for ($i=0; $i < $amount; $i++) {



$date1_1   = new DateTime($date);
$date2_2   = new DateTime($datetime_current);

$dteDiff  = $date2_2->diff($date1_1);

 $dater= $dteDiff->format("%R");

 // echo $date;

if($dater=="-"){

$datetrue = $date;
}
if($dater=="+"&&$Rate==0){
  $Rate++;

  $datetrue = $date;


}

  $date =  date( "Y-m-d",strtotime( $date." +7 day" ) ) ;

}


}

//
$sql = "INSERT INTO `timetable_request`( `Start_time`, `End_time`, `date`, `id_timetable`, `idroom`) VALUES ('$Start_time2','$End_time2','$datetrue','$id_timetable','$idroom')";
 mysqli_query($this -> connect(),$sql ) or die(mysqli_error());
 $last_id =   mysqli_insert_id($this->conn);


    $g2 = explode(',',$tec);

foreach ($g2 as $key ) {



$slq = "INSERT INTO timetable_request_tutor ( `id_timetable_request`, `status`, `idtutor`) VALUES ('$last_id', ' ','$key')";
 mysqli_query($this -> connect(),$slq ) or die(mysqli_error());

}

// $kkkk= $kkkk-1;
//     $gg =  rand(0, $kkkk);
//
//     $g2 = explode(',',$tec);
// echo $g2[$gg];
//
//
//
//
// $sql = ""
//
// $objMem = $this -> f_query($ss);
//
//
// if ($objMem) {
    echo $this -> f_output("true", "", "");
//
// } else {
//   echo $this -> f_output("false", "Found", "");
//
// }



}


public function findtime() {

  $idtable =    $this -> idtable ;
  date_default_timezone_set("Asia/Bangkok");

  $datetime_current=date("Y-m-d H:i:s");
      $opo =  "-";


$sqlq = "SELECT * from timetable,course_detail where timetable.Idcourse_detail = course_detail.Idcourse_detail and  timetable.id_timetable  =  '$idtable'";

        $result2 = mysqli_query($this -> connect(),$sqlq ) or die(mysqli_error());

        while ($value1 = mysqli_fetch_assoc($result2)) {



                  $amount = $value1['amount_courses'];
                  $sql789 ="SELECT * from tutor_leave where Id_timetable = '$idtable' and status = 'false'";

                  $result789 = mysqli_query($this -> connect(),$sql789 ) or die(mysqli_error());


                  $row_cnt = $result789->num_rows;

                $amount =  $row_cnt+$amount;

                  $Start_date = $value1['Start_date'];
                  $End_date = $value1['End_date'];
                  $Start_time = $value1['Start_time'];
                  $End_time = $value1['End_time'];

                  $asd = "true";
                  $dates = "";
                    for ($i=0; $i < $amount ; $i++) {

                      $date1   = new DateTime($Start_date);
                      $date2   = new DateTime($datetime_current);


                      $dteDiff  = $date1->diff($date2);

                       $dater= $dteDiff->format("%R");
                       $dated= $dteDiff->format("%d");

                       $dateh= $dteDiff->format("%h");


              //         if($dater=='-'&&$dated>=1&&$dateh>1){
              //           $opo =  "2";
              //
              //     }else if($dater=='-'&&$dated==0&&$dateh>1){
              //
              //       $opo =  "1";
              //
              //   }
              //   if($dater=='+'&&$dated=="0"){
              //     $opo =  "0";
              //
              // }

              if($dater=="-"&&$asd == "true"&&$dated<=5){

                  $dates = $Start_date;
                      $asd = "false";

                  }

        if($dater=="+"){

        $dates = $Start_date;


    }

                      $Start_date =  date( "Y-m-d",strtotime( $Start_date." +7 day" ) ) ;

                    }



        }

        $date1   = new DateTime($dates);
        $date2   = new DateTime($datetime_current);

        $dteDiff  = $date1->diff($date2);

         $dater= $dteDiff->format("%R");
         $dated= $dteDiff->format("%d");

         $dateh= $dteDiff->format("%h");
        if($dater=='-'&&$dated>=1&&$dateh>1){
                 $opo =  "2";

           }else if($dater=='-'&&$dated==0&&$dateh>1){

             $opo =  "1";

         }
         if($dater=='+'&&$dated=="0"){
           $opo =  "0";

       }


        echo $this -> f_output("true", $opo,$opo);

}



  public function leave() {

$Idtimetable_deteil =    $this -> Idtimetable_deteil ;
date_default_timezone_set("Asia/Bangkok");

$datetime_current=date("Y-m-d H:i:s");

$sql ="INSERT INTO date_of_study (`datetime`, `status`, `Idtimetable_deteil`, `updated_at`, `created_at`) VALUES ('$datetime_current','leave','$Idtimetable_deteil','$datetime_current','$datetime_current')";

mysqli_query($this -> connect(),$sql ) or die(mysqli_error());


echo $this -> f_output("true", "");
  }


  public function getCheckstuone(){
$this ->getcheckkk();
    $idtd =    $this -> idtd ;

    $sql = "SELECT * from timetable,course_detail,timetable_detail where timetable.Idcourse_detail = course_detail.Idcourse_detail
     and timetable_detail.Idtimetable_deteil = '$idtd' and timetable_detail.id_timetable = timetable.id_timetable";
    $result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

    $amount = "";
$timetable = "";
    while ($value0 = mysqli_fetch_assoc($result)) {


    $amount  = $value0['amount_courses'];
$timetable  = $value0['id_timetable'];
    }

  //   $sql789 ="SELECT * from tutor_leave where Id_timetable = '$timetable' and status = 'false'";
  //
  //   $result789 = mysqli_query($this -> connect(),$sql789 ) or die(mysqli_error());
  //
  //
  //   $row_cnt = $result789->num_rows;
  //
  // $amount =  $row_cnt+$amount;

  $sqlq= "SELECT student.*,td.*,(SELECT count(*) from date_of_study where date_of_study.status = 'true' and date_of_study.Idtimetable_deteil = td.Idtimetable_deteil) as count from timetable_detail td Left join Student on Student.idstudent = td.idstudent
  where td.Idtimetable_deteil = '$idtd'   GROUP by Idtimetable_deteil ";

  $objMem = $this -> f_query($sqlq);


  if ($objMem) {
      echo $this -> f_output("true", $amount, $objMem);

  } else {
    echo $this -> f_output("false", "Found", "");

  }

  }

  public function getCheckstuall() {



  $timetable =    $this -> timetable ;


  $sql = "SELECT * from timetable,course_detail where timetable.Idcourse_detail = course_detail.Idcourse_detail and timetable.id_timetable = '$timetable'";
  $result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

  $amount = "";

  while ($value0 = mysqli_fetch_assoc($result)) {


  $amount  = $value0['amount_courses'];

  }

//   $sql789 ="SELECT * from tutor_leave where Id_timetable = '$timetable' and status = 'false'";
//
//   $result789 = mysqli_query($this -> connect(),$sql789 ) or die(mysqli_error());
//
//
//   $row_cnt = $result789->num_rows;
//
// $amount =  $row_cnt+$amount;



    $sqlq= "SELECT student.*,td.*,(SELECT count(*) from date_of_study where date_of_study.status = 'true' and date_of_study.Idtimetable_deteil = td.Idtimetable_deteil) as count from timetable_detail td Left join Student on Student.idstudent = td.idstudent
    where td.Id_timetable = '$timetable'  GROUP by Idtimetable_deteil ";


    $objMem = $this -> f_query($sqlq);


    if ($objMem) {
        echo $this -> f_output("true", $amount, $objMem);

    } else {
      echo $this -> f_output("false", "Found", "");

    }

}
  public function checkstu2() {

    $this ->getcheckkk();

    $id_tutor_compensate=    $this -> id_tutor_compensate ;

    date_default_timezone_set("Asia/Bangkok");

    $date=date("Y-m-d");

    $time_current=date("H:i:s");


$sql= "SELECT * from tutor_compensate  where id_tutor_compensate = '$id_tutor_compensate' and datetime = '$date' and '$time_current' BETWEEN Start_time and End_time";


$objMem = $this -> f_query($sql);

//
if ($objMem) {

// $sql2 = "SELECT * from timetable_overtime,timetable_detail,student where timetable_overtime.id_timetable = timetable_detail.id_timetable  and timetable_overtime.id_timetable_overtime = '$idovertime' and timetable_detail.idstudent = student.idstudent";

$sql = "SELECT evaluation.idEvaluation,grade.idtype,date_of_study.status,timetable.End_time,timetable.End_date,timetable_detail.*,student.*,date_of_study.datetime,(select count(*) from date_of_study where date_of_study.Idtimetable_deteil = timetable_detail.Idtimetable_deteil GROUP by date_of_study.Idtimetable_deteil) as num from timetable_detail left join date_of_study

on date_of_study.Idtimetable_deteil = timetable_detail.Idtimetable_deteil
and  date_of_study.datetime like '$date %'

left join timetable on  timetable.id_timetable  =  timetable_detail.id_timetable
left join student on  student.idstudent  =  timetable_detail.idstudent

left join course_detail on course_detail.Idcourse_detail = timetable.Idcourse_detail
left join grade on grade.idGrade = course_detail.idGrade
left join evaluation on evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil and evaluation.who = '2'
left join tutor_leave on tutor_leave.Id_timetable = timetable.id_timetable

left join tutor_compensate on tutor_compensate.idtutor_of_study = tutor_leave.idtutor_of_study

 where tutor_compensate.id_tutor_compensate = '$id_tutor_compensate' ";

//
$objMem2 = $this -> f_query($sql);

    echo $this -> f_output("true", "Found", $objMem2);
//
} else {
  echo $this -> f_output("false", "Found", "");

}

  }

  public function checkstu3() {
    $this ->getcheckkk();

    $idovertime =    $this -> idovertime ;

    date_default_timezone_set("Asia/Bangkok");

    $date=date("Y-m-d");

    $time_current=date("H:i:s");



$sql= "SELECT * from timetable_overtime  where id_timetable_overtime = '$idovertime' and date = '$date'";
// echo $sql;

$objMem = $this -> f_query($sql);


if ($objMem) {

// $sql2 = "SELECT * from timetable_overtime,timetable_detail,student where timetable_overtime.id_timetable = timetable_detail.id_timetable  and timetable_overtime.id_timetable_overtime = '$idovertime' and timetable_detail.idstudent = student.idstudent";

$sql = "SELECT evaluation.idEvaluation,grade.idtype,date_of_study.status,timetable.End_time,timetable.End_date,timetable_detail.*,student.*,date_of_study.datetime,(select count(*) from date_of_study where date_of_study.Idtimetable_deteil = timetable_detail.Idtimetable_deteil GROUP by date_of_study.Idtimetable_deteil) as num from timetable_detail left join date_of_study

on date_of_study.Idtimetable_deteil = timetable_detail.Idtimetable_deteil
and  date_of_study.datetime like '$date %'

left join timetable on  timetable.id_timetable  =  timetable_detail.id_timetable
left join student on  student.idstudent  =  timetable_detail.idstudent

left join course_detail on course_detail.Idcourse_detail = timetable.Idcourse_detail
left join grade on grade.idGrade = course_detail.idGrade
left join evaluation on evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil and evaluation.who = '2'
left join timetable_overtime on timetable_overtime.id_timetable = timetable.id_timetable

 where timetable_overtime.id_timetable_overtime = '$idovertime'
";

$objMem2 = $this -> f_query($sql);

    echo $this -> f_output("true", "Found", $objMem2);

} else {
  echo $this -> f_output("false", "Found", "");

}
  }




  public function checkstu() {
$this ->getcheckkk();
    $timetable =    $this -> timetable ;

    date_default_timezone_set("Asia/Bangkok");

    $datetime_current=date("Y-m-d");



$sqlxzxc  = "SELECT * from tutor_leave where datetime = '$datetime_current' and Id_timetable = '$timetable' and (status = 'false' or status = 'leave')";


$objMem123 = $this -> f_query($sqlxzxc);


if ($objMem123) {



  echo $this -> f_output("leave", "Found", "");


} else {










  $sql = "SELECT * from timetable,course_detail where timetable.Idcourse_detail = course_detail.Idcourse_detail and timetable.id_timetable = '$timetable'";




  $result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());


  $sql789 ="SELECT * from tutor_leave where Id_timetable = '$timetable' and status = 'false'";

  $result789 = mysqli_query($this -> connect(),$sql789 ) or die(mysqli_error());


  $row_cnt = $result789->num_rows;


  $amount = "";
  $Start_date = "";
  while ($value0 = mysqli_fetch_assoc($result)) {


  $Start_date  = $value0['Start_date'];

  $amount  = $value0['amount_courses'];

  }
  $amount =  $row_cnt+$amount;




  $check = "false";


  for($i=0;$i<$amount;$i++){


  if($datetime_current == $Start_date){

    $check = "true";


  }

    $Start_date =  date( "Y-m-d",strtotime( $Start_date." +7 day" ) ) ;


  }


  if($check=="true"){


    $sql = "SELECT evaluation.idEvaluation,grade.idtype,date_of_study.status,timetable.End_time,timetable.End_date,timetable_detail.*,student.*,date_of_study.datetime,(select count(*) from date_of_study where date_of_study.Idtimetable_deteil = timetable_detail.Idtimetable_deteil GROUP by date_of_study.Idtimetable_deteil) as num from timetable_detail left join date_of_study

    on date_of_study.Idtimetable_deteil = timetable_detail.Idtimetable_deteil
    and  date_of_study.datetime like '$datetime_current %'

    left join timetable on  timetable.id_timetable  =  timetable_detail.id_timetable
    left join student on  student.idstudent  =  timetable_detail.idstudent

    left join course_detail on course_detail.Idcourse_detail = timetable.Idcourse_detail
    left join grade on grade.idGrade = course_detail.idGrade
    left join evaluation on evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil and evaluation.who = '2'
     where timetable_detail.id_timetable = '$timetable'
    ";



    $objMem = $this -> f_query($sql);


    if ($objMem) {
        echo $this -> f_output("true", "Found", $objMem);

    } else {
      echo $this -> f_output("true", "Found", $objMem);

    }
  }else{

    echo $this -> f_output("false", "NotFound", "");

  }
}




}




  public function showlistcoures_all_non() {

    $sql = 'SELECT * FROM course_detail,course,grade  where grade.idgrade = course_detail.idgrade  and course.idcourse = course_detail.idcourse  GROUP by course_detail.idcourse';


        $objMem = $this -> f_query($sql);

        if ($objMem) {
            echo $this -> f_output("true", "Found", $objMem);

        } else {
            echo $this -> f_output("false", "Member not found");
        }


  }
  public function getassstu() {
    $timetable =    $this -> timetable ;


$sql = "SELECT grade.idtype,timetable_detail.*,evaluation.idEvaluation,student.* from timetable_detail
left join evaluation on evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil and evaluation.who = '2'
left join student on timetable_detail.idstudent = student.idstudent
left join timetable on timetable.id_timetable = timetable_detail.id_timetable

left join course_detail on course_detail.Idcourse_detail = timetable.Idcourse_detail
left join grade on grade.idGrade = course_detail.idGrade

  where timetable_detail.id_timetable like '$timetable %' ";

    $objMem = $this -> f_query($sql);


    if ($objMem) {
        echo $this -> f_output("true", "Found", $objMem);

    } else {
      echo $this -> f_output("false", "Found", $objMem);

    }

}

public function getcounmess_stu() {

  date_default_timezone_set("Asia/Bangkok");

  $datet=date("Y-m-d");

  $ids =    $this -> ids ;


$sql = "SELECT * from timetable_detail,timetable,tutor_leave,student where timetable_detail.id_timetable = timetable.id_timetable  and timetable_detail.idstudent = student.idstudent
 and timetable_detail.idstudent = '$ids' and tutor_leave.datetime like '$datet%' and tutor_leave.Id_timetable = timetable.Id_timetable  and tutor_leave.status = 'false'";




$result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());


$row_cnt = $result->num_rows;


echo $this -> f_output("true", $row_cnt, "");




}
public function getcountmess() {

  date_default_timezone_set("Asia/Bangkok");

  $datet=date("Y-m-d");

  $idt =    $this -> idt ;


$sql = "SELECT * from date_of_study,timetable_detail,timetable,student where date_of_study.Idtimetable_deteil = timetable_detail.Idtimetable_deteil
and timetable_detail.id_timetable = timetable.id_timetable and timetable.idtutor = '$idt' and timetable_detail.idstudent = student.idstudent
and date_of_study.status = 'false' and  date_of_study.datetime like '$datet%' ";




$result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());


$row_cnt = $result->num_rows;


echo $this -> f_output("true", $row_cnt, "");




}


public function getmess() {

  date_default_timezone_set("Asia/Bangkok");

  $datet=date("Y-m-d");

  $idt =    $this -> idt ;


$sql = "SELECT * from date_of_study,timetable_detail,timetable,student where date_of_study.Idtimetable_deteil = timetable_detail.Idtimetable_deteil
and timetable_detail.id_timetable = timetable.id_timetable and timetable.idtutor = '$idt' and timetable_detail.idstudent = student.idstudent
and date_of_study.status = 'false' and  date_of_study.datetime like '$datet%' ";



$objMem = $this -> f_query($sql);
if ($objMem) {
 echo $this -> f_output("true", "Found", $objMem);

} else {
echo $this -> f_output("false", "Found", "");

}



}



public function getass_view() {


  $idevaluation =    $this -> idevaluation ;

$sql = "UPDATE `evaluation` SET view = 'false' where idEvaluation = '$idevaluation'" ;


mysqli_query($this -> connect(),$sql ) or die(mysqli_error());



echo $this -> f_output("true", "Found", "");

}



public function getcountass() {

  $ids =    $this -> ids ;


  $sql = "SELECT * from evaluation,timetable_detail,timetable,course_detail,course,grade,room where room.idroom = timetable.idroom and grade.idGrade = course_detail.idGrade
  and course.idcourse = course_detail.idcourse  and  course_detail.Idcourse_detail = timetable.Idcourse_detail  and timetable.id_timetable = timetable_detail.id_timetable  and evaluation.who = '2' and evaluation.view = 'true' and timetable_detail.idstudent = '$ids'
   and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil";


   $result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());


$row_cnt = $result->num_rows;


   echo $this -> f_output("true", $row_cnt, "");
}


public function getcountasstutor() {

  $idt =    $this -> idt ;


  $sql = "SELECT * from evaluation,timetable_detail,timetable,course_detail,course,grade,room where room.idroom = timetable.idroom and grade.idGrade = course_detail.idGrade
  and course.idcourse = course_detail.idcourse  and  course_detail.Idcourse_detail = timetable.Idcourse_detail  and timetable.id_timetable = timetable_detail.id_timetable  and evaluation.who = '1' and evaluation.view = 'true' and timetable.idtutor = '$idt'
   and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil";


   $result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());


$row_cnt = $result->num_rows;


   echo $this -> f_output("true", $row_cnt, "");

}

public function getleaveStuden() {
  $idt =    $this -> idt ;
  date_default_timezone_set("Asia/Bangkok");

  $datet=date("Y-m-d");

  $sql = "SELECT * from timetable_detail,timetable,course_detail,course,grade,room,date_of_study,student where student.idstudent = timetable_detail.idstudent and  date_of_study.Idtimetable_deteil = timetable_detail.Idtimetable_deteil and room.idroom = timetable.idroom and grade.idGrade = course_detail.idGrade
  and course.idcourse = course_detail.idcourse  and  course_detail.Idcourse_detail = timetable.Idcourse_detail  and timetable.id_timetable = timetable_detail.id_timetable   and timetable.idtutor = '$idt'
  and date_of_study.status = 'false'  and date_of_study.datetime like '$datet%' ";


   $objMem = $this -> f_query($sql);
 if ($objMem) {
    echo $this -> f_output("true", "Found", $objMem);

 } else {
  echo $this -> f_output("true", "Found", $objMem);

 }
}


public function getleavetutor() {
  $ids =    $this -> ids ;
  date_default_timezone_set("Asia/Bangkok");

  $datet=date("Y-m-d");

  $sql = "SELECT * from timetable_detail,timetable,course_detail,course,grade,room,tutor_leave,tutor where  room.idroom = timetable.idroom and grade.idGrade = course_detail.idGrade
  and course.idcourse = course_detail.idcourse  and  course_detail.Idcourse_detail = timetable.Idcourse_detail  and timetable.id_timetable = timetable_detail.id_timetable
    and tutor_leave.datetime like '$datet%' and tutor_leave.Id_timetable = timetable.Id_timetable  and tutor.idtutor = timetable.idtutor  and tutor_leave.status = 'false' and timetable_detail.idstudent = '$ids' ";


   $objMem = $this -> f_query($sql);
 if ($objMem) {
    echo $this -> f_output("true", "Found", $objMem);

 } else {
  echo $this -> f_output("true", "Found", $objMem);

 }
}

public function assliststu() {
  $idt =    $this -> id_timetable ;


     $sql = "SELECT  student.*,testing.Total  as t1 ,testing.ask1 as bf1 ,testing.ask2 as bf2 ,testing.ask3 as bf3 ,testing.ask4 as bf4 ,testing.ask5 as bf5 ,evaluation.ask1 as af1 ,evaluation.ask2 as af2
       ,evaluation.ask3 as af3,evaluation.ask4 as af4,evaluation.ask5 as af5, evaluation.Total as t2 from timetable_detail
       left join student on student.idstudent = timetable_detail.idstudent
       left join account on account.idstudent = student.idstudent
       left join evaluation on evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil and evaluation.who = 2
       left join timetable on  timetable.id_timetable = timetable_detail.id_timetable
       left join course_detail on course_detail.Idcourse_detail = timetable.Idcourse_detail
       left join course on course.idcourse = course_detail.idcourse
        left join payment_reserve on payment_reserve.idUserAccount = account.idUserAccount and payment_reserve.idcourse = course_detail.idcourse and payment_reserve.status = 'ผ่านการตรวจสอบ'
        left join testing on testing.idpay_reserve = payment_reserve.idpay_reserve  where  timetable_detail.id_timetable = '$idt' ";



        $objMem = $this -> f_query($sql);
      if ($objMem) {
         echo $this -> f_output("true", "Found", $objMem);

      } else {
       echo $this -> f_output("true", "Found", $objMem);

      }


}




public function getassstu_tutor() {

  $idt =    $this -> idtimetable ;




      $sql = "SELECT DISTINCT t.*,course.*,grade.*,
      (SELECT count(*) from evaluation,timetable,timetable_detail where ask1 = '5' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum1_1,
      (SELECT count(*) from evaluation,timetable,timetable_detail where ask1 = '4' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum1_2,
      (SELECT count(*) from evaluation,timetable,timetable_detail where ask1 = '3' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum1_3,
      (SELECT count(*) from evaluation,timetable,timetable_detail where ask1 = '2' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum1_4 ,
      (SELECT count(*) from evaluation,timetable,timetable_detail where ask1 = '1' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum1_5 ,
      (SELECT count(*) from evaluation,timetable_detail,timetable where t.id_timetable = timetable.id_timetable and  evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable  and evaluation.who = '1') as sum ,
      (SELECT count(*) from evaluation,timetable,timetable_detail where ask2 = '5' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum2_1,
      (SELECT count(*) from evaluation,timetable,timetable_detail where ask2 = '4' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum2_2,
      (SELECT count(*) from evaluation,timetable,timetable_detail where ask2 = '3' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum2_3,
      (SELECT count(*) from evaluation,timetable,timetable_detail where ask2 = '2' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum2_4 ,
      (SELECT count(*) from evaluation,timetable,timetable_detail where ask2 = '1' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum2_5,

      (SELECT count(*) from evaluation,timetable,timetable_detail where ask3 = '5' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum3_1,
      (SELECT count(*) from evaluation,timetable,timetable_detail where ask3 = '4' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum3_2,
      (SELECT count(*) from evaluation,timetable,timetable_detail where ask3 = '3' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum3_3,
      (SELECT count(*) from evaluation,timetable,timetable_detail where ask3 = '2' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum3_4 ,
      (SELECT count(*) from evaluation,timetable,timetable_detail where ask3 = '1' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum3_5 ,

      (SELECT count(*) from evaluation,timetable,timetable_detail where ask4 = '5' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum4_1,
      (SELECT count(*) from evaluation,timetable,timetable_detail where ask4 = '4' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum4_2,
      (SELECT count(*) from evaluation,timetable,timetable_detail where ask4 = '3' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum4_3,
      (SELECT count(*) from evaluation,timetable,timetable_detail where ask4 = '2' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum4_4 ,
      (SELECT count(*) from evaluation,timetable,timetable_detail where ask4 = '1' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum4_5 ,

      (SELECT count(*) from evaluation,timetable,timetable_detail where ask5 = '5' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum5_1,
      (SELECT count(*) from evaluation,timetable,timetable_detail where ask5 = '4' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1' ) as sum5_2,
      (SELECT count(*) from evaluation,timetable,timetable_detail where ask5 = '3' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum5_3,
      (SELECT count(*) from evaluation,timetable,timetable_detail where ask5 = '2' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum5_4 ,
      (SELECT count(*) from evaluation,timetable,timetable_detail where ask5 = '1' and t.id_timetable = timetable.id_timetable and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil  and timetable_detail.id_timetable = t.id_timetable and evaluation.who = '1') as sum5_5



  from evaluation,timetable_detail,timetable t ,course_detail,course,grade
   where t.id_timetable = timetable_detail.id_timetable and
    timetable_detail.Idtimetable_deteil = evaluation.Idtimetable_deteil and
    course_detail.Idcourse_detail = t.Idcourse_detail and
     grade.idGrade = course_detail.idGrade  and
     course.idcourse = course_detail.idcourse and evaluation.who = '1' and t.id_timetable    =  '$idt'
     group by  t.id_timetable order by  t.id_timetable";


     $objMem = $this -> f_query($sql);
   if ($objMem) {
      echo $this -> f_output("true", "Found", $objMem);

   } else {
    echo $this -> f_output("false", "Found", "");

   }



}

  public function asslisttutor() {

    $idt =    $this -> idt ;


   //  $sql = "SELECT * from evaluation,timetable_detail,timetable,course_detail,course,grade,room,student where timetable_detail.idstudent = student.idstudent  and room.idroom = timetable.idroom and grade.idGrade = course_detail.idGrade
   //  and course.idcourse = course_detail.idcourse  and  course_detail.Idcourse_detail = timetable.Idcourse_detail  and timetable.id_timetable = timetable_detail.id_timetable  and evaluation.who = '1' and timetable.idtutor = '$idt'
   //   and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil";
   //
   //   $objMem = $this -> f_query($sql);
   // if ($objMem) {
   //    echo $this -> f_output("true", "Found", $objMem);
   //
   // } else {
   //  echo $this -> f_output("true", "Found", $objMem);
   //
   // }

   $sql = "SELECT * from timetable,course_detail,grade,room,course
    where course.idcourse = course_detail.idcourse and timetable.idroom = room.idroom
     and timetable.Idcourse_detail = course_detail.Idcourse_detail and course_detail.idGrade = grade.idGrade  and  timetable.idtutor = '$idt' ";

    $objMem = $this -> f_query($sql);
  if ($objMem) {
     echo $this -> f_output("true", "Found", $objMem);

  } else {
   echo $this -> f_output("true", "Found", $objMem);

  }
  }



  public function asslist() {

    $ids =    $this -> ids ;


$sql = "SELECT * from evaluation,timetable_detail,timetable,course_detail,course,grade,room where room.idroom = timetable.idroom and grade.idGrade = course_detail.idGrade
and course.idcourse = course_detail.idcourse  and  course_detail.Idcourse_detail = timetable.Idcourse_detail  and timetable.id_timetable = timetable_detail.id_timetable  and evaluation.who = '2' and timetable_detail.idstudent = '$ids'
 and evaluation.Idtimetable_deteil = timetable_detail.Idtimetable_deteil";



    $objMem = $this -> f_query($sql);
 if ($objMem) {
     echo $this -> f_output("true", "Found", $objMem);

 } else {
   echo $this -> f_output("true", "Found", $objMem);

 }

  }

  public function showlistcoures_all() {

  $IDUserAccount =    $this -> IDUserAccount ;


// $sql = 'SELECT * FROM course_detail,course,grade  where grade.idgrade = course_detail.idgrade  and course.idcourse = course_detail.idcourse  GROUP by course_detail.idcourse';

$sql = 'SELECT  course.*,payment_reserve.idpay_reserve as pay,testing.*,type_course.idtype,payment_reserve.status,payment_reserve.IDUserAccount,payment_reserve.random_key,payment_reserve.reserve_price , payment_reserve.created_at as day FROM course
LEFT join course_detail on course.idcourse = course_detail.idcourse
LEFT join  payment_reserve on course.idcourse = payment_reserve.idcourse and payment_reserve.idUserAccount = '.$IDUserAccount.'
left JOIN grade on course_detail.idGrade = grade.idGrade
LEFT JOIN type_course on type_course.idtype = grade.idtype
LEFT join testing on testing.idpay_reserve = payment_reserve.idpay_reserve
LEFT join account on account.IDUserAccount = payment_reserve.IDUserAccount
and  account.idUserAccount = '.$IDUserAccount.'
GROUP by course.idcourse';





    $objMem = $this -> f_query($sql);

    if ($objMem) {
        echo $this -> f_output("true", "Found", $objMem);

    } else {
        echo $this -> f_output("false", "Member not found");
    }




  }








    public function rollcall_qr() {


      $IDUserAccount=    $this -> IDUserAccount ;
          $idtimetable=    $this -> idtimetable ;

date_default_timezone_set("Asia/Bangkok");

$datetime_current=date("Y-m-d H:i:s");


$sql = "SELECT * FROM account where IDUserAccount =  '$IDUserAccount' ";



    $result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

  $who = "";
    while ($value0 = mysqli_fetch_assoc($result)) {


  $who  = $value0['idstudent'];


    }


    $sql = "SELECT * FROM timetable_detail where idstudent =  $who and id_timetable = $idtimetable  ";


    $result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

    $who = "";
    while ($value0 = mysqli_fetch_assoc($result)) {


    $who  = $value0['Idtimetable_deteil'];


    }

$datet=date("Y-m-d");


      $sql = "select * from date_of_study where `datetime` like '$datet%' and (status = 'true' or status = 'late') and Idtimetable_deteil = $who";

      $result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());


 $row_cnt = $result->num_rows;

if($row_cnt != 0 ){

    echo $this -> f_output("false", "Member not found");

}else{


 $sqlss = "SELECT * from timetable where id_timetable =  '$idtimetable'";
  $resultss = mysqli_query($this -> connect(),$sqlss ) or die(mysqli_error());
$sssStart_time  = "";
  while ($value0 = mysqli_fetch_assoc($resultss)) {

      $sssStart_time = $value0['Start_time'];


  }

  date_default_timezone_set("Asia/Bangkok");

  $datezxt=date("Y-m-d H:i:s");

  $date1   = new DateTime($datezxt);
  $date2   = new DateTime($sssStart_time);


  $dteDiff  = $date2->diff($date1);

   $dater= $dteDiff->format("%R");
   $dated= $dteDiff->format("%d");
   $datei= $dteDiff->format("%i");



if($dater=="+"&&$datei>15){

  $sql = "insert into date_of_study ( `datetime`, `status`, `Idtimetable_deteil`,updated_at,created_at)  values ( '$datetime_current','true',$who,'$datetime_current','$datetime_current') ";
  $result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());


  echo $this -> f_output("true", "Member not found");

}else{

  $sql = "insert into date_of_study ( `datetime`, `status`, `Idtimetable_deteil`,updated_at,created_at)  values ( '$datetime_current','true',$who,'$datetime_current','$datetime_current') ";
  $result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());


  echo $this -> f_output("true", "Member not found");

}
    //

}





    }




  public function showlistcoures() {

      $idstudent=    $this -> idstudent ;

    $sql = "select * from tutor,timetable,timetable_detail,course_detail,grade,course,room where timetable_detail.idstudent = $idstudent
    and timetable_detail.id_timetable = timetable.id_timetable and course_detail.Idcourse_detail = timetable.Idcourse_detail and
    course_detail.idGrade = grade.idGrade and course.idcourse = course_detail.idcourse and room.idroom = timetable.idroom  and tutor.idtutor = timetable.idtutor order by timetable.id_timetable DESC ";

    $sql2 = "select * from tutor,timetable,timetable_detail,course_detail,grade,course,room,timetable_overtime where timetable_detail.idstudent = $idstudent and timetable_overtime.id_timetable = timetable.id_timetable
    and timetable_detail.id_timetable = timetable.id_timetable and course_detail.Idcourse_detail = timetable.Idcourse_detail and
    course_detail.idGrade = grade.idGrade and course.idcourse = course_detail.idcourse and room.idroom = timetable_overtime.idroom  and tutor.idtutor = timetable.idtutor order by timetable.id_timetable DESC ";


    $objMem = $this -> f_query($sql);

    $objMem2 = $this -> f_query($sql2);

    if ($objMem) {
      if ($objMem2) {

        echo $this -> f_output("true", $objMem2, $objMem);

      }else{
        echo $this -> f_output("true", null, $objMem);

      }


    } else {
        echo $this -> f_output("false", "Member not found");
    }

  }

      public function getreser() {
      $idUserAccount =    $this -> idUserAccount ;

$sql = "SELECT *, DATE_FORMAT(payment_reserve.created_at,'%m %d %Y %T') as day from payment_reserve ,course where payment_reserve.idcourse = course.idcourse  and payment_reserve.idUserAccount =  '$idUserAccount' and payment_reserve.status = 'ยังไม่ได้ชำระเงิน' ";



$objMem = $this -> f_query($sql);

if ($objMem) {
    echo $this -> f_output("true", "Found", $objMem);

} else {
    echo $this -> f_output("false", "Member not found");
}


      }

      public function slip_reser(){
      			$target_dir = $this -> target_dir;
      			$idUserAccount = $this -> idUserAccount;
      			$image = $this -> image;
      			//$nameimage = $this -> nameimage;
      			$idpay = $this -> idpay;

      			// if(!file_exists($target_dir)){
      			// 	//create upload/image folder
      			// 	mkdir($target_dir, 0777, true);
      			// }


      			//set random image file name with time
      			$file = rand() ."_". time();
      			$target_dir = "../public/storage/payment_reser/". $file .".jpeg";
      			if(file_put_contents($target_dir, base64_decode($image))){




              date_default_timezone_set("Asia/Bangkok");

              $datetime_current=date("Y-m-d H:i:s");

$sql = "UPDATE payment_reserve SET img = '$file.jpeg' , status='รอการตรวจสอบการชำระ' , `datetime` = '$datetime_current' where idpay_reserve = '$idpay'";


    mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

    echo $this -> f_output("true", "Member not found");
      				}else{
      				echo json_encode([
      					"Message" => "Sorry, there was an error uploading your file",
      					"Status" => "Error"
      										]);
      								}

      				}

              public function slip_buy(){
                    $target_dir = $this -> target_dir;
                    $idUserAccount = $this -> idUserAccount;
                    $image = $this -> image;
                    //$nameimage = $this -> nameimage;
                    $idbuy = $this -> idbuy;

                    // if(!file_exists($target_dir)){
                    // 	//create upload/image folder
                    // 	mkdir($target_dir, 0777, true);
                    // }


                    //set random image file name with time
                    $file = rand() ."_". time();
                    $target_dir = "../public/storage/payment_buy/". $file .".jpeg";
                    if(file_put_contents($target_dir, base64_decode($image))){




                      date_default_timezone_set("Asia/Bangkok");

                      $datetime_current=date("Y-m-d H:i:s");

            $sql = "UPDATE buy_list SET img = '$file.jpeg' , status='รอการตรวจสอบการชำระ' , `date_pay` = '$datetime_current' where idbuy = '$idbuy'";


            mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

            echo $this -> f_output("true", "Member not found");
                      }else{
                      echo json_encode([
                        "Message" => "Sorry, there was an error uploading your file",
                        "Status" => "Error"
                                  ]);
                              }

                      }



            public function getbuy() {
            $idUserAccount =    $this -> idUserAccount ;

              $sql = "SELECT *, DATE_FORMAT(buy_list.created_at,'%m %d %Y %T') as day from buy_list,course_detail ,course,grade
               where grade.idGrade = course_detail.idGrade
               and buy_list.Idcourse_detail = course_detail.Idcourse_detail
                and course_detail.idcourse =  course.idcourse
                and (buy_list.status = 'ยังไม่ได้ชำระเงิน' or buy_list.status = 'รอการตรวจสอบการชำระ') and buy_list.idUserAccount = '$idUserAccount' order by  buy_list.idbuy DESC";



            $objMem = $this -> f_query($sql);

            if ($objMem) {
                echo $this -> f_output("true", "Found", $objMem);

            } else {
                echo $this -> f_output("false", "Member not found");
            }

            }












      public function reser() {

        $idcourse =    $this -> idcourse ;
      $idUserAccount =    $this -> idUserAccount ;
      $reserve_price =    $this -> reserve_price ;

      date_default_timezone_set("Asia/Bangkok");

      $datetime_current=date("Y-m-d H:i:s");


      $sql = "INSERT into payment_reserve ( `reserve_price`, `idUserAccount`, `idcourse`, `updated_at`, `created_at`, `status`) VALUES  ($reserve_price,$idUserAccount,$idcourse,'$datetime_current','$datetime_current','ยังไม่ได้ชำระเงิน') ";




      mysqli_query($this -> connect(),$sql ) or die(mysqli_error());




                   echo $this -> f_output("true", "Found", "");


      }
    public function getcd() {

      $idc =    $this -> idc ;


$sql = "SELECT * FROM `course_detail`,grade WHERE course_detail.idcourse = '$idc' and grade.idGrade = course_detail.idGrade ";



$objMem = $this -> f_query($sql);

if ($objMem) {
    echo $this -> f_output("true", "Found", $objMem);

} else {
    echo $this -> f_output("false", "Member not found");
}


    }

public function  checktimetable_day(){
  $idtable=    $this -> idtable;
  $date =    $this -> date ;
      $time1=    $this -> time1 ;
          $time2 =    $this -> time2 ;

          $idtutor_main =    $this -> idtutor ;



          $time2 = date('H:i:s', strtotime($time2. '+ 5 minutes') );


          $time1 = date('H:i:s', strtotime($time1. '+ 5 minutes') );
          //

          $time22 = date('H:i:s', strtotime($time2. '- 10 minutes') );


          $time11 = date('H:i:s', strtotime($time1. '- 10 minutes') );


          $g = explode('/',$date);



          $str2 = "";
          $str = "";
          $num = 0;

          $room  = "";
          $tech =  "";

          foreach ($g as $key) {


          if($num==0){

          $str = $key;

          }else if($num==1){

          $str = $str."-".$key;

          }else if($num==2){

          $str = $key."-".$str;

          }


          $num++;
          }

          $num = 0;
          foreach ($g as $key) {


          if($num==0){

          $str2 = $key;

          }else if($num==1){

          $str2 = $str2."-".$key;

          }else if($num==2){

          $str2 = $key."-".$str2;

          }


          $num++;
          }
          // echo $str . $str2;

          $amount = 0;
          //
          $str  = date( "Y-m-d",strtotime( $str ) ) ;
          $datetest = $str;
$idstudent = "";
          $numsss = 0;
          $num = 0;

    $check = "true";
        //     // $ss = "select * FROM timetable,room,course_detail WHERE course_detail.Idcourse_detail = timetable.Idcourse_detail and room.idroom = timetable.idroom and (( '$str'  BETWEEN Start_date and End_date) or  ( '$str2'  BETWEEN End_date and Start_date))  and  (( '$time1'    BETWEEN  Start_time and End_time ) or ( '$time2'    BETWEEN End_time  and Start_time )) ";
        // $ss =     "select * FROM timetable,room,course_detail WHERE course_detail.Idcourse_detail = timetable.Idcourse_detail and room.idroom = timetable.idroom and (( '$str'  BETWEEN Start_date and End_date) or  ( '$str2'  BETWEEN End_date and Start_date))  and
        //      (( '$time1'    BETWEEN  Start_time and End_time ) or ( '$time2'    BETWEEN End_time  and Start_time )or ( '$time1'    BETWEEN  End_time and Start_time ) or ( '$time2'    BETWEEN Start_time  and End_time ) ) ";

$ss = "select * FROM timetable,room,course_detail WHERE course_detail.Idcourse_detail = timetable.Idcourse_detail and room.idroom = timetable.idroom and (( '$str'  BETWEEN Start_date and End_date) or  ( '$str2'  BETWEEN End_date and Start_date))  and
 (( '$time1'    BETWEEN  Start_time and End_time ) or ( '$time2'    BETWEEN End_time  and Start_time )or ( '$time11'    BETWEEN  End_time and Start_time ) or ( '$time22'    BETWEEN Start_time  and End_time ) ) ";

          $result2 = mysqli_query($this -> connect(),$ss ) or die(mysqli_error());


          while ($value1 = mysqli_fetch_assoc($result2)) {

            $date99 = $value1['Start_date'];


            $amount_courses = $value1['amount_courses'];


            $idroom = $value1['idroom'];


            $idtutor = $value1['idtutor'];


            $id_timetable = $value1['id_timetable'];



            $sql789 ="SELECT * from tutor_leave where Id_timetable = '$id_timetable' and status = 'false' ";

            $result789 = mysqli_query($this -> connect(),$sql789 ) or die(mysqli_error());


            $row_cnt = $result789->num_rows;


$row_cnt = $row_cnt+$amount_courses;



                for($c=0;$c<$row_cnt;$c++){




              if($date99==$datetest){

                if($num==0){

                  $room = $idroom;

                }else{


                  $room = $room .",".$idroom;

                }
                if($num==0){

                  $tech = $idtutor;

                }else{

                  $tech = $tech .",".$idtutor;
                }


                if($idtutor==$idtutor_main){

                  $check = "false";
                }

                $num++;

                $tttt = "select * FROM timetable,timetable_detail where timetable.id_timetable  = timetable_detail.id_timetable and timetable.id_timetable = '$id_timetable' ";


                    $result3 = mysqli_query($this -> connect(),$tttt ) or die(mysqli_error());

                    while ($value3 = mysqli_fetch_assoc($result3)) {



                      if($numsss==0){

                        $idstudent = $value3['idstudent'];

                      }else{

                        $idstudent = $idstudent .",".$value3['idstudent'];
                      }




              $numsss++;





              }


              $tttt2 = "select * FROM timetable,timetable_detail,timetable_overtime  where timetable_overtime.id_timetable = timetable.id_timetable and  timetable.id_timetable  = timetable_detail.id_timetable  and timetable_overtime.id_timetable = '$id_timetable' ";

              $result4 = mysqli_query($this -> connect(),$tttt2 ) or die(mysqli_error());

              while ($value4 = mysqli_fetch_assoc($result4)) {


                    if($numsss==0){

                      $idstudent = $value4['idstudent'];

                    }else{

                      $idstudent = $idstudent .",".$value4['idstudent'];
                    }


                    $numsss++;

}



              }else{

   $asd = "SELECT * from timetable_overtime ,timetable,timetable_detail where timetable_overtime.id_timetable = timetable.id_timetable and  timetable_overtime.id_timetable =  '$id_timetable' and  timetable.id_timetable  = timetable_detail.id_timetable ";

   $result5 = mysqli_query($this -> connect(),$asd ) or die(mysqli_error());

   while ($value5 = mysqli_fetch_assoc($result5)) {


     if($numsss==0){

       $idstudent = $value5['idstudent'];

     }else{

       $idstudent = $idstudent .",".$value5['idstudent'];
     }


     $numsss++;



}

              }

                      $date99 =  date( "Y-m-d",strtotime( $date99." +7 day" ) ) ;
                }

          }




          /////////////////////เช็ควัน



          $asd = "SELECT * from timetable_overtime ,timetable,timetable_detail where timetable_overtime.id_timetable = timetable.id_timetable
           and  timetable_overtime.id_timetable =  '$idtable' and  timetable.id_timetable  = timetable_detail.id_timetable and timetable_overtime.date like '$str' and

            (( '$time1'    BETWEEN  timetable_overtime.Start_time and timetable_overtime.End_time ) or ( '$time2'    BETWEEN timetable_overtime.End_time  and timetable_overtime.Start_time )or ( '$time11'    BETWEEN  timetable_overtime.End_time and timetable_overtime.Start_time ) or ( '$time22'    BETWEEN timetable_overtime.Start_time  and timetable_overtime.End_time ) ) ";

          $result5 = mysqli_query($this -> connect(),$asd ) or die(mysqli_error());

          while ($value5 = mysqli_fetch_assoc($result5)) {


            if($numsss==0){

              $idstudent = $value5['idstudent'];

            }else{

              $idstudent = $idstudent .",".$value5['idstudent'];
            }


            $numsss++;



          }







          if($idstudent!=""){

$sql = "SELECT * from timetable_detail where idstudent in ($idstudent) and id_timetable = '$idtable' ";


                    $result3 = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

                    while ($value3 = mysqli_fetch_assoc($result3)) {

                      $check = "false";



}


          }



          $sql = "SELECT * from course_detail,timetable  where timetable.Idcourse_detail = course_detail.Idcourse_detail   and  timetable.id_timetable =   '$idtable' ";

          $result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

          $who = "";
          $course = "";
          $Grade = "";
          while ($value0 = mysqli_fetch_assoc($result)) {

          $Grade = $value0['idGrade'];
          $course = $value0['idcourse'];

          }

          $sql2 = "SELECT * from  Grade where idGrade = $Grade ";
              $result4 = mysqli_query($this -> connect(),$sql2 ) or die(mysqli_error());

          $dss = "";
                  while ($value4 = mysqli_fetch_assoc($result4)) {


          $dss = $value4['idtype'];
          //
          //
          //
          //
          //
          //
                  }

              if($check=="true"){






                $roomnnn = "";
                            if($dss=="1"){

                                  if($room==""){
                                    $roomemty =   "select * FROM room  where typeroom = 'ห้องดนตรี' ";

                    $roomemty = mysqli_query($this -> connect(),$roomemty ) or die(mysqli_error());

                                    while ($value0 = mysqli_fetch_assoc($roomemty)) {

                                  if($roomnnn==""){


                                    $roomnnn = $value0['number'];

                                  }else{
                                    $roomnnn = $roomnnn.",".$value0['number'];


                                  }


                                    }


                                  }else{
                                    $roomemty =  "select * FROM room WHERE idroom not in ($room) and typeroom = 'ห้องดนตรี' ";
                    $roomemty = mysqli_query($this -> connect(),$roomemty ) or die(mysqli_error());
                                    while ($value0 = mysqli_fetch_assoc($roomemty)) {

                                  if($roomnnn==""){


                                    $roomnnn = $value0['number'];

                                  }else{
                                    $roomnnn = $roomnnn.",".$value0['number'];


                                  }


                                    }
                                  }

                            }else{
                              if($room==""){

                                $roomemty =   "select * FROM room where typeroom = 'ห้องเรียน' ";
                                    $roomemty = mysqli_query($this -> connect(),$roomemty ) or die(mysqli_error());
                                while ($value0 = mysqli_fetch_assoc($roomemty)) {

                              if($roomnnn==""){


                                $roomnnn = $value0['number'];

                              }else{
                                $roomnnn = $roomnnn.",".$value0['number'];


                              }


                                }
                              }else{
                                $roomemty =   "select * FROM room WHERE idroom not in ($room) and typeroom = 'ห้องเรียน' ";
                                    $roomemty = mysqli_query($this -> connect(),$roomemty ) or die(mysqli_error());
                                while ($value0 = mysqli_fetch_assoc($roomemty)) {

                              if($roomnnn==""){


                                $roomnnn = $value0['number'];

                              }else{
                                $roomnnn = $roomnnn.",".$value0['number'];


                              }


                                }

                              }


                            }

                $tec = '';

                            if($tech==""){

                              $techemty =   "SELECT * FROM tutor,tutor_detail where tutor.idtutor  = tutor_detail.idtutor  and tutor_detail.idcourse = $course";

                              $techemty = mysqli_query($this -> connect(),$techemty ) or die(mysqli_error());
                          while ($value0 = mysqli_fetch_assoc($techemty)) {

                        if($tec==""){


                          $tec = $value0['idtutor'];

                        }else{

                          $tec = $tec.",".$value0['idtutor'];


                        }


                          }





                            }else{

                              $techemty =   "SELECT * FROM tutor,tutor_detail WHERE tutor.idtutor not in ($tech) and tutor.idtutor   = tutor_detail.idtutor and tutor_detail.idcourse = $course";


                                            $techemty = mysqli_query($this -> connect(),$techemty ) or die(mysqli_error());
                                        while ($value0 = mysqli_fetch_assoc($techemty)) {

                                      if($tec==""){


                                        $tec = $value0['idtutor'];

                                      }else{

                                        $tec = $tec.",".$value0['idtutor'];


                                      }


                                        }

                            }
              }












          if($check=="false"){

            echo $this -> f_output("not", "Member not found");


          // ไม่เจอห้องและครู
        }else if($roomnnn =='' || $tec==''){

          echo $this -> f_output("false", "Member not found");



        }else{
$sql = "SELECT * from timetable_detail where id_timetable = '$idtable'";
  $result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());
  $row_cnt = $result->num_rows;


$sql = "SELECT * from room where number in ($roomnnn) and amount >= '$row_cnt'";

$result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

$numll= 0;
$roomarj = "";
while ($value0 = mysqli_fetch_assoc($result)) {

  if($numll==0){

$roomarj = $value0['idroom'];

  }else{

    $roomarj = $roomarj.",".$value0['idroom'];


  }
$numll++;

}
$numll = $numll-1;
    $gg =  rand(0, $numll);
 $xx = explode(',',$roomarj);



          echo $this -> f_output("true", $xx[$gg],"");

          }





}
public function  sendtutor(){


    $idreq =    $this -> idreq ;
    $idtutor =    $this -> idtutor ;
    $send =    $this -> send ;


    $sq = "UPDATE timetable_request_tutor SET  status = '$send' where id_timetable_request_tutor = '$idreq'";
    mysqli_query($this -> connect(),$sq ) or die(mysqli_error());

    echo $this -> f_output("true", "Found", "");



if($send == "1"){

  $sql = "SELECT * from timetable_request_tutor where id_timetable_request_tutor = '$idreq'";
  $resu = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

                  while ($value0 = mysqli_fetch_assoc($resu)) {
$id = $value0['id_timetable_request'];
                  }

      $sql = "UPDATE timetable_request_tutor SET  status = '2'  where id_timetable_request_tutor != '$idreq' and  id_timetable_request = '$id' ";
      mysqli_query($this -> connect(),$sql ) or die(mysqli_error());





      $sql = "SELECT * from timetable_request,timetable where timetable.id_timetable  = timetable_request.id_timetable and   timetable_request.id_timetable_request = '$id' ";
      $resu3 = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());
          while ($value2 = mysqli_fetch_assoc($resu3)) {
            $Start_time = $value2['Start_time'];
            $End_time = $value2['End_time'];
            $date = $value2['date'];
            $id_timetable = $value2['id_timetable'];
            $idroom = $value2['idroom'];
            $tutor = $value2['idtutor'];

          }
          date_default_timezone_set("Asia/Bangkok");

          $datetime_current=date("Y-m-d");


$sqls = "INSERT INTO `tutor_leave`(`datetime`, `updated_at`, `created_at`, `Id_timetable`, `status`, `idtutor`) VALUES ('$date','$datetime_current','$datetime_current','$id_timetable','leave','$tutor')";
mysqli_query($this -> connect(),$sqls ) or die(mysqli_error());
$last_id =   mysqli_insert_id($this->conn);



          $sql2 = "INSERT INTO `tutor_compensate` ( `id_tutor`, `idtutor_of_study`, `datetime`, `Start_time`, `End_time` ) VALUES  ('$idtutor','$last_id','$date','$Start_time','$End_time') ";
          mysqli_query($this -> connect(),$sql2 ) or die(mysqli_error());






}


}

public function send(){

  $idreq =    $this -> idreq ;
  $idstu =    $this -> idstu ;
  $send =    $this -> send ;


$sq = "UPDATE timetable_request_stu SET  status = '$send' where id_timetable_request_stu = '$idreq'";
mysqli_query($this -> connect(),$sq ) or die(mysqli_error());







  echo $this -> f_output("true", "Found", "");



  $sql = "SELECT * from timetable_request_stu where id_timetable_request_stu = '$idreq'";
  $resu = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

                  while ($value0 = mysqli_fetch_assoc($resu)) {

                  $va =   $value0['id_timetable_request'];
$check = "true";
                        $sql2 = "SELECT * from timetable_request_stu where id_timetable_request = '$va' ";
                        $resu2 = mysqli_query($this -> connect(),$sql2 ) or die(mysqli_error());
                            while ($value1 = mysqli_fetch_assoc($resu2)) {

                                    if($value1['status']==0||$value1['status']==2){
                                          $check = "false";

                                    }
                                }

if($check=="true"){


$sql = "SELECT * from timetable_request where id_timetable_request = '$va' ";
$resu3 = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());
    while ($value2 = mysqli_fetch_assoc($resu3)) {
      $Start_time = $value2['Start_time'];
      $End_time = $value2['End_time'];
      $date = $value2['date'];
      $id_timetable = $value2['id_timetable'];
      $idroom = $value2['idroom'];

    }



    $sql2 = "INSERT INTO `timetable_overtime` ( `Start_time`, `End_time`, `date`, `id_timetable`, `idroom`) VALUES  ('$Start_time','$End_time','$date','$id_timetable','$idroom') ";
    mysqli_query($this -> connect(),$sql2 ) or die(mysqli_error());



    $idtable =   $id_timetable;
    date_default_timezone_set("Asia/Bangkok");

    $datetime_current=date("Y-m-d H:i:s");



  $sqlq = "SELECT * from timetable,course_detail where timetable.Idcourse_detail = course_detail.Idcourse_detail and  timetable.id_timetable  =  '$idtable'";

          $result2 = mysqli_query($this -> connect(),$sqlq ) or die(mysqli_error());

          while ($value1 = mysqli_fetch_assoc($result2)) {



                    $amount = $value1['amount_courses'];
                    $sql789 ="SELECT * from tutor_leave where Id_timetable = '$idtable' and status = 'false'";

                    $result789 = mysqli_query($this -> connect(),$sql789 ) or die(mysqli_error());


                    $row_cnt = $result789->num_rows;

                  $amount =  $row_cnt+$amount;
                  $tutor = $value1['idtutor'];

                    $Start_date = $value1['Start_date'];
                    $End_date = $value1['End_date'];
                    $Start_time = $value1['Start_time'];
                    $End_time = $value1['End_time'];

                    $asd = "true";
                    $dates = "";
                      for ($i=0; $i < $amount ; $i++) {

                        $date1   = new DateTime($Start_date);
                        $date2   = new DateTime($datetime_current);


                        $dteDiff  = $date1->diff($date2);

                         $dater= $dteDiff->format("%R");
                         $dated= $dteDiff->format("%d");

                         $dateh= $dteDiff->format("%h");



                if($dater=="-"&&$asd == "true"){

                    $dates = $Start_date;
                        $asd = "false";

                    }

                        $Start_date =  date( "Y-m-d",strtotime( $Start_date." +7 day" ) ) ;

                      }



          }





          date_default_timezone_set("Asia/Bangkok");


            $datetime_current=date("Y-m-d H:i:s");





    $sql2 = "INSERT INTO `tutor_leave`( `datetime`,  `updated_at`, `created_at`, `Id_timetable`, `status`, `idtutor`) VALUES ('$dates','$datetime_current','$datetime_current','$idtable','leave','$tutor')";
    mysqli_query($this -> connect(),$sql2 ) or die(mysqli_error());



}
                  }


}

public function getreqtutor(){
  $iidtutor =    $this -> idtutor ;



  $sql = "SELECT timetable_request.*,course.name,room.number,timetable_request_tutor.id_timetable_request_tutor from timetable left join course_detail on timetable.Idcourse_detail = course_detail.Idcourse_detail
  left join course on course_detail.idcourse = course.idcourse
  left join timetable_request on timetable.id_timetable = timetable_request.id_timetable
  left join room on timetable_request.idroom = room.idroom

  left join timetable_request_tutor on timetable_request.id_timetable_request = timetable_request_tutor.id_timetable_request
   where timetable_request_tutor.idtutor = '$iidtutor'  and timetable_request_tutor.status = 0  limit 1 ";


               $objMem = $this -> f_query($sql);

               if ($objMem) {
                   echo $this -> f_output("true", "Found", $objMem);

               } else {
                   echo $this -> f_output("false", "Member not found");
               }

}

public function getreq(){
  $ids =    $this -> ids ;



$sql = "SELECT timetable_request.*,course.name,room.number,timetable_request_stu.id_timetable_request_stu from timetable left join course_detail on timetable.Idcourse_detail = course_detail.Idcourse_detail
left join course on course_detail.idcourse = course.idcourse
left join timetable_request on timetable.id_timetable = timetable_request.id_timetable
left join room on timetable_request.idroom = room.idroom

left join timetable_request_stu on timetable_request.id_timetable_request = timetable_request_stu.id_timetable_request
 where timetable_request_stu.idstudent = '$ids'  and timetable_request_stu.status = 0  limit 1 ";



            $objMem = $this -> f_query($sql);

            if ($objMem) {
                echo $this -> f_output("true", "Found", $objMem);

            } else {
                echo $this -> f_output("false", "Member not found");
            }



}



public function leavetutordate(){


  $idt =    $this -> idt ;
      $date =    $this -> date ;
          $time1 =    $this -> time1 ;
              $time2=    $this -> time2 ;

              $room=    $this -> room ;

              $g = explode('/',$date);




              $str = "";
              $num = 0;


              foreach ($g as $key) {


              if($num==0){

              $str = $key;

              }else if($num==1){

              $str = $str."-".$key;

              }else if($num==2){

              $str = $key."-".$str;

              }


              $num++;
              }
              date_default_timezone_set("Asia/Bangkok");


                $datetime_current=date("Y-m-d H:i:s");


              $sqlq = "SELECT * from timetable,course_detail where timetable.Idcourse_detail = course_detail.Idcourse_detail and  timetable.id_timetable  =  '$idt'";

                      $result2 = mysqli_query($this -> connect(),$sqlq ) or die(mysqli_error());

                      while ($value1 = mysqli_fetch_assoc($result2)) {



                                $amount = $value1['amount_courses'];
                                $sql789 ="SELECT * from tutor_leave where Id_timetable = '$idt' and status = 'false'";

                                $result789 = mysqli_query($this -> connect(),$sql789 ) or die(mysqli_error());


                                $row_cnt = $result789->num_rows;

                              $amount =  $row_cnt+$amount;

                                $Start_date = $value1['Start_date'];
                                $End_date = $value1['End_date'];
                                $Start_time = $value1['Start_time'];
                                $End_time = $value1['End_time'];

                                $asd = "true";
                                $dates = "";
                                  for ($i=0; $i < $amount ; $i++) {

                                    $date1   = new DateTime($Start_date);
                                    $date2   = new DateTime($datetime_current);


                                    $dteDiff  = $date1->diff($date2);

                                     $dater= $dteDiff->format("%R");
                                     $dated= $dteDiff->format("%d");

                                     $dateh= $dteDiff->format("%h");


                            //         if($dater=='-'&&$dated>=1&&$dateh>1){
                            //           $opo =  "2";
                            //
                            //     }else if($dater=='-'&&$dated==0&&$dateh>1){
                            //
                            //       $opo =  "1";
                            //
                            //   }
                            //   if($dater=='+'&&$dated=="0"){
                            //     $opo =  "0";
                            //
                            // }

                            if($dater=="-"&&$asd == "true"){

                                $dates = $Start_date;
                                    $asd = "false";

                                }
                  //     if($dater=="+"){
                  //     $asd = "false";
                  //
                  //
                  // }

                                    $Start_date =  date( "Y-m-d",strtotime( $Start_date." +7 day" ) ) ;

                                  }



                      }

$slq = "INSERT into timetable_request ( `Start_time`, `End_time`, `date`, `id_timetable`, `idroom`,dateout)
 VALUES  ('$time1','$time2','$str','$idt','$room','$dates')";

 mysqli_query($this -> connect(),$slq ) or die(mysqli_error());
  $last_id =   mysqli_insert_id($this->conn);


  $slq = "SELECT * from timetable_detail where  id_timetable = '$idt'";
  $resu = mysqli_query($this -> connect(),$slq ) or die(mysqli_error());

                  while ($value0 = mysqli_fetch_assoc($resu)) {

$stu = $value0['idstudent'];

                    $slq = "INSERT INTO `timetable_request_stu`(`id_timetable_request`, `idstudent`,status) VALUES ('$last_id','$stu',0)";

                 mysqli_query($this -> connect(),$slq ) or die(mysqli_error());

                  }






         echo $this -> f_output("true", "Found", "");

}




  public function checktimetable() {
    $idcd =    $this -> idcd ;
    $date1 =    $this -> date1 ;
        $date2 =    $this -> date2 ;
            $time1 =    $this -> time1 ;
                $time2=    $this -> time2 ;

  $ids=    $this -> ids ;


  $time2 = date('H:i:s', strtotime($time2. '- 5 minutes') );



$g = explode('/',$date1);

$g2 = explode('/',$date2);

$str2 = "";
$str = "";
$num = 0;

$room  = "";
$tech =  "";

foreach ($g as $key) {


if($num==0){

$str = $key;

}else if($num==1){

$str = $str."-".$key;

}else if($num==2){

$str = $key."-".$str;

}


$num++;
}

$num = 0;
foreach ($g2 as $key) {


if($num==0){

$str2 = $key;

}else if($num==1){

$str2 = $str2."-".$key;

}else if($num==2){

$str2 = $key."-".$str2;

}


$num++;
}
// echo $str . $str2;

$amount = 0;
//
//
                $sql = "SELECT * from course_detail where Idcourse_detail = '$idcd' ";

                $result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

                while ($value0 = mysqli_fetch_assoc($result)) {

                    $amount = $value0['amount_courses'];


                }


$str2  = date( "Y-m-d",strtotime( $str2 ) ) ;

$str  = date( "Y-m-d",strtotime( $str ) ) ;


$num = 0;

$datetest = $str;
$check = true;
  for($i=0;$i<$amount;$i++){

    $ss = "select * FROM timetable,room,course_detail WHERE course_detail.Idcourse_detail = timetable.Idcourse_detail and room.idroom = timetable.idroom and (( '$str' BETWEEN Start_date and End_date) or ('$str2' BETWEEN End_date and Start_date))  and  ((`Start_time` BETWEEN '$time1' and '$time2') or (`End_time` BETWEEN '$time2' and '$time1  ')) ";

    $result2 = mysqli_query($this -> connect(),$ss ) or die(mysqli_error());


    while ($value1 = mysqli_fetch_assoc($result2)) {

    $date99 = $value1['Start_date'];


    $amount_courses = $value1['amount_courses'];


    $idroom = $value1['idroom'];


    $idtutor = $value1['idtutor'];


    $id_timetable = $value1['id_timetable'];


  for($c=0;$c<$amount_courses;$c++){

if($date99==$datetest){

  if($num==0){

    $room = $idroom;

  }else{


    $room = $room .",".$idroom;

  }
  if($num==0){

    $tech = $idtutor;

  }else{

    $tech = $tech .",".$idtutor;
  }

  $num++;

  $tttt = "select * FROM timetable,timetable_detail where timetable.id_timetable  = timetable_detail.id_timetable and timetable_detail.idstudent = '$ids' and timetable.id_timetable = '$id_timetable' ";


      $result3 = mysqli_query($this -> connect(),$tttt ) or die(mysqli_error());


      while ($value3 = mysqli_fetch_assoc($result3)) {

     $check = false;


}

}else{




}
        $date99 =  date( "Y-m-d",strtotime( $date99." +7 day" ) ) ;
  }

    }
      $datetest =  date( "Y-m-d",strtotime( $datetest." +7 day" ) ) ;

  }



///////////////////////////ข้างบน
//
//
//
$sql = "SELECT * from course_detail where Idcourse_detail = '$idcd' ";

$result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

$who = "";
$course = "";
$Grade = "";
while ($value0 = mysqli_fetch_assoc($result)) {
    $password = $value0['amount_courses'];

    if($value0['amount_courses']!=''){
$who = $value0['amount_courses'];
$Grade = $value0['idGrade'];
$course = $value0['idcourse'];
    }else if($value0['amount_courses']!=''){
$who = $value0['amount_courses'];
$Grade = $value0['idGrade'];
$course = $value0['idcourse'];
    }
}

//
//  $room  = "";
//  $tech =  "";
//
// for($i=0;$i<$who;$i++){
//
//   $date1 =    $this -> date1 ;
//       $date2 =    $this -> date2 ;
//           $time1 =    $this -> time1 ;
//               $time2=    $this -> time2 ;
//
// $time2 = date('H:i:s', strtotime($time2. '- 5 minutes') );
//
//  $ss  = "select * FROM timetable,room WHERE room.idroom = timetable.idroom and ((`Start_date` BETWEEN '$str' and '$str2') or (`End_date` BETWEEN '$str2' and '$str'))  and  ((`Start_time` BETWEEN '$time1' and '$time2') or (`End_time` BETWEEN '$time2' and '$time1  ')) ";
//
//
//   $result = mysqli_query($this -> connect(),$ss ) or die(mysqli_error());
// $num = 0;
//    foreach ($result as $key) {
//
//
//                 if($num==0){
//
//                   $room =$key['idroom'];
//
//                 }else{
//
//
//                   $room = $room .",".$key['idroom'];
//
//                 }
//
//                 if($num==0){
//
//                   $tech = $key['idtutor'];
//
//                 }else{
//
//                   $tech = $tech .",".$key['idtutor'];
//                 }
//
//                 $num++;
//
//
//
//    }
//
//
//
//    $date2 =  date( "Y-m-d",strtotime( $date2." +7 day" ) ) ;
// }
//
//
$sql2 = "SELECT * from  Grade where idGrade = $Grade ";
    $result4 = mysqli_query($this -> connect(),$sql2 ) or die(mysqli_error());

$dss = "";
        while ($value4 = mysqli_fetch_assoc($result4)) {


$dss = $value4['idtype'];
//
//
//
//
//
//
        }
// ////////////////////////////ข้างล่างไม่ลบ





if($check==true ){



$roomnnn = "";
            if($dss=="1"){

                  if($room==""){
                    $roomemty =   "select * FROM room  where typeroom = 'ห้องดนตรี' ";

    $roomemty = mysqli_query($this -> connect(),$roomemty ) or die(mysqli_error());

                    while ($value0 = mysqli_fetch_assoc($roomemty)) {

                  if($roomnnn==""){


                    $roomnnn = $value0['number'];

                  }else{
                    $roomnnn = $roomnnn.",".$value0['number'];


                  }


                    }


                  }else{
                    $roomemty =  "select * FROM room WHERE idroom not in ($room) and typeroom = 'ห้องดนตรี' ";
    $roomemty = mysqli_query($this -> connect(),$roomemty ) or die(mysqli_error());
                    while ($value0 = mysqli_fetch_assoc($roomemty)) {

                  if($roomnnn==""){


                    $roomnnn = $value0['number'];

                  }else{
                    $roomnnn = $roomnnn.",".$value0['number'];


                  }


                    }
                  }

            }else{
              if($room==""){

                $roomemty =   "select * FROM room where typeroom = 'ห้องเรียน' ";
                    $roomemty = mysqli_query($this -> connect(),$roomemty ) or die(mysqli_error());
                while ($value0 = mysqli_fetch_assoc($roomemty)) {

              if($roomnnn==""){


                $roomnnn = $value0['number'];

              }else{
                $roomnnn = $roomnnn.",".$value0['number'];


              }


                }
              }else{
                $roomemty =   "select * FROM room WHERE idroom not in ($room) and typeroom = 'ห้องเรียน' ";
                    $roomemty = mysqli_query($this -> connect(),$roomemty ) or die(mysqli_error());
                while ($value0 = mysqli_fetch_assoc($roomemty)) {

              if($roomnnn==""){


                $roomnnn = $value0['number'];

              }else{
                $roomnnn = $roomnnn.",".$value0['number'];


              }


                }

              }


            }

$tec = '';

            if($tech==""){

              $techemty =   "SELECT * FROM tutor,tutor_detail where tutor.idtutor  = tutor_detail.idtutor  and tutor_detail.idcourse = $course";

              $techemty = mysqli_query($this -> connect(),$techemty ) or die(mysqli_error());
          while ($value0 = mysqli_fetch_assoc($techemty)) {

        if($tec==""){


          $tec = $value0['idtutor'];

        }else{

          $tec = $tec.",".$value0['idtutor'];


        }


          }





            }else{

              $techemty =   "SELECT * FROM tutor,tutor_detail WHERE tutor.idtutor not in ($tech) and tutor.idtutor   = tutor_detail.idtutor and tutor_detail.idcourse = $course";


                            $techemty = mysqli_query($this -> connect(),$techemty ) or die(mysqli_error());
                        while ($value0 = mysqli_fetch_assoc($techemty)) {

                      if($tec==""){


                        $tec = $value0['idtutor'];

                      }else{

                        $tec = $tec.",".$value0['idtutor'];


                      }


                        }

            }
}

            if($check==false){

              echo $this -> f_output("not", "Member not found");


            // ไม่เจอห้องและครู
          }else if($roomnnn =='' || $tec==''){

            echo $this -> f_output("false", "Member not found");



          }else{


            echo $this -> f_output("true", "Member not found");

            }



}

  public function testing() {


        $iduac =    $this -> iduac ;


$sql = "SELECT * from payment_reserve,testing,course where course.idcourse = payment_reserve.idcourse  and idUserAccount = '$iduac' and testing.idpay_reserve = payment_reserve.idpay_reserve";


$objMem = $this -> f_query($sql);

if ($objMem) {
    echo $this -> f_output("true", "Found", $objMem);

} else {
    echo $this -> f_output("false", "Member not found");
}
  }

    public function buycourse() {
    $buy_price =    $this -> buy_price ;
        $Idcourse_detail =    $this -> Idcourse_detail ;
            $idUserAccount =    $this -> idUserAccount ;
                $idTesting =    $this -> idTesting ;
                    $date_start =    $this -> date_start ;
                        $date_end =    $this -> date_end ;
                            $time_start =    $this -> time_start ;
                                $time_end =    $this -> time_end ;

                                  $keyinput =    $this -> keyinput ;



                                  $g = explode('/',$date_start);

                                  $g2 = explode('/',$date_end);

                                  $str2 = "";
                                  $str = "";
                                  $num = 0;
                                  foreach ($g as $key) {


                                  if($num==0){

                                  $str = $key;

                                  }else if($num==1){

                                  $str = $str."-".$key;

                                  }else if($num==2){

                                  $str = $key."-".$str;

                                  }


                                  $num++;
                                  }

                                  $num = 0;
                                  foreach ($g2 as $key) {


                                  if($num==0){

                                  $str2 = $key;

                                  }else if($num==1){

                                  $str2 = $str2."-".$key;

                                  }else if($num==2){

                                  $str2 = $key."-".$str2;

                                  }


                                  $num++;
                                  }
      date_default_timezone_set("Asia/Bangkok");

      $datetime_current=date("Y-m-d H:i:s");





$sql = "INSERT INTO buy_list (`datetime`, `buy_price`, `status`, `updated_at`, `created_at`, `Idcourse_detail`, `idUserAccount`, `idTesting`, `date_start`, `date_end`, `time_start`, `time_end`, `keyinput`)
 VALUES ('$datetime_current','$buy_price','ยังไม่ได้ชำระเงิน','$datetime_current','$datetime_current','$Idcourse_detail','$idUserAccount','$idTesting','$str','$str2','$time_start','$time_end','$keyinput')";

  $result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

 echo $this -> f_output("true", "Member not found");

}



    public function rollcall() {

      $idtutor =    $this -> idtutor ;


    $sql = "SELECT * FROM timetable,course_detail,course,grade,tutor,room  WHERE timetable.idtutor ='$idtutor'
    and course_detail.Idcourse_detail = timetable.Idcourse_detail and course.idcourse = course_detail.idcourse and  course_detail.idGrade = grade.idGrade
    and tutor.idtutor = timetable.idtutor and room.idroom = timetable.idroom order by timetable.id_timetable DESC";

    date_default_timezone_set("Asia/Bangkok");

    $datetime_current=date("Y-m-d");


        $sql2 = "SELECT * FROM timetable,course_detail,course,grade,tutor,room,tutor_compensate,tutor_leave  WHERE tutor_compensate.id_tutor  ='$idtutor' and timetable.Id_timetable = tutor_leave.Id_timetable
         and tutor_leave.idtutor_of_study = tutor_compensate.idtutor_of_study and   course_detail.Idcourse_detail = timetable.Idcourse_detail
          and course.idcourse = course_detail.idcourse and  course_detail.idGrade = grade.idGrade
        and tutor.idtutor = timetable.idtutor and room.idroom = timetable.idroom and tutor_compensate.datetime = '$datetime_current' order by timetable.id_timetable DESC";


        $sql3 = "SELECT * FROM timetable,course_detail,course,grade,tutor,room,timetable_overtime  WHERE timetable.idtutor ='$idtutor' and timetable_overtime.id_timetable = timetable.id_timetable
        and course_detail.Idcourse_detail = timetable.Idcourse_detail and course.idcourse = course_detail.idcourse and  course_detail.idGrade = grade.idGrade
        and tutor.idtutor = timetable.idtutor and room.idroom = timetable_overtime.idroom order by timetable.id_timetable DESC";



  $objMem2 = $this -> f_query($sql2);


  $objMem3 = $this -> f_query($sql3);



    $objMem = $this -> f_query($sql);

    if ($objMem||$objMem2||$objMem3) {
        echo $this -> f_output2("true", $objMem2, $objMem,$objMem3);

    } else {
        echo $this -> f_output2("false", null,null,null);
    }








    }


        public function login() {
        $user =    $this -> username ;
      $pass =    $this -> password ;



        $sql = "	SELECT *FROM account  WHERE username = '$user'";

        $result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

$who = "";
        while ($value0 = mysqli_fetch_assoc($result)) {
            $password = $value0['password'];

            if($value0['idstudent']!=''){
$who = "student";

            }else if($value0['idtutor']!=''){
$who = "tutor";


            }

        }




          if (password_verify($pass, $password)) {

if($who=="student"){

  $sql = "	SELECT *FROM account,student  WHERE username = '$user' and password = '$password' and account.idstudent = student.idstudent";


}else if($who=="tutor"){

  $sql = "	SELECT *FROM account,tutor  WHERE username = '$user' and password = '$password' and account.idtutor = tutor.idtutor";


}



            $objMem = $this -> f_query($sql);

            if ($objMem) {
                echo $this -> f_output("true", "Found", $objMem);

            } else {
                echo $this -> f_output("false", "Member not found");
            }


          } else {
          echo $this -> f_output("false", "Member not found");
          }







        }

        public function checktimetable2() {
          $idcd =    $this -> idcd ;
          $date1 =    $this -> date1 ;
              $date2 =    $this -> date2 ;
                  $time1 =    $this -> time1 ;
                      $time2=    $this -> time2 ;

        $ids=    $this -> ids ;



  $time2 = date('H:i:s', strtotime($time2. '- 5 minutes') );

      $g = explode('/',$date1);

      $g2 = explode('/',$date2);

      $str2 = "";
      $str = "";
      $num = 0;

      $room  = "";
      $tech =  "";

      foreach ($g as $key) {


      if($num==0){

      $str = $key;

      }else if($num==1){

      $str = $str."-".$key;

      }else if($num==2){

      $str = $key."-".$str;

      }


      $num++;
      }

      $num = 0;
      foreach ($g2 as $key) {


      if($num==0){

      $str2 = $key;

      }else if($num==1){

      $str2 = $str2."-".$key;

      }else if($num==2){

      $str2 = $key."-".$str2;

      }


      $num++;
      }
      // echo $str . $str2;

      $amount = 0;
      //
      //
                      $sql = "SELECT * from course_detail where Idcourse_detail = '$idcd' ";

                      $result = mysqli_query($this -> connect(),$sql ) or die(mysqli_error());

                      while ($value0 = mysqli_fetch_assoc($result)) {

                          $amount = $value0['amount_courses'];


                      }


      $str2  = date( "Y-m-d",strtotime( $str2 ) ) ;

      $str  = date( "Y-m-d",strtotime( $str ) ) ;


      $num = 0;

      $datetest = $str;
      $check = true;
        for($i=0;$i<$amount;$i++){

          $ss = "select * FROM timetable,room,course_detail WHERE course_detail.Idcourse_detail = timetable.Idcourse_detail and room.idroom = timetable.idroom and (( '$str' BETWEEN Start_date and End_date) or ('$str2' BETWEEN End_date and Start_date))  and  ((`Start_time` BETWEEN '$time1' and '$time2') or (`End_time` BETWEEN '$time2' and '$time1  ')) ";

          $result2 = mysqli_query($this -> connect(),$ss ) or die(mysqli_error());


          while ($value1 = mysqli_fetch_assoc($result2)) {

          $date99 = $value1['Start_date'];


          $amount_courses = $value1['amount_courses'];



          $id_timetable = $value1['id_timetable'];


        for($c=0;$c<$amount_courses;$c++){

      if($date99==$datetest){




        $tttt = "select * FROM timetable,timetable_detail where timetable.id_timetable  = timetable_detail.id_timetable and timetable_detail.idstudent = '$ids' and timetable.id_timetable = '$id_timetable' ";


            $result3 = mysqli_query($this -> connect(),$tttt ) or die(mysqli_error());


            while ($value3 = mysqli_fetch_assoc($result3)) {

           $check = false;


      }

      }else{




      }
              $date99 =  date( "Y-m-d",strtotime( $date99." +7 day" ) ) ;
        }

          }
            $datetest =  date( "Y-m-d",strtotime( $datetest." +7 day" ) ) ;

        }




      if($check==true ){




      }

                  if($check==false){

                    echo $this -> f_output("not", "Member not found");


                  // ไม่เจอห้องและครู
                }else{


                  echo $this -> f_output("true", "Member not found");

                  }



      }



}
    ?>
