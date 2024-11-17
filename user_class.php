<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");


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
        if ($password === null) {
            return 'PASSWORD CANNOT BE EMPTY MATE :(';
        }else{
            $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{12,}$/';
            $result = preg_match($regex, $password);
            return $result ? true : 'CHECK PATTERN FOR ACCEPTED PASSWORD MATE!';    
        }
    }

    // static function to validate email
    public static function emailValidation($email) {
        if ($email === null) {
            return 'EMAIL CANNOT BE EMPTY MATE :(';
        }else{

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return 'INVALID EMAIL FORMAT MATE!';
            }
            return true;
        }
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

    $requestData = json_decode(file_get_contents('php://input'), true);

    $requestData = $_POST;

    // getting data from request
    $name = isset($requestData['name']) ? $requestData['name'] : null;
    $email = isset($requestData['email']) ? $requestData['email'] : null;
    $password = isset($requestData['password']) ? $requestData['password'] : null;

    // validating email and password
    $emailValidation = User::emailValidation($email);
    $passwordValidation = User::passwordValidation($password);

    if ($emailValidation === true && $passwordValidation === true) {
        // creating new user instance(updated data)
        $updatedUser = $currentUser->copy_with($name, $email, $password);

        $response['success'] = true;
        $response['message'] = 'USER SUCCESSFULLY UPDATED!';
        $response['data'] = [
            'name' => $updatedUser->name,
            'email' => $updatedUser->email,
            'password' => $updatedUser->password
        ];
    } else {
        // returning validation error msg
        $response['message'] = $emailValidation !== true ? $emailValidation : $passwordValidation;
    }

echo json_encode($response);
