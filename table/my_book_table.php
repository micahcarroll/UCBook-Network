<!--
Table that displays the books created by the user
-->
<?php
# Basic functions
include_once "functions.php";
# Table header
include_once "table_header.php";
# Logic to populate table with current user's books
include_once "populate_my_table.php";
# Table footer
include_once "table_footer.php";
# Logic underlying sort capability
include_once "sort_capability.php"; # Could put sort capability in table footer

# MUST BE IMPROVED - Deletion logic
if ($_POST) {
  $the_posted_button_value = reset($_POST['delete']);
  $value = substr($the_posted_button_value, -1);

  $sql = "DELETE FROM " . $db_book_table_name . " WHERE id = " . $buttons[$value];
  sql_query($sql);
  # Do we want to delete past entries or keep them as info in the member-book table? Or store them in another table?

  # Auto - Update Table!!
}
?>
