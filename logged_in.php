<!--
Main page for logged in users, where they will be able to see, search and add to the availible book list
-->
<?php
# Header of html page common to all
include_once "structures/header.php";
# Useful functions
include_once "functions.php";
session_start();

# Checking that user is logged in
logged_in();

# Gathering information about user
$userId = $_SESSION['id'];
$username = $_SESSION['username'];

# Logged in welcome message and logout function
echo <<<_END
Welcome, $username. You are logged in. Your user ID is $userId.
If you want to visit your profile click <a href="user_profile.php">here</a>.
<form action="logout.php">
  <input type="submit" value="Log Out"/>
</form>
_END;

# Form for adding new book to availible book list
include_once "forms/book_input_form.php";
# Search engine to filter books
include_once "forms/search_engine.php";
# General book table as in index.php
include_once "table/general_book_table.php";

# HTML page footer
include_once "structures/footer.php";
?>
