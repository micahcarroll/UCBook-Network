<?php
# HTML form for inputting new book data
echo <<<_END
<br>
<form action="" method="POST">
  <div class="container">
    <h1>Search Books</h1>
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
      <input name="search" type="submit" value="Search">
    </div>
  </div>
</form>
_END;

if(isset($_POST['search'])) {
  $title = sanitizeString($_POST['title']);
  $isbn = sanitizeString($_POST['isbn']);
  $department = sanitizeString($_POST['department']);
  $course = sanitizeString($_POST['course']);
  $condition = sanitizeString($_POST['condition']);
  $price = sanitizeString($_POST['price']);
  $comment = sanitizeString($_POST['comment']);

  $inputs = array($isbn, $title);

  $sql_command = "SELECT * FROM " . $db_book_table_name . " WHERE BookName LIKE '". $title ."'";
  $result = mysqli_query($db_connection, $sql_command);

  while ($row = mysqli_fetch_array($result)){
      $seller_name = $row['SellerName'];
      $book_name = $row['BookName'];
      $isbn = $row['ISBN'];
      $dep = $row['Department'];
      $course = $row['Course'];
      $cond = $row['BookCond'];
      $price = $row['Cost'];
      $comments = $row['Comments'];
      $id = $row['id'];
echo <<<_END
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Seller Name</th>
      <th>Book Title</th>
      <th>ISBN</th>
      <th>Department</th>
      <th>Course</th>
      <th>Condition</th>
      <th>Comments</th>
      <th>Cost</th>
      <th>Item number</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td> $seller_name </td>
      <td> $book_name </td>
      <td> $isbn </td>
      <td> $dep </td>
      <td> $course </td>
      <td> $cond </td>
      <td> $comments </td>
      <td> $price </td>
      <td> $id </td>
    </tr>
  </tbody>
</table>
_END;
  }
}
?>
