<?php

$connect = mysql_connect("localhost", "root", "");

if($connect) {
  $query = "CREATE DATABASE entries";

  if (mysql_query($query)) {

    $query1 = "CREATE TABLE data (id MEDIUMINT NOT NULL AUTO_INCREMENT,
                                  SellerName varchar(100),
                                  BookName varchar(200),
                                  ISBN varchar(50),
                                  Department varchar(50),
                                  Course varchar(50),
                                  BookCond varchar(50),
                                  Comments varchar(50),
                                  Cost varchar(5),
                                  PRIMARY KEY (id))";
    mysql_select_db("entries", $connect);

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
