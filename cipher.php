<?php
/*
 * This is the script that processes the data from the form in the file index.php
 * Process:
 * 1, Set up session and includes
 * 2. Get the data from the form request via GET
 * 3. Rotate the message
 * 4. Return the encoded data and redirect
 */

 # Start up session to store data results
 session_start();

 # Include the helper functions by Susan Buck
 require('includes/helpers.php');

 #Get the data from the form
 $textToEncode = $_GET['textToEncode'];
 $shiftLength = $_GET['shiftLength'];
 $shiftDirection = $_GET['shiftDirection'];

 #Ignore direction for now

$encodedText = "";
# loop through each character in the input striing

for ($pos = 0;$pos < strlen($textToEncode);$pos++) {

}