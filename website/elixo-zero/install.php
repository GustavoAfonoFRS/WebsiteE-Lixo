<?php
$host = 'localhost';
$user = 'root';
$pass = '';

try {

    $pdo = new PDO("mysql:host=$host;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<h2>🛠️ Instalador E-Lixo Zero Lisboa</h2>";


    $pdo->exec("CREATE DATABASE IF NOT EXISTS elixo_zero_lisboa CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo " Base de dados criada ou já existente.<br>";


    $pdo->exec("USE elixo_zero_lisboa");


    $sql = file_get_contents('database.sql');


    $pdo->exec($sql);

    echo " Tabelas e dados iniciais importados com sucesso!<br>";
    echo "<br><strong style='color: green;'>Tudo pronto!</strong><br>";
    echo "<a href='index.php'>Clique aqui para ir para a Página Inicial</a>";

} catch (PDOException $e) {
    echo "<h2 style='color: red;'> Erro na instalação:</h2>";
    echo $e->getMessage();
    echo "<br><br>Verifique se o MySQL está ligado no painel do XAMPP.";
}
?>