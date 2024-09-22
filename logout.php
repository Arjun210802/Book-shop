<?php
session_start();
session_destroy();
header("location:mainhome.html"); 
exit();
?>


<?php
    if ($isLoggedIn) {
        echo '<td><a href="logout.php" target="display">Logout</a></td>';
    }
?>