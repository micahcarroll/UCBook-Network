<?php
# Login Form
echo<<<_END
<form method="post" action="index.php">
  <input type="text" placeholder="Email Address" name="email"/><br>
  <input type="text" placeholder="Username" name="newusername"/><br>
  <input type="password" placeholder="Password" name="newpassword"/><br>
  <input type="submit" name="submit" value="Sign Up" />
</form>
_END;

if(isset($_POST['newusername'])){
  include_once "functions.php";

  # Fetching data from login submission forms in HTML
  $username = strip_tags($_POST['newusername']);
  $password = strip_tags($_POST['newpassword']);
  $email = strip_tags($_POST['email']);

  # Inserting data into database
  $query = "INSERT INTO " . $db_member_table_name . "(Username,
                                                      Password,
                                                      Email,
                                                      Activated)
                                        VALUES (\"" . $username . "\",
                                                \"" . $password . "\",
                                                \"" . $email    . "\",
                                                        1           )";

  mysqli_query($db_connection, $query);
}
?>
