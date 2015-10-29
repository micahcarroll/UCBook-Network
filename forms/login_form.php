<!--
Input form for login and underlying logic
-->
<?php
echo<<<_END
<form method="post" action="index.php">
  <input type="text" placeholder="Username or Email Address" name="username_email" /><br>
  <input type="password" placeholder="Password" name="password" /><br>
  <input type="submit" name="submit" value="Log In" />
</form>
_END;

# If input, process it
if(isset($_POST['username_email'])){
  include_once "functions.php";

  # Fetching data from login submission forms in HTML and sanitizing it
  $username_or_email = sanitizeString($_POST['username_email']);
  $password = sanitizeString($_POST['password']);

  # Gathering data of the account of the (one) possible match
  $sql = "SELECT id, Username, Password, Email FROM members
          WHERE Username = '$username_or_email' OR Email = '$username_or_email' AND Activated = '1' LIMIT 1";

  # Connecting to database to then peform query to fetch data corresponding to inputted username-password
  $query_result = mysqli_query($db_connection, $sql);

  # After we got the query result were are returning it as an array to access it.
  if ($query_result) {
    $row = mysqli_fetch_row($query_result);
    $userId = $row[0];
    $dbUsername = $row[1];
    $dbPassword = $row[2];
    $dbEmail = $row[3];
  }

  # If inserted username-password matches database, log in user
  if (($username_or_email == $dbUsername or $username_or_email == $dbEmail) && $password == $dbPassword) {
    # Setting session variables that are then needed to tell if user in logged in or not
    $_SESSION['username'] = $dbUsername;
    $_SESSION['id'] = $userId;
    header('Location: logged_in.php');
  } else {
    echo "Incorrect username or password.";
  }
}
?>
