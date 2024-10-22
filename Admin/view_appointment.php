<?php
include 'auth2.php';
include 'conn.php';
if (!isset($_SESSION['aid'])) {
    header("Location: login2.php?error=You must log in to view your cart.");
    exit();
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
    



    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

    <h3 class="text-black">View Patient Appointment Details</h3>

    <?php

    
$sql = "SELECT *
FROM appointment INNER JOIN drproducts
ON appointment.dr_pid = drproducts.dr_pid;";

$result = mysqli_query($conn, $sql);

$row_count = mysqli_num_rows($result);

    if ($row_count > 0) {
    ?>


<div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
        <table class="table table-bordered">
            <tr>
            <th class="text-black">#</th>
              <th class="text-black">Patient Name</th>
              <th class="text-black">Patient Age</th>
              <th class="text-black">Patient Email</th>
              <th class="text-black">Patient Phone</th>
              <th class="text-black">Appointment Date</th>
              
              <th class="text-black">Msj</th>
              <th class="text-black">Doctor Id</th>
              <th class="text-black">Remove</th>

              
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {

            ?>
                <tr>
                    <td class="product"><?php echo $row["patient_id"]; ?></td>
                    <td><?php echo $row["patient_name"]; ?></td>
                    <td><?php echo $row["patient_age"]; ?></td>
                    <td><?php echo $row["patient_email"]; ?></td>
                    <td><?php echo $row["patient_phone"]; ?></td>
                    <td><?php echo $row["appointment_date"]; ?></td>
                    
                    <td><?php echo $row["msj"]; ?></td>
                    <td><?php echo $row["dr_pid"]; ?></td>
                    <td><a href="deleteApp.php?id=<?php echo $row['patient_id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php } ?>
        </table>
        
        </div>
          </form>
        </div></div></div>
    <?php } else {
        echo "<h3>No Records</h3>";
    } ?>

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
    
   