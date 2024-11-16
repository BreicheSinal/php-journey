<?php

header('Content-Type: application/json');

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
    
        // merging/sorting arrays
    $leftLength = count($left);
    $rightLength = count($right);

    $result = [];
    $leftPtr = 0;
    $rightPtr = 0;

    // comparing/merging both arrays
    while ($leftPtr < $leftLength && $rightPtr < $rightLength) {
        if ($left[$leftPtr] <= $right[$rightPtr]) {
            $result[] = $left[$leftPtr];
            $leftPtr++;
        } else {
            $result[] = $right[$rightPtr];
            $rightPtr++;
        }
    }

    // appending left array
    while ($leftPtr < $leftLength) {
        $result[] = $left[$leftPtr];
        $leftPtr++;
    }

    // appending right array
    while ($rightPtr < $rightLength) {
        $result[] = $right[$rightPtr];
        $rightPtr++;
    }

    return $result;

}

if (isset($_GET['inputArray'])) {
    $array = json_decode($_GET['inputArray'], true);

    if (is_array($array)) {
        // Perform the merge sort
        $sortedArray = mergeSort($array);

        // Return sorted array as JSON
        echo json_encode([
            "status" => "SORTED SUCCESSFULLY!",
            "sortedArray" => $sortedArray
        ]);
    } else {
        echo json_encode([
            "status" => "Error",
            "message" => "NOT AN ARRAY!"
        ]);
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "PLEASE ENTER A ARRAY! :O"
    ]);
}