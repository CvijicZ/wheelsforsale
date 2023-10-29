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
    private DbConnection $db;

    public function __construct(string $userName, string $email, string $password)
    {
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->db = DbConnection::getInstance();
    }
    public function getUsername(): string
    {
        return $this->userName;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPassword(): string
    {
        return $this->password;
    }

    public function isTakenEmail(string $email): bool
    {
        $sql = "SELECT email FROM user WHERE email= :email";
        $stmt = $this->db->getPdo()->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetchColumn();

        return $result !== false;
    }

    public function isTakenUsername(string $userName): bool
    {
        $sql = "SELECT user_name FROM user WHERE user_name= :userName";
        $stmt = $this->db->getPdo()->prepare($sql);

        $stmt->bindParam(':userName', $userName);
        $stmt->execute();

        $result = $stmt->fetchColumn();

       return $result !==false;
    }

    public function registerUser(): bool
    {
        $sql = "INSERT INTO user(user_name, email, password, role, tokens) VALUES(:userName, :email, :password, :role, :tokens)";
        $stmt = $this->db->getPdo()->prepare($sql);

        $stmt->bindParam(':userName', $this->userName, \PDO::PARAM_STR, 50);
        $stmt->bindParam(':email', $this->email, \PDO::PARAM_STR, 255);

        $hashedPwd = password_hash($this->password, PASSWORD_DEFAULT);
        $stmt->bindParam(':password', $hashedPwd, \PDO::PARAM_STR, 255);

        $stmt->bindParam(':role', $this->role, \PDO::PARAM_STR, 10);
        $stmt->bindParam(':tokens', $this->tokens, \PDO::PARAM_INT, 10);

        return $stmt->execute();
    }
}
