<?php 

include 'conn.php';

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
        $stmt = $conn->prepare("INSERT INTO `admin`( `username`, `firstname`, `lastname`, `email`, `pass`) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $uname , $fname , $lname, $email, $pass);

        // Execute the statement
        if($stmt->execute()){
            header('location: login2.php');
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
    <link rel="shortcut icon" type="image/x-icon" href="ass/assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link rel="stylesheet" type="text/css" href="ass/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="ass/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="ass/assets/css/style.css">
</head>

<body>
    <div class="main-wrapper  account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-signin">
                        <div class="account-logo">
                            <a href="index-2.html"><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
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
                            Already have an account? <a href="login2.php">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="ass/assets/js/jquery-3.2.1.min.js"></script>
    <script src="ass/assets/js/popper.min.js"></script>
    <script src="ass/assets/js/bootstrap.min.js"></script>
    <script src="ass/assets/js/app.js"></script>
</body>

</html>
