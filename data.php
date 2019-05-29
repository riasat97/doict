<?php
include_once("dbcon.php");
// initilize all variables
$params = $columns = $totalRecords = $data = array();
$params = $_REQUEST;
//define index of columns
$columns = array( 
	0 =>'id',
	1 =>'batch',
	2 =>'language', 
	3 => 'sub_batch',
	4 => 'name',
	5 => 'institution',
	6 => 'mobile',
	7 => 'district',
	8 => 'division'
	//array('id' => '1','language' => 'আরবী','batch' => '১','serial' => '১','name' => 'জনাব তরিকুর রহমান, প্রভাষক','certified' => 'হাঁ','age' => '৩১','institution' => 'ফজর আলী গার্লস স্কুল এন্ড কলেজ','srdl_lab' => '','language_lab' => '','qualification' => 'এম এ ','mobile' => '০১৭২৭০৩৭৯২২','alt_mobile' => '','email' => 'toriqur2011@gmail.com','district' => 'ঝিনাইদহ','division' => 'খুলনা'),
);
$where = $sqlTot = $sqlRec = "";
// getting total number records from table without any search
$sql = "SELECT `id`,
`batch`,
`language` ,
`sub_batch`,
`name` ,
`institution` ,
`b_mobile`,
`district`,
`division`  FROM `doict` ";
$sqlTot .= $sql;
$sqlRec .= $sql;
$sqlRec .=  " ORDER BY id";
$queryTot = mysqli_query($con, $sqlTot) or die("database error:". mysqli_error($con));
$totalRecords = mysqli_num_rows($queryTot);
$queryRecords = mysqli_query($con, $sqlRec) or die("error to fetch employees data");
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
?>