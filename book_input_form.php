<?php
include_once "functions.php";

# HTML form for inputting new book data
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

# Gather data from HTML
if(isset($_POST['name'])) {
  $name = $_POST['name'];
  $title = $_POST['title'];
  $isbn = $_POST['isbn'];
  $department = $_POST['department'];
  $course = $_POST['course'];
  $condition = $_POST['condition'];
  $price = $_POST['price'];
  $comment = $_POST['comment'];

  # Parsing should happen here

  # Inserting gathered data to database
  $query = "INSERT INTO " . $db_book_table_name . " (SellerName,
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

  if(mysqli_query($db_connection, $query)){
    echo "<br>";
  } else {
    die('Failed: ' . mysqli_error());
  }
}
?>
