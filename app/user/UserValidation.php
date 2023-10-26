<?php
namespace User;

require_once $_SERVER['DOCUMENT_ROOT'] . "/wheelsforsale/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/wheelsforsale/vendor/autoload.php";

class UserValidation
{

  private User $user;
  private $repeatedPassword;

  public function __construct(User $user, $repeatedPassword = null)
  {
    $this->user = $user;
    $this->repeatedPassword = $repeatedPassword;
  }

  public function validateUsername()
  {

    $userName = $this->user->getUsername();

    if (empty($userName) || strlen($userName) > 50 || !ctype_alnum($userName)) {
      return true;
    } else {
      return false;
    }
  }

  public function userNameAvability()
  {
    $userName = $this->user->getUsername();

    if ($this->user->isTakenUsername($userName)) {
      return true;
    }
  }

  public function validateEmail()
  {

    $email = $this->user->getEmail();

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return true;
    } else {
      return false;
    }
  }

  public function emailAvability()
  {

    $email = $this->user->getEmail();

    if ($this->user->isTakenEmail($email)) {
      return true;
    }
  }

  public function validatePassword()
  {

    $password = $this->user->getPassword();
    $repeatedPassword = $this->repeatedPassword;
    $passwordRgx = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/';

    if (empty($password) || !preg_match($passwordRgx, $password) || $password !== $repeatedPassword) {
      return true;
    } else {
      return false;
    }
  }
}