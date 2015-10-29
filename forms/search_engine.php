<!--
Book search form, logic and table
-->
<?php
# HTML form for inputting book data for which user wants to search
echo <<<_END
<br>
<form action="" method="POST">
  <div class="container">
    <h1>Search Books</h1>
    <div class="col">
      <h4>Department: </h4><br>
      <input type="text" name='department' list='datalist'/>
    </div>
    <div class="col">
      <input name="search" type="submit" value="Search">
    </div>
  </div>
</form>
_END;

require_once "html_list.php";

# If input, process it
if(isset($_POST['search'])) {
  $department = sanitizeString($_POST['department']);
  $count = 0;

  $sql_command = "SELECT * FROM " . $db_book_table_name . " WHERE Department LIKE '". $department ."'";
  $result = mysqli_query($db_connection, $sql_command);

  # For each book found, create TABLE(!!)
  while ($row = mysqli_fetch_array($result)){
      $count ++;
      $seller_name = $row['SellerName'];
      $book_name = $row['BookName'];
      $isbn = $row['ISBN'];
      $dep = $row['Department'];
      $cond = $row['BookCond'];
      $price = $row['Cost'];
      $comments = $row['Comments'];
      $id = $row['id'];

# Table HTML
echo <<<_END
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Seller Name</th>
      <th>Book Title</th>
      <th>ISBN</th>
      <th>Department</th>
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
      <td> $cond </td>
      <td> $comments </td>
      <td> $price </td>
      <td> $id </td>
    </tr>
  </tbody>
</table>
_END;
  }

  # If no results, give feedback
  if ($count == 0){
    echo "I'm sorry, it seems like there were no results in our database that matched your request.";
  }
}
?>
