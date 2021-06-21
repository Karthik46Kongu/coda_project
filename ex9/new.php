<html>
<head>
  <link rel="stylesheet" type="text/css" href="theme.css">
</head>
<body>
<div id="heading">
    <span>STUDENT DETAILS MANAGEMENT</span>
</div>
<div id="header">
   <button onclick="home()">Home</button>
   <button onclick="search()">Search</button>
   <button onclick="insert()">Insert</button>
   <button onclick="update()">Update</button>	

</div>

<script>
function home()
{
	
	document.body.style.backgroundColor="red";
	document.getElementById("insert").style.display='none';
	document.getElementById("update").style.display='none';
	document.getElementById("search").style.display='none';
	document.getElementById("updateoutput").style.display="none";
}
</script>
<div id="updateoutput">
<?php

if(ISSET($_POST['submit']))
{

$servername="localhost";
$username="root";
$password="";
$dbname="student";
$conn=mysqli_connect($servername,$username,$password,$dbname);

		$Rollno=$_POST['Rollno'];
		$Name=$_POST['Name'];
		$Dept=$_POST['Dept'];
		$Mobile=$_POST['Mobile'];

         if($Rollno!='')
		  {
			$sql="UPDATE stu set Name='$Name' , Dept ='$Dept',Mobile = '$Mobile'  where Rollno='$Rollno'";
			
			if(mysqli_query($conn,$sql))
			{
				echo '<script>
				 	
				 document.getElementById("updateoutput").style.display="block";
				 document.body.style.backgroundColor="green"; </script>';

				echo "success";
			}
			 else
                { 
					echo '<script>
					document.getElementById("updateoutput").style.display="block";
					 document.body.style.backgroundColor="green"; </script>';
					
	              echo"Error in updating";
        
				}
			}
      mysqli_close($conn);
}
?>
</div>
<div id="update" >
<form name="frm" action="" method="post">
	<table align="center" height="200px">
		<tr>
			<td>Rollno</td><td>:<input type="text" name="Rollno" oninput="updateajax()"></td>
	
	</tr>
		<tr>
			<td>Name</td><td>:<input type="text" name="Name"></td>
		</tr>
		<tr>
			<td>Department</td><td>:<input type="text" name="Dept"></td>
		</tr>
		<tr>
			<td>Mobile</td><td>:<input type="text" name="Mobile"></td>
		</tr>		
		<tr>
			<td colspan="2">
				<input type="submit" value="Submit" name="submit">
				<input type="reset" value="Clear"></td>
		</tr>
	</table>
</form>

</div>


<script>

function update()
	{
		
	//	document.getElementById("home").style.display='none';
	    document.getElementById("search").style.display='none';
		document.getElementById("update").style.display='block';
		document.getElementById("insert").style.display='none';
		document.getElementById("updateoutput").style.display="none";
		
	}

function updateajax()
	 {
		 var con=new XMLHttpRequest();
		
		 con.onreadystatechange=function(){
			 if(this.readyState==4 && this.status==200)
			 {
				 var myObj = JSON.parse(this.responseText);
				 document.frm.Name.value=myObj.Name;
				 document.frm.Dept.value=myObj.Dept;
				 document.frm.Mobile.value=myObj.Mobile;
			 }
		 };
		 var n=document.frm.Rollno.value;
		 
		 con.open("POST","up.php",true);
		 con.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		 con.send("Rollno="+n);
	 }
	

	  </script>





<div id="insert">
<form method="post" name="insertmyform">
	<table align="center" height="250px;">
		<tr><td>
			Name</td><td>:<input type="text" name="Name" required>
		</td></tr>
		<tr><td>
		Rollno</td><td>:<input type="text" name="Rollno" required>
</td></tr>
<tr><td>
		Department</td><td>:<input type="text" name="Dept" required>
</td></tr>
<tr><td>
		Mobile</td><td>:<input type="text" name="Mobile" required>
</td></tr>
<tr><td colspan="2" align="center">
		<input type="submit" value="Submit" onclick="return fun()">
		<input type="reset" value="Clear">
</td></tr>
	</table>
</form>
<span id="insertoutput"></span>
</div>




<script>
	
    function insert()
	{
		//document.getElementById("home").style.display='none';
		document.getElementById("search").style.display='none';
		document.getElementById("update").style.display='none';
		document.getElementById("insert").style.display='block';
		document.getElementById("updateoutput").style.display="none";
		
	}
	function fun()
   {
	   var form=document.insertmyform;
	   var Name=form.Name.value;
	   var Rollno=form.Rollno.value;
	   var Dept=form.Dept.value;
	   var Mobile=form.Mobile.value;
	  
	   var myObj={ "Rollno":Rollno ,
	   			   "Name":Name,
				   "Dept":Dept,	  	
	   	 		   "Mobile":Mobile
	   
	   };
	  
	   var msg=JSON.stringify(myObj);
	   var con=new XMLHttpRequest();
		con.onreadystatechange=function()
		{
			
			if(this.status==200 && this.readyState==4)
			{
				document.getElementById("insertoutput").style.display='block';
				document.getElementById("insertoutput").innerHTML=this.responseText;
			}
		};
		con.open("POST","add.php",true);
		con.setRequestHeader("content-type","application/x-www-form-urlencoded");
		con.send("msg="+msg);
		return false;
   }

</script>

<div id="search">
    <form name="searchform" method="POST">
        RollNo:<input style="width:30%;height:25px;" type="text" name="Rollno" oninput="searchajax()"/>
        </form>
		<span id="searchoutput"></span>
</div>
<script>
function search()
	{
		document.getElementById("update").style.display='none';
		document.getElementById("insert").style.display='none';
		document.getElementById("search").style.display='block';
		document.getElementById("updateoutput").style.display="none";

		
	}
function searchajax()
	{
		
		var frm=document.searchform;
	
		var Roll=frm.Rollno.value;
    
	//	var myObj={ "Rollno":Roll };

	//	var msg=JSON.stringify(myObj);
		
		var con=new XMLHttpRequest();

		con.onreadystatechange=function()
		{
			if(this.status==200 && this.readyState==4)
			{
				document.getElementById("searchoutput").style.display='block';
				document.body.style.backgroundColor="yellow";
				document.getElementById("searchoutput").innerHTML=con.responseText;
			}
		};
		con.open("GET","ajax.php?msg="+Roll,true);
	//	con.setRequestHeader("content-type","application/x-www-form-urlencoded");
		con.send();
		return false;
	}
							 

</script>	

	</body>