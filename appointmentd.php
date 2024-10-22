<?php
include 'authd.php';
include 'database.php';

// Check if user is logged in
if (!isset($_SESSION['uid'])) {
    header("Location: logind.php?error=You must log in to view your cart.");
    exit();
}

if (isset($_POST['send'])) {
    // Validate required fields
    $required_fields = ['pn', 'pa', 'pe', 'ppn', 'd', 'dt', 'm'];
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            // Redirect back to the form with an error message
            header("Location: appointmentd.php?error=Please fill in all required fields.");
            exit();
        }
    }

    // Escape and sanitize inputs to prevent SQL Injection
    $patient_name = $_POST['pn'];
    $patient_age = $_POST['pa'];
    $patient_email = $_POST['pe'];
    $patient_phone = $_POST['ppn'];
    $doctor_id = $_POST['d'];
    $appointment_date = $_POST['dt'];
    $message = $_POST['m'];

    // Prepare SQL query to insert appointment data
    $stmt = $conn->prepare("INSERT INTO appointment (patient_name, patient_age, patient_email, patient_phone, dr_pid, appointment_date, msj)
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $patient_name, $patient_age, $patient_email, $patient_phone, $doctor_id, $appointment_date, $message);

    if ($stmt->execute()) {
        // Redirect on successful submission
        header('Location: confirmationd.php');
        exit();
    } else {
        // Error handling
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
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
            <li><a href="indexd.php">Home</a></li>
            <li ><a href="aboutd.php">About</a></li>
            <li ><a href="shopd.php">Store</a></li>
            <li>
              <li ><a href="doctord.php">Doctors</a></li>
              </li>
              <li><a href="blogd.php">Blog</a></li>
              <li class="active" ><a href="appointmentd.php">Appointment</a></li>
              
              <li><a href="add-doctor.php">Add Doctor</a></li>
  
              </ul>
            </li>
            
           
          </ul>
        </nav>
      </div>
      <div class="icons">
      <?php include 'navd.php'; ?>
      </div>
    </div>
  </div>
</div>







<div class="site-wrap">
  <!-- Include the header/navigation -->

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="h3 mb-5 text-black">Appointment</h2>
        </div>
        <div class="col-md-12">
          

        <form action="" method="post">
  <div class="p-3 p-lg-5 border">
    <div class="form-group row">
      <div class="col-md-6">
        <label for="c_fname" class="text-black">Patient Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="c_fname" name="pn" required>
      </div>
      <div class="col-md-6">
        <label for="c_lname" class="text-black">Patient Age <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="c_lname" name="pa" required>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-12">
        <label for="c_email" class="text-black">Patient Email <span class="text-danger">*</span></label>
        <input type="email" class="form-control" id="c_email" name="pe" required>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-12">
        <label for="c_phone" class="text-black">Patient Phone Number <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="c_phone" name="ppn" required>
      </div>
    </div>
    <div class="form-group">
    <label for="c_doctor" class="text-black">Doctor <span class="text-danger">*</span></label>
<select class="form-control" name="d" required>
    <?php
    // Fetch doctor ids and names from drproducts table
    $query = "SELECT dr_pid, dr_name FROM drproducts";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='{$row['dr_pid']}'>{$row['dr_name']}</option>";
    }
    ?>
</select>
</div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label class="text-black">Date <span class="text-danger">*</span></label>
          <input type="date" class="form-control" id="c_date" name="dt" required>
        </div>
      </div>
      
    </div>
    <div class="form-group row">
      <div class="col-md-12">
        <label for="c_message" class="text-black">Message <span class="text-danger">*</span></label>
        <textarea name="m" id="c_message" cols="30" rows="7" class="form-control" required></textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-lg-12">
        <input type="submit" class="btn btn-primary btn-lg btn-block" name="send" value="Send">
      </div>
    </div>
  </div>
</form>


        </div>
      </div>
    </div>
  </div>

  <!-- Footer section -->
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

<!-- Scripts -->
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

