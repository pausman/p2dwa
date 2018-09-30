<?php
/*
 * This is the script that processes the data from the form in the file index.php
 * Process:
 * 1, Set up session and includes
 * 2. Get the data from the form request via GET
 * 3. Rotate the message
 * 4. Return the encoded data and redirect
 */
# Setup the validation code
require 'Form.php';
use DWA\Form;
$form = new Form($_GET);

# Start up session to store data results
session_start();

# Include the helper functions by Susan Buck
require('includes/helpers.php');

# Get the data from the form.
# use functions from form.php to make it more readable
$textToEncode = $form->get('textToEncode');
$shiftLength = $form->get('shiftLength');
$shiftDirection = $form->get('shiftDirection');

# validate
# texttoEncode can be anything but is required
$submitted = $form->isSubmitted();
if ($submitted) {
    $errors = $form->validate(
        [
            'textToEncode' => 'required',
            'shiftLength' => 'required|numeric|min:1|max:2',
        ]
    );
}


# if no errors process the text
if(!$form->hasErrors) {
# fix length if the want to shift left but return the original length
    if ($shiftDirection == 'left') {
        $shiftLength2 = 26 - $shiftLength;
    } else {
        $shiftLength2 = $shiftLength;
    }

# loop through each character in the input striing
    $encodedText = '';
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
                chr(((($currentChar + $shiftLength2 + $baseA) % $baseA) % 26) + $baseA);
        } else {
# if not alpha just leave it in.
            $encodedText[$pos] = chr($currentChar);
        }
    }
}

# Store the results
$_SESSION["encoded"] = [
    'submitted' => $submitted,
    'errors' =>$errors,
    'hasErrors' => $form->hasErrors,
    'encodedText' => $encodedText,
    'textToEncode' => $textToEncode,
    'shiftLength' => $shiftLength,
    'shiftDirection' => $shiftDirection,
];

# Redirect to index.php
header('Location: index.php');
