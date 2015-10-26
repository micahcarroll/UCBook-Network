<?php
include_once "functions.php";

# Checking connection and retrieving data from 'data' table
# NOT ACTUALLY USING MEMEBR-BOOK TABLE
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
      <td> $id <form action="" method="POST"><input name="delete[]" type="submit" value="Delete$count"></form></td>
    </tr>
  </tbody>
</table>
_END;
$buttons[$count] = $id;
  } else {
    echo "No books for you!";
  }
}
#print_r($buttons);

#MUST BE IMPROVED
if ($_POST) {
  $the_posted_button_value = reset($_POST['delete']);
  $value = substr($the_posted_button_value, -1);

  $sql = "DELETE FROM " . $db_book_table_name . " WHERE id = " . $buttons[$value];
  sql_query($sql);
  header('Location: user_profile.php');

  # Do we want to delete past entries or keep them as info in the member-book table?
}
?>
