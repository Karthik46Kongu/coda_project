<?php
session_start();
if(isset($_SESSION['username']))
{
$servername="localhost";
$username="id10330568_root";
$password="karthik";
$dbname="id10330568_karthik";
$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)
  die("Connection Error:".mysqli_connect_error());
  
$roll=$_SESSION['username'];   
$sql="SELECT * FROM apply WHERE name='$roll'";
$result=mysqli_query($conn,$sql);
	?>
<html>
<head>
<title>student application for Bonafide</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet"> 
<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  
    font-family: 'Noto Sans TC', sans-serif;
    
  
}
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {background-color:#f5f5f5;}

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 12px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}
.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
.button3 {
  background-color: red; 
  color: white; 
  border: 2px solid #f44336;
}

.button3:hover {
  background-color: #f44336;
  color: white;
}
.button4 {
  background-color: green; 
  color: white; 
  
}

.button4:hover {
  background-color: #f44336;
  color: white;
}
</style>
</head>
<body>

<div class="header">
  <a href="#default" class="logo">Welcome&nbsp;<?php  echo $_SESSION['username']; ?></a>
  <div class="header-right">
	<a href="apply.php"><button class="button button4">Apply</button></a>
    <a href="user_logout.php"><button class="button button3">Log Out</button></a>
  </div>
</div>

<div style="padding-left:20px">
<?php
if(mysqli_num_rows($result)>0)
{
	?>
	<h1 align="center">your data</h1>
	<table align="center" >
	<tr>
	<th>Name</th>
	<th>RollNo</th>
	<th>Gender</th>
	<th>Branch</th>
	<th>Hostel</th>
	<th>Room</th>
	<th>E-mail</th>
	<th>Purpose</th>
	<th>Serial No</th>
	
	</tr>
	<?php
	
	while($row = mysqli_fetch_assoc($result))
	{
    echo "<tr><td>".$row["name"]."</td><td>".$row["rollno"]."</td><td>".$row["gender"]."</td><td>".$row["branch"]."</td><td>".$row["hostel"]."</td><td>".$row["room"]."</td><td>".$row["email"]."</td><td>".$row["type"]."</td></tr><tr><td>";
    
	
   
    
		if($row["status"]=='0')
		{
			echo '<span style="background-color:blue;color:white">pending</span>';
		}
			else if($row["status"]=='1')
			{	echo '<span style="background-color:blue;color:white">Approved by Staff</span>';
		
			}
			else if($row["status"]=='2')
			{
				echo '<span style="background-color:green;color:white"> Approved </span>';
			}
			else if($row["status"]=='-1')
			{
				echo '<span style="background-color:red;color:white"> Rejected</span>';
      }
      echo "<br><br><br><br>";
  }
  echo "</table>";
}
else{
	echo "<br><br><br><br><br><br><br><br><center> Click Apply for your Bonafide Application</center>";
}
mysqli_close($conn);
?>
  
</div>

</body>
</html>
<?php
}
else
{
	echo header('Location:index.php');
}
?>