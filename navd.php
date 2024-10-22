<?php
if(!session_id()){
    session_start();
}
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
       
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                
                <?php
                if (isset($_SESSION['uid'])) {
                ?>
                   
          <div class="icons">
            
            <a href="cartd.php" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
              
            </a>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="logoutd.php">Logout</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link active text-primary" aria-current="page" href="#">welcome &nbsp;<?php echo $_SESSION['username']; ?></a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="logind.php">Login</a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>