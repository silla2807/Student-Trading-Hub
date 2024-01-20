   <?php
      $host="localhost";
      $username="root";
      $pass="";
      $db="SMTS";
      
      $con=mysqli_connect($host,$username,$pass,$db);
      if(!$con){
      	die("Database connection error");
      }
      
    
      
      if(isset($_POST['submit']))
      {
     
     
   
      	
      	error_reporting(0);
      	$id=$_GET['cmntid'];
      	echo "$id";
      	$comment=$_POST['comment'];
      	
      	
      	
      	
      	
      	$query1="UPDATE `REQUEST` SET `seller_comments`='$comment' where `req_id`= '$id' ";
      	$res1=mysqli_query($con, $query1);
      	
      	
      	if($res1)
      	{ 
      	
      	 echo "<script>
      alert('Send message');
      window.location.href='responses.php';
      </script>";
                }
        
      	else{
      	
      	echo "<script>
      alert('Cannot send message');
      window.location.href='responses.php';
      </script>";
      
      }
      }
   ?>







   <?php
               include("db.php");
               error_reporting(0);
               
               
               	$id=$_GET['cmntid'];
                     
                     
                     $mysql="select * from REQUEST where req_id='$id'  ";
               
                     $result=$con->query($mysql);
                    
               
                     if($rows =mysqli_fetch_assoc($result))
                     {
                  
               
             
               ?>
   <link href="reg.css" rel="stylesheet" />

   <body style="background-color:#f94632;">
     <form action="" method="post">

       <h1 style="color:black;font-size:22px;margin-left:710px;margin-top:280px;"> Write your message to your buyer</h1>
       <div class="card card-body bg-secondary shadow" style="width:700px;margin-left:700px;">
         <input name="comment" type="text" class="form-control wizard-required" value="<?php echo $rows['seller_comments'];?>" style="width:600px;height:300px;">
         <button class="btn btn-primary " name="submit">Comment</button>
       </div>
     </form>





     <br>
     <br>
     <br>


   </body>
   <?php
   }
   ?>

