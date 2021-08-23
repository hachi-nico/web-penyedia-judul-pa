<?php

    $databaseHost = "sql213.epizy.com";
    $databaseName = "epiz_28922958_XXX";
    $databaseUsername = "epiz_28922958";
    $databasePassword = "tKJtj7SbcmOz";

    $conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

    if(!$conn) {
        die("Gagal terhubung dengan database: " . mysqli_connect_error());
    }

?>