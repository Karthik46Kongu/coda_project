<?php
$servername="localhost";
		$username="root";
$password="";
$dbname="student";

$conn=mysqli_connect($servername,$username,$password,$dbname);
$sql="SELECT * from stu";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0)
{
?>
<html>

<body>

<table border="1" height="20%"			 width="50%">
<tr>
<th>Name</th>
<th>Rollno</th>
<th>Dept</th>
<th>Mobile</th>
</tr>
<?php
while($row=mysqli_fetch_assoc($result))
{
	echo "<tr><td>" . $row["Name"]. "</td> <td>" .$row["Rollno"]. "</td> <td>" .$row["Dept"]. "</td> <td>" .$row["Mobile"]. "</td></tr>";
}

echo "</table>";
}
else
{
	echo "No Records Found";
}
mysqli_close($conn);
?>

</body><br>
</center>
</html>