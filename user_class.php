<?php

class User{
    // class attributes
    public $name;
    public $email;
    public $password;

    // constructor
    public function __construct($name, $email, $password){
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    // static function to validate pass(12char, 1upper/lower, 1specialChar)
    public static function passwordValidation($password) {
        $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{12,}$/';
        $result = preg_match($regex, $password);
        return $result ? true : false;
            
    }

}