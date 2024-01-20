 <!DOCTYPE html>
 <html lang="en">
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

   <head>
     <title>SMTS|Login</title>
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
     <link rel="stylesheet" href="login.css">
   </head>
   <?php session_start();?>

   <?php
      $host="localhost";
      $username="root";
      $pass="";
      $db="SMTS";
      
      $con=mysqli_connect($host,$username,$pass,$db);
      if(!$con){
      	die("Database connection error");
      }
      
      // if entered email the following process will be done
      
      if(isset($_POST['email']))
      {
      	
      	
      	error_reporting(0);
      	$email=$_POST['email'];
      	$pass=md5($_POST['password']);
      	$query1="SELECT `email` FROM `STUDENT` WHERE `email` = '$email'";
      	$res1=mysqli_query($con, $query1);
      	$count1=mysqli_num_rows($res1);
      	
      	if($count1 ==1)
      	{ 
      	$query="Select * from STUDENT where email='$email' AND password='$pass'";
      	$res=mysqli_query($con, $query);
      	$count=mysqli_num_rows($res);
      	if($count ==1)
      	{  
         
                  
                
                  $_SESSION['email']= $email;
                  
      	 echo "<script>
      alert('Successfully Loggedin');
      window.location.href='profile.php';
      </script>";
                }
        
      	else{
      	
      	echo "<script>
      alert('Incorrect password/email');
      window.location.href='login.php';
      </script>";
      
      }
      }
      
      else
        {
        
        echo "<script>alert('Account doesnt Exist !  Register Now....!');
      window.location.href='registration.php';
      </script>";
      }
      }
      else
      {
      $msg= "some other error";
      }
      
      ?>

   <script>
     function formvalidation() {
       var email = $('#inputEmail').val();
       var password = $('#inputPassword').val();
       var passlength = $('#inputPassword').val().length;

       if (email == '') {
         alert("enter email");
         return false;

       }
       if (password == '') {
         alert("Please Enter your password");
         return false;

       }
       if (passlength <= 4) {
         alert("Please Enter minimum 5 digit password");
         return false;

       }
     }

   </script>

   <body class="bg-default">

     <form method="post" onsubmit="return formvalidation();">
       <?php 
            if(isset($_SESSION['error']))
            {
            	echo $_SESSION['error'];
            	unset($_SESSION['error']);
            }
            if(isset($_SESSION['success']))
            {
            	echo $_SESSION['success'];
            	unset($_SESSION['success']);
            }
            ?>
       <div class="main-content">
         <!-- Navbar -->
         <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
           <div class="container px-4">
             <div class="collapse navbar-collapse" id="navbar-collapse-main">
               <!-- Collapse header -->
               <!-- Navbar items -->
               <ul class="navbar-nav ml-auto">
                 <li class="nav-item">
                   <a class="nav-link nav-link-icon" href="home.html" target="_blank">
                     <i class="ni ni-planet"></i>
                     <span class="nav-link-inner--text">Home</span>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link nav-link-icon" href="registration.php" target="_blank">
                     <i class="ni ni-circle-08"></i>
                     <span class="nav-link-inner--text">Register</span>
                   </a>
                 </li>
               </ul>
             </div>
           </div>
         </nav>
         <!-- Header -->
         <div class="header bg-gradient-primary py-7 py-lg-8">
           <div class="container">
             <div class="header-body text-center mb-7">
               <div class="row justify-content-center">
                 <div class="col-lg-5 col-md-6">
                   <h1 class="text-white">Welcome!</h1>
                   <p class="text-lead text-light">Login to you account to enjoy the features.....!</p>
                 </div>
               </div>
             </div>
           </div>
           <div class="separator separator-bottom separator-skew zindex-100">
             <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
               <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
             </svg>
           </div>
         </div>
         <!-- Page content -->
         <div class="container mt--8 pb-5">
           <div class="row justify-content-center" style="margin-left: 300px;">
             <div class="col-lg-5 col-md-7">
               <div class="card bg-secondary shadow border-0">
                 <div class="card-header bg-transparent pb-5">
                   <div class="text-center mt-2 mb-3">
                     <Font size="25px;">
                       <b>
                         <large>LOGIN</large>
                       </b>
                     </Font>
                   </div>
                 </div>
                 <div class="card-body px-lg-5 py-lg-5">
                   <!-- Input email -->
                   <div class="form-group mb-3">
                     <div class="input-group input-group-alternative">
                       <div class="input-group-prepend">
                         <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                       </div>
                       <input type="email" class="form-control" pattern=".+[nitc.ac.in]" name="email" id="inputEmail" placeholder="Email">
                     </div>
                   </div>
                   <!-- Input password -->
                   <div class="form-group">
                     <div class="input-group input-group-alternative">
                       <div class="input-group-prepend">
                         <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                       </div>
                       <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
                     </div>
                   </div>

                   <div class="row mt-3">
                     <div class="col-6 ">
                       <a href="forgotpass.php" style="color:#5e72e4;"><small>Forgot password?</small></a>
                     </div>
                   </div>


                 </div>
                 <!-- Submit Details -->
                 <div class="text-center">
                   <button type="submit" name="submit" class="btn btn-primary my-4">
                     Login
                   </button>
                 </div>
               </div>
             </div>
           </div>


         </div>
       </div>
     </form>




   </body>

 </html>

