<!DOCTYPE html>
<html>

  <link rel="stylesheet" href="forget-reset.css">

  <head>
    <title>SMTS | Forgot Password</title>
   
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
   
  </head>
  <style>
    input[type=email]:focus {
      border-bottom: 3px solid #5e72e4;
    }

    body:hover {
      border-color: #5e72e4;
      border-width: 2px;
    }

  </style>
  <?php
   session_start();
   error_reporting(0);
   require('db.php');
   
   if(isset($_POST['submit']))
     {
       
       $email=$_POST['email'];
   
            $query1 = "SELECT password FROM `STUDENT` WHERE email='$email'";
            
            	$result1 = mysqli_query($con,$query1) or die(mysql_error());
            	$ret = mysqli_num_rows($result1);
       if($ret>0){
        
         $_SESSION['email']=$email;
        header('location: reset-password.php');
       }
       else{
         $msg="Invalid Details. Please try again.";
       }
     }
   
   
   ?>

  <body class="card card-body bg-secondary bg-default" style="margin-left:700px;width:500px;height:500px;margin-top:100px;">
    <b style="font-size:22px;color:#fff;">
      <center>
        Forgot Your password?
    </b>
    <form class="user" method="post" action="">
      <br>
      <small> To reset your password ,enter your email here..!</small>
      </center>


      <p><?php if($msg){?>

        <div class="alert alert-danger" style="text-align:center">
          <?php echo $msg; } ?>
        </div>
      </p>
      <br>
      <br>
      <!-- input email to recognise the password we want to change-->
      <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." required="true">
      <br>
      <CENTER>
        <p> <input type="submit" class="but btn-primary btn-user btn-block" name="submit" value="reset"> </p>
      </CENTER>
      <hr>
    </form>

    <small>
      <CENTER> <a href="login.php">Already have an account? Login!</a> </CENTER>
    </small>
   

  </body>

</html>

