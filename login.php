<?php
if(!session_id()){
    session_start();
}
include 'database.php';

if(isset($_POST["login"])){
 
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM users WHERE username = '$uname' AND pass = '$pass'";

    $result = mysqli_query($conn, $sql);

    $row_count = mysqli_num_rows($result);

    if($row_count == 1){

        $row = mysqli_fetch_assoc($result);

        $_SESSION['uid'] = $row['uid'];
        $_SESSION['username'] = $uname;
        header("location: shop.php");
    }
    else {
        echo "Incorrect credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
    <title>Medicare</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" type="text/css" href="asset/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="asset/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="asset/assets/css/style.css">

    <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">


  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">

   </head>
<body>


<div class="site-wrap">


<div class="site-navbar py-2">


  <div class="container">
    <div class="d-flex align-items-center justify-content-between">
      <div class="logo">
        <div class="site-logo">
        <div class="account-logo">
                        <a href="welcome.php"><img src="images/logo.png" alt="" height="100px" width="100px"></a>
                    </div>
        </div>
      </div>
      <div class="main-nav d-none d-lg-block">
        <nav class="site-navigation text-right text-md-center" role="navigation">
          <ul class="site-menu js-clone-nav d-none d-lg-block">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li ><a href="shop.php">Store</a></li>
            <li>
              <li><a href="doctor.php">Doctors</a></li>
              </li>
              <li><a href="blog.php">Blog</a></li>
              <li ><a href="appointment.php">Appointment</a></li>
              
              <li ><a href="add-patient.php">Patient Registration</a></li>
              
              </ul>
            </li>
            
           
          </ul>
        </nav>
      </div>
      <div class="icons">
      <?php include 'nav.php'; ?>
      </div>
    </div>
  </div>
</div>

<div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                    <form method="post" class="form-signin">
					
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" autofocus="" name="uname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control">
                        </div>
                        <div class="form-group text-right">
                            <a href="forgot-password.html">Forgot your password?</a>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn" name="login">Login</button>
                        </div>
                        <div class="text-center register-link">
                            Don’t have an account? <a href="register.php">Register Now</a>
                        </div>
                    </form>
                </div>
			</div>
        </div>
    </div>


    
    <footer class="site-footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">

            <div class="block-7">
              <h3 class="footer-heading mb-4">About <strong class="text-primary">Pharmative</strong></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quae reiciendis distinctio voluptates
                sed dolorum excepturi iure eaque, aut unde.</p>
            </div>

          </div>
          <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">Navigation</h3>
            <ul class="list-unstyled">
              <li><a href="#">Supplements</a></li>
              <li><a href="#">Vitamins</a></li>
              <li><a href="#">Diet &amp; Nutrition</a></li>
              <li><a href="#">Tea &amp; Coffee</a></li>
            </ul>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
                <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
                <li class="email">emailaddress@domain.com</li>
              </ul>
            </div>


          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;
              <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made
              with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank"
                class="text-primary">Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>

        </div>
      </div>
    </footer>
  </div>
    <script src="asset/assets/js/jquery-3.2.1.min.js"></script>
	<script src="asset/assets/js/popper.min.js"></script>
    <script src="asset/assets/js/bootstrap.min.js"></script>
    <script src="asset/assets/js/app.js"></script>
</body>
</html>