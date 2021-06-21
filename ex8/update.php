
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
$roll=$_SESSION['num'];
$a=$_SESSION['dept'];
$b=$_SESSION['year'];
$name=$_SESSION['person'];
$dept=$_POST["t3"];
$year=$_POST["t4"];	
$mark1=$_POST["t5"];
$mark2=$_POST["t6"];
$mark3=$_POST["t7"];
$mark4=$_POST["t8"];
$mark5=$_POST["t9"];
$mark6=$_POST["t10"];
$sql="update adddetails set rno='$roll',name='$name',department='$dept',year='$year',m1=$mark1,m2=$mark2,m3=$mark3,m4=$mark4,m5=$mark5,m6=$mark6 where rno='$roll'";
$res=mysqli_query($conn, $sql);
$sql1="select * from adddetails where rno='$roll' AND name='$name' AND m1=$mark1 AND m2=$mark2";
	if (mysqli_query($conn, $sql1))
		{
			echo $roll."<br>Record updated successfully<br>";
		}
		else
			{
			echo "Error  record";
			}
mysqli_close($conn);

}
else
{
	header("location:login.html");
}
?>
</body>