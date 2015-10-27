<?php
# HTML form for inputting new book data
echo <<<_END
<br>
<form action="" method="POST">
  <div class="container">
    <h1>Search Books</h1>
    <div class="col">
      <h4>Department: </h4><br>
      <select name="department">
        <option value="">Select Department</option>
        <option value="Math">Math</option>
        <option value="CompSci">CompSci</option>
        <option value="History">History</option>
        <option value="English">English</option>
      </select>
    </div>
    <div class="col">
      <h4>Course: </h4><br>
      <select name="course">
        <option value="">Select Course</option>
        <option value="1A">1A</option>
        <option value="61A">61A</option>
        <option value="30">30</option>
        <option value="R1A">R1A</option>
      </select>
    </div>
    <div class="col">
      <input name="search" type="submit" value="Search">
    </div>
  </div>
</form>
_END;

if(isset($_POST['search'])) {
  $department = sanitizeString($_POST['department']);
  $course = sanitizeString($_POST['course']);

  $sql_command = "SELECT * FROM " . $db_book_table_name . " WHERE Department LIKE '". $department ."'";
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
