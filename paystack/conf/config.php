<?php
// Assuming you have a database connection
$yourDBConnection = mysqli_connect('localhost', 'root', '60813322@Admin', 'nacos');

if (!$yourDBConnection) {
    die('Database connection failed: ' . mysqli_connect_error());
}
