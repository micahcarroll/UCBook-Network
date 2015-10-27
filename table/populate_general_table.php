<?php
# Checking connection and retrieving data from 'data' table
$query= "SELECT * FROM " . $db_book_table_name;
$result = mysqli_query($db_connection, $query);

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
_END;
}
?>
