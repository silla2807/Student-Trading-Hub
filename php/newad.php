<style>
  .sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    overflow-x: hidden;
    background-color: #000;
    transition: 0.5s;
    padding-top: 60px;
    text-align: center;
  }

  .sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
  }
  }

  .sidenav a:hover {
    text-decoration: none;
    color: #5e72e4;
    -webkit-text-decoration-skip: objects;
    padding: 10px 15px;
    text-transform: uppercase;
    text-align: center;
    display: block;
  }

  .sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
  }

  @media screen and (max-height: 450px) {
    .sidenav {
      padding-top: 15px;
    }

    .sidenav a {
      font-size: 18px;
    }
  }

  .span:hover {
    color: #5e72e4;
  }

</style>


<!DOCTYPE html>
<html lang="en">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <head>
    <title>SMTS|Update</title>
  </head>
  <link rel="stylesheet" href="newad.css">
  <?php session_start();?>

  <form method="post" action="seller-insert.php">

    <body class="bg-default" style="background-color:#333d79ff;">
      <div class="wizard-content">
        <section>
          <?php
         include("db.php");
         error_reporting(0);
         
         
         $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
               
               
               
               $mysql="select * from STUDENT where email='$email'  ";
         
               $result=$con->query($mysql);
             
         
               if($row =mysqli_fetch_assoc($result))
               {
             
         
         ?>

          <div class="main-content">
            <h1 class="logo" style="font-size:26px;color:#fff;"><a href="#">You can Upload materials for trading</a></h1>
            <div id="mySidenav" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <a href="myad.php">My Ads</a>
              <a href="responses.php">Responses</a>
              <a href="profile.php">Profile</a>
              <a href="logout.php">Logout</a>
            </div>
            <span class="span" style="font-size:30px;cursor:pointer;color:#fff;" onclick="openNav()">&#9776; open</span>
            <script>
              function openNav() {
                document.getElementById("mySidenav").style.width = "25%";
              }

              function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
              }

            </script>
            
            <div class=" header py-7 py-lg-8">
              <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                  <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
              </div>
            </div>
            <!-- Page content -->
            <div class="container mt--8 pb-5 align-items-center">
              <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7 mb-2">
                  <div class="card bg-secondary shadow   border-0" style="margin-left:200px;margin-top:-90px;">
                    <div class="card-header bg-transparent pb-5" style="margin-top:0px;">
                      <div class="text-center   mb-3" style="font-size:18px;"><b>New Ad</b><br>
                        <?php echo "$email";?>
                      </div>
                    </div>
                    <!-- Input ad details  -->
                    <div class="card-body  px-lg-5 py-lg-5">
                      <div class="form-group mb-3">
                        <label for="inputid" class="col-lg-2 control-label">Product Name</label>
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni ni-cart"></i></span>
                          </div>
                          <input name="prod_name" type="text" class="form-control wizard-required" required="true">
                        </div>
                      </div>
                      <div class="form-group mb-3">
                        <label for="inputname" class="col-lg-2 control-label">Product Price</label>
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-money-coins"></i></span>
                          </div>
                          <input name="price" type="text" class="form-control" required="true" autocomplete="off">
                        </div>
                      </div>
                      <div class="form-group mb-3">
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend ">
                            <span class="input-group-text"><i class="ni ni-active-40"></i></span>
                          </div>
                          <div class="form-control">
                            <input name="new_old" type="radio" id="new" required="true" autocomplete="off" value="New">&nbsp;New
                            &nbsp;&nbsp;
                            <input name="new_old" type="radio" id="old" required="true" autocomplete="off" value="Old">&nbsp;Old
                          </div>
                        </div>
                      </div>
                       <div class="form-group mb-3">
                        <label for="inputid" class="col-lg-2 control-label">Product Type</label>
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni ni-cart"></i></span>
                          </div>
                          <input name="prod_type" type="text" class="form-control wizard-required" required="true">
                        </div>
                      </div>
                     
                      <div class="form-group mb-3">
                        <label for="inputname" class="col-lg-2 control-label">Description</label>
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-single-copy-04"></i></span>
                          </div>
                          <input name="description" type="text" class="form-control" required="true" autocomplete="off">
                        </div>
                      </div>

                      <div class="form-group ">
                        <label for="inputname" class="col-lg-2 control-label">Image of the product</label>
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                            <span class=" input-group-text">
                              <li class="ni ni-camera-compact">
                                &nbsp; <input name="image" type="file" autocomplete="off">
                              </li>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group mb-3">
                        <label for="inputname" class="col-lg-2 control-label">Status</label>
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-chart-bar-32"></i> </span>
                          </div>
                          <input type="text" class="form-control" name="status" id="status" placeholder="Available" value="Available">
                        </div>
                        <div class="form-group mb-3">
                          <label for="inputname" class="col-lg-2 control-label">Your Id</label>
                          <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-circle-08"></i> </span>
                            </div>
                            <input type="text" class="form-control" name="seller_id" id="sellerid" placeholder="Seller  Id" value="<?php echo $row['id'] ?>" readonly="true">
                        <?php session_start();  $seller_id= $row['id'];
                                  $_SESSION['id']= $seller_id;?>
                          </div>
                        </div>
                        <button class="btn btn-primary btn-focused" name="apply" id="apply" data-toggle="modal">Upload&nbsp;Ad</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </body>

    <?php
   }
   else
   {
   ?>
    <CENTER>
      <h1 class='link'>
        <?php	
   echo "Not Found....😕️";
   ?>
        <br>
        Click here to <a href='login.php'>Login</a> again.
      </h1>
    </CENTER>
    <?php
   $con->close();
   }
   ?>
  </form>

</html>

