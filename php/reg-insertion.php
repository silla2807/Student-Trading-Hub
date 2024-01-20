<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_POST['email'])) {
        // removes backslashes
        $id = stripslashes($_REQUEST['id']);
        $id = mysqli_real_escape_string($con, $id);
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $phone_number = stripslashes($_REQUEST['phone_number']);
        $phone_number = mysqli_real_escape_string($con, $phone_number);
        $branch = stripslashes($_REQUEST['branch']);
        $branch = mysqli_real_escape_string($con, $branch);
        
       $query1 = "SELECT * FROM `STUDENT` WHERE email='$email' or  id ='$id'";
         
         	$result1 = mysqli_query($con,$query1) or die(mysql_error());
         	$rows1 = mysqli_num_rows($result1);
                 if($rows1){
                    
                   echo "<script>alert('Account  Exist ! ');
      window.location.href='login.php';
      </script>";
         	    
      
                  }
                  else
                  {
        $query    = "INSERT into `STUDENT` (id,username, password, email,phone_number,branch)
                     VALUES ('$id','$username', '" . md5($password) . "', '$email','$phone_number','$branch')";
        $result   = mysqli_query($con, $query);
       
        if ($result) {
    echo "<script>
alert('registration succcessfull');
window.location.href='login.php';
</script>";

        } else {
           
      $msg="something went wrong!.";
    }
        }
        }
   
?>

