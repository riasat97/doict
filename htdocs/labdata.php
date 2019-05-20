<?php
include_once("dbcon.php");
// initilize all variables

//if(isset($_GET)&&!empty($_GET)){
	//var_dump($_GET["division"]);exit;
	$division=$_GET["division"];
	$district=$_GET["district"];
	$sub_district=$_GET["sub_district"];

    $params = $columns = $totalRecords = $data = array();
    $params = $_REQUEST;
//define index of columns
$columns = array( 
	0 =>'RowNumber',
	1 =>'institution', 
	2 => 'name_mobile',
	3 => 'year',
	4 => 'sub_district',
	5 => 'district',
	6 => 'division'	
	//array('id' => '1','language' => 'আরবী','batch' => '১','serial' => '১','name' => 'জনাব তরিকুর রহমান, প্রভাষক','certified' => 'হাঁ','age' => '৩১','institution' => 'ফজর আলী গার্লস স্কুল এন্ড কলেজ','srdl_lab' => '','language_lab' => '','qualification' => 'এম এ ','mobile' => '০১৭২৭০৩৭৯২২','alt_mobile' => '','email' => 'toriqur2011@gmail.com','district' => 'ঝিনাইদহ','division' => 'খুলনা'),
);
$where = $sqlTot = $sqlRec = "";
// getting total number records from table without any search
// select @n := @n + 1 RowNumber, t.institution,t.name_mobile,t.year,t.sub_district,t.district,t.division 
// from (select @n:=0) initvars, srdl t WHERE 1=1 ORDER BY year DESC
$sql = "SELECT @n := @n + 1 RowNumber,
`institution` ,
`name_mobile`,
`year`,
`sub_district`,
`district` ,
`division` ,
`language_lab`,`lab_type`,`parliamentary_seat`  
FROM (select @n:=0) initvars,`srdl` WHERE 1=1 ";

if($division && !empty($division)){
	$sql .= "AND  division='". $division. "'";
}

if(isset($district) && !empty($district)){
	$sql .= "AND  district='". $district. "'";
}

if(isset($sub_district) && !empty($sub_district)){
	$sql .= "AND  sub_district='". $sub_district. "'";
}

$sqlTot .= $sql;
$sqlRec .= $sql;
$sqlRec .=  " ORDER BY year desc";
$queryTot = mysqli_query($con, $sqlTot) or die("database error:". mysqli_error($con));
$totalRecords = mysqli_num_rows($queryTot);
$queryRecords = mysqli_query($con, $sqlRec) or die("error to fetch Lab data");
// iterate on results row and create new index array of data
while( $row = mysqli_fetch_row($queryRecords) ) { 
	$data[] = $row;
}	
$json_data = array(
		"draw"            => 1,   
		"recordsTotal"    => intval( $totalRecords ),  
		"recordsFiltered" => intval($totalRecords),
		"data"            => $data
		);
// send data as json format
echo json_encode($json_data);  



	// if(mysqli_num_rows($res)==0){
	// 	header("location:index.php");
	// }
	// else {
	// 	echo "incorrect username/password";
	// 	echo "<a href='login.php'>login</a>";
	// }
//}



?>