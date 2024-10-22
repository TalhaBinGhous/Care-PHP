<?php
include 'authd.php';
include 'database.php';

if (isset($_POST['order'])) {
    $uid = $_SESSION['uid'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    // Calculate total from cart
    $sql_total = "SELECT SUM(subtotal) AS total FROM cart WHERE uid = ?";
    $stmt_total = $conn->prepare($sql_total);
    $stmt_total->bind_param('i', $uid);
    $stmt_total->execute();
    $result_total = $stmt_total->get_result();
    $total = $result_total->fetch_assoc()['total'];

    // Insert into orders
    $sql_order = "INSERT INTO orders (uid, oname, ophone, oaddress, oemail, total) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt_order = $conn->prepare($sql_order);
    $stmt_order->bind_param('issssd', $uid, $name, $phone, $address, $email, $total);

    if ($stmt_order->execute()) {
        $oid = $stmt_order->insert_id;

        // Get cart items
        $sql_select_cart = "SELECT * FROM cart WHERE uid = ?";
        $stmt_cart = $conn->prepare($sql_select_cart);
        $stmt_cart->bind_param('i', $uid);
        $stmt_cart->execute();
        $result_cart = $stmt_cart->get_result();

        // Insert order items and delete from cart
        while ($row = $result_cart->fetch_assoc()) {
            $pid = $row['pid'];
            $price = $row['price'];
            $qty = $row['qty'];
            $subtotal = $row['subtotal'];

            $sql_insert_items = "INSERT INTO order_items (pid, oid, price, qty, subtotal) VALUES (?, ?, ?, ?, ?)";
            $stmt_items = $conn->prepare($sql_insert_items);
            $stmt_items->bind_param('iidid', $pid, $oid, $price, $qty, $subtotal);
            if ($stmt_items->execute()) {
                $cart_id = $row['cart_id'];
                $sql_delete_cart = "DELETE FROM cart WHERE cart_id = ?";
                $stmt_delete = $conn->prepare($sql_delete_cart);
                $stmt_delete->bind_param('i', $cart_id);
                $stmt_delete->execute();
            }
        }

        echo "<script>alert('Order Successful');</script>";
        header('Location: thankyoud.php');
        exit; // Prevent further execution
    } else {
        echo "<script>alert('Order failed');</script>";
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


    

    <div class="site-section">
      <div class="container">
        
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Billing Details</h2>
            <form  method="POST">
    


            <div class="p-3 p-lg-5 border">
            <div class="form-group row mb-5">
              
              
                <div class="col-md-12">
                  <label for="c_fname" class="text-black">Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_fname" name="name">
                </div>
    
    
              <br>
                <div class="col-md-12">
                  <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_address" name="address" placeholder="Street address">
                </div>
              
    
              
    
    
              
                <div class="col-md-12">
                  <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_email_address" name="email">
                </div>
                <div class="col-md-12">
                  <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_phone" name="phone" placeholder="Phone Number">
                </div>
              
    
                  <div class="form-group">
                    <button name="order" class="btn btn-primary btn-lg btn-block" >Place
                      Order</button>
                  </div>
                  </div>
                  </form>
                </div>
              </div>
            </div>
    
          </div>
        </div>
        <!-- </form> -->
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