	<?php
$servername="localhost";
$username="root";
$password="";
$dbname="student";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if (!$conn) 
{
    echo mysqli_error($conn);
}
else
{ 
	$Rollno=$_POST['Rollno'];
	if($Rollno!='')
	{
	    $sql="SELECT * FROM stu where Rollno like '%$Rollno%'";
	    if ($result=mysqli_query($conn, $sql))
		{
			while($row=mysqli_fetch_array($result))
			{

			$myObj=new\stdClass();
			$myObj->Name =$row['Name'];
			$myObj->Dept =$row['Dept'];
			$myObj->Mobile =$row['Mobile'];
			$myJSON = json_encode($myObj);
			echo $myJSON;
			}
		}	
    
	 else
     {
    	echo mysqli_error($conn) ;
	 }
	}
	else{
		$myObj=new\stdClass();
			$myObj->Name ='';
			$myObj->Dept ='';
			$myObj->Mobile ='';
			$myJSON = json_encode($myObj);
			echo $myJSON;
	}
}
mysqli_close($conn);
?>