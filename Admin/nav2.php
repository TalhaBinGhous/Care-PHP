<?php
if(!session_id()){
    session_start();
}
?>
<ul class="nav user-menu float-right">
                
                <?php
                if (isset($_SESSION['aid'])) {
                ?>
                
                    <li class="nav-item">
                        <a class="dropdown-item" aria-current="page" href="logout2.php">Logout</a>
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link active" aria-current="page" href="#"><span class="user-img">
							<img class="rounded-circle" src="ass/assets/img/user.jpg" width="24" alt="Admin">
							<span class="status online"></span>
						</span> &nbsp;<?php echo $_SESSION['username']; ?></a>
                    </li>
                <?php
                } 
                ?>
                   
                
            </ul>
       