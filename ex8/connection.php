<head>
  <link rel="stylesheet" type="text/css" href="theme.css">
</head>
<body>
<div id="header">
				STUDENTS DETAILS MANAGEMENT SYSTEM
			</div>
			<ul>
<?php
			session_start();
				if(ISSET($_SESSION['uname']))
				{

						if($_SESSION['roll']==1)
							{
								echo '<li><a href="input.html">
								insert</a></li>';
							}
						if($_SESSION['roll']==2)

							{
								echo '<li><a href="update.html">
								update</a></li>';
							}
						if($_SESSION['roll']==2)
							{	
								echo '<li><a href="delete.html">
								Delete</a></li>';
							}
						if($_SESSION['roll']!=3)
							{

								echo '<li><a href="view.html">
								select</a></li>';
							}
						if($_SESSION['roll']==3)
							{
					
								echo '<li><a href="userview.php">
								select</a></li>';
							}
				}
		echo '<li style="float:right"><a href="logout.php" >
		logout</a></li></ul>';
				
if(isset($_SESSION['uname']))
{
	if($_SESSION['roll']==1)
	{
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="karthikstudent";



		$conn=mysqli_connect($servername,$username,$password,$dbname);
			if(!$conn)
			{
				die("Connectoin failed :" .mysqli_connect_error());

			}


					$roll=$_POST["t1"];
					$name1=$_POST["t2"];
					$dept=$_POST["t3"];
					$year=$_POST["t4"];
					$mark1=$_POST["t5"];
					$mark2=$_POST["t6"];
					$mark3=$_POST["t7"];
					$mark4=$_POST["t8"];
					$mark5=$_POST["t9"];
					$mark6=$_POST["t10"];
    $sql1="select rno FROM adddetails WHERE rno='$roll'";
    $result = mysqli_query($conn, $sql1);
		if(mysqli_num_rows($result)==1)
			{
					echo "Dont repeat the records";
			}
			else
				{
					$sql="insert into adddetails values ('$roll','$name1','$dept','$year',$mark1,$mark2,$mark3,$mark4,$mark5,$mark6)";
			
					if($conn->query($sql) === TRUE)
						{
							$con=1;
							echo "New record inserted sucessfully";
						}
						else
							{
								echo "Error :" .$sql. "<br>" .mysqli_error($conn);
							}
					if($con==1)
					{				
							$sql1="select * from adddetails;";
							$result=mysqli_query($conn,$sql1);
							if(mysqli_num_rows($result)>0)
							{
								echo "<table  border=2px solid olive;>
								<tr>
								<th>Rollno</th>
								<th>Name</th>
								<th>Department</th>
								<th>Year</th>
								<th>Mark 1</th>
								<th>Mark 2</th>
								<th>Mark 3</th>
								<th>Mark 4</th>
								<th>Mark 5</th>
								<th>Mark 6</th>
								<th>Total</th>
								<th>Average</th>
								</tr>
								";
								while($row=mysqli_fetch_assoc($result))
								{
							
										$c=$row["m1"]+$row["m2"]+$row["m3"]+$row["m4"]+$row["m5"]+$row["m6"];
										$d=$c/6;
										echo " <tr><td>" . $row["rno"]. " </td> <td>" . $row["name"]." </td> <td>" . $row["department"]." </td> <td>" . $row["year"]. " </td> <td>"
										. $row["m1"]."</td> <td>". $row["m2"]."</td><td>".$row["m3"]."</td><td>".$row["m4"]."</td><td>".$row["m5"].
										"</td><td>".$row["m6"]."</td><td>".$c."</td><td>".$d."</td></tr>";	
								}
								echo "</table>";
							}
					}
				}
		mysqli_close($conn);
		
	}
}
else
{
	header("location:login.html");
}
?>
</body>