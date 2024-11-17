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

    // static function to validate email
    public static function emailValidation($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    // method retruning a new user instance with update values
    public function copy_with($name = null, $email = null, $password = null) {
        // validating email
        if (!User::emailValidation($email)) {
            $email = $this->email;
        }
    
        // validating password
        if (!User::passwordValidation($password)) {
            $password = $this->password;
        }
    
        // returning a user insatnce 
        return new User(
            $name ?? $this->name,
            $email ?? $this->email,
            $password ?? $this->password
        );
    }
    
    
}
