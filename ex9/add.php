
	<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="student";
    $x=json_decode($_POST['msg'],false);
		$Rollno=$x->Rollno;
		$Name=$x->Name;
		$Dept=$x->Dept;
		$Mobile=$x->Mobile;

		
	$conn=mysqli_connect($servername,$username,$password,$dbname);
	
	$sql="INSERT into stu(Name,Rollno,Dept,Mobile)  VALUES  ( '$Name' , '$Rollno' , '$Dept' , '$Mobile' )";

	if(mysqli_query($conn,$sql))
	{
		
		echo "Success";					
				
	}	
	else
	{
		
							echo "Failed";	
	}
	mysqli_close($conn);

	?>
