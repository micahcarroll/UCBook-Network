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
  $username = sanitizeString($_POST['newusername']);
  $password = sanitizeString($_POST['newpassword']);
  $email = sanitizeString($_POST['email']);

  if(!domain_exists($email)) {
     die('Invalid email address.');
  }

  ## Check if username already taken and give feedback ##

  #Count how many users with same username
  $sql =  "SELECT COUNT(*) FROM " . $db_member_table_name .
                                      " WHERE Username = '" . $username . "'";

  $result = mysqli_query($db_connection, $sql);
  $row = mysqli_fetch_array($result);
  if ($row['COUNT(*)'] == 0) {
    # If no other user with same username exists, add him to database
    $query = "INSERT INTO " . $db_member_table_name . "(Username,
                                                        Password,
                                                        Email,
                                                        Activated)
                                          VALUES ('" . $username . "',
                                                  '" . $password . "',
                                                  '" . $email    . "',
                                                          1           )";

    mysqli_query($db_connection, $query);
    echo "Signup Successful, please Log In";

  } elseif ($row['COUNT(*)'] == 1){
    echo "Username already taken";
  } else {
    echo "Fatal error! More than one user with this Username!";
  }
}
?>
