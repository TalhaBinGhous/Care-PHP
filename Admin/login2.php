<?php
if(!session_id()){
    session_start();
}
include 'conn.php';

if(isset($_POST["login"])){
 
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM admin WHERE username = '$uname' AND pass = '$pass'";

    $result = mysqli_query($conn, $sql);

    $row_count = mysqli_num_rows($result);

    if($row_count == 1){

        $row = mysqli_fetch_assoc($result);

        $_SESSION['aid'] = $row['aid'];
        $_SESSION['username'] = $uname;
        header("location: index-2.php");
    }
    else {
        echo "Incorrect credentials";
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
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <!-- Ensure the form action points to the same page -->
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-signin">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" required>
                        </div>
                        <div class="form-group text-right">
                            <a href="forgot-password.html">Forgot your password?</a>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn" name="login">Login</button>
                        </div>
                        <div class="text-center register-link">
                            Don’t have an account? <a href="register2.php">Register Now</a>
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
