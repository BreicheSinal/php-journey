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
}