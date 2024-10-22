<?php
// Include your database connection file
include 'database.php';

if (isset($_POST['addProd'])) {
    // Escape and sanitize form inputs to prevent SQL Injection
    $name = mysqli_real_escape_string($conn, $_POST['n']);
    $email = mysqli_real_escape_string($conn, $_POST['e']);
    $dob = mysqli_real_escape_string($conn, $_POST['b']);
    $gender = mysqli_real_escape_string($conn, $_POST['g']);
    $address = mysqli_real_escape_string($conn, $_POST['a']);
    $country = mysqli_real_escape_string($conn, $_POST['co']);
    $city = mysqli_real_escape_string($conn, $_POST['ci']);
    $state_province = mysqli_real_escape_string($conn, $_POST['sp']);
    $postal_code = mysqli_real_escape_string($conn, $_POST['pc']);
    $phone = mysqli_real_escape_string($conn, $_POST['p']);
    
    
    

    // Insert data into the database
    $sql_insert = "INSERT INTO `ppatients`(`patient_name`, `patient_email`, `dob`, `gender`, `address`, `country`, `city`, `state`, `postal_code`, `phone`)
     VALUES ('$name', '$email', '$dob', '$gender', '$address', '$country', '$city', '$state_province', '$postal_code', '$phone')";

$result = mysqli_query($conn, $sql_insert);

if ($result) {
   
    
    // Redirect after successful insert
    header('location: pr.php');
} else {
    // Handle SQL error (optional, for debugging)
    echo "Error: " . mysqli_error($conn);
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Medicare</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="shortcut icon" type="image/x-icon" href="images/logo.png"><link rel="stylesheet" href="fonts/icomoon/style.css">
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
              <li ><a href="doctor.php">Doctors</a></li>
              </li>
              <li><a href="blog.php">Blog</a></li>
              <li ><a href="appointment.php">Appointment</a></li>
              
              <li class="active"><a href="add-patient.php">Patient Registration</a></li>
        
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

<div class="site-wrap">
  <div class="site-navbar py-2">
    <!-- Navbar code here -->
  </div>

  <div class="site-wrap">
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-5 text-black">Patient Registration</h2>
          </div>
          <div class="col-md-12">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label class="text-black">Name <span class="text-danger">*</span></label>
                    <input class="form-control" name="n" type="text" required>
                  </div>
                  <div class="col-md-6">
                    <label class="text-black">Email <span class="text-danger">*</span></label>
                    <input class="form-control" type="email" name="e" required>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-6">
                    <label class="text-black">Date of Birth</label>
                    <input type="text" class="form-control datetimepicker" name="b">
                  </div>
                  <div class="col-md-6">
                    <label class="text-black">Gender</label>
                    <input class="form-control" type="text" name="g">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-6">
                    <label class="text-black">Address</label>
                    <input type="text" class="form-control" name="a">
                  </div>
                  <div class="col-md-6">
                    <label class="text-black">Country</label>
                    <input class="form-control" type="text" name="co">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-4">
                    <label class="text-black">City</label>
                    <input class="form-control" type="text" name="ci">
                  </div>
                  <div class="col-md-4">
                    <label class="text-black">State/Province</label>
                    <input class="form-control" type="text" name="sp">
                  </div>
                  <div class="col-md-4">
                    <label class="text-black">Postal Code</label>
                    <input class="form-control" type="text" name="pc">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-6">
                    <label class="text-black">Phone</label>
                    <input class="form-control" type="text" name="p">
                  </div>
                  
                  <div class="col-lg-12">
                  <label class="text-black">.</label>
                    <input type="submit" class="btn btn-primary btn-lg btn-block" name="addProd" value="Create Patient">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


    <!-- Footer content here -->
  </footer>



  
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
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/main.js"></script>

</body>
</html>
