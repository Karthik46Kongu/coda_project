<?php
session_start();
if(isset($_SESSION['username']))
{	
	if($_SESSION['username']=='hod')
		header('Location:hodit.php');
	else if($_SESSION['username']=='staff')
		header('Location:staffit.php');
	else
		header('Location:studentit.php');
}
else
{

$conn=mysqli_connect("localhost","id10330568_root","karthik","id10330568_karthik");
if(!$conn)
 die("connection failed:".mysqli_connect_error());

else{
$a=$_POST['username'];
$b=$_POST['password']; 
$sql="SELECT * FROM login WHERE username='$a' AND password='$b' ";
$result=mysqli_query($conn,$sql); 

if(mysqli_num_rows($result)==1)
{
	$row=mysqli_fetch_assoc($result);
	$user=$row['username'];
	$_SESSION["username"]=$row['username'];
	
	if($user=="hod")
		header("Location:hodit.php");

	else if($user=="staff")
		header("Location:staffit.php");	
	else
		header("Location:studentit.php");
	
}
else
{
	?>
	<body onload="fun()">
	<script>
	function fun()
	{
	alert("Account Not Found");
	}
	</script>
	</body>
	<?php
	header("Location:index.php");
	
}
mysqli_close($conn);
}
}
?>