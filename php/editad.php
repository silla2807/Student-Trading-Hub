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
      	$id=$_GET['editid'];
      	$name=$_POST['prod_name'];
      	$price=$_POST['price'];
        $new_old=$_POST['new_old'];
        $prod_type=$_POST['prod_type'];
      	$d=$_POST['description'];
      	$status=$_POST['status'];
      	$image=$_POST['image'];
      	
      	
      	
      	
      	
      	$query1="UPDATE `PRODUCT` SET `prod_name`='$name',`price`='$price',`new_old`='$new_old',`prod_type`='$prod_type',  `description`='$d', `status_`='$status',`image`='$image' where `prod_id`= '$id'";
      	$res1=mysqli_query($con, $query1);
      	
      	
      	if($res1)
      	{ 
      	
      	 echo "<script>
      alert('Successfully Updated');
      window.location.href='myad.php';
      </script>";
                }
        
      	else{
      	
      	echo "<script>
      alert('Cannot update record');
      window.location.href='myad.php';
      </script>";
      
      }
      }
   ?>

   <body style="background-color:#172b4d">





     <?php
               include("db.php");
               error_reporting(0);
               
               
               	$id=$_GET['editid'];
                     
                     
                     $mysql="select * from PRODUCT where prod_id='$id'  ";
               
                     $result=$con->query($mysql);
                    
               
                     if($rows =mysqli_fetch_assoc($result))
                     {
                  
               
               
               ?>
     <link rel="stylesheet" href="reg.css">
     <form class="form-horizontal" method="post" action="">
       <!-- Header -->
       <div class="header  py-7 py-lg-8">
         <!-- Page content -->
         <div class="container mt--8 pb-5 align-items-center">
           <div class="row justify-content-center">
             <div class="col-lg-5 col-md-7">
               <div class="card bg-secondary shadow border-0" style="margin-right:100px;margin-top:200px;width: 800px;">
                 <div class="card-header bg-transparent pb-5">
                   <div class="text-center  mt-2 mb-3" style="font-size:18px;"><b>Update Ad</b></div>
                 </div>
                 <div class="card-body  px-lg-5 py-lg-5">
                   <div class="form-group mb-3">
                     <label for="inputid" class="col-lg-2 control-label">Product Name</label>
                     <div class="input-group input-group-alternative">
                       <div class="input-group-prepend">
                         <span class="input-group-text"><i class="ni ni-key-25"></i></span>
                       </div>
                       <input name="prod_name" type="text" class="form-control wizard-required" value="<?php echo $rows['prod_name'];?>">
                     </div>
                   </div>
                   <div class="form-group mb-3">
                     <label for="inputname" class="col-lg-2 control-label">Price</label>
                     <div class="input-group input-group-alternative">
                       <div class="input-group-prepend">
                         <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                       </div>
                       <input name="price" type="text" class="form-control" autocomplete="off" value="<?php echo $rows['price'];?>">
                     </div>
                   </div>

                   <div class="form-group mb-3">

                     <div class="input-group input-group-alternative">
                       <div class="input-group-prepend">
                         <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                       </div>


                       <input name="new_old" type="radio" id="newold" value="<?php echo $rows['new_old']; ?>" checked>Selected is <?php echo $rows['new_old']; ?> &nbsp;
                       <br>
                       <p>If you want you can change it here</p>
                       <input name="new_old" type="radio" id="new" value="New"> &nbsp;New
                       &nbsp;&nbsp;
                       <input name="new_old" type="radio" id="old" value="Old">&nbsp;Old
                     </div>
                   </div>
                   <div class="form-group mb-3">
                     <label for="inputid" class="col-lg-2 control-label">Product Type</label>
                     <div class="input-group input-group-alternative">
                       <div class="input-group-prepend">
                         <span class="input-group-text"><i class="ni ni-key-25"></i></span>
                       </div>
                       <input name="prod_type" type="text" class="form-control wizard-required" value="<?php echo $rows['prod_type'];?>">
                     </div>
                   </div>
                   <div class="form-group mb-3">
                     <label for="inputphone" class="col-lg-2 control-label">Description</label>
                     <div class="input-group input-group-alternative">
                       <div class="input-group-prepend">
                         <span class="input-group-text"><i class="ni  ni-mobile-button"></i></span>
                       </div>
                       <input name="description" type="text" class="form-control" autocomplete="off" value="<?php echo $rows['description'];?>">
                     </div>
                   </div>
                   <div class="form-group mb-3">
                     <label for="inputname" class="col-lg-2 control-label">Status</label>
                     <div class="input-group input-group-alternative">
                       <div class="input-group-prepend">
                         <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                       </div>
                       <p>It is given <?php echo $rows['status_']; ?> for this item. If you want you can change it here</p>
                       <select name="status">
                         <option value="<?php echo $rows['status_']; ?>"> <?php echo $rows['status_']; ?></option>

                         <option value="Sold Out">Sold Out</option>
                         <option value="Available"> available</option>
                         <option value="Not available">Not available</option>

                       </select>
                     </div>
                   </div>


                   <div class="form-group mb-3">
                     <label for="inputname" class="col-lg-2 control-label">Image</label>
                     <div class="input-group input-group-alternative">
                       <div class="input-group-prepend">
                         <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                       </div>
                       <input name="image" type="file" class="form-control" autocomplete="off" value="<img src='<?php echo $rows['images']; ?>' width='100' height='100'">
                     </div>
                   </div>
                   <div class="text-center">
                     <input type="submit" name="submit" value="Update" class="btn  btn-primary my-4">
                     <input type="button" name="cancel" value="Cancel" class="btn  my-4 " style="background-color:red;color:white;" onClick="window.location.href='profile.php';" />
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </form>


     <br>
     <br>
     <br>


   </body>
   <?php
   }
   ?>

