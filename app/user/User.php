<?php
namespace User;

require_once $_SERVER['DOCUMENT_ROOT'] . "/wheelsforsale/config.php";

use Database\DbConnection;


require_once $_SERVER['DOCUMENT_ROOT'] . "/wheelsforsale/vendor/autoload.php";

class User
{
    private string $userName;
    private string $email;
    private string $password;
    private string $role = "user";
    private int $tokens = 3;
    private $db;

    public function __construct($userName, $email, $password)
    {
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->db = DbConnection::getInstance();
    }
    public function getUsername()
    {
        return $this->userName;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function isTakenEmail($email)
    {
        $sql = "SELECT email FROM user WHERE email= :email";
        $stmt = $this->db->getPdo()->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetchColumn();

        if (!$result === false) {
            return true;
        }
    }

    public function isTakenUsername($userName)
    {
        $sql = "SELECT user_name FROM user WHERE user_name= :userName";
        $stmt = $this->db->getPdo()->prepare($sql);

        $stmt->bindParam(':userName', $userName);
        $stmt->execute();

        $result = $stmt->fetchColumn();

        if (!$result === false) {
            return true;
        }
    }

    public function registerUser()
    {
        $sql = "INSERT INTO user(user_name, email, password, role, tokens) VALUES(:userName, :email, :password, :role, :tokens)";
        $stmt = $this->db->getPdo()->prepare($sql);

        $stmt->bindParam(':userName', $this->userName);
        $stmt->bindParam(':email', $this->email);

        $hashedPwd = password_hash($this->password, PASSWORD_DEFAULT);
        $stmt->bindParam(':password', $hashedPwd);

        $stmt->bindParam(':role', $this->role);
        $stmt->bindParam(':tokens', $this->tokens);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}