


<link href="reg.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<style>
  <style>
* {
    box-sizing: border-box;
  }

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



  .topnav {
    overflow: hidden;
    background-color: #172b4d;
  }


  .topnav a {
    float: left;
    display: block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
  }

  .topnav a:hover {
    background-color: #ddd;
    color: black;
  }

  .topnav a.active {
    background-color: #2196F3;
    color: white;
  }

  .topnav .search-container {
    float: right;
  }

  .topnav input[type=text] {
    padding: 6px;
    margin-top: 8px;
    font-size: 17px;
    border: none;
  }

  .topnav .search-container button {
    float: right;
    padding: 6px 10px;
    margin-top: 8px;
    margin-right: 16px;
    background: #ddd;
    font-size: 17px;
    border: none;
    cursor: pointer;
  }

  .topnav .search-container button:hover {
    background: #172b4d;
  }

  @media screen and (max-width: 600px) {
    .topnav .search-container {
      float: none;
    }

    .topnav a,
    .topnav input[type=text],
    .topnav .search-container button {
      float: none;
      display: block;
      text-align: left;
      width: 100%;
      margin: 0;
      padding: 14px;
    }

    .topnav input[type=text] {
      border: 1px solid #ccc;
    }
  }
  
  
 body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 250px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #172b4d;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 6px 6px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #000;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 200px; /* Same as the width of the sidenav */
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
} 

</style>

<body style="background-color:#fff;">
  <div class="topnav">
   
    <div class="search-container">
      <h1 style="font-size:22px;margin-left:800px;color:#fff;">
     
        <form style="margin-top:0px;" action="" method="POST">
          <input class="form-control" style="width:200px;" type="text" name="search" placeholder="Search any material">
          <button type="submit" name="submit">Search</button></form>
      </h1>
    </div>
  </div>

<div class="sidenav">
  
  <img src="https://findicons.com/files/icons/1700/2d/512/cart.png" style="width:100px;margin-left:90px;">
<br><br><br><br><br>
  <a href="profile.php">Profile</a>
  <a href="display_orders.php">My orders</a>
  <a href="logout.php">Logout</a>
</div>


  <div class="main-content">
    <div class="container mt-7">
     
     
      <div class="row">

        <div class="col">


          <div class="table-responsive">
            <table class="table align-items-center table-flush">
             




             <?php 

   if(isset($_POST['submit']))
   {
   
   require("db.php");
   $search=$_POST["search"];
    
   
        $sql="select * from PRODUCT where (prod_type like '%$search%'and status_='Available') or  ( prod_name like '%$search%' and status_='Available')";
        
        $res=$con->query($sql);
        $count=mysqli_num_rows($res);
      	if($count >=1)
      	{
      ?>	 <h2 class="mb-5">Shows available Products</h2>
<?php
        while($rows=mysqli_fetch_assoc($res))
 {
            
 ?>

              <tbody>
                <tr>

                  <td><img class="card-img-top" src=" <?php echo $rows['image'];?>" style="width:288;height:250;" alt="Card image cap"></td>
                <td style="color:#000;font-size:22px;"> <h4><u> Product Details</h4><br></u><?php echo $rows['prod_name'];?> <?php echo $rows['prod_type'];?><br>
                    Price:<?php echo $rows['price'];?><br>
                   Other details: <?php echo $rows['description'];?><br>
                   New/Old: <?php echo $rows['new_old'];?><br>



                    <button class="btn bg-info" name="buy"><a href="buy.php?buyid=<?php echo  $rows['prod_id']; ?>" >Buy</a>
                    </button>

                  </td>
                </tr>
          </div>
        </div>

        <?php
}}
else
{
echo "No available products for your search :(";

}
}

?>
        </tbody>
        </table>

