<?php
// src/Database.php
class Database
{
    private $pdo;

    public function __construct()
    {
        $config = include(__DIR__ . '/../config/config.php');
        $dbConfig = $config['db'];

        $dsn = "mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']}";
        $this->pdo = new PDO($dsn, $dbConfig['user'], $dbConfig['password']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getPdo()
    {
        return $this->pdo;
    }
}
