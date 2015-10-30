<!--
Book search form and redirection logic
-->
<?php
# HTML form for inputting book data for which user wants to search
echo <<<_END
<br>
<form action="" method="POST">
  <div class="container">
    <h1>Search Books</h1>
    <div class="col">
      <h4>Department and course: </h4><br>
      <input type="text" name='dep_course_search' id="dep_course_search" list='datalist'/>
    </div>
    <div class="col">
      <h4>ISBN: </h4><br>
      <input type="text" name="isbn"><br>
    </div>
    <div class="col">
      <h4>Title: </h4><br>
      <input type="text" name="title"><br>
    </div>
    <div class="col">
      <input name="search" type="submit" value="Search">
    </div>
  </div>
</form>
_END;

require_once "data/html_list.php";

# If input, process it
if(isset($_POST['search'])) {

  # List of parameters to check
  $inputs_parameters_array = array('dep_course_search', 'isbn', 'title');
  $number_of_search_inputs = 0;

  foreach ($inputs_parameters_array as $in){
    if (!is_empty($in)){
      $number_of_search_inputs += 1;
    }
  }

  # Checking that there is a search input (unsecure before sanitizing?)
  if ($number_of_search_inputs == 0) {
    die("You did not add any search parameters.");
  }

  # Sanitizing all inputs before processing (could be more elegant with foreach loop with dynamic variable creation)
  $dep_course_search = sanitizeString($_POST['dep_course_search']);
  $isbn_search = sanitizeString($_POST['isbn']);
  $title_search = sanitizeString($_POST['title']);

  # Basic SQL command to which we append
  $sql_command = "SELECT * FROM $db_book_table_name WHERE ";

  function add_and($number_of_remaining_search_inputs){
    if ($number_of_remaining_search_inputs > 0){
      global $sql_command;
      $sql_command = $sql_command . " AND ";
    }
  }

  # Appending a condition for each parameter (could be more elegant by adding them with a foreach loop)
  if ($dep_course_search != ""){
    $sql_command = $sql_command . "Department LIKE '%" . $dep_course_search . "%'";
    $number_of_search_inputs--;
    add_and($number_of_search_inputs);
  }

  if ($isbn_search != ""){
    $sql_command = $sql_command . "ISBN LIKE '%" . $isbn_search . "%'";
    $number_of_search_inputs--;
    add_and($number_of_search_inputs);
  }

  if ($title_search != ""){
    $sql_command = $sql_command . "BookName LIKE '%" . $title_search . "%'";
  }

  #die($sql_command);
  $_SESSION['current_search'] = $sql_command;
  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=search_result.php">';
}
?>
