<!-- 
1.    ALTER TABLE products
    ADD pimg VARCHAR(255);

2. create folder in your website folder (images)
-->
<?php
include 'auth2.php';
include 'conn.php';
if (!isset($_SESSION['aid'])) {
  header("Location: login2.php?error=You must log in to view your cart.");
  exit();
}
if (isset($_POST['addProd'])) {
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pcat = $_POST['pcat'];
    $filename = $_FILES['pimg']['name'];
    $tmpname = $_FILES['pimg']['tmp_name'];

    // echo "<pre>";
    // var_dump($_FILES["pimg"]);
    // echo "</pre>";

    $sql_insert = "INSERT INTO `products`(`pname`, `pprice`, `pcategory`, `pimg`) 
    VALUES ('$pname','$pprice','$pcat', '$filename')";

    $result = mysqli_query($conn, $sql_insert);

    if ($result) {

        move_uploaded_file($tmpname, 'images/' . $filename);

        // echo '<script>alert("Product Added Successfully")</script>';
        
        header('location: products.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">


<!-- index22:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="ass/assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="ass/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="ass/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="ass/assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="index-2.html" class="logo">
					<img src="ass/assets/img/logo.png" width="35" height="35" alt=""> <span>Preclinic</span>
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            
 

            <ul class="nav user-menu float-right">
            <li><a class="dropdown-item" href="index-2.php">Dashboard</a></li>
            <li><a class="dropdown-item" href="view-doctor.php">Doctors</a></li>
            <li><a class="dropdown-item" href="view-patient.php">Patients</a></li>
            <li><a class="dropdown-item" href="view_appointment.php">Appointment</a></li>
            <li><a class="dropdown-item" href="products.php">Products</a></li>
            <li><a class="dropdown-item" href="Order.php">Order</a></li>
            <li><?php include 'nav2.php'; ?></li>
					
						
					</div>
                </li>
            </ul>
            
        </div>
        
        <div class="page-wrapper">
        <div class="content">
          <div class="site-wrap">
    
    <!-- included nav -->
   
<!-- 
    <form method="post" enctype="multipart/form-data">
        <label for="">
            Product Name: <br>
            <input type="text" name="pname">
        </label><br><br>
        <label for="">
            Product Price: <br>
            <input type="text" name="pprice">
        </label><br><br>
        <label for="">
            Product Category: <br>

            </select>
        </label><br><br>

        <label for="">
            Product Image: <br>
            <input type="file" name="pimg">
        </label><br><br>

        <input type="submit" name="addProd" value="Add Product">
    </form> -->



    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            
          <div class="site-section">
      <div class="container">
      
    <a href="products.php">
    <input type="submit" class="btn btn-primary" value="Back">
    </a>
    </div></div>
    <div><label for="">.</label></div>
            <h2 class="h3 mb-5 text-black">Add Product Details</h2>
          </div>
          <div class="col-md-12">
    
            <form action="#" method="post" enctype="multipart/form-data">
    
              <div class="p-3 p-lg-5 border">
                
                <div class="form-group row">
                  <div class="col-md-12">
                  <label for="c_fname" class="text-black">Product Name: <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_fname" name="pname">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                  <label for="c_fname" class="text-black">Product Price:<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_fname" name="pprice">
                  </div>
                </div>
                <div class="form-group">
                <label for="c_country" class="text-black"> Product Category: <?php

$sql_select = "SELECT * FROM categories";

$result = mysqli_query($conn, $sql_select);

$row_count = mysqli_num_rows($result)

?>
<span class="text-danger">*</span></label>
                <select id="c_country" name="pcat" class="form-control">
                <?php
                if ($row_count > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <option value="<?php echo $row['cid'] ?>">
                            <?php echo $row['cname'] ?>
                        </option>
                <?php

                    }
                }
                ?>
                </select>
              </div>
              <div class="form-group row">
                  <div class="col-md-12">
                  <label for="c_fname" class="text-black">Product Image:<span class="text-danger">*</span></label>
                  <input type="file" class="form-control" id="c_fname" name="pimg">
                  </div>
               
              
    
                <!-- <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_message" class="text-black">Message </label>
                    <textarea name="c_message" id="c_message" cols="30" rows="7" class="form-control"></textarea>
                  </div>
                </div> -->
                <div class="form-group row">
                  <div class="col-md-12">
                  <label for="c_fname" class="text-black">.</label>
                  
                  </div>
                </div>
                <input type="submit" class="btn btn-primary btn-lg btn-block" name="addProd" value="Add Product">
              </div>
            </form>
          </div>
          <a href="categories.php">
          <input type="submit" href="doctors-categories.php" class="btn btn-primary btn-lg btn-block" value="Add Product Category">
          </a>
         
        </div>
      </div>
    </div>


    <div class="sidebar-overlay" data-reff=""></div>
    <script src="ass/assets/js/jquery-3.2.1.min.js"></script>
	<script src="ass/assets/js/popper.min.js"></script>
    <script src="ass/assets/js/bootstrap.min.js"></script>
    <script src="ass/assets/js/jquery.slimscroll.js"></script>
    <script src="ass/assets/js/Chart.bundle.js"></script>
    <script src="ass/assets/js/chart.js"></script>
    <script src="ass/assets/js/app.js"></script>

</body>

</html>