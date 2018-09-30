<?php
namespace PMA;
class CaesarCipher
{
# Properties

# Methods

# construct method
    public function __construct($textToEncode)
    {
        $this -> textToEncode = $textToEncode;
    }

    private function normalizeShiftDirection($shiftLength,$shiftDirection)
    {
        # fix length if the want to shift left
        if ($shiftDirection == 'left') {
            $shiftLength2 = 26 - $shiftLength;
        } else {
            $shiftLength2 = $shiftLength;
        }
        return $shiftLength2;
    }

    public function encodeText($shiftLength,$shiftDirection)
    {
        # account for the direction of the shift
        $shiftLength2 = $this->normalizeShiftDirection($shiftLength,$shiftDirection);

        # loop through each character in the input striing
        $encodedText = '';
        for ($pos = 0; $pos < strlen($this->textToEncode); $pos++) {
            $currentChar = ord($this->textToEncode[$pos]);

            # only encode alpha characters
            if (ctype_alpha($currentChar)) {

                # Encode upper and lower case
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
        return $encodedText;
    }



}