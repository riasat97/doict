<?php 
require_once('dbcon.php');
 if(isset($_GET)&&!empty($_GET)){
	 $id=$_GET["id"];
	 $sql="select * from users where id=$id";
	 $res=mysqli_query($con,$sql);
	 $row=mysqli_fetch_assoc($res);
	 
	 echo "<b>name :<\b>".$row["name"]."<br>";
	 echo "<b>name :<\b>".$row["email"];
 }
?>