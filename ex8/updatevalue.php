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
					<li><a href="update.html">
							Update</a></li>
							<li><a href="delete.html">
									Delete</a></li>
					<li><a href="view.html">
							View</a></li>
					<li><a href="hyperlink.php">
							Back</a></li>
					<li style='float:right';><a href="logout.php">logout</a></li>
		</ul>
<?php
session_start();
if(ISSET($_SESSION['uname']))
{
	
echo "Roll no:<br>";
echo "<input disabled type=text name=t1 value=".$_SESSION['num']." placeholder=".$_SESSION['num'].">";
?>
<form action="update.php" method=POST>
<?php
echo "Name:<br>
<input type=text name=t2 value=".$_SESSION['person']." required><br>";
?>

Department<br>
<select  name="t3" required>
<?php 
echo "<option value=".$_SESSION['dept'].">".$_SESSION['dept']."</option>";
?>
<option value="Information Technology">Information Technology</option>
<option  value="Computer Science  Engineering">Computer Science</option>
<option  value="Electrical and Electronical Engineering">Electrical and Electronical</option>
<option  value="Electrical and InstrumentalEngineering">Electrical and Instrumental</option>
<option  value="Electronic communication">Electronic communication</option>
<option  value="Food Technology">Food Technology</option>
<option  value="Chemical Engineering">Chemical Engineering</option>
<option  value="Automobile Engineering">Automobile Engineering</option>
<option  value="Mechanical Engineering">Mechanical Engineering</option>
<option  value="Civi Engineering">Civi Engineering</option>
<option  value="Mechatronics Engineering">Mechatronics Engineering</option>
<option  value="all">All</option>
</select><br>
Year<br>
<select name="t4" required>
<?php
echo "
<option value=".$_SESSION['year'].">".$_SESSION['year']."</option>";
?>
<option  value="I">I</option>
<option  value="II">II</option>
<option  value="III">III</option>
<option  value="IV">IV</option>
<option  value="all">All</option>
</select><br>
<?php
echo "
M1:<br>
<input type=number name=t5 value=".$_SESSION['m1']." required><br>
M2:<br>
<input type=number name=t6 value=".$_SESSION['m2']." required><br>
M3:<br>
<input type=number name=t7 value=".$_SESSION['m3']." required><br>
M4:<br>
<input type=number name=t8 value=".$_SESSION['m4']." required><br>
M5:<br>
<input type=number name=t9 value=".$_SESSION['m5']." required><br>
M6:<br>
<input type=number name=t10 value=".$_SESSION['m6']." required><br>
<input type=submit>
</form>"
?>
</body>
</html>

<?PHP
}
else
{
	header("location:login.html");
}
?>


