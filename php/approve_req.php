 <?php
      $host="localhost";
      $username="root";
      $pass="";
      $db="SMTS";
      
      $con=mysqli_connect($host,$username,$pass,$db);
      if(!$con){
      	die("Database connection error");
      }
      
    
      
      if(isset($_GET['apvid']))
      {
      	
      	
      	error_reporting(0);
      	$id=$_GET['apvid'];
      	echo "$id";
      	
     
      	
      $query1="UPDATE `REQUEST` SET `req_status`='Approved' where `req_id`= '$id'  ";
      	$res1=mysqli_query($con, $query1);
      	
      	 echo "<script>
     
      window.location.href='responses.php';
      </script>";
      
      }
      
      
      
     

