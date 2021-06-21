<?php
$servername="localhost";
$username="root";
$password="";
$dbname="karthikstudent";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
   die("Connectoin failed :" .mysqli_connect_error());

}

   $name=$_POST['t1'];
   $pass=$_POST['t2'];
   $sql1="select * from signupphp where uname='$name' AND password='$pass'";
   $r=mysqli_query($conn,$sql1);
    
	if(mysqli_num_rows($r)>0)
	{ 
		header("location:hyperlink.html");
	}
	else 
		echo "<h2>Incorrect password</h2>";
	
mysqli_close($conn);
	
?>