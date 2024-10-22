<?php
include 'authd.php';
include 'database.php';
if (!isset($_SESSION['uid'])) {
  header("Location: logind.php?error=You must log in to view your cart.");
  exit();
}

if (isset($_POST['addProd'])) {
    // Escape special characters to prevent SQL errors
    $pname = mysqli_real_escape_string($conn, $_POST['dname']);
    $pprice = mysqli_real_escape_string($conn, $_POST['msj']);
    $pcat = mysqli_real_escape_string($conn, $_POST['pcat']);
    $filename = mysqli_real_escape_string($conn, $_FILES['pimg']['name']);
    $tmpname = $_FILES['pimg']['tmp_name'];

    // SQL query to insert the product details
    $sql_insert = "INSERT INTO `drproducts`(`dr_name`, `msj`, `dr_img`, `dr_cat_id`) 
    VALUES ('$pname','$pprice', '$filename','$pcat')";

    $result = mysqli_query($conn, $sql_insert);

    if ($result) {
        // Move the uploaded image to the 'images' folder
        move_uploaded_file($tmpname, 'images/' . $filename);
        
        // Redirect after successful insert
        header('location: doctord.php');
    } else {
        // Handle SQL error (optional, for debugging)
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!Doctype html>
<html class="no-js" lang="zxx">
<head>
<title>Medicare</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="shortcut icon" type="image/x-icon" href="images/logo.png"> <link rel="stylesheet" href="fonts/icomoon/style.css">

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
              <li  ><a href="appointmentd.php">Appointment</a></li>
              
              <li class="active"><a href="add-doctor.php">Add Doctor</a></li>
  
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


<div class="site-navbar py-2">


  <div class="container">
        <div class="row">
          <div class="col-md-12">
            
          <div class="site-section">
      <div class="container">
      
    
    </div></div>
    
            <h2 class="h3 mb-5 text-black">Add Doctor Details</h2>

    
          </div>
          <div class="col-md-12">
    
            <form action="#" method="post" enctype="multipart/form-data">
    
              <div class="p-3 p-lg-5 border">
                
                <div class="form-group row">
                  <div class="col-md-12">
                  <label for="c_fname" class="text-black">Doctor Name: <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_fname" name="dname" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_message" class="text-black">About </label>
                    <textarea name="msj" id="c_message" cols="30" rows="7" class="form-control" required></textarea>
                  </div>
                </div> 
                <div class="form-group">
                <label for="c_country" class="text-black"> Doctor Category: <?php

$sql_select = "SELECT * FROM drcategories";

$result = mysqli_query($conn, $sql_select);

$row_count = mysqli_num_rows($result)

?>
<span class="text-danger">*</span></label>
                <select id="c_country" name="pcat" class="form-control">
                <?php
                if ($row_count > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <option value="<?php echo $row['dr_id'] ?>">
                            <?php echo $row['dr_Categories'] ?>
                        </option>
                <?php

                    }
                }
                ?>
                </select>
              </div>
              <div class="form-group row">
                  <div class="col-md-12">
                  <label for="c_fname" class="text-black">Doctor Image:<span class="text-danger">*</span></label>
                  <input type="file" class="form-control" id="c_fname" name="pimg">
                  </div>
               
              
    
                
                <div class="form-group row">
                  <div class="col-md-12">
                  <label for="c_fname" class="text-black">.</label>
                  
                  </div>
                </div>
                <input type="submit" class="btn btn-primary btn-lg btn-block" name="addProd" value="Add Doctor">
              
              </div>
              
            </form>
            
          </div>
          <a href="doctors-categories.php">
          <input type="submit" href="doctors-categories.php" class="btn btn-primary btn-lg btn-block" value="Add Doctor Category">
          </a>
          <div>
            
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