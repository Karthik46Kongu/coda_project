<head>
  <link rel="stylesheet" type="text/css" href="theme.css">
</head>
<body>
<div id="header">
	STUDENTS DETAILS MANAGEMENT SYSTEM
</div>
<div id="menu">
	<ul>
<?php
session_start();
if(ISSET($_SESSION['uname']))
{

if($_SESSION['roll']==1)
{
echo '<li><a href="input.html">
insert</a></li>';
}
if($_SESSION['roll']==2)

	{
		echo '<li><a href="#">
       Home</a></li>';
		echo '<li><a href="update.html">
       Update</a></li>';
		
       echo '<li><a href="delete.html">
       Delete</a></li>';
	}
	if($_SESSION['roll']!=3)
     {

     echo '<li><a href="view.html">
     select</a></li>';
	 }
	 if($_SESSION['roll']==3)
     {
		
		echo '<li><a href="hyperlink.php">
		Home</a></li>';
		
		echo '<li><a href="userview.php">
		select</a></li>';
		echo '<li><a href="hyperlink.php">
		Back</a></li>';
	 }
	 echo '<li style="float:right"><a href="logout.php" >
		logout</a></li></ul>';
		
?>
</div>
</body>
</html>
<?php
echo "<br>Welcome    <span>".$_SESSION['uname']."</span><br	>";
}
else
{
	header("location:login.html");
}

?>