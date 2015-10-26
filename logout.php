<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

# Destroys session, losing all SESSION information
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
  <title> Logout Page </title>
</head>
<body>
  <a href="index.php">Click here to return to home page.</a>
</body>
</html>
