<?php
session_start();
if(isset($_SESSION['username']))
{	
	if($_SESSION['username']=='hod')
		header('Location:hodit.php');
	else if($_SESSION['username']=='staff')
		header('Location:staffit.php');
	else
		header('Location:studentit.php');
}
else
{
?>
<html lang="en">
<head>
	<title>Login</title>
	<style>
	
	.button3 {
		border:none;
  background-color:blue; 
  color: white; 
 border-radius:8px;
  padding:15px 25px;
  
}

.button3:hover {
  background-color:lightgrey;
  color: black;
  box-shadow: 5px 5px 5px 2px #FFEFBA;
  transition-duration:0.2s;
}
	.f{
		padding:10px;
		
	}
	.c{
		width:45%;
		height:350px;
		background-color:white;
		float:left;
		margin-top:170px;
		box-shadow:  5px 7px 5px 2px #FFEFBA;
	}
	.a{
		width:30%;
		height:400px;
		background-color:;
			float:left;
			margin-top:150px;
			
	}
	.b{
		width:20%;
		height:300px;
		
			float:left;
			margin-top:150px;
	}
	body{
		background-color:#F5FFFA;
	}
	input{
		border:none;
		border-radius;2px;
		border-bottom:0.4px solid black;
		padding:15px 24px;
	}

	</style>

</head>
<body>
	
	<div class="a">
	</div>
		
			<div class="c">
				
					
						<h1 align="center">ACCOUNT LOGIN</h1>
					<center>
					<form class="f" action="user_login.php" method="post">
					
						<span id="w"><label class="c1">Username</label><br></span><br>
				   <input class="d" type="text" name="username" ><br><br>
						
					
						<span id="w">Password<br></span><br>
					<input class="d" type="password" name="password" >
<br><br>
			
						<button class="button3">
							Login
						</button>
					
				</form>
				</center>
			</div>
		

	<div class="b">
		</div>

</body>
</html>
<?php
}
?>