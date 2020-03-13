<?php
   session_start();
	$a=$_POST['usrid'];
	$b=$_POST['pass'];
	$c=$_POST['categ'];
	
	

	$con=mysqli_connect('localhost','root','');

	mysqli_select_db($con,'project');
	if($c=='STUDENT')
	{   
		$q="select password from student where username='$a'";
		$result=mysqli_query($con,$q);
	    $num=mysqli_num_rows($result); 
	  if($num>0){  
	    for ($q=0; $q < $num; $q++) { 

		$rows=mysqli_fetch_array($result);
		

		
		if(strcmp($rows['password'], $b)==0)
		{

			$_SESSION['userid']=$_POST['usrid'];
			header('location:studentprofile.php');

		}
        else{
			
              echo'<script>alert("WRONG CREDENTIALS");</script>';
               include 'login.html';
		}
	}}
	else{
		  echo'<script>alert("WRONG USERNAME");</script>';
             include 'login.html';
	}

	}
 else if($c=='COMPANY')
	{  		$q="select password from company where cusername='$a'";
		$result=mysqli_query($con,$q);
	    $num=mysqli_num_rows($result); 
	  if($num>0){  
	    for ($q=0; $q < $num; $q++) { 

		$rows=mysqli_fetch_array($result);
		

		
		if(strcmp($rows['password'], $b)==0)
		{   $_SESSION['cuserid']=$_POST['usrid'];
			header('location:companyprofile.php');
		}
        else{
		    echo'<script>alert("WRONG CREDENTIALS");</script>';
              include 'login.html';
		}
	}}
	else{
		echo'<script>alert("WRONG USERNAME");</script>';
             include 'login.html';
	
	}
    

	}
	

  
	// mysqli_close($con);	
	// <div id="center_button"><button onclick="location.href='preparation.html'">CHECK EMPLOYESS</button></div>   ; 
    


	


?>
