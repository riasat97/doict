<?php
header('Content-Type: text/html; charset=utf-8');

		$con=mysqli_connect("sql305.epizy.com","epiz_23452125","srdl97","epiz_23452125_srdl");
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

	


