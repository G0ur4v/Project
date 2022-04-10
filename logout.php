<!-- logout page -->
<?php
session_start();
unset($_SESSION["eid"]);
unset($_SESSION["ename"]);
header("Location:login.php");

?>
