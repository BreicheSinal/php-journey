<?php

function mergeSort($array) {
    $arrLength = count( $array );

    // array with one value is already sorted | base case
    if ($arrLength < 2)
        return $array;

        
    // spliting the array in half
    $left = [];
    $mid = floor($arrLength / 2);
    $right = [];

    // looping to copy left half of array
    for ($i = 0; $i < $mid; $i++) {
        $left[] = $array[$i];
    }

    // looping to copy right half of array
    for ($i = $mid; $i < $arrLength; $i++) {
        $right[] = $array[$i];
    }

        // sorting arrays recursively
        $left = mergeSort($left);
        $right = mergeSort($right);
    
}
