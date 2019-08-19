<?php
session_name("usr");
session_start();
session_destroy();
echo 'You have been logged out. <a href="index.php">Go back To Login</a>';
?>