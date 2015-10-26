<?php
require_once "setup/setup_functions.php";

# Connection to specific database
function db_connect($db_hostname, $db_username, $db_password, $db_database){
  return mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
}

# Table Creation with error processing
function createTable($db_hostname, $db_username, $db_password, $db_database, $parameters, $name){
  global $db_connection;

  # Query assembly and processing
  $query = "CREATE TABLE " . $name . " (" . $parameters . ") ";
  if (mysqli_query($db_connection, $query)){
    echo "Everything went fine. Table '" . $name . "' created <br>";
  } else {
    die("Failed to create table. <br>");
  }
}

function sql_query($sql){
  global $db_connection;
  if ($db_connection->query($sql) === TRUE) {
    echo "Item inserted successfully. <br>";
  } else {
    die("Failed to create database: " . $db_connection->error . "<br>");
  }
}

$db_connection = db_connect($db_hostname, $db_username, $db_password, $db_database);

# Check if user actually logged in (otherwise redirect)
function logged_in(){
  if (isset($_SESSION['id'])) {
  } else {
    header('Location: index.php');
    die();
  }
}
?>
