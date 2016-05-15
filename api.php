<?php
  //require_once "app/QueryPhone.php";
require_once "autoload.php";

use app\TelQuery;
//use fun\HttpCheckRequset;
	//app\TelQuery::query('111');
	//TelQuery::query('18206033456');
	//TelQuery::query('18200000000');
	//HttpCheckRequset::testRequset();
	//echo "\nnext\n";
    //app\TelQuery::test();

	$params = $_POST;
	$phone = $params['phone'];
	$response = TelQuery::query($phone);
	if (is_array($response) and isset($response['province'])) {
	    $response['phone'] = $phone;
	    $response['code'] = 200;
	} else {
	    $response['code'] = 400;
	    $response['msg'] = '手机号码错误';
	}
	echo json_encode($response);
