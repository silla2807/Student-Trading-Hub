<!DOCTYPE html>
<html>
  <link rel="stylesheet" href="reg.css" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <style>
    .topnav {
      overflow: hidden;
      background-color: #172b4d;
      height: 80px;
    }

    .topnav a {
      float: left;
      display: block;
      color: #f2f2f2;
      text-align: center;
      padding: 27px 18px;
      text-decoration: none;
      font-size: 17px;
    }

    .topnav a:hover {
      background-color: #fff;
      color: black;
    }

    .topnav a.active {
      background-color: #f64c72;
      color: white;
    }

    .topnav .icon {
      display: none;
    }

    @media screen and (max-width: 700px) {
      .topnav a:not(:first-child) {
        display: none;
      }

      .topnav a.icon {
        float: right;
        display: block;
      }
    }

    @media screen and (max-width: 700px) {
      .topnav.responsive {
        position: relative;
      }

      .topnav.responsive .icon {
        position: absolute;
        right: 0;
        top: 0;
      }

      .topnav.responsive a {
        float: none;
        display: block;
        text-align: left;
      }
    }

  </style>
  <script>
    function formvalidation() {

      var id = $('#inputid').val();
      var username = $('#inputname').val();
      var email = $('#inputemail').val();
      var password = $('#inputpassword').val();
      var phone_number = $('#inputphone').val();
      var branch = $('#inputbranch').val();
      var passlength = $('#inputpassword').val().length;

      if (id == '') {

        alert("Please Enter your id");
        return false;

      }
      if (username == '') {
        alert("Please Enter your username");
        return false;

      }

      if (email == '') {
        alert("Please Enter your email");
        return false;

      }
      if (password == '') {
        alert("Please Enter your password");
        return false;

      }
      if (phone_number == '') {
        alert("Please Enter your phone number");
        return false;

      }
      if (branch == '') {
        alert("Please Enter your branch");
        return false;

      }
      if (passlength <= 4) {
        alert("Please Enter minimum 5 digit password");
        return false;

      }
    }

  </script>

  <body style="background-color:#172b4d !important;">
    <div class="topnav" id="myTopnav">
      <a href="home.html" class="active">Home</a>
      <a href="login.php">Login</a>
      <h1 style="font-size:22px;margin-left:800px;color:#fff;">Account Registration</h1>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
    <div class="main-content">
      <div class="container mt-7">
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
                <form class="form" action="reg-insertion.php" method="post" onsubmit="return formvalidation();">
                  <?php 
                     if(isset($_SESSION['error']))
                     {
                     	echo $_SESSION['error'];
                     	unset($_SESSION['error']);
                     }
                     if(isset($_SESSION['success']))
                     {
                     	echo $_SESSION['success'];
                     	unset($_SESSION['success']);
                     }
                     ?>
                  <h6 class="heading-small text-muted mb-4">Student information</h6>
                  <div class="pl-lg-4">
                    <div class="row">
                      <!--input  Student Id  -->
                      <div class="col-lg-6">
                        <div class="form-group focused">
                          <label class="form-control-label" for="inputid">Student Id</label>
                          <input type="text" class="form-control form-control-alternative" name="id" id="inputid" placeholder="eg:Bxxxxxxyy" />
                        </div>
                      </div>
                      <!--input Name  -->
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="inputname">Name</label>
                          <input type="text" class="form-control form-control-alternative" name="username" id="inputname" placeholder="Enter your name" />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <!-- input Email  -->
                      <div class="col-lg-6">
                        <div class="form-group focused">
                          <label class="form-control-label" for="inputemail">Email</label>
                          <input type="email" class=" form-control form-control-alternative" pattern=".+[nitc.ac.in]" name="email" id="inputemail" placeholder="***@nitc.ac.in">
                          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                      </div>
                      <!--input password  -->
                      <div class="col-lg-6">
                        <div class="form-group focused">
                          <label class="form-control-label" for="inputpassword">Password</label>
                          <input type="password" class=" form-control form-control-alternative " name="password" id="inputpassword" placeholder="Enter a password not less than 5 numbers">
                        </div>
                      </div>
                      <!-- input branch  -->
                      <div class="col-lg-6">
                        <div class="form-group focused">
                          <label class="form-control-label" for="inputbranch">Branch</label>
                          <input type="text" class="form-control form-control-alternative" name="branch" id="inputbranch" placeholder="eg:Compter Sc..." />
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr class="my-4">
                  <!-- Contact  -->
                  <h6 class="heading-small text-muted mb-4">Contact information</h6>
                  <div class="pl-lg-4">
                    <!-- input Phone Number  -->
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group focused">
                          <label class="form-control-label" for="inputphone">Phone Number</label>
                          <input type="text" class="form-control form-control-alternative" name="phone_number" id="inputphone" placeholder="Enter your Phone number" />
                        </div>
                      </div>
                    </div>
                    <hr class="my-4">
                  </div>
                  <input type="submit" name="submit" value="Register" class="btn btn-primary">
                </form>
              </div>
            </div>
          </div>
  </body>

