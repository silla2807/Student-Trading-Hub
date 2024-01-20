<style>
  input[type=password]:focus {
    border: 3px solid #fda50f;
  }

  input:hover {
    text-decoration: none;
    color: #233dd2;
  }

  b:hover {
    text-decoration: none;
    color: #fda50f;
  }

  body:hover {


    border-color: #5e72e4;
    border-width: 2px;
  }

</style>









<?php
session_start();
error_reporting(0);
//connecting to the database and performing needed operations
include('db.php');

if (strlen($_SESSION['email']==NULL)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$email=isset($_SESSION['email']) ? $_SESSION['email'] : '';
$cpassword=$_POST['currentpassword'];
$newpassword=$_POST['newpassword'];
$query=mysqli_query($con,"select * from STUDENT where email='$email' and password='" . md5($cpassword) . "'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update STUDENT set password='" . md5($newpassword) . "' where email='$email'");
echo "<script>
alert('Successfully changed the password');
window.location.href='profile.php';
</script>";
}

 else {

$msg="Your current password is wrong";

}



}

  
  ?>

<!DOCTYPE html>
<html lang="en">

  <head>


    <title>Change Password</title>


    <!----gives message if the both passwords doesnt match----->

    <script>
      function checkpass() {
        if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
          alert('New Password and Confirm Password field does not match');
          document.changepassword.confirmpassword();
          return false;
        }
        return true;
      }

    </script>
  </head>
  <link rel="stylesheet" href="forget-reset.css">



  <body class="card card-body bg-secondary bg-default" style="margin-left:700px;width:500px;height:500px;margin-top:100px;">


    <b>
      <div style="font-size:22px;font-color:#456788;text-align:center;"> Change Password</div>
    </b>

    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

    <form name="changepassword" class="user" method="post" onsubmit="return checkpass();">
      <?php
                        $email=isset($_SESSION['email']) ? $_SESSION['email'] : '';
                        $ret=mysqli_query($con,"select password from STUDENT where email='$email'");
                        $cnt=1;
                        while ($row=mysqli_fetch_array($ret)) {

?>
      <!----enter passwords--->
      <b> Current Password</b>
      <br>
      <input type="Password" id="Password" class="form-control form-control-user" name="currentpassword" value="" required="true">
      <br>
      <b> New Password </b> <input type="Password" class="form-control form-control-user" id="newpassword" name="newpassword" value="" required="true">

      <br>

      <b> Confirm Password </b>
      <br>
      <input type="Password" class="form-control form-control-user" id="confirmpassword" name="confirmpassword" value="" required="true">


      <?php } ?>

      <CENTER> <input type="submit" name="submit" class="but btn-primary btn-user btn-block" value="Change"> </CENTER>

    </form>










  </body>

</html>
<?php }  ?>

