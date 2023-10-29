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

    // Instanciating User and UserValidation classes
    $user = new User($userName, $email, $password);
    $userValidate = new UserValidation($user, $repeatedPassword);

    // Calling validate method from UserValidation class for user input check's, redirecting user if data is not as expected

    $userValidate->validateRegistration();

    if (isset($userValidate->error)) {

        header("location: ../../index.php?error=" . $userValidate->error);
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
