<?php
session_start();
ob_start();
session_unset();
echo "<script>window.location.href = '../user/login.php';</script>";
?>