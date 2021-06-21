<?php
$servername="localhost";
$username="root";
$password="";
$dbname="student";
$conn=mysqli_connect($servername,$username,$password,$dbname);

$x=json_decode($_POST['msg'],false);
		$Rollno=$x->Rollno;
		$Name=$x->Name;
		$Dept=$x->Dept;
		$Mobile=$x->Mobile;


		
			$sql="UPDATE stu set Name='$Name' , Dept ='$Dept',Mobile = '$Mobile'  where Rollno='$Rollno'";
			if(mysqli_query($conn,$sql))
			{
				echo "success";
			}
			else
             { 
	
	echo $sql;
        
}
mysqli_close($conn);
?>