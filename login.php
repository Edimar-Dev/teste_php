<?php
// public/login.php
require_once '../src/Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = new Database();
    $pdo = $db->getPdo();

    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
    $stmt->execute(['username' => $username, 'password' => md5($password)]); // MD5 apenas para exemplo

    if ($stmt->rowCount() > 0) {
        echo "Login successful!";
    } else {
        echo "Invalid credentials.";
    }
} else {
    include '../templates/login.php';
}
