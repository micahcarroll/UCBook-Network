<?php
# Checking connection and retrieving data from 'data' table
$query= "SELECT * FROM " . $db_book_table_name;
$result = mysqli_query($db_connection, $query);
$count = 0;
$buttons = array();

while ($row = mysqli_fetch_array($result)){
  if ($row['SellerName'] === $username){
    $count++;
    $seller_name = $row['SellerName'];
    $book_name = $row['BookName'];
    $isbn = $row['ISBN'];
    $dep = $row['Department'];
    $course = $row['Course'];
    $cond = $row['BookCond'];
    $price = $row['Cost'];
    $comments = $row['Comments'];
    $id = $row['id'];

# Unclear why if I shift echo and html lines right it won't work REDOTHIS WITH NEW FILES
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
  <td> $id <form action="" method="POST"><input name="delete[]" type="submit" value="Delete$count"></form></td>
</tr>
_END;
  $buttons[$count] = $id;
  }
}
?>
