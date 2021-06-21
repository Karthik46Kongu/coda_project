<style>
    center{
        color:white;
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
table{
    color:white;
    border-collapse:collapse;
    text-align:left;
    font-size:25px;

}
    </style>
<center>
<h1>View page</h1>
<br>
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
$sql1="select * FROM stu WHERE rno='$a'";
$result = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result) > 0) {
	echo"<table border=1px;>
<tr><th>Rno</th><th>Name</th><th>Mark1</th><th>Mark2</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["rno"]. "</td><td>" . $row["name"]. "</td><td>" . $row["m1"]. "</td><td>" . $row["m2"]."</td></tr>";
    }
} else {
    echo "<h2>0 results</h2><br>";
}

mysqli_close($conn);



?>
</table>
<br>
<a href="input.html">
<button >insert</button></a>
<a href="update.html">
<button >update</button></a>
<a href="delete.html">
<button>Delete</button></a>
<a href="view.html">
<button >select</button></a>

</center>