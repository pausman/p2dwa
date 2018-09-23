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



# fix length if the want to shift left
if ($shiftDirection == 'left') {
    $shiftLength = 26 - $shiftLength;
}

# loop through each character in the input striing
$encodedText  = '';
for ($pos = 0; $pos < strlen($textToEncode); $pos++) {
    $currentChar = ord($textToEncode[$pos]);
# only encode alpha characters
    if (ctype_alpha($currentChar)) {
        if ($currentChar >= ord("a") and $currentChar <= ord("z")) {
            $baseA = ord('a');
        } else {
            $baseA = ord('A');
        }
        $encodedText[$pos] =
            chr(((($currentChar + $shiftLength + $baseA) % $baseA) % 26) + $baseA);
    } else {
# if not alpha just leave it in.
        $encodedText[$pos] = chr($currentChar);
    }
}

# Store the results
$_SESSION["encoded"] = [
    'encodedText' => $encodedText,
    'textToEncode' => $textToEncode,
    'shiftLength' => $shiftLength,
    'shiftDirection ' => $shiftDirection,
];

# Redirect to index.php
header('Location: index.php');
