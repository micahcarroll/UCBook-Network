<!--
Page with all information about the current user's account(!!) and that displays information about books currently selling
-->
<?php
# HTML header
include_once "structures/header.php";
# Basic functions
include_once "functions.php";
session_start();

# Checking that user is logged in
logged_in();
$userId = $_SESSION['id'];
$username = $_SESSION['username'];

# Account information (!!)
echo <<<_END
Welcome, $username. You are logged in. Your user ID is $userId.
If you want to go back to the marketpalce click <a href="logged_in.php">here</a>.
<form action="logout.php">
  <input type="submit" value="Log Out"/>
</form>
_END;

# Table of books added by current user
include_once "my_book_table.php";
# HTML footer
include_once "structures/footer.php";
?>
