<style>

    body{
        background-color:green;
        height:800px;
    }
    
button
{
    opacity: 0.8;
border-radius:8px;
border:none;
padding:12px 40px;
font-size:15px;
}
    </style>
<body>
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

$sql="select * from stu  where rno='$a'";
$result = mysqli_query($conn, $sql);
$sql1="DELETE FROM stu WHERE rno='$a'";
$result1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result) > 0) {

    echo "<h2>Record deleted successfully</h2><br>";
}
else{
    echo "<h2>No such records found</h2><br>";
}
	
mysqli_close($conn);
?>
<a href="input.html">
<button >insert</button></a>
<a href="update.html">
<button >update</button></a>
<a href="delete.html">
<button>Delete</button></a>
<a href="view.html">
<button >select</button></a>
</body>