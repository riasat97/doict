<?php
require_once('dbcon.php');
if(isset($_POST) && !empty($_POST)){
	$firstname=$_POST['firstname'];	
	$lastname=$_POST['lastname'];	
	$age=$_POST['age'];
	$email=$_POST['email'];
	$gender=$_POST['gender'];

    $res=$db->create($firstname,$lastname,$email,$gender,$age);
	header("Location: index.php");
	if($res){
		echo "Successfully inserted data";
    }else{
		echo "failed to insert data";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ict ministry</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div >
<label>ict ministry</label>
</div>

<!--<center>-->
<form method="post" >
<table >
<tr>
<td><input type="text" name="firstname" placeholder="first name" /></td>
</tr>
<tr>
<td><input type="text" name="lastname" placeholder="last name" /></td>
</tr>
<tr>
<td><input type="text" name="email" placeholder="email" /></td>
</tr>
<tr>
<td><input type="text" name="gender" placeholder="gender"/></td>
</tr>
<tr>
<td><input type="text" name="age" placeholder="age"/></td>
</tr>
<tr>
<td><button type="submit" name="save">save</button></td>
</tr>
</table>
</form>
<!--</center>-->
