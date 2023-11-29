<?php

    $host = "localhost"; /* Host name */
    $user = "root"; /* User */
    $password = ""; /* Password */
    $dbname = "aptavis"; /* Database name */

    $konek = mysqli_connect($host, $user, $password,$dbname);
    // Check connection
    if (!$konek) {
        die("Connection failed: " . mysqli_connect_error());
    }

?>