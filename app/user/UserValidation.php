<?php

namespace User;

require_once $_SERVER['DOCUMENT_ROOT'] . "/wheelsforsale/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/wheelsforsale/vendor/autoload.php";

class UserValidation
{

  private User $user;
  private $repeatedPassword;
  public  $error = null;

  public function __construct(User $user, string $repeatedPassword = null)
  {
    $this->user = $user;
    $this->repeatedPassword = $repeatedPassword;
  }

  public function validateRegistration(): bool|string
  {
    if (!$this->validateUsername()) {
      return $this->error = "userNameError";
    }
    if ($this->takenUsername()) {
      return $this->error = "userNameTaken";
    }
    if (!$this->validateEmail()) {
      return  $this->error = "emailError";
    }
    if ($this->takenEmail()) {
      return $this->error = "emailTaken";
    }
    if (!$this->validatePassword()) {
      return $this->error = "passwordError";
    }
    $this->error = null;

    return true;
  }

  public function validateUsername(): bool
  {

    $userName = $this->user->getUsername();

    return !empty($userName) && strlen($userName) < 50 && ctype_alnum($userName);
  }

  public function takenUsername(): bool
  {

    return $this->user->isTakenUsername($this->user->getUsername());
  }

  public function validateEmail(): bool
  {

    $email = $this->user->getEmail();

    return !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL);
  }

  public function takenEmail(): bool
  {

    return $this->user->isTakenEmail($this->user->getEmail());
  }

  public function validatePassword(): bool
  {

    $password = $this->user->getPassword();
    $repeatedPassword = $this->repeatedPassword;
    $passwordRgx = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/';

    return !empty($password) && preg_match($passwordRgx, $password) && $password === $repeatedPassword;
  }
}
