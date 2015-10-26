<?php
require_once 'functions.php';

# Create database and give feedback
create_db($db_database);

# Defining and creating database tables for books and members
$book_data_table_parameters = "id MEDIUMINT NOT NULL AUTO_INCREMENT,
                              SellerName varchar(100),
                              BookName varchar(200),
                              ISBN varchar(50),
                              Department varchar(50),
                              Course varchar(50),
                              BookCond varchar(50),
                              Comments varchar(50),
                              Cost varchar(5),
                              PRIMARY KEY (id)";

createTable($db_hostname, $db_username, $db_password, $db_database, $book_data_table_parameters, $db_book_table_name);

$members_table_parameters = "id MEDIUMINT NOT NULL AUTO_INCREMENT,
                              Username varchar(100),
                              Password varchar(200),
                              Activated varchar(50),
                              PRIMARY KEY (id)";

createTable($db_hostname, $db_username, $db_password, $db_database, $members_table_parameters, $db_member_table_name);
?>
