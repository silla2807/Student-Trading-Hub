 <!DOCTYPE html>
 <html lang="en">
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

   <head>
     <title>SMTS|Profile</title>


     <style>
       /* Style The Dropdown Button */

       .dropdown-menu .dropdown-menu li>a {
         position: relative;
         width: auto;
         display: flex;
         flex-flow: nowrap;
         align-items: center;
         color: #333;
         font-weight: 400;
         text-decoration: none;
         font-size: .8125rem;
         border-radius: 0.125rem;
         margin: 0 0.3125rem;
         transition: all .15s linear;
         min-width: 7rem;
         padding: 0.625rem 1.25rem;
         overflow: hidden;
         line-height: 1.428571;
         text-overflow: ellipsis;
         word-wrap: break-word;
       }

       .dropbtn {
         background-color: #39b447;
         border-color: coral;
         color: white;
         padding: 16px;
         font-size: 16px;
         border: none;
         cursor: pointer;
       }

       /* The container 
   <div>
   - needed to position the dropdown content */
       .dropdown {
         position: relative;
         display: inline-block;
       }

       /* Dropdown Content (Hidden by Default) */
       .dropdown-content {
         display: none;
         position: absolute;
         background-color: #346f94;
         min-width: 160px;
         box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
         z-index: 1;
       }

       /* Links inside the dropdown */
       .dropdown-content a {
         color: black;
         padding: 12px 16px;
         text-decoration: none;
         display: block;
       }

       /* Change color of dropdown links on hover */
       .dropdown-content a:hover {
         background-color: #9c27b0 !important;
         color: #34495e;
       }

       /* Show the dropdown menu on hover */
       .dropdown:hover .dropdown-content {
         display: block;
       }

       /* Change the background color of the dropdown button when the dropdown content is shown */
       .dropdown:hover .dropbtn {
         background-color: #9c27b0 !important;
         color: #34495e;
       }

       .topnav {
         background-color: #333;
         overflow: hidden;
         margin-left: 400px;
       }

     </style>
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
     <link rel="stylesheet" href="profile.css" />
     <link rel="stylesheet" href="style.css" />


     <!--   displaying the details -->
     <?php
   session_start();
   
       include_once("db.php");
       
    // getting the email used for login using session method
    
      $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
      
           
           $mysql="select * from STUDENT where email='$email'  ";
   
           $result=$con->query($mysql);
          
   
           if($rows=mysqli_fetch_assoc($result))
    {
               
   ?>

   <body class="bg-default">
     <h1 class="logo" style="font-size:30px;"><a href="#">Profile</a></h1>
     <ul class=" main-nav ">
       <li>
         <div class="dropdown">
           <button class="dropbtn" onclick="window.location='update1.php';">UPDATE</button>
         </div>
       </li>
       <li>
         <div class="dropdown">
           <button class="dropbtn" onclick="window.location='changepassword.php';">Change Password</button>
         </div>
       </li>
       <li>
         <div class="dropdown">
           <button class="dropbtn ">SELL</button>
           <div class="dropdown-content  dropdown-menu">
             <a href="newad.php">New Ads</a>
             <a href="myad.php">My Ads</a>
             <a href="responses.php">Responses from buyers</a>
           </div>
         </div>
       </li>
       <li>
         <div class="dropdown">
           <button class="dropbtn ">BUY</button>
           <div class="dropdown-content  dropdown-menu">
             <a href="search_buy.php">Seach and buy </a>
             <a href="display_orders.php">My orders</a>
           </div>
         </div>
       </li>
       <li>
         <div class="dropdown">
           <button class="dropbtn" onclick="window.location='logout.php';">LOGOUT</button>
         </div>
       </li>
     </ul>
     <hr style="margin-top: 20px;margin-left:0px;width:30%;height:1.5px;background-color:#000">
     </hr>

     <div class="main-content">
       <div class="container mt-7">
         <div class="mb-5">
           <br><br><br>
           <!-- Enter informations -->
           <div class="row">
             <div class="col-xl-8 m-auto order-xl-1">
               <div class="card bg-secondary shadow">
                 <div class="card-header bg-white border-0">
                   <div class="row align-items-center">
                     <div class="col-8">
                       <h3 class="mb-0">My account</h3>
                     </div>
                   </div>
                 </div>
                 <div class="card-body">
                   <form>
                     <h6 class="heading-small text-muted mb-4">Account information</h6>
                     <div class="pl-lg-4">
                       <div class="row">
                         <!-- student id  -->
                         <div class="col-lg-6">
                           <div class="form-group focused">
                             <label class="form-control-label" for="username">Student Id</label>
                             <label class="form-control form-control-alternative" placeholder="Id">
                               <?php echo $rows['id'];?>
                             </label></div>
                         </div>
                         <!--Name -->
                         <div class="col-lg-6">
                           <div class="form-group">
                             <label class="form-control-label" for="username">Name</label>
                             <label class="form-control form-control-alternative" placeholder="Name"><?php echo $rows['username'];?></label>
                           </div>
                         </div>
                       </div>
                       <!-- Branch  -->
                       <div class="row">
                         <div class="col-lg-6">
                           <div class="form-group focused">
                             <label class="form-control-label" for="input-first-name">Branch</label>
                             <label class="form-control form-control-alternative" placeholder="Branch">
                               <?php echo $rows['branch'];?>
                             </label></div>
                         </div>
                       </div>
                       <hr class="my-4">
                       <!-- contact  -->
                       <h6 class="heading-small text-muted mb-4">Contact information</h6>
                       <div class="pl-lg-4">
                         <!-- email  -->
                         <div class="row">
                           <div class="col-md-12">
                             <div class="form-group focused">
                               <label class="form-control-label" for="email_id">Email-Id</label>
                               <label class="form-control form-control-alternative" placeholder="Email " type="text"><?php echo $rows['email'];?></label>
                             </div>
                           </div>
                         </div>
                         <!-- Phone  -->
                         <div class="row">
                           <div class="col-lg-4">
                             <div class="form-group focused">
                               <label class="form-control-label" for="phone_number">Phone Number</label>
                               <label type="text" class="form-control form-control-alternative" placeholder="Phone Number"><?php echo $rows['phone_number'];?></label>
                             </div>
                           </div>
                         </div>
                       </div>
                     </div>
                   </form>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
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
   </head>

 </html>

