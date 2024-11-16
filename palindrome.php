<?php

function isPalindrome($word){
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

}

