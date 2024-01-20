   <?php
      $host="localhost";
      $username="root";
      $pass="";
      $db="SMTS";
      
      $con=mysqli_connect($host,$username,$pass,$db);
      if(!$con){
      	die("Database connection error");
      }
      
      // login account process
      
    if(isset($_GET['buyid']))
    {
      	session_start();
      	 $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
      
           
           $mysql="select * from STUDENT where email='$email'  ";
   
           $result=$con->query($mysql);
          
   
           $rows=mysqli_fetch_assoc($result);
           
           $buyer_id= $rows['id'];
      	
      	    $id=$_GET['buyid'];
      	
       
         	
      	  $_SESSION['prod_ids']=$id;
           $_SESSION['buyer_id']=$buyer_id;
      
      $query1="INSERT into `REQUEST` (prod_ids,buyer_id)
                     VALUES ('$id','$buyer_id')";
                     
                     echo"$query1";
      		$res1=mysqli_query($con, $query1);
      	   
      	if($res1)
      	{ 
      	
    
      
      	 echo "<script>
      alert('Successfully Bought ,wait for seller confirmation');
      window.location.href='offer.php';</script> ";
                }
        
      	else{
      	
      	 	 echo "<script>
      alert('Couldnt Buy something went wrong');
      window.location.href='search_buy.php';</script> ";
                }
      	
      
      }
      	
      	 
      
     ?> 
     
  

