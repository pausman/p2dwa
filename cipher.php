<?php
/*
 * This is the script that processes the data from the form in the file index.php
 * Process:
 * 1, Set up session and includes
 * 2. Get the data from the form request via Form class
 * 3. Rotate the message via the CaesarCipher class
 * 4. Return the encoded data and redirect
 */
# Setup the validation code
require 'Form.php';
require 'CaesarCipher.php';

use DWA\Form;
use PMA\CaesarCipher;

# Start up session to store data results
session_start();

# Include the helper functions by Susan Buck
require('includes/helpers.php');

#initialize form class
$form = new Form($_GET);

# Get the data from the form.
# use functions from form.php to make it more readable
$textToEncode = $form->get('textToEncode');
$shiftLength = $form->get('shiftLength');
$shiftDirection = $form->get('shiftDirection');

# initialize CaesarCipher class
$cipher = new CaesarCipher($textToEncode);

# validate
$submitted = $form->isSubmitted();
if ($submitted) {
    $errors = $form->validate(
        [
            'textToEncode' => 'required',
            'shiftLength' => 'required|numeric|min:1|max:26',
            'shiftDirection' => 'required'
        ]
    );
}

# initialize the class

# if no errors process the text
if (!$form->hasErrors) {
# encode string
    $encodedText = $cipher->encodeText($shiftLength, $shiftDirection);
}

# Store the results
$_SESSION["encoded"] = [
    'submitted' => $submitted,
    'errors' => $errors,
    'hasErrors' => $form->hasErrors,
    'encodedText' => $encodedText,
    'textToEncode' => $textToEncode,
    'shiftLength' => $shiftLength,
    'shiftDirection' => $shiftDirection,
];

# Redirect to index.php
header('Location: index.php');
