


<head>
				<link rel="stylesheet" type="text/css" href="theme.css">
			  </head>
<body>
	
<div id="header">
				STUDENTS DETAILS MANAGEMENT SYSTEM
			</div>
			<ul>
					<li><a href="hyperlink.php">Home</a></li>
					<li><a href="update.html">
							Update</a></li>
							<li><a href="delete.html">
									Delete</a></li>
					<li><a href="view.html">
							View</a></li>
					<li><a href="hyperlink.php">
							Back</a></li>
					<li style='float:right';><a href="logout.php">logout</a></li>
		</ul>
<?php
session_start();
if(isset($_SESSION['uname']))
{
	
?>
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
$sql1="select * FROM adddetails WHERE rno='$a'";
$result = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result) > 0) {
	echo "Delete row is:";
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
            echo "0 results<br>";
        }

$sql1="DELETE FROM adddetails WHERE rno='$a'";

if ($conn->query($sql1) === TRUE) {

}
else
{
	echo "No Such Record Found";
}	
$sql1="select * FROM adddetails";
$result = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result) > 0) {
	echo "Remaining rows are";
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
if($_SESSION['roll']==1)
{
echo '<a href="input.html">
<button >insert</button></a>';
}
if($_SESSION['roll']==2)

	{
		echo '<a href="update.html">
       <button >update</button></a>';
	}
	if($_SESSION['roll']==2)
	{	
      echo '<a href="delete.html">
<button>Delete</button></a>';
	}
	if($_SESSION['roll']!=3)
     {

     echo '<a href="view.html">
      <button >select</button></a>';
	 }
	 if($_SESSION['roll']==3)
     {
		
		 
		echo '<a href="userview.php">
		<button >select</button></a>';
	 }
	 echo '<a href="logout.php">
		<button >logout</button></a>';
}
else
{
	header("location:login.html");
}
?>
</body>