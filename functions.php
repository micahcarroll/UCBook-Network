<!--
Document with functions and variables used all throughout the website for various purposes
-->
<?php
# Basic functions and variables needed throughout website
require_once 'setup/setup_functions.php';

# Connection to specific database
function db_connect($db_hostname, $db_username, $db_password, $db_database){
  return mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
}
$db_connection = db_connect($db_hostname, $db_username, $db_password, $db_database);

# Table Creation with error processing
function createTable($db_hostname, $db_username, $db_password, $db_database, $parameters, $name){
  global $db_connection;

  # Query assembly and processing
  $sql = "CREATE TABLE " . $name . " (" . $parameters . ") ";
  if (mysqli_query($db_connection, $sql)){
    echo "Everything went fine. Table '" . $name . "' created <br>";
  } else {
    die("Failed to create table. <br>");
  }
}

# Handling for sql queries that insert/delete data into/from tables
function sql_query($sql){
  global $db_connection;
  if ($db_connection->query($sql) === TRUE) {
    echo "Item inserted or deleted successfully - book_table. <br>";
  } else {
    die("Failed to create database: " . $db_connection->error . "<br>");
  }
}

# Check if user actually logged in (otherwise redirect)
function logged_in(){
  if (isset($_SESSION['id'])) {
  } else {
    header('Location: index.php');
    die();
  }
}

# Sanitizes a string in order to prevent SQL injection
function sanitizeString($var)
{
  global $sql_connection;
  $var = strip_tags($var);
  $var = htmlentities($var);
  $var = stripslashes($var);
  return $sql_connection->real_escape_string($var);
}

# Checks if domain of given email address exists
function domain_exists($email, $record = 'MX'){
  list($user, $domain) = explode('@', $email);
  return checkdnsrr($domain, $record);
}

# Takes a string isbn input and checks if it makes sense
function check_isbn($isbn) {
  if ($isbn == "") {
    return TRUE;

  # Checks for 2001 ISBNs with 10 digits
  } elseif (strlen($isbn) == 10) {
    $sum = 0;
    $multipier = 10;
    for($x = 0; $x < 10; $x++){
      $sum = $sum + $isbn[$x] * $multipier;
      $multipier--;
    }
    # If sum is % 13 == 0, then ISBN is possibly valid, otherwise error
    if ($sum % 11 != 0){
      die("Your isbn code does not seem to be valid.");
    }

  # Checks for 2005 ISBNs with 13 digits
  } elseif (strlen($isbn) == 13) {
    $sum = 0;
    $switch = 0;

    for($x = 0; $x < 13; $x++){
      if ($switch == 0) {
        $sum = $sum + $isbn[$x] * 1;
      } else {
        $sum = $sum + $isbn[$x] * 3;
      }
      $switch = 1 - $switch;
    }
    # If sum is % 10 == 0, then ISBN is possibly valid, otherwise error
    if ($sum % 10 != 0){
      die("Your isbn code does not seem to be valid.");
    }
  } else {
    die("Invalid isbn code. Change or leave blank.");
  }
}

# Checks if a certain input field is empty and returns boolean value (superfluous?)
# 0 is EMPTY
function is_empty($input){
  if ($_POST[$input] == ""){
    return True;
  } else {
    return False;
  }
}

?>
