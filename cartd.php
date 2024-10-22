<?php

include 'authd.php';
include 'database.php';

// Check if user is logged in
if (!isset($_SESSION['uid'])) {
    header("Location: logind.php?error=You must log in to view your cart.");
    exit();
}

$uid = mysqli_real_escape_string($conn, $_SESSION['uid']);

$sql = "SELECT * FROM products JOIN cart ON cart.pid = products.pid WHERE cart.uid = '$uid'";
$result = mysqli_query($conn, $sql);
$row_count = mysqli_num_rows($result);

$totalprice = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Medicare</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="shortcut icon" type="image/x-icon" href="images/logo.png"><link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
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
            <li class="active"><a href="shopd.php">Store</a></li>
            <li>
              <li ><a href="doctord.php">Doctors</a></li>
              </li>
              <li><a href="blogd.php">Blog</a></li>
              <li ><a href="appointmentd.php">Appointment</a></li>
              
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

  <?php if ($row_count > 0) { ?>
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Remove</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $totalprice += $row['subtotal'];
                ?>
                  <tr>
                    <td class="product-thumbnail">
                      <img src="<?php echo 'Admin/images/' . $row['pimg'] ?>" alt="Image" class="img-fluid" height="100px">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $row['pname'] ?></h2>
                    </td>
                    <td><?php echo $row['pprice'] ?></td>
                    <td><?php echo $row['qty'] ?></td>
                    <td><?php echo $row['subtotal'] ?></td>
                    <td><a href="deleted.php?id=<?php echo $row['cart_id']; ?>" class="btn btn-success">Delete</a></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="col-md-6 pl-5">
          <div class="row justify-content-end">
            <div class="col-md-7">
              <div class="row">
                <div class="col-md-12 text-right border-bottom mb-5">
                  <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                </div>
              </div>
              <div class="row mb-5">
                <div class="col-md-6">
                  <span class="text-black">Total</span>
                </div>
                <div class="col-md-6 text-right">
                  <strong class="text-black"><?php echo $totalprice; ?></strong>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-primary btn-lg btn-block" onclick="window.location='checkoutd.php'">Proceed To Checkout</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } else { ?>
    <h3>Your cart is empty.</h3>
  <?php } ?>

  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="block-7">
            <h3 class="footer-heading mb-4">About <strong class="text-primary">Pharmative</strong></h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
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