<?php

function stringToMorse($string) {
    $morseCode = array(
        'A' => '.-',
        'B' => '-...', 
        'C' => '-.-.',
        'D' => '-..', 
        'E' => '.',
        'F' => '..-.', 
        'G' => '--.',
        'H' => '....', 
        'I' => '..', 
        'J' => '.---',
        'K' => '-.-', 
        'L' => '.-..',
        'M' => '--', 
        'N' => '-.', 
        'O' => '---',
        'P' => '.--.',
        'Q' => '--.-',
        'R' => '.-.',
        'S' => '...',
        'T' => '-',
        'U' => '..-', 
        'V' => '...-', 
        'W' => '.--', 
        'X' => '-..-',
        'Y' => '-.--',
        'Z' => '--..',
        '0' => '-----',
        '1' => '.----', 
        '2' => '..---', 
        '3' => '...--',
        '4' => '....-', 
        '5' => '.....', 
        '6' => '-....', 
        '7' => '--...',
        '8' => '---..',
        '9' => '----.'  /* here when i put '' => '' or "" => "" for space it give me error syntax*/
        );

    return strtr(strtoupper($string), $morseCode); //strtr — Translate characters or replace substrings and (strtoupper — Make a string uppercase
}
$string = 'bonjour de ma part'; //it translates this sentence to morseCode -...----..------..-.-. -... --.- .--..-.-.-
echo stringToMorse($string); 








?>

