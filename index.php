<!--
Welcome page, which includes list of available books, Log In and Sign Up capabilities, and a search engine
-->
<?php
session_start();
# Header of html page common to all
include_once "structures/header.php";
# Login form
include_once "forms/login_form.php";
# Sign up form
include_once "forms/signup_form.php";
# Book table with books availible
include_once "general_book_table.php";
# Search engine form and possible result table
include_once "forms/search_engine.php";
# Footer of html page
include_once "structures/footer.php";
?>
