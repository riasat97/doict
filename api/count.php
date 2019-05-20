<?php
include_once("../dbcon.php");
include_once("json_response.php");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$division=$_GET["division"];
$district=$_GET["district"];
$sub_district=$_GET["sub_district"];


if(isset($district) && !empty($district) && isset($sub_district) && !empty($sub_district)){
	echo json_response(countSubDistrict($district,$sub_district));exit;
}
if(isset($division) && !empty($division)){
	echo json_response(countV('division',$division));exit;
}
if(isset($district) && !empty($district)){
	echo json_response(countV('district',$district));exit;
}

echo json_response('provide count.php?division=/district=/sub_district={name} to get count...!',400);