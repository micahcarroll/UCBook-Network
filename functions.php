<?php
require_once 'login.php';

function create_db($db_name) {
  $query = "CREATE DATABASE " . $db_name;
  if (mysql_query($query)) {
    echo "Database created successfully <br>";
  } else {
    die("Failed to create database: " . mysql_error() . "<br>");
  }
}

function connect($db_hostname, $db_username, $db_password) {
  if (mysql_connect($db_hostname, $db_username, $db_password)) {
    return mysql_connect($db_hostname, $db_username, $db_password);
  } else {
    die("Failed to connect: " . mysql_error() . "<br>");
  }
}

?>
