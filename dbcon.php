<?php
header('Content-Type: text/html; charset=utf-8');

		$con=mysqli_connect("localhost:3307","root","","srdl");
		$con->set_charset("utf8");
		if(mysqli_connect_error()){
			die("Database Connection Failed" . mysqli_connect_error() . mysqli_connect_errno());
		}
	
	//  function create($fname,$lname,$email,$gender,$age){
	// 	$sql = "insert into users (firstname, lastname, email, gender, age) VALUES ('$fname', '$lname', '$email', '$gender', '$age')";
	// 	$res = mysqli_query($con, $sql);
	// 	if($res){
	//  		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }
    //  function createTableAddress(){
	// 	$sql="create table if not exists addresses(id int auto_increment primary key,user_id int not null,address varchar(255),zip int,mobile varchar(15))";
	// 	$res=mysqli_query($con,$sql);
	// 	if($res)return true;
	// 	else false;
	// }
	 function read($table){
		global $con;
		$sql="select distinct division from $table order by division asc";
		$res=mysqli_query($con,$sql);
		//var_dump(mysqli_fetch_assoc($res));
		if($res)return $res;
		else false;
	}
	function countV($col,$val){
		global $con;
		$sql="select count($col) from srdl where $col='". $val. "' ";
		$res=mysqli_query($con,$sql);
		//var_dump(mysqli_fetch_array($res)[0]);
		if($res)return mysqli_fetch_array($res)[0];
		else false;
	}
	function countSubDistrict($dis,$sub){
		global $con;
		$sql="select count(sub_district) from srdl where district='". $dis. "' and sub_district='". $sub. "' ";
		$res=mysqli_query($con,$sql);
		//var_dump(mysqli_fetch_array($res)[0]);
		if($res)return mysqli_fetch_array($res)[0];
		else false;
	}
	 function getDistrict($val){
		global $con;
		$sql="select district,division from district_division  where division='". $val. "' order by district asc";
		$res=mysqli_query($con,$sql);
		//var_dump(mysqli_fetch_assoc($res));
		if($res)return $res;
		else false;
	}
	 function getSubDistrict($val){
		global $con;
		//var_dump('hi');exit;
		$sql="select distinct sub_district,district from srdl  where district='". $val. "' order by sub_district asc";
		$res=mysqli_query($con,$sql);
		//var_dump(mysqli_fetch_assoc($res));
		if($res)return $res;
		else false;
	}


	function bCountV($col,$val){
		global $con;
		$sql="select count($col) from banbies where $col='". $val. "' ";
		$res=mysqli_query($con,$sql);
		//var_dump(mysqli_fetch_array($res)[0]);
		if($res)return mysqli_fetch_array($res)[0];
		else false;
	}
	 function bGetDistrict($val){
		global $con;
		$sql="select distinct district,division from div_dis_sub  where division='". $val. "' order by district asc";
		$res=mysqli_query($con,$sql);
		//var_dump(mysqli_fetch_assoc($res));
		if($res)return $res;
		else false;
	}
	 function bGetSubDistrict($val){
		global $con;
		//var_dump('hi');exit;
		$sql="select distinct upazila_thana,district from div_dis_sub  where district='". $val. "' order by upazila_thana asc";
		$res=mysqli_query($con,$sql);
		//var_dump(mysqli_fetch_assoc($res));
		if($res)return $res;
		else false;
	}


	


