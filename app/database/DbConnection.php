<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/wheelsforsale/config.php";

class DbConnection
{
    private static $instance;
    private $pdo;

    private function __construct()
    {
        try {
            require_once dirname(__DIR__, 2) . "/vendor/autoload.php";

            $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
            $dotenv->safeLoad();

            $this->pdo = new PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_DATABASE']};charset=utf8mb4", $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
        } catch (PDOException $e) {
            header("location: /wheelsforsale/index.php?error=dbError");
            exit();
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getPdo()
    {
        return $this->pdo;
    }
}
