<!--
Logout function and redirection
-->
<?php
session_start();

# Destroys session, losing all SESSION information (logging user out)
session_destroy();

# Logout Page with link back to main index.php
include_once "structures/header.php";
echo <<<_END
  <a href="index.php">Click here to return to home page.</a>
_END;
include_once "structures/footer.php";
?>
