<?php
# Login Form
echo<<<_END
<form method="post" action="index.php">
  <input type="text" placeholder="Username" name="username" /><br>
  <input type="password" placeholder="Password" name="password" /><br>
  <input type="submit" name="submit" value="Log In" />
</form>
_END;

if(isset($_POST['username'])){
  include_once "functions.php";

  # Fetching data from login submission forms in HTML
  $username = strip_tags($_POST['username']);
  $password = strip_tags($_POST['password']);

  $sql = "SELECT id, Username, Password FROM members
          WHERE Username = '$username' AND Activated = '1' LIMIT 1";

  # Connecting to database to then peform query to fetch data corresponding to inputted username-password
  $query_result = mysqli_query($db_connection, $sql);

  # After we got the query result were are returning it as an array to access it.
  if ($query_result) {
    $row = mysqli_fetch_row($query_result);
    $userId = $row[0];
    $dbUsername = $row[1];
    $dbPassword = $row[2];
  }

  # If inserted username-password matches database, log in user
  if ($username == $dbUsername && $password == $dbPassword) {
    # Setting session variables that are then needed to tell if user in logged in or not
    $_SESSION['username'] = $username;
    $_SESSION['id'] = $userId;
    header('Location: logged_in.php');
  } else {
    echo "Incorrect username or password.";
  }
}
?>
