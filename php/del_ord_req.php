 <?php
      $host="localhost";
      $username="root";
      $pass="";
      $db="SMTS";
      
      $con=mysqli_connect($host,$username,$pass,$db);
      if(!$con){
      	die("Database connection error");
      }
      
    
      
      if(isset($_GET['ordid']))
      {
      	
      	
      	error_reporting(0);
      	$id=$_GET['ordid'];
      	echo "$id";
      	
       $query="SET FOREIGN_KEY_CHECKS=0";
       	$result1=mysqli_query($con, $query);
      	
      	$query1="DELETE  FROM `REQUEST` WHERE `req_id` = '$id'";
      	$res1=mysqli_query($con, $query1);
      	
      	
      	if($res1)
      	{ 
      	$qu="SET FOREIGN_KEY_CHECKS=1";
       $res=mysqli_query($con, $qu);
      	 echo "<script>
      alert('Successfully Deleted your order request ');
      window.location.href='display_orders.php';
      </script>";
                }
        
      	else{
      	
      	echo "<script>
      alert('Cannot delete request');
      window.location.href='display_orders.php';
      </script>";
      
      }
      }
      
      
      
     

