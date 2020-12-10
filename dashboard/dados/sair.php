
<?php

session_start();
unset($_SESSION["user_portal"]);
header("location: ../../website/login/login.php?pg_id=1");
            
?>