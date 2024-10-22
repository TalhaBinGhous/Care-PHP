<?php
include 'database.php';
session_start(); // Make sure the session is started

// Fetch products and their categories
$sql_select = "SELECT *
    FROM products 
    INNER JOIN categories
    ON products.pcategory = categories.cid;";

$result = mysqli_query($conn, $sql_select);
$row_count = mysqli_num_rows($result);

// Handling form submission for adding items to the cart
if (isset($_POST['addToCart'])) {
    include 'authd.php';

    $uid = $_SESSION['uid'];
    $pid = $_POST['pid'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    // Validate input quantity
    if (!is_numeric($qty) || $qty < 1) {
        echo "Invalid quantity";
        exit();
    }

    $subtotal = $price * $qty;

    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO cart (pid, uid, price, qty, subtotal) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iidii", $pid, $uid, $price, $qty, $subtotal);

    if ($stmt->execute()) {
        // Redirect to the cart page upon successful insertion
        header('location: cartd.php');
    } else {
        echo "Error adding product to the cart.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Medicare</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
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
            <li><a href="indexd.php">Home</a></li>
            <li><a href="aboutd.php">About</a></li>
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



   
   <div class="site-section bg-light">
    <div class="container">
        <h3 class="text-center">Products</h3>
        <div class="row row-cols-1 row-cols-md-4 g-4 m-4">

            <?php
            if ($row_count > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="col">
                    <div class="card row row-cols-1 row-cols-md-3 g-3 m-3">
                        <img src="<?php echo "Admin/images/" . $row['pimg'] ?>" height="300px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['pname'] ?></h5>
                            <p class="card-text">
                                Price: Rs. <?php echo $row['pprice'] ?>
                            </p>
                            <!-- Add to Cart Form -->
                            <form method="post">
                                <input type="hidden" name="pid" value="<?php echo $row['pid'] ?>">
                                <input type="hidden" name="price" value="<?php echo $row['pprice'] ?>">
                                Quantity
                                <input type="number" name="qty" value="1" min="1" required> <br><br>
                                <input type="submit" class="btn btn-primary btn-lg btn-block" name="addToCart" value="Add To Cart">
                            </form>
                        </div>
                    </div>
                </div>
            <?php
                }
            } else {
                echo "<h4>No Products</h4>";
            }
            ?>
        </div>
    </div>
</div>
 <br>
        
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

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</html>