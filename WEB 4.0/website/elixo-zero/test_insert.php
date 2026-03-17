<?php
require_once 'config/db.php';
require_once 'includes/functions.php';

$nome = 'Test User';
$email = 'test' . time() . '@example.com';
$password_hash = password_hash('password123', PASSWORD_DEFAULT);
$token = generateToken();
$is_admin = 0;

try {
    $stmt = $pdo->prepare("INSERT INTO utilizadores (nome, email, password, token_verificacao, is_admin) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nome, $email, $password_hash, $token, $is_admin]);
    echo "Success!";
}
catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
