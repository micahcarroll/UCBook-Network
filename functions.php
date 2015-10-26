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

$db_connection = db_connect($db_hostname, $db_username, $db_password, $db_database);
?>
