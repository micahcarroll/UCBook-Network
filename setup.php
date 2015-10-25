<?php

$connect = mysql_connect("localhost", "root", "");

if($connect) {
  $query = "CREATE DATABASE comments";

  if (mysql_query($query)) {

    $query1 = "CREATE TABLE data (id MEDIUMINT NOT NULL AUTO_INCREMENT,
                                  Name varchar(20), 
                                  Comment varchar(500),
                                  PRIMARY KEY (id))";
    mysql_select_db("comments", $connect);

    if (mysql_query($query1)){
      echo "Everything went fine. Please delete setup.php now.";
    } else {
      die("Failed to create table: " . mysql_error());
    }

  } else {
    die("Failed to create database: " . mysql_error());
  }

}


?>
