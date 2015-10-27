<?php
include_once "functions.php";

# HTML form for inputting new book data
echo <<<_END
<br>
<form action="" method="POST">
  <div class="container">
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
      <input name="submit" type="submit" value="Submit">
    </div>
  </div>
</form>
_END;

# Gather data from HTML
if(isset($_POST['submit'])) {
  $name = $username;
  $title = sanitizeString($_POST['title']);
  $isbn = sanitizeString($_POST['isbn']);
  $department = sanitizeString($_POST['department']);
  $course = sanitizeString($_POST['course']);
  $condition = sanitizeString($_POST['condition']);
  $price = sanitizeString($_POST['price']);
  $comment = sanitizeString($_POST['comment']);

  # Inserting gathered data to availible books table
  $sql = "INSERT INTO " . $db_book_table_name . " (SellerName,
                                                      BookName,
                                                      ISBN,
                                                      Department,
                                                      Course,
                                                      BookCond,
                                                      Comments,
                                                      Cost)
                                        VALUES ('" . $name . "',
                                                '" . $title . "',
                                                '" . $isbn . "',
                                                '" . $department . "',
                                                '" . $course . "',
                                                '" . $condition . "',
                                                '" . $price . "',
                                                '" . $comment . "')";

  # Fetching timestamp of last created book to find bookID to distinguish between ideatically named books
  sql_query($sql);
  $sql = "SELECT id FROM book_data WHERE SellerName = '$name' ORDER BY TimeID DESC LIMIT 1";

  $query_result = mysqli_query($db_connection, $sql);
  # After we got the query result were are returning it as an array to access it.
  if ($query_result) {
    $row = mysqli_fetch_row($query_result);
    $book_ID = $row[0];
  } else {
    echo "Failiure in gathering a meaningful value of BookID";
  }

  $sql = "INSERT INTO " . $db_member_book_t_name . " (UserID,
                                                      Username,
                                                      BookID)
                                        VALUES ('" . $userId . "',
                                                '" . $username . "',
                                                '" . $book_ID . "')";

  # DOES/WOULD THIS CODE WORK? UNNECESSARY?
  if ($db_connection->query($sql) === TRUE) {
    echo "Item inserted or deleted successfully - member_table. <br>";
  } else {
    $sql = "DELETE FROM " . $db_book_table_name . " WHERE id = " . $book_ID;
    sql_query($sql);
    "Failed to create entry " . $db_connection->error . "<br>";
  }
  header('Location: logged_in.php');
}
?>
