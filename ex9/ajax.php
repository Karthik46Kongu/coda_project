
<style>
	#table{
		border-collapse:collapse;
	position:fixed;
	margin-top:50px;
	left:50px;
	overflow: scroll;
	}
	</style>

<?php
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="student";
		$conn=mysqli_connect($servername,$username,$password,$dbname);


//		$x=json_decode($_POST['msg'],false);
//		$Rollno=$x->Rollno;
$Rollno=$_GET["msg"];
		if($Rollno!='')
		{
		$sql="SELECT * FROM stu WHERE Rollno LIKE '%$Rollno%'";
		if ($result=mysqli_query($conn, $sql))
		{
			
			echo '<table id="table" tyle="text-align:center;position:absolute;top:300px;left:400px;" border="1" height="auto;" width="50%" ><tr><th>Roll</th><th>Name</th><th>Department</th><th>Mobile</th></tr>';
			if(mysqli_num_rows($result)>0)
			{
			while($row=mysqli_fetch_array($result))
			{
				echo "<tr><td>".$row['Rollno']."</td><td> ".$row['Name']."</td><td> ".$row['Dept']."</td><td> ".$row['Mobile']."</td></tr>";
			}
			}
			else
			{
				echo '<tr><td>-</td><td>-</td><td>-</td><td>-</td></tr></table>';
			}
    	}
	else
    	{
    	echo mysqli_error($conn) ;
		}
	}
		mysqli_close($conn);
?>