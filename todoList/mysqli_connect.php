<?php #Script mysqli_connect.php

//This file contains the database access information.
//This file also establishes a connection to MYSQL,
//Selects the database, and sets the encoding

//Set the f=database access information
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', 'root');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'todoList');

//Make the connection:
$dbc=@mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' .mysqli_connect_error());

//Set the encoding...
mysqli_set_charset($dbc, 'utf8');

