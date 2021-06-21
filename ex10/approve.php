<?php
session_start();
if(isset($_SESSION['username']))
{	
	$conn=mysqli_connect("localhost","id10330568_root","karthik","id10330568_karthik");
if(!$conn)
 die("connection failed:".mysqli_connect_error());

else{
$a=$_POST['i'];
$b=$_POST['d'];
 if($_SESSION['username']=='hod')
 {
	 $sql="UPDATE apply SET STATUS=2 WHERE name='$a' AND  rollno='$b'";
 }
 else
 {
$sql="UPDATE apply SET STATUS=1 WHERE name='$a' AND  rollno='$b'";
 }
$result=mysqli_query($conn,$sql); 
if(mysqli_query($conn, $sql))
{
	if($_SESSION['username']=='hod')
		echo header('Location:hodit.php');
	else
		echo header('Location:staffit.php');
}
else
{
   echo "Error:" . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
		
}
else
{
echo header('Location:index.php');

}
?>