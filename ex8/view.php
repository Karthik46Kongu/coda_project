
	<head>
		<link rel="stylesheet" type="text/css" href="theme.css">
	  </head>

<body>
	
<div id="header">
	STUDENTS DETAILS MANAGEMENT SYSTEM
</div>
<?php
session_start();
if(isset($_SESSION['uname']))
{
	
	echo '<ul>';


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
		echo '<li><a href="hyperlink.php">
			Back</a></li>';
		echo '<li style="float:right"><a href="logout.php" >
			logout</a></li></ul>';
			

			
		?>
		<center>
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
		$a=$_POST['t1'];
		$b=$_POST['t2'];
		if($a=="all" && $b=="all")
		{
		$sql1="select * FROM adddetails";
		$result = mysqli_query($conn, $sql1);
		}
		else
		{
			$sql1="select * FROM adddetails WHERE department='$a' and year='$b'";
			$result = mysqli_query($conn, $sql1);
			
		}
		if($a=="all" && $b!="all")
		{
			$sql1="select * FROM adddetails WHERE year='$b'";
			$result = mysqli_query($conn, $sql1);
			
		}
		else if($a!="all" && $b=="all")
		{
			$sql1="select * FROM adddetails WHERE department='$a'";
			$result = mysqli_query($conn, $sql1);
			
		}
		if (mysqli_num_rows($result) > 0)
		 {
			echo  "<table  border=2px solid olive; >
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
			while($row = mysqli_fetch_assoc($result))
				{
					$c=$row["m1"]+$row["m2"]+$row["m3"]+$row["m4"]+$row["m5"]+$row["m6"];
					$d=$c/6;
					echo " <tr><td>" . $row["rno"]. " </td> <td>" . $row["name"]." </td> <td>" . $row["department"]." </td> <td>" . $row["year"]. " </td> <td>"
					. $row["m1"]."</td> <td>". $row["m2"]."</td><td>".$row["m3"]."</td><td>".$row["m4"]."</td><td>".$row["m5"].
					"</td><td>".$row["m6"]."</td><td>".$c."</td><td>".$d."</td></tr>";	
				}
				echo "</table>";
		} 
		else 
		{
			echo "0 results";
		}

		mysqli_close($conn);



}
else
{
	header("location:login.html");
}
?>
</body>