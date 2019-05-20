<?php
include_once("../dbcon.php");
include_once("json_response.php");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$divobj=read("district_division");

while($div=mysqli_fetch_assoc($divobj)){
    
    if(isset($_GET['division'])&& empty($_GET['division'])){
        $division[]=$div['division'];
    }
    
    $disobj=getDistrict($div['division']);
   // var_dump($disobj);exit;
  while($dis=mysqli_fetch_assoc($disobj)){
      //var_dump($dis);
      if(isset($_GET['district'])&& empty($_GET['district'])){
        $district[]=$dis['district'];
      }
          
      if(isset($_GET['division'])&&!empty($_GET['division'])){
        $division_district[$div['division']][]=$dis['district'];
      }

      $subDisObj=getSubDistrict($dis['district']);
     // var_dump(mysqli_fetch_assoc($subDisObj));exit;
       while($sub=mysqli_fetch_assoc($subDisObj)){
           //var_dump($sub);exit;
           if(isset($_GET['sub_district'])&&empty($_GET['sub_district'])){
            $sub_district[]=$sub['sub_district'];
           }

           if(isset($_GET['district'])&&!empty($_GET['district'])){
           $district_subDistrict[$dis['district']][]=$sub['sub_district'];
           }

           $res[$div['division']][$dis['district']][]=$sub['sub_district'];

       }
    
  }
}

//all district under division
if(isset($_GET['division']) && !empty($_GET['division'])){
    $div=$_GET['division'];
    echo json_response($division_district[$div]);exit;
}
//all subdistrict under district
if(isset($_GET['district']) && !empty($_GET['district'])){
    $dis=$_GET['district'];
    echo json_response($district_subDistrict[$dis]);exit;
}

//all division
if(isset($_GET['division'])&&empty($_GET['division'])){
    echo json_response($division);exit;
}
//all district
if(isset($_GET['district'])&&empty($_GET['district'])){
    echo json_response($district);exit;
}
//all subdistrict
if(isset($_GET['sub_district'])&&empty($_GET['sub_district'])){
    echo json_response($sub_district);exit;
}
echo json_response($res);
//var_dump($res);