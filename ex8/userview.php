<html>
	
<head>
  <link rel="stylesheet" type="text/css" href="theme.css">
</head>
<body>
	
    <div id="header">
        STUDENTS DETAILS MANAGEMENT SYSTEM
      </div>
      <ul>
          <li><a href="hyperlink.php">Home</a></li>
          
              
                  <li><a href="userview.php">
                      View</a></li>
          <li><a href="hyperlink.php">
              Back</a></li>
                <li style='float:right';><a href="logout.php">logout</a></li>
    </ul>
<?php
session_start();
if(isset($_SESSION['uname']) && $_SESSION['roll']==3)
{
	echo "Welcome <span>".$_SESSION['uname']."</span>";
?>
<form action="userviewresult.php" method="post">
<table><tr><td>
<label>Roll Number</label></td><td>
<input type="text" name="t1"></td></tr><tr><td></td><td>
<input type=submit></td></tr></table>
</form>
</div>
</body>
</html>
<?php
}
else
{
	header("location:login.html");
}
?>
