<?php

include_once("sessionControl.php");

session_destroy();

header("location: login.php");

?>