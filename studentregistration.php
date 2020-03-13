<?php

//   if(isset($_REQUEST['submit_btn']))
//   {
    
//     $a=$_POST['username'];
//     $b=$_POST['password'];
//     $c=$_POST['confirmpassord'];
//     $d=$_POST['pname'];
//     $e=$_POST['email']; 
//     $f=$_POST['city'];   
//     $profile=$_POST['image'];
//     $gender=$_POST['gender'];
    
//     $con=mysqli_connect('localhost','root','');

    
//     mysqli_select_db($con,'project');
//     $q="insert into student values ('$a','$b','$d','$e','$f','$gender','$profile')";
//   $result=mysqli_query($con,$q);
  
//   mysqli_close($con);  
// }
  ?>
 


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
  <!--   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
 -->
    <!-- Title Page-->
    <title>REGISTRATION PORTAL</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css\register.css" rel="stylesheet" media="all">
</head>

<body>

    <script >
    var check = function() {
       var passw=  /^[A-Za-z]\w{7,14}$/;
       inputtxt=document.getElementById('password').value;
  if (document.getElementById('password').value ==
    document.getElementById('confirmpassword').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'MATCH';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'NOT MATCH';
    if(inputtxt.match(passw)) 
     {
        document.getElementById('message1').style.color = 'green';
          document.getElementById('message1').innerHTML = 'RIGHT PATTERN';
     } 
      else
   { 

      document.getElementById('message1').style.color = 'red';
          document.getElementById('message1').innerHTML = 'password between 7 to 16 characters which contain only characters, numeric digits, underscore and first character must be a letter';
  
       } 
  }
  
    

    


}

</script>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">STUDENT REGISTRATION</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="registerpro.php">
                        <div class="form-row m-b-55">
                          
                            <div class="value">
                                <div class="row row-space">
                                  
                                    <div class="col-2">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">USERNAME</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="username" required></br></br>
                                </div>
                            </div>
                                <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="password" id="password" name="password" required onkeyup="check();"></br></br>
                                    <h6 id="message1"></h6>
                                </div>
                            </div>
                                   <div class="form-row">
                            <div class="name" >Confirm Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="password" id="confirmpassword" name="confirmpassword" required onkeyup="check();">
                                     <h5 id="message"></h5>
                                </div>
                            </div>


                        </div>
                        <div class="form-row">
                            <div class="name">Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="pname" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Phone</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="area_code" required>
                                            <label class="label--desc">Area Code</label>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="phone" required>
                                            <label class="label--desc">Phone Number</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">CITY</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="city">
                                            <option disabled="disabled" selected="selected" required>Choose option</option>
                                            <option>DELHI</option>
                                            <option>MUMBAI</option>
                                            <option>KOLKATA</option>
                                            <option>CHENNAI</option>
                                            <option>JAIPUR</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div></br>
                        <div class="form-row">
                            <div class="name">    GENDER</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option disabled="disabled" selected="selected" required>Choose option</option>
                                            <option>FEMALE</option>
                                            <option>MALE</option>
                                           
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="name"> Select Your Profile Image to Upload:</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="file" name="image" required></br></br>
                                </div>
                            </div>
                       
                       
                        
                        
                        <div>
                           </br></br></br></br> <button class="btn btn--radius-2 btn--red" type="submit" name="submit_btn">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="register.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->