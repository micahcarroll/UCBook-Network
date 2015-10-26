<?php
include_once "header.php";
session_start();

# Check if user actually logged in (otherwise redirect)
if (isset($_SESSION['id'])) {
  $userId = $_SESSION['id'];
  $username = $_SESSION['username'];
} else {
  header('Location: index.php');
  die();
}

# Logged in message
echo <<<_END
Welcome,  $username. You are logged in. Your user ID is $userId.
<form action="logout.php">
  <input type="submit" value="Log Out"/>
</form>
_END;

include_once "book_input_form.php";
include_once "book_table.php";
include_once "footer.php";
?>
