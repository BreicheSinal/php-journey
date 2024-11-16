<?php

header('Content-Type: application/json');

function isPalindrome($word){
    $word = trim($word); // trimming to avoid spaces && newline
    $wordLength = 0;
    $reversedWord='';

    // finding the length of the word
    while(isset($word[$wordLength])){
        $wordLength++;
    }

    // making the reverse of the word
    for ($i = $wordLength - 1; $i >= 0; $i--){
        $reversedWord .= $word[$i];
    }

     // comparing the word with its reversed
     for ($y = 0; $y < $wordLength; $y++){
        if($word[$y] !== $reversedWord[$y]){
            echo json_encode([
                    "input" => $word,
                    "message" => "WORD IS NOT A PALINDROME :("
                ]);
            return;
        }
    }
    echo json_encode([
        "input" => $word,
        "message" => "WORD IS A PALINDROME :)"
    ]);
}

if (isset($_GET['inputWord'])) {
    $inputWord = $_GET['inputWord'];

    isPalindrome(strtolower($inputWord));
} else {
    echo json_encode([
        "error" => "PLEASE ENTER A WORD! :O"
    ]);
}
