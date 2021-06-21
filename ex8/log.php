<?php

session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="karthikstudent";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
   die("Connectoin failed :" .mysqli_connect_error());

}

   $rno=$_POST['t1'];
   $pass=$_POST['t2'];
  
   $_SESSION['uname']=$rno;
   
   $sql1="select rollno,password,roll FROM signup where rollno='$rno' AND password='$pass'";
   $result=mysqli_query($conn,$sql1);
   
	if(mysqli_num_rows($result)==1)
	{ 
		
		while($row = mysqli_fetch_assoc($result))
		{
			$_SESSION['roll']=$row['roll'];
		}
         
			 
		 header("location:hyperlink.php");
			 
		 
		}
	    else
		{	
		header("location:login.html");
		}
		
mysqli_close($conn);
	
?>
