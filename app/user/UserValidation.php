<?php

namespace User;

require_once $_SERVER['DOCUMENT_ROOT'] . "/wheelsforsale/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/wheelsforsale/vendor/autoload.php";

class UserValidation
{

  public static function validateUsername(string $userName): bool
  {
    return !empty($userName) && strlen($userName) < 50 && ctype_alnum($userName);
  }

  public static function validateEmail(string $email): bool
  {
    return !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL);
  }

  public static function validatePassword(string $password, string $repeatedPassword): bool
  {

    $passwordRgx = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/';

    return !empty($password) && preg_match($passwordRgx, $password) && $password === $repeatedPassword;
  }
}