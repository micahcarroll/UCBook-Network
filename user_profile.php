<?php
include_once "structures/header.php";
include_once "functions.php";
session_start();

logged_in();
$userId = $_SESSION['id'];
$username = $_SESSION['username'];

# Logged in message
echo <<<_END
Welcome, $username. You are logged in. Your user ID is $userId.
If you want to go back to the marketpalce click <a href="logged_in.php">here</a>.
<form action="logout.php">
  <input type="submit" value="Log Out"/>
</form>
_END;

include_once "my_book_table.php";
include_once "structures/footer.php";
?>
