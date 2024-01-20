
<style>
table, td, th {  
  border: 1px solid #ddd;
  text-align: center;
  font-size:20px;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 15px;
}

bg-success {
    background-color: #2dce89 !important;
}


.bg-info {
    background-color: #11cdef !important;
}

.bg-danger {
    background-color: #f5365c !important;
}

.bg-warning {
    background-color: #fb6340 !important;
}

.bg-success {
    background-color: #2dce89 !important;
}


.btn {
    font-size: .875rem;
    position: relative;
    transition: all .15s ease;
    letter-spacing: .025em;
    text-transform: none;
    will-change: transform;
  
    font-size: 1rem;
    font-weight: 600;
    line-height: 1.5;
    display: inline-block;
    padding: .625rem 1.25rem;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    text-align: center;
    vertical-align: middle;
    white-space: nowrap;
    border: 1px solid transparent;
    border-radius: .375rem;
}


</style>


  <body style="background-color:#427646;">
<div class="row mt-5 text-center">
  <div class="col">
    
        <h3 class="text-white mb-0">My Order Requests</h3>
        
        <button class="btn bg-success" name="more" style="margin-left:1200px;" onClick="window.location.href='search_buy.php';">&#x2B;
          Buy  More
        </button>
        <button class="btn " name="more" style="width:100px;background-color:blue;" onClick="window.location.href='profile.php';">
          Back
        </button>
      </div>
      <div class="table-responsive">

      
          <?php

session_start();

    include_once("db.php");
  
   	 $buyer_id = isset($_SESSION['buyer_id']) ? $_SESSION['buyer_id'] : '';
       
         
        $mysql="select * from REQUEST where buyer_id = '$buyer_id'  ";

        $result=mysqli_query($con,$mysql);
        	$count=mysqli_num_rows($result);
      	if($count >=1)
      	{ 
        
        echo"Id: $buyer_id";
       
        $query="  SELECT *
FROM
    PRODUCT
INNER JOIN
    REQUEST
ON
    PRODUCT.prod_id = REQUEST.prod_ids WHERE  REQUEST.buyer_id='$buyer_id' 
";
    

        $result1=mysqli_query($con,$query);
      
        
        ?>
            <table class="table align-items-center text-center ">
            <thead class="">

              <tr>
                <th scope="col">Product Id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">New/Old</th>
                <th scope="col">Product Type</th>
                <th scope="col">Description</th>
                  <th scope="col">offer_given</th>
                <th scope="col">Image</th>
                <th scope="col">Status</th>
                 <th scope="col">Comments</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>

              <?php
       while($rows=mysqli_fetch_assoc($result1))
 {
            


        
?>
              <tr >
              <div class="text-center">
                <td><?php echo $rows['prod_ids'];?></td>
                <td><?php echo $rows['prod_name'];?></td>
                <td><?php echo $rows['price'];?></td>
                <td><?php echo $rows['new_old'];?></td>
                <td><?php echo $rows['prod_type'];?></td>
                <td><?php echo $rows['description'];?></td>
                <td><?php echo $rows['buyer_offer'];?></td>
                <td><img src="<?php echo $rows['image'];?>"width="100" height="100"></td>
                <td><?php echo $rows['req_status'];?></td>
                <td><?php echo $rows['seller_comments'];?></td>
                <?php if( $rows['req_status'] =='pending' or  $rows['req_status'] =='Rejected'){?>
               

                

               <td> <button class="btn bg-danger" name="cancel"><a href="del_ord_req.php?ordid=<?php echo  $rows['req_id']; ?>" class="del_btn">Delete</a></button></td>
               <?php }?>
              </tr>

                    <?php
}}
else
{?><CENTER><?PHP
echo" You havent requested for an order yet , Feel like buying anything?"?> <a href="search_buy.php"> click here</a></center><?php
}
?>
            </tbody>
          </table>
        </body>
      </div>
    </div>
  </div>
</div>

