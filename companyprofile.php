<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>
<?php

session_start();

?>
<?php 
 
 $con=mysqli_connect('localhost','root','');
    mysqli_select_db($con,'project');
    $currentuser=$_SESSION['cuserid'];
    $q="select * from company where cusername ='$currentuser'";
		$result=mysqli_query($con,$q);
	    $num=mysqli_num_rows($result); 
	
     $_SESSION['ccuserid']=$currentuser;
     for ($q=0; $q < $num; $q++)
     {

     	$rows=mysqli_fetch_array($result);
     	$name=$rows['companyname'];
     	$email=$rows['cemail'];
     	$city=$rows['city'];
     
     }


?>

<?php
 
 
    $q1="select * from project where cuname ='$currentuser'";
		$result1=mysqli_query($con,$q1);
	    $num1=mysqli_num_rows($result1); 


     // for ($q1=0; $q1 < $num1; $q1++)
     // {

     // 	$rows=mysqli_fetch_array($result1);
     // 	$proname=$rows['proname'];
     //    $project=$rows['projectid'];
     //    $expire=$rows['expire_year'];
     //    $language1=$rows['project_language'];
     //    $start=$rows['start_Date'];
     	
     
     // }

   

?>
<?php
if(isset($_POST["log_out"]))
{
	session_destroy();
}
?>



<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/studentprofile.css" >
<!------ Include the above in your HEAD tag ---------->

<!--

-->

<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="https://static.change.org/profile-img/default-user-profile.svg" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php
						echo $name;
						?>
					</div>
					<div class="profile-usertitle-job">
						COMPANY
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">CONTACT</button>
					<button type="button" class="btn btn-danger btn-sm">EMAIL YOUR RESUME</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Tasks </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
            	<?php
                if($num1==0)
                {	
            	 echo "<H3>YOU DON'T UPLOAD ANY PROJECT</H3>";
            	}
                else{
              echo 'YOUR ACTIVE PROJECT IS:';
               echo'<div class="row justify-content-center align-items-center">';  
               	
         while(($rows = mysqli_fetch_array($result1))){

            $proname=$rows['proname'];
        $project=$rows['projectid'];
        $expire=$rows['expire_year'];
        $language1=$rows['project_language'];
        $start=$rows['start_Date'];
            	
               
              echo' <div class="card" style="width: 21rem;">';
               echo' <div class="card-body">';
                 echo'<h5 class="card-title">'.$proname.'</h5>';
                 echo '<h6 class="card-subtitle mb-2 text-muted">PROJECT ID:'.$project.'</h6>';
               echo' <p class="card-text">LANGUAGE REQUIRED :-'.$language1.'</br> START TIME:-'.$start.'</br>EXPIRE ON:-'.$expire.'</p>';
               echo' <a href="" class="btn btn-danger">CHECK STUDENT</a>';
               echo'<a href="companyprofile.php?del='.$project.'" class="btn btn-danger" style="text-orientation: right">DELETE PROJECT</a>';
              echo'</div>';
             echo'</div>';
             
}
                }	

            	?>

               <?php
if(isset($_GET['del']))
{

    $project1=$_GET['del'];
    $_SESSION['selpro']=$project;
  $qo="delete from project where cuname='$currentuser' and projectid=$project1";
  $result =mysqli_query($con,$qo);
   if($result){
    echo'<script>alert("PROJECT DELETED SUCCESFULLY PLEASE REFRESH TO SEE CHANGES");</script>';
    }
   else
   {
    echo'<script>alert("STUDENT IS STILL WORKING ON THIS PRODUCT FOR DELETE THIS PROJECT CONTACT ADMISTRATOR");</script>';
   }


}




?>   


             </br></br></br></br></br></br><button class="open-button" onclick="openForm()">+ADD PROJECT</button>	
              <div class="form-popup" id="addpro">
  <form action="addproject.php" method="post" class="form-container">
    <h1>ADD PROJECT</h1>

    <h4>PROJECT NAME</h4>
    <input type="text" placeholder="Enter Project Name" name="pname" required>
  
    <h4>PROJECT ID</h4>
    <input type="number" placeholder="Enter Project Id" name="pid" required>
    <h4>PROJECT LANGUAGE</h4>
    <input type="text" placeholder="Enter Language" name="plang" required>
    <h4>PROJECT EXPIRING DATE</h4>
    <input type="number" placeholder=" In Format YYYY" name="pdate" required >
    <button type="submit" class="btn" name="addproject">ADD PROJECT</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>
			  
            </div>
		</div>
	</div>
</div>
<center>
 <form action="login.html" method="post">
 <input type="submit" name="log_out" value="LOG OUT" class="btn btn-danger">
</form>

</center>
<br>
<br>
<script>
function openForm() {
    document.getElementById("addpro").style.display = "block";
}

function closeForm() {
    document.getElementById("addpro").style.display = "none";
}
</script>
