<?php 
session_start();
session_unset($_SESSION['data']);
header("Location:../.");
?>