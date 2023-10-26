<?php
namespace User;

require_once $_SERVER['DOCUMENT_ROOT'] . "/wheelsforsale/config.php";

use User\UserValidation;

if (isset($_POST['submit'])) {

    require_once $_SERVER['DOCUMENT_ROOT'] . "/wheelsforsale/vendor/autoload.php";

    // Storing form inputs in php variables
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatedPassword = $_POST['repeatedPassword'];

    // Instanciating User and UserValidation classes
    $user = new User($userName, $email, $password);
    $userValidate = new UserValidation($user, $repeatedPassword);

    // Calling validate methods from UserValidation class for user input check's, redirecting user if data is not as expected
    if ($userValidate->validateUsername()) {
        header("location: ../../index.php?error=userNameError");
        exit();
    } else if ($userValidate->userNameAvability()) {
        header("location: ../../index.php?error=userNameTaken");
        exit();
    } else if ($userValidate->validateEmail()) {
        header("location: ../../index.php?error=emailError");
        exit();
    } else if ($userValidate->emailAvability()) {
        header("location: ../../index.php?error=emailTaken");
        exit();
    } else if ($userValidate->validatePassword()) {
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