 <?php
      $host="localhost";
      $username="root";
      $pass="";
      $db="SMTS";
      
      $con=mysqli_connect($host,$username,$pass,$db);
      if(!$con){
      	die("Database connection error");
      }
      
      //getting the request id from responses.php
      
      if(isset($_GET['rejid']))
      {
      	
      	 
      	error_reporting(0);
      	$id=$_GET['rejid'];
      	
      
      	
       
      	
      $query1="UPDATE `REQUEST` SET `req_status`='Rejected' where `req_id`= '$id' ";
      	$res1=mysqli_query($con, $query1);
      	
      		 echo "<script>
     
      window.location.href='responses.php';
      </script>";
      
      }
      
      
      
     

