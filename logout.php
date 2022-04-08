<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["ename"]);
header("Location:login.php");
?>