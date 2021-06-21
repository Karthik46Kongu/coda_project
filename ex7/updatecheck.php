
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

$sql="select * from stu  where rno='$roll'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    header("location:updatevalue.html");
} else {
    echo "<h2>No such record found</h2><br>";
}
mysqli_close($conn);
?>
