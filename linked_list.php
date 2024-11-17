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
