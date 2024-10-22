<?php
include 'authd.php';
include 'database.php';
if (!isset($_SESSION['uid'])) {
    header("Location: logind.php?error=You must log in to view your cart.");
    exit();
}
if (isset($_POST['addCat'])) {
    $dname = $_POST['dname'];

    $sql = "INSERT INTO `drcategories`(`dr_Categories`) VALUES ('$dname')";

    $result = mysqli_query($conn, $sql) or die('fail to insert category');
}
?>
<!Doctype html>
<html class="no-js" lang="zxx">
<head>
<title>Medicare</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

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
      
    <a href="add-doctor.php">
    <input type="submit" class="btn btn-primary" value="Back">
    </a>
    </div></div>
    <div><label for="">.</label></div>
    
    <h3 class="text-black">Add Doctors Category</h3>
    <form method="post">
    <div class="form-group row">
    <div class="col-md-12">
        <label for="" class="text-black">
            Category Name:
            <input type="text" name="dname" class="form-control">
        </label>
        
        <input type="submit" name="addCat" value="Add Category" class="btn-primary">
        
        </div>
                </div>
        </form>

    <!-- View Category -->
    <h3 class="text-black">Categories</h3>
    <?php
    $sql = "SELECT * FROM drcategories";

    $result = mysqli_query($conn, $sql);

    $row_count = mysqli_num_rows($result);

    if ($row_count > 0) {
    ?>
        
<div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-4" method="post">
            <div class="site-blocks-table">
        <table class="table table-bordered">
            <tr>
                <th class="text-black">#</th>
                <th class="text-black">Category Name</th>
                
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {

            ?>
                <tr>
                    <td><?php echo $row["dr_id"]; ?></td>
                    <td><?php echo $row["dr_Categories"]; ?></td>
                   
                </tr>
            <?php } ?>
        </table>
    <?php }
    else{
        echo "<h3>No Records</h3>";
    } ?>


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