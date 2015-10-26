<?php
include_once "header.php";

# Login Form
echo<<<_END
<form method="post" action="index.php">
  <input type="text" placeholder="Username" name="username" /><br>
  <input type="password" placeholder="Password" name="password" /><br>
  <input type="submit" name="submit" value="Log In" />
</form>
_END;

session_start();

if(isset($_POST['username'])){
  include_once("connection.php");

  $username = strip_tags($_POST['username']);
  $password = strip_tags($_POST['password']);

  $sql = "SELECT id, username, password FROM members
          WHERE username = '$username' AND activated = '1' LIMIT 1";

  $query = mysqli_query($dbCon, $sql);

  # After we got the query result were are returning it as an array to access it.
  if ($query) {
    $row = mysqli_fetch_row($query);
    $userId = $row[0];
    $dbUsername = $row[1];
    $dbPassword = $row[2];
  }

  if ($username == $dbUsername && $password == $dbPassword) {
    #Setting session variables
    $_SESSION['username'] = $username;
    $_SESSION['id'] = $userId;
    header('Location: logged_in.php');
  } else {
    echo "Incorrect username or password.";
  }
}

include_once "book_table.php";
include_once "footer.php";
?>
