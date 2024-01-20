<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Custom styles -->
    <link rel="stylesheet" href="forget-reset.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Reset Password</title>
  </head>
  <!-- Custom fonts --->
  
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
  <style>
    input[type=password]:focus {
      border-bottom: 3px solid green;
    }

    body:hover {
      border-color: #5e72e4;
      border-width: 2px;
    }

  </style>
  <script type="text/javascript">
    if (checkpass() == 'False') {
      window.location.replace("reset-password.php");


    } else {

  </script>
  <?php
         session_start();
         error_reporting(0);
         include('db.php');
         
         
         if(strlen($_SESSION['email']==NULL))
         {
         header('location:login.php');
         } else 
           { 
           //if entered the newpassword following processes will be done
               if($_POST['newpassword']!= NULL)
               {
           
             $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
             $password=$_POST['newpassword'];
             $query=mysqli_query($con,"update STUDENT set password='" . md5($password) . "'  where  email='$email' ");
            if($query)
            {
         echo "<script>alert('Password successfully changed');window.location.href='login.php';</script>";
         session_destroy();
            }
           }
           
           ?>
  <!------ register form start from here ---------------------->

  <body class="card card-body bg-secondary bg-default" style="margin-left:700px;width:500px;height:500px;margin-top:100px;">
    <form name="changepassword" method="post" onsubmit="return checkpass();">
      <script type="text/javascript">
        function checkpass() {
          if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
            alert('New Password and Confirm Password field does not match');

            return false;

          }
          return true;
        }

      </script>
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


      <!-- input passwords -->
      <b style="font-size:22px;color:#fff;">
        <CENTER>Reset Password</CENTER>
      </b>

      <p style="font-size:16px; color:red" align="center"> <?php if($msg){
               echo $msg;
               }  ?> </p>
      <div class="form-group">
        <input type="Password" class="form-control form-control-user" id="newpassword" name="newpassword" value="" placeholder="Enter Your New Password">
      </div>
      <div class="form-group">
        <input type="Password" class="form-control form-control-user" id="confirmpassword" name="confirmpassword" value="" placeholder="Confirm Your Password">
      </div>
      <CENTER>
        <p> <input type="submit" class="but btn-primary btn-user btn-block" name="submit" value="Reset"></p>
      </CENTER>
      <hr>
    </form>
    <hr>
    <div class="text-center">
      <a class="small" href="login.php">Already have an account? Login!</a></div>

  </body>

</html>
<?php
   }
   ?>
<script>
  }

</script>

