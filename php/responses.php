<style>
  #overflowTest {
    background: #265999;
    color: white;
    padding: 15px;
    width: 30%;
    height: 200px;
    overflow: scroll;
    border: 1px solid;
  }

  .td {
    overflow: hidden;
  }

</style>
<!-- Dark table -->
<link rel="stylesheet" href="myad.css">
<div class="row mt-5">
  <div class="col">
    <div class="card bg-default shadow">
      <div class="card-header bg-transparent border-0">
        <h3 class="text-white mb-0">Responses</h3>
        <button class="btn bg-success" name="more" style="margin-left:1200px;" onClick="window.location.href='myad.php';">
          My Ads
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
                          
                          
                          
                     
                        	 
                        	  
                        	$query=" SELECT * FROM PRODUCT INNER JOIN REQUEST ON PRODUCT.prod_id = REQUEST.prod_ids";

 
                        	  $result1=mysqli_query($con,$query);
                               
                          ?>
          <table class="table align-items-center table-dark table-flush">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Product Id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Other Details</th>
                <th scope="col">Offer from buyer</th>
                <th scope="col">Image</th>
                <th scope="col">Approve/Reject</th>
                <th scope="col">Comment </th>
              </tr>
            </thead>
            <tbody>
              <?php
                        while($rows=mysqli_fetch_assoc($result1))
                        {
                             
                        
                        
                         
                        ?>
              <tr>
                <td><?php echo $rows['prod_ids'];?></td>
                <td><?php echo $rows['prod_name'];?></td>
                <td><?php echo $rows['price'];?></td>
                <td><?php echo $rows['new_old'];?><br>
                  <?php echo $rows['prod_type'];?><br>
                  <?php echo $rows['description'];?>
                </td>
                <td> <?php echo $rows['buyer_offer'];?></td>
                <td><img src="<?php echo $rows['image'];?>" width="100" height="100"></td>
                <?php if( $rows['req_status'] =='Approved' or  $rows['req_status'] =='Rejected'){?>
                
                <td> You have <?php echo $rows['req_status'];?> the request</td>
                <?php }
                           else{
                           ?>
                <td>
                  <button class="btn bg-success" name="approve"><a href="approve_req.php?apvid=<?php echo  $rows['req_id']; ?>" class="del_btn">Approve</a> </button>
                  <button class="btn bg-danger" name="reject" onclick="return confirm('Are you sure you want to reject the request?');"><a href="reject_req.php?rejid=<?php echo  $rows['req_id']; ?>" class="del_btn">Reject</a> </button>
                </td>
                <?php }?>


                <?php if( $rows['req_status'] =='Approved'){?>


                <td>
                  <div id="overflowtest">
                    <?php echo $rows['seller_comments'];?>
                  </div>
                  <br>
                  <br><br>
                  <small> <button class="btn bg-success text-center" name="comment"><a href="comment.php?cmntid=<?php echo  $rows['req_id']; ?>" class="text-center">comment</a></button></small>

                </td>
                <?php } ?>
              </tr>
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

