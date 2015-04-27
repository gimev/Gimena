<?php
session_start();
unset($_SESSION['id']);
echo "<script>window.location.href='index.php';</script>";


?>