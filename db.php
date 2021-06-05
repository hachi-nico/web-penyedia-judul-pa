<?php

$databaseHost = 'localhost';
$databaseName = 'project_wppl_db';
$databaseUsername = 'nico';
$databasePassword = 'Adminm@ri@db';
 
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

if(!$conn) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>