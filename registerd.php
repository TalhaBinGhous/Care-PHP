<?php 
include 'database.php';

if(isset($_POST["register"])){
    $uname = $_POST['uname'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    

    // Basic validation
    if(empty($uname) || empty($fname) || empty($lname) || empty($email) || empty($pass)) {
        $e = 'All fields are required.';
    } else {
        
        

        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO `users` (`username`, `firstname`, `lastname`, `email`, `pass`) VALUES (?, ?, ?, ?,?)");
        $stmt->bind_param("sssss", $uname , $fname , $lname, $email, $pass);

        // Execute the statement
        if($stmt->execute()){
            header('location: logind.php');
            exit();
        } else {
            $e = 'Record Not Inserted: ' . $stmt->error;
        }
        $stmt->close();
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

  <link href="images/logo.png" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="asset/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="asset/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="asset/assets/css/style.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
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
          <li class="active"><a href="indexd.php">Home</a></li>
            <li><a href="aboutd.php">About</a></li>
            <li ><a href="shopd.php">Store</a></li>
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
      <?php include 'nav.php'; ?>
      </div>
    </div>
  </div>
</div>


    <div class="main-wrapper account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <form class="form-signin" method="POST" action="">
                       
                        <?php if (isset($e)) echo "<div class='alert alert-danger'>$e</div>"; ?>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="uname" required>
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="fname" required>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lname" required>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="pass" required>
                        </div>
                        
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" name="register" type="submit">Register</button>
                        </div>
                        <div class="text-center login-link">
                            Already have an account? <a href="logind.php">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="asset/assets/js/jquery-3.2.1.min.js"></script>
    <script src="asset/assets/js/popper.min.js"></script>
    <script src="asset/assets/js/bootstrap.min.js"></script>
    <script src="asset/assets/js/app.js"></script>
</body>
</html>
