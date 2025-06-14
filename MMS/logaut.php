<?php
session_start(); // ✅ Corrected typo here
include_once('config.php');

session_destroy();

// Redirect to login page
header("Location: login.php");
exit(); // ✅ Recommended after header redirection
?>