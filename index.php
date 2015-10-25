# // https://www.youtube.com/watch?v=KGmEZY6DBhw
<html>
  <head>
     <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <font color="blue">asd</font>
    <form action="" method="POST">
      Name: <br>
      <input type="text" name="name"><br>
      Comment: <br>
      <textarea name="comment" rows="10" cols = "40"></textarea><br>
      <input type="submit" value="Submit">
    </form>
  </body>
</html>

<?php
if($_POST) {
  $name = $_POST['name'];
  $comment = $_POST['comment'];
  $connection = mysqli_connect("localhost", 'root', '', 'comments');

  if ($connection){

    $query = "INSERT INTO data(Name, Comment) VALUES (\"" . $name . "\", \"" . $comment . "\")";

    if(mysqli_query($connection, $query)){
      echo "<br>";
    } else {
      die('Failed: ' . mysqli_error());
    }

  } else {
    die('Failed to connect to mysqli: ' . mysqli_error());
  }
}

$connection = mysqli_connect("localhost", 'root', '', 'comments');
if ($connection){
    $query7="SELECT * FROM data";
    $result = mysqli_query($connection, $query7);

    while ($row = mysqli_fetch_array($result)){
        echo "<table class=\"table table-bordered\">";
        echo  "<thead>";
        echo    "<tr>";
        echo      "<th>Firstname</th>";
        echo      "<th>Lastname</th>";
        echo      "<th>Id</th>";
        echo    "</tr>";
        echo  "</thead>";
        echo  "<tbody>";
        echo    "<tr>";
        echo      "<td>" . $row['Name'] . "</td>";
        echo      "<td>" . $row['Comment'] . "</td>";
        echo      "<td>" . $row['id'] . "</td>";
        echo    "</tr>";
        echo  "</tbody>";
        echo "</table>";
    }
} else {
  die('Failed to connect to mysqli: ' . mysqli_error());
}

?>
