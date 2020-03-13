<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>
<?php
 session_start();
 $con=mysqli_connect('localhost','root','');
    mysqli_select_db($con,'project');
    $currentuser=$_SESSION['userid'];
    $q="select * from student where username='$currentuser'";
		$result=mysqli_query($con,$q);
	    $num=mysqli_num_rows($result); 

     for ($q=0; $q < $num; $q++)
     {

     	$rows=mysqli_fetch_array($result);
     	$name=$rows['name'];
     	$email=$rows['email'];
     	$city=$rows['city'];
     	$gender=$rows['gender'];
     	$image=$rows['image'];
     }


?>
<?php


$querypro="select * from project where projectid IN (select pno from work_on where susername='$currentuser')";
$resultpro=mysqli_query($con,$querypro);
 $numpro=mysqli_num_rows($resultpro); 
 $data = mysqli_fetch_array($resultpro);



?>


<?php
                   
                   $a1=$data['cuname'];     
                    $q3="select companyname from company where cusername=(select cuname from project where proname='$a1')";
 						$re=mysqli_query($con,$q3);
 						$numc=mysqli_num_rows($re);
 					  
    					$rowsc=mysqli_fetch_assoc($re);
                        $companyname1=$rowsc['companyname'];

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
					<img src="<?php echo $image ?>" class="img-responsive" alt="">
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
						STUDENT
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li >
							<a href="studentprofile.php">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
						<li>
							<a href="" target="_blank">
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
                 if($numpro==0)
                 {
                 	echo'<h4>NOT WORKING ON ANY</h4>';
                 }
                 else{
                     echo '<h2 style="text-align:center;">CURRENTLY YOU ARE WORKING ON:</h2>';
                       
                     	  echo'<div class="row">';   
                     	    echo'<div class="row justify-content-center align-items-center">';  
                        while (($data = mysqli_fetch_array($resultpro))){
                           
                        $proname=$data['proname'];
                        $projectid=$data['projectid'];
                        $expire=$data['expire_year'];
                        $start=$data['start_Date'];
                        $prolan=$data['project_language'];
                        $a1=$data['cuname'];
                       
                      
       
                         

             
              echo' <div class="card" style="width: 21rem; text-align:center;">';
               echo' <div class="card-body">';
                 echo'<h4 class="card-title">'.$proname.'</h4>';
                 echo'<h5 class="card-title">PROJECT BY:'.$companyname1.'</h5>';
                 echo '<h6 class="card-subtitle mb-2 text-muted">PROJECT ID:'.$projectid.'</h6>';
               echo' <p class="card-text">LANGUAGE REQUIRED :-'.$prolan.'</br> START TIME:-'.$start.'</br>EXPIRE ON:-'.$expire.'</p>';
              
               echo'<a href="tasl1.php?id='.$projectid.'" class="btn btn-success" style="text-orientation: right">SUBMIT PROJECT </a>';

              echo'</div>';
             echo'</div>';

              echo '</br></br>';
                        
                        


                      
                        }


                 }
			  ?>

<?php
if(isset($_GET['id']))
{

	$project1=$_GET['id'];
	$_SESSION['selpro']=$project1;
  $qo="insert into submit1 (susername,pid,cusername) values('$currentuser',$project1,'$a1')";

  mysqli_query($con,$qo);
  $q1="DELETE FROM work_on WHERE pno= $project1 ";
   mysqli_query($con,$q1);
   echo'<script>alert("SUBMITTED SUCCESSFULLY");</script>';


}

?>			  
            </div>
		</div>
	</div>
</div>
<center>
<form action="login.html" method="post">
 <input type="submit" name="log_out" value="LOG OUT" class="btn btn-danger">
</center>
<br>
<br>
