<?php
$servername="localhost";
$username="id10330568_root";
$password="karthik";
$dbname="id10330568_karthik";

$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)
	die("Connection Error:".mysqli_connect_error());

$a = $_REQUEST['a'];   
$b = $_REQUEST['b'];
$c = $_REQUEST['c'];
$d = $_REQUEST['d'];
$e = $_REQUEST['e'];
$f = $_REQUEST['f'];
$g = $_REQUEST['g'];
$h = $_REQUEST['h'];
$i = $_REQUEST['j'];

$sql="INSERT INTO  apply(name,rollno,gender,branch,hostel,room,email,type,status) values ('$a','$b','$c','$d','$e','$f','$g','$h','$j')";


if(mysqli_query($conn, $sql))
{
	echo header("Location:studentit.php");
}
else
{
   echo "Error:" . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>