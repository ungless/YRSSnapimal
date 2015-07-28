<?php

// Set up our MySQL connection data
    $host='localhost'; // Host name
    $username="root"; // Mysql username
    $password=""; // Mysql password
    $db_name="snapimal-animals"; // Database name
    $tbl_name="submissions"; // Table name

    // Connect to server and select database.
    $link = mysql_connect($host, $username, $password);
    // If connection doesn't work, return mysql error
    if (!$link) {
        die('Could not connect: ' . mysql_error());
    }
    // select database, if false, return error
    $db_selected = mysql_select_db($db_name, $link);
    if (!$db_selected) {
        die ('Cannot use database : ' . mysql_error());
    }
