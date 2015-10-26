<?php
include_once "db_login.php";

$connection = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

# Checking connection and retrieving data from 'data' table
if ($connection){
  $query="SELECT * FROM " . $db_book_table_name;
  $result = mysqli_query($connection, $query);

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

# Unclear why if I shift echo and html lines right it won't work
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
      <td> $price </td>
      <td> $comments </td>
      <td> $id </td>
    </tr>
  </tbody>
</table>
_END;
  }
} else {
  die('Failed to connect to mysqli: ' . mysqli_error());
}
?>
