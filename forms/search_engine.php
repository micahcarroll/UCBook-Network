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
      <input name="search" type="submit" value="Search">
    </div>
  </div>
</form>
_END;

require_once "data/html_list.php";

# If input, process it
if(isset($_POST['search'])) {
  $dep_course_search = sanitizeString($_POST['dep_course_search']);

  $_SESSION['current_search'] = $dep_course_search;
  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=search_result.php">';
}
?>
