<?php

session_start();
unset($_SESSION['usertype'],$_SESSION['user']);
header("Location: login.php");

?>