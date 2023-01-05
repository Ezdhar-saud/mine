<?php
session_start();
session_destroy();
session_unset();
unset($_SESSION['is_authenticated']);
header("Location:index.php");
?>