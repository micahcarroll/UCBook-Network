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
If you want to visit your profile click <a href="user_profile.php">here</a>.
<form action="logout.php">
  <input type="submit" value="Log Out"/>
</form>
_END;

include_once "forms/book_input_form.php";
include_once "book_table.php";

include_once "forms/search_engine.php";
include_once "structures/footer.php";
?>
