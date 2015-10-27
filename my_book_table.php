<?php
include_once "functions.php";
include_once "table/table_header.php";
include_once "table/populate_my_table.php";
include_once "table/table_footer.php";

if ($count == 0) {
  echo "You have not added any books yet!";
}

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
