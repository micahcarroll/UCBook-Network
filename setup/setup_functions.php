<!--
Contains basic setup functions and basic information about database that is used all throughout the website
-->
<?php
# Basic database info
$db_hostname = 'localhost';
$db_database = 'UCBook_Network';
$db_username = 'root';
$db_password = '';
$db_book_table_name = 'book_data';
$db_member_table_name = 'members';
$db_member_book_t_name = 'member_book';

# Connection to SQL
# NO ERROR HANDLING
function sql_connect($db_hostname, $db_username, $db_password){
  return new mysqli($db_hostname, $db_username, $db_password);
}
$sql_connection = sql_connect($db_hostname, $db_username, $db_password);

# Database creation with error handling
function create_db($name) {
  global $sql_connection;
  $sql = "CREATE DATABASE " . $name;
  if ($sql_connection->query($sql) === TRUE) {
    echo "Created database " . $name . " successfully." . "<br>";
  } else {
    die("Failed to create database: " . $sql_connection->error . "<br>");
  }
}
?>
