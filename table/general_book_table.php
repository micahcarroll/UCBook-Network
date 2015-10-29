<!--
File encompassing all parts and logic underlying the general book table of availible books
-->
<?php
# Including useful functions (probably unnecessarily)
include_once "functions.php";
# Table header with basic book info
include_once "table/table_header.php";
# Logic to display books in the general table
include_once "table/populate_general_table.php";
# Table footer component
include_once "table/table_footer.php";
# Sorting capability logic
include_once "table/sort_capability.php";
?>
