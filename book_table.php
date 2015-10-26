<?php
include_once "login.php";

$connection = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
if ($connection){
    $query7="SELECT * FROM data";
    $result = mysqli_query($connection, $query7);

    while ($row = mysqli_fetch_array($result)){
        echo "<table class=\"table table-bordered\">";
        echo  "<thead>";
        echo    "<tr>";
        echo      "<th>Seller Name</th>";
        echo      "<th>Book Title</th>";
        echo      "<th>ISBN</th>";
        echo      "<th>Department</th>";
        echo      "<th>Course</th>";
        echo      "<th>Condition</th>";
        echo      "<th>Comments</th>";
        echo      "<th>Cost</th>";
        echo      "<th>Item number</th>";
        echo    "</tr>";
        echo  "</thead>";
        echo  "<tbody>";
        echo    "<tr>";
        echo      "<td>" . $row['SellerName'] . "</td>";
        echo      "<td>" . $row['BookName'] . "</td>";
        echo      "<td>" . $row['ISBN'] . "</td>";
        echo      "<td>" . $row['Department'] . "</td>";
        echo      "<td>" . $row['Course'] . "</td>";
        echo      "<td>" . $row['BookCond'] . "</td>";
        echo      "<td>" . $row['Cost'] . "</td>";
        echo      "<td>" . $row['Comments'] . "</td>";
        echo      "<td>" . $row['id'] . "</td>";
        echo    "</tr>";
        echo  "</tbody>";
        echo "</table>";
    }
} else {
  die('Failed to connect to mysqli: ' . mysqli_error());
}

?>
