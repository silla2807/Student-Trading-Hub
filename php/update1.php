 <!DOCTYPE html>
 <html lang="en">
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

   <head>
     <title>SMTS|Update</title>
   </head>
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <link rel="stylesheet" href="reg.css">

   <?php session_start();?>

   <style>
     input[type='']:focus {
       border: 3px solid #04AA6D;
     }

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
   <script>
     function formvalidation() {
       var name = $('#inputname').val();
       var email = $('#inputemail').val();
       var password = $('#inputpassword').val();
       var passlength = $('#inputpassword').val().length;

       if (name == '') {
         alert("Please Enter your name");
         return false;

       }
       if (email == '') {
         alert("Please Enter your email");
         return false;

       }

     }

   </script>
   <!------ register form start from here ---------------------->

   <body class="bg-default">
     <form class="form-horizontal" method="post" action="update.php">
       <fieldset>
         <?php 
               if(isset($_SESSION['success']))
               {
               	echo $_SESSION['success'];
               	unset($_SESSION['success']);
               }
               ?>
         <?php
               include("db.php");
               error_reporting(0);
               
               
               $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
                     
                     
                     
                     $mysql="select * from STUDENT where email='$email'  ";
               
                     $result=$con->query($mysql);
                    
               
                     if($row =mysqli_fetch_assoc($result))
                     {
                  
               
               
               ?>
            <legend>Edit User Details</legend>
         <div class="main-content">
           <h1 class="logo" style="font-size:30px;"><a href="profile.php">Profile</a></h1>
           <div id="mySidenav" class="sidenav">
             <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
             <a href="profile.php">Profile</a>
             <a href="logout.php">Logout</a>
           </div>
           <span class="span" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
           <script>
             function openNav() {
               document.getElementById("mySidenav").style.width = "25%";
             }

             function closeNav() {
               document.getElementById("mySidenav").style.width = "0";
             }

           </script>
          
          
           <!-- Header -->
           <div class="header  py-7 py-lg-8">
             <!-- Page content -->
             <div class="container mt--8 pb-5 align-items-center">
               <div class="row justify-content-center">
                 <div class="col-lg-5 col-md-7">

                   <div class="card bg-secondary shadow border-0 " style="margin-left:400px;margin-top:-20px;width: 800px;">
                     <div class="card-header bg-transparent pb-5">
                       <div class="text-center  mt-2 mb-3" style="font-size:18px;"><b>Update Profile</b></div>
                     </div>
                     <div class="card-body  px-lg-5 py-lg-5">
                       <div class="form-group mb-3">
                         <label for="inputid" class="col-lg-2 control-label">Student Id</label>
                         <div class="input-group input-group-alternative">
                           <div class="input-group-prepend">
                             <span class="input-group-text"><i class="ni ni-key-25"></i></span>
                           </div>
                           <input type="text" class="form-control" name="id" id="inputid" placeholder="Student Id" value="<?php echo $row['id'] ?>">
                         </div>
                       </div>
                       <div class="form-group mb-3">
                         <label for="inputname" class="col-lg-2 control-label">Name</label>
                         <div class="input-group input-group-alternative">
                           <div class="input-group-prepend">
                             <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                           </div>
                           <input type="text" class="form-control" name="username" id="inputname" placeholder="Name" value="<?php echo $row['username'] ?>">
                         </div>
                       </div>
                       <div class="form-group mb-3">
                         <label for="inputemail" class="col-lg-2 control-label">Email</label>
                         <div class="input-group input-group-alternative">
                           <div class="input-group-prepend">
                             <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                           </div>
                           <input type="email" class="form-control" name="email" id="inputemail" placeholder="Email" value="<?php echo $row['email'] ?>" readonly="true">
                         </div>
                       </div>
                       <div class="form-group mb-3">
                         <label for="inputphone" class="col-lg-2 control-label">Phone Number</label>
                         <div class="input-group input-group-alternative">
                           <div class="input-group-prepend">
                             <span class="input-group-text"><i class="ni  ni-mobile-button"></i></span>
                           </div>
                           <input type="number" class="form-control" name="phone_number" id="inputphone" placeholder="Phone Number" value="<?php echo $row['phone_number'] ?>">
                         </div>
                       </div>
                       <div class="form-group">
                         <label for="inputbranch" class="col-lg-2 control-label">Branch</label>
                         <div class="input-group input-group-alternative">
                           <div class="input-group-prepend">
                             <span class="input-group-text"><i class="ni ni-paper-diploma"></i></span>
                           </div>
                           <input type="text" class="form-control" name="branch" id="inputbranch" placeholder="Branch" value="<?php echo $row['branch'] ?>">
                         </div>
                       </div>
                       <div class="text-center">
                         <button type="submit" name="submit" class="btn  btn-primary my-4">Update</button>
                         <input type="button" name="cancel" value="Cancel" class="btn  my-4 " style="background-color:red;color:white;" onClick="window.location.href='profile.php';" />
                       </div>
                     </div>



                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <br>
         <br>
         <br>
       </fieldset>
     </form>





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

 </html>

