<?php

namespace User;

require_once $_SERVER['DOCUMENT_ROOT'] . "/wheelsforsale/config.php";

use User\UserValidation;

if (isset($_POST['register'])) {

    require_once $_SERVER['DOCUMENT_ROOT'] . "/wheelsforsale/vendor/autoload.php";

    // Storing form inputs in php variables
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatedPassword = $_POST['repeatedPassword'];

    // Instanciating User 
    $user = new User($userName, $email, $password);

    // Calling validate method from UserValidation class for user input check's, redirecting user if data is not as expected
    if(!UserValidation::validateUsername($user->getUsername())){
        header("location: ../../index.php?error=userNameError");
        exit();
    }
    if($user->isTakenUsername($user->getUsername())){
        header("location: ../../index.php?error=userNameTaken");
        exit();
    }
    if(!UserValidation::validateEmail($user->getEmail())){
        header("location: ../../index.php?error=emailError");
        exit();
    }
    if($user->isTakenEmail($user->getEmail())){
        header("location: ../../index.php?error=emailTaken");
        exit();
    }
    if(!UserValidation::validatePassword($user->getPassword(), $repeatedPassword)){
        header("location: ../../index.php?error=passwordError");
        exit();
    }

    // Calling registerUser() method from User class, redirecting user to proper location based on query result
    if ($user->registerUser()) {
        header("location: ../../index.php?reg=success");
        exit();
    } else {
        header("location: ../../index.php?reg=fail");
        exit();
    }
}
