	
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

$rollno=$_POST["t2"];
$username=$_POST["t3"];
$password=$_POST["t4"];
$cpassword=$_POST["t5"];
$gender=$_POST["t6"];
$email=$_POST["t7"];
$phone=$_POST["t8"];
$year=$_POST["t10"];
$dept=$_POST["t11"];
if($rollno!='admin')
{
	$roll=3;
}


              $sql="insert into signup values ('$rollno','$username','$password','$cpassword','$gender','$email',$phone,'$year',$roll)";
			if($conn->query($sql) === TRUE)
			{
				header("location:login.html");
			}
			else
				{
					echo $sql;
				}
				
mysqli_close($conn);
?>	


