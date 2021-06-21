<?php
session_start();
if($_SESSION['username']=='hod')
{$servername="localhost";
$username="id10330568_root";
$password="karthik";
$dbname="id10330568_karthik";
$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)
	die("Connection Error:".mysqli_connect_error());
$roll=$_SESSION['username'];   
$sql="SELECT * FROM apply WHERE status=1";
$result=mysqli_query($conn,$sql);
	?>
<html>
<head>
<title>HOD</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">
<style> 
* {box-sizing: border-box;}
table {
  border-collapse: collapse;
  width: 50%;
}

th, td {
  padding: 10px;
  text-align: center;
  border-bottom: 2px white;
}

tr:hover {background-color:black;
color:white;
}

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}
body { 
  margin: 0;
  
    font-family: 'Noto Sans TC', sans-serif;
    
  
}

.header {
  overflow: hidden;
  background-color:white;
  padding: 20px 10px;
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
  background-color:black; 
  color: white; 
  border: 2px white;
}

.button3:hover {
  background-color:lightgrey;
  color: black;
}
.button4 {
  background-color:blue; 
  color: white; 
  
}

.button4:hover {
  background-color:red;
  color: black;
}
</style>
</head>
<body>

<div class="header">
  <a href="#default" class="logo">Welcome---><?php  echo $_SESSION['username']; ?></a>
  <div class="header-right">
    <a href="user_logout.php"><button class="button button3">Log Out</button></a>
  </div>
</div>

<div style="padding-left:20px">
 <?php
if(mysqli_num_rows($result)>0)
{
	
	?>
	
		
	<h1 align="center">STUDENT DETAILS</h1>
	<table align="center" >
	<tr><th>Name</th>
	<th>Rollno</th>
	<th>Branch</th>
	<th>Hostel</th></tr>
	
	<?php
	
	while($row = mysqli_fetch_assoc($result))
	{
		echo "<tr><td>".$row["name"]."</td><td>".$row["rollno"]."</td><td>".$row["branch"]."</td><td>".$row["hostel"]."</td></tr><tr><td>";
	?>
	<form action="approve.php" method="post">
		<input type="hidden"  name="i" value="<?php echo $row["name"]?>">
		<input type="hidden"  name="d" value="<?php echo $row["rollno"]?>">
		<input type="submit" class="button button4" value="Approve"></form>
		<form action="reject.php" method="post">
		<input type="hidden"  name="i" value="<?php echo $row["name"]?>">
		<input type="hidden"  name="d" value="<?php echo $row["rollno"]?>">
	<input type="submit" class="button button3" value="Reject"></form>
		<?php
				echo "</td></tr>";
			
	}
}
else{
	echo "<br><br><br><br><br><br><br><br><center>No Pending Bonafide Requests!</center>";
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