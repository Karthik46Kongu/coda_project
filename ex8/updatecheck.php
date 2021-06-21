
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

$roll=$_POST["t1"];
$_SESSION['num']=$roll;

$sql="select * from adddetails  where rno='$roll'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	while($row=mysqli_fetch_assoc($result))

	{
	
		$_SESSION['person']=$row['name'];
		$_SESSION['dept']=$row['department'];
		$_SESSION['year']=$row['year'];
		$_SESSION['m1']=$row['m1'];
		$_SESSION['m2']=$row['m2'];
		$_SESSION['m3']=$row['m3'];
		$_SESSION['m4']=$row['m4'];
		$_SESSION['m5']=$row['m5'];
		$_SESSION['m6']=$row['m6'];
	   }
	     header("location:updatevalue.php");
    } 
    else
		echo "<body>Something went wrong</body>	<br>
		<a href='update.html'><button>Back</button></a>
		
		";
   

mysqli_close($conn);
?>

<?php
}
else
{
	header("location:login.html");
}
?>
