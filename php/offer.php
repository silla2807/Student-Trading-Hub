<link href="reg.css" rel="stylesheet" />
<?php session_start();
 if(isset($_POST['submit']))
    {
      require("db.php");
      	 $id = isset($_SESSION['prod_ids']) ? $_SESSION['prod_ids'] : '';
         $buyer_id = isset($_SESSION['buyer_id']) ? $_SESSION['buyer_id'] : '';
         $buyer_offer=$_POST['buyer_offer'];
           $query1="UPDATE `REQUEST` SET `buyer_offer`='$buyer_offer' where (`prod_ids`= '$id' and `buyer_id`= '$buyer_id')";
                     
      		$res1=mysqli_query($con, $query1);
      	
      	if($res1)
      	{ 
      	 echo "<script>
      alert('provided an offer');
       window.location.href='display_orders.php';
      </script>";
      	}
      	else
      	{
      		 echo "<script>
      alert('Oops! couldnt provide an offer,try again');
      window.location.href='offer.php';</script> ";
      	}}
      	
      	 ?>
      	 
      	 
      	<body class="bg-default"> 
      	
      	 <form action="" method="post">
      	<h1 style="color:white;font-size:22px;margin-left:710px;margin-top:280px;">  Try giving an offer, ;)</h1>
      <div class="card card-body bg-secondary shadow" style="width:300px;margin-left:700px;">
<input type="text" name="buyer_offer" class="form-control align-items-center" placeholder="Write offer to your seller"><br>
<button  class="btn btn-primary" name="submit">Offer</button>

</form>
<br>
 <button class="btn btn-primary btn-danger" onclick="window.location='display_orders.php';">Skip</button>

</div>
