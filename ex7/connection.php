<style>
body{
   
   background-color:#210c9b;
   opacity:0.9;
}
table{
   width:50%;
   font-size:25px;
   color:white;
   border-collapse:collapse;
   padding:40px;
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

<center>
<h1>Insert page</h1><br>
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
$name1=$_POST["t2"];
$mark1=$_POST["t3"];
$mark2=$_POST["t4"];
$sql2="select rno from stu where rno='$roll'";
$r=mysqli_query($conn,$sql2);
if(mysqli_num_rows($r)>0)
{
$sql="insert into stu(rno,name,m1,m2) values ('$roll','$name1',$mark1,$mark2)";

if(mysqli_query($conn,$sql))
{
    echo "<h2>New record inserted sucessfully</h2>";

}
}
else
{
   echo "<h1>Already exists</h1><br>";
}
$sql1="select * from stu;";
$result=mysqli_query($conn,$sql1);
echo "<table border=1>
<tr>
<td>Rollno</td>
<td>Name</td>

<td>Mark 1</td>
<td>Mark 2</td>

</tr>
";
while($row=mysqli_fetch_assoc($result))
{
	
	echo " <tr><td>" . $row["rno"]. " </td> <td>" . $row["name"]. " </td> <td>" . $row["m1"]."</td> <td>". $row["m2"]."</td></tr>";
	
}

mysqli_close($conn);
?>

</table>
<br>
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