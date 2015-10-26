<?php
require_once 'db_login.php';

# Connection to database with error processing
$connection = new mysqli($db_hostname, $db_username, $db_password);
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

# Database creation with error processing
function create_db($name) {
  global $connection;
  $sql = "CREATE DATABASE " . $name;
  if ($connection->query($sql) === TRUE) {
    echo "Created database " . $name . " successfully." . "<br>";
  } else {
    die("Failed to create database: " . $connection->error . "<br>");
  }
}

# Table Creation with error processing
function createTable($db_hostname, $db_username, $db_password, $db_database, $parameters, $name){
  # Connect to database
  $db_connection = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

  # Query assembly and processing
  $query = "CREATE TABLE " . $name . " (" . $parameters . ") ";
  if (mysqli_query($db_connection, $query)){
    echo "Everything went fine. Table '" . $name . "' created <br>";
  } else {
    die("Failed to create table. <br>");
  }
}
?>
