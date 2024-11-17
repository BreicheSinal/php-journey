<?php

header('Content-Type: application/json');

// defining a single node in the linked list
class ListNode {
    public $data;
    public $nextNode = null;

    // setting data for the node
    public function setData($data) {
        $this->data = $data;
    }
}

// class representing words linked list
class WordLinkedList {
    public $firstNode = null; // ptr for 1st node in list

    // adding a word to the linked list
    public function appendWord($data) {
        // creating new node to store word 
        $newNode = new ListNode();
        $newNode->setData($data); 

        if ($this->firstNode === null) {
            $this->firstNode = $newNode; // checking if list is emty (1) -> set 1st node
        } else {
            $currentNode = $this->firstNode;
            
            // finding end of the list
            while ($currentNode->nextNode !== null) {
                $currentNode = $currentNode->nextNode;
            }
            // linking new word to the end of the list
            $currentNode->nextNode = $newNode;
        }
    }

    // retrieving all words with 2 vowels
    public function getWordsWithTwoVowels() {
        $currentNode = $this->firstNode;
        $matchingWords = [];
        $vowelCharacters = 'aeiouAEIOU';

        // checking word
        while ($currentNode !== null) {
            $word = $currentNode->data;
            $vowelCount = 0;
            $charIndex = 0;

            // counting the vowels in the word
            while (isset($word[$charIndex])) {
                $currentChar = $word[$charIndex];
                for ($vowelIndex = 0; isset($vowelCharacters[$vowelIndex]); $vowelIndex++) {
                    if ($vowelCharacters[$vowelIndex] === $currentChar) {
                        $vowelCount++;
                        break; // if match break
                    }
                }
                $charIndex++;
            }

            // checking for exaclty 2 vowels in a word
            if ($vowelCount === 2) {
                $matchingWords[] = $word;
            }

            $currentNode = $currentNode->nextNode;
        }

        return $matchingWords;
    }

}