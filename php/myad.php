<!-- Dark table -->
<link rel="stylesheet" href="myad.css">
<div class="row mt-5">
  <div class="col">
    <div class="card bg-default shadow">
   
      <div class="card-header bg-transparent border-0">
        <h3 class="text-white mb-0">My Ads</h3>
        
        <button class="btn bg-success" name="more" style="margin-left:1200px;" onClick="window.location.href='newad.php';">&#x2B;
          New Ad
        </button>
        <button class="btn " name="more" style="width:100px;background-color:blue;" onClick="window.location.href='profile.php';">
          Back
        </button>
      </div>
      <div class="table-responsive">

        <body style="background-color:#172b4d !important">
          <?php

session_start();

    include_once("db.php");

   
    $seller_id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
        
        
        
        $mysql="select * from PRODUCT where seller_id = '$seller_id'  ";

        $result=mysqli_query($con,$mysql);
        	$count=mysqli_num_rows($result);
      	if($count >=1)
      	{ 
             echo "Student Id : $seller_id";
        ?>
          <table class="table align-items-center table-dark table-flush">
            <thead class="thead-dark">

              <tr>
                <th scope="col">Product Id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">New/Old</th>
                <th scope="col">Product Type</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>

              <?php
       while($rows=mysqli_fetch_assoc($result))
 {
            


        
?>
              <tr>
                <td><?php echo $rows['prod_id'];?></td>
                <td><?php echo $rows['prod_name'];?></td>
                <td><?php echo $rows['price'];?></td>
                <td><?php echo $rows['new_old'];?></td>
                <td><?php echo $rows['prod_type'];?></td>
                <td><?php echo $rows['description'];?></td>
                <td><img src="<?php echo $rows['image'];?>"width="100" height="100"></td>



                <td><?php echo $rows['status_'];?></td>

                <td>


                  <button class="btn bg-info" name="update"><a href="editad.php?editid=<?php echo  $rows['prod_id']; ?>" class="del_btn">Edit</a>


                  </button>

                  <button class="btn bg-danger" name="delete" onclick="return confirm('Are you sure you want to delete?');"><a href="delad.php?delid=<?php echo  $rows['prod_id']; ?>" class="del_btn">Delete</a>


                  </button></td>
              </tr>

              <?php
}}
else
{
?><CENTER style="background-color:#212529;width:100%;">
                <?php
                echo "No ads";?><br><a href="newad.php">Sell More.....!</a></CENTER>
              <?php
}
?>
            </tbody>
          </table>
        </body>
      </div>
    </div>
  </div>
</div>

