<?php
include_once "login.php";
echo <<<_END
<br>
<form action="" method="POST">
  <div class="container">
    <div class="col">
      <h4>Your Name (optional):</h4><br>
      <input type="text" name="name"><br>
    </div>
    <div class="col">
      <h4>Book Title: </h4><br>
      <input type="text" name="title"><br>
    </div>
    <div class="col">
      <h4>ISBN: </h4><br>
      <input type="text" name="isbn"><br>
    </div>
    <div class="col">
      <h4>Department: </h4><br>
      <input type="text" name="department"><br>
    </div>
    <div class="col">
      <h4>Course: </h4><br>
      <input type="text" name="course"><br>
    </div>
    <div class="col">
      <h4>Condition: </h4><br>
      <input type="text" name="condition"><br>
    </div>
    <div class="col">
      <h4>Selling Price: </h4><br>
      <input type="text" name="price"><br>
    </div>
    <div class="col">
      <h4>Comments: </h4><br>
      <textarea name="comment" rows="1" cols = "40"></textarea><br>
      <br>
      <input type="submit" value="Submit">
    </div>
  </div>
</form>
_END;

require_once 'login.php';
if(isset($_POST['name'])) {
  $name = $_POST['name'];
  $title = $_POST['title'];
  $isbn = $_POST['isbn'];
  $department = $_POST['department'];
  $course = $_POST['course'];
  $condition = $_POST['condition'];
  $price = $_POST['price'];
  $comment = $_POST['comment'];
  $connection = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

  # Parsing happens here

  if ($connection){

    $query = "INSERT INTO data(SellerName,
                              BookName,
                              ISBN,
                              Department,
                              Course,
                              BookCond,
                              Comments,
                              Cost)
              VALUES (\"" . $name . "\",
                      \"" . $title . "\",
                      \"" . $isbn . "\",
                      \"" . $department . "\",
                      \"" . $course . "\",
                      \"" . $condition . "\",
                      \"" . $price . "\",
                      \"" . $comment . "\")";

    if(mysqli_query($connection, $query)){
      echo "<br>";
    } else {
      die('Failed: ' . mysqli_error());
    }

  } else {
    die('Failed to connect to mysqli: ' . mysqli_error());
  }
}
?>
