<?php
/*
 * Logic file for the Caesar Cipher application.
 *
*/
# Include the helper functions by Susan Buck
require('includes/helpers.php');
# start up sessions to get results
session_start();

// Get the results of the encoding
if (isset($_SESSION['encoded'])) {
    $encoded = $_SESSION['encoded'];

  extract($encoded);
}

# clear session out
session_unset();