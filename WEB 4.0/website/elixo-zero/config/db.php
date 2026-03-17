<?php
// Configurações da Base de Dados
define('DB_HOST', 'localhost');
define('DB_NAME', 'elixo_zero_lisboa');
define('DB_USER', 'root');
define('DB_PASS', ''); // Padrão do XAMPP é vazio
define('ADMIN_REGISTRATION_CODE', 'LISBON2024'); // Código para se tornar admin

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e) {
    die("Erro de ligação à base de dados: " . $e->getMessage());
}
?>
