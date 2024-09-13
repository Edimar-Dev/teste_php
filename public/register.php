<?php
// public/register.php
require_once '../src/Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = new Database();
    $pdo = $db->getPdo();

    $stmt = $pdo->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
    $stmt->execute(['username' => $username, 'password' => md5($password)]); // MD5 apenas para exemplo

    echo "Registration successful!";
} else {
    include '../templates/register.php';
}
