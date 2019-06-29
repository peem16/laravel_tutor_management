<?php

	require('class/ebook.php');


	$buy_price = trim($_REQUEST['buy_price']);

	$Idcourse_detail = trim($_REQUEST['Idcourse_detail']);
	$idUserAccount = trim($_REQUEST['idUserAccount']);
	$idTesting = trim($_REQUEST['idTesting']);
	$date_start= trim($_REQUEST['date_start']);
	$date_end= trim($_REQUEST['date_end']);
  	$time_start= trim($_REQUEST['time_start']);
    	$time_end= trim($_REQUEST['time_end']);

    $keyinput= trim($_REQUEST['keyinput']);


	$call = new ebook();
    $call->buy_price = $buy_price;
  $call->Idcourse_detail = $Idcourse_detail;
  $call->idUserAccount = $idUserAccount;
  $call->idTesting = $idTesting;
  $call->date_start = $date_start;
  $call->date_end = $date_end;
    $call->time_start = $time_start;
      $call->time_end = $time_end;
$call->keyinput = $keyinput;

	$call->buycourse();

?>
