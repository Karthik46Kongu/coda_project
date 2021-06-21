<style>
    
    body{
        font-size:25px;
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
$roll=$_POST["t1"];
$name1=$_POST["t2"];
$mark1=$_POST["t3"];
$mark2=$_POST["t4"];
$sql="update stu set rno='$roll',name='$name1',m1=$mark1,m2=$mark2 where rno='$roll'";
$res=mysqli_query($conn, $sql);
$sql1="select * from stu where rno='$roll' AND name='$name1' AND m1=$mark1 AND m2=$mark2";
if (mysqli_query($conn, $sql1)) {
    echo "<h2>Record updated successfully</h2><br>";
} else {
    echo "<h2>Error updating record</h2><br>";
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