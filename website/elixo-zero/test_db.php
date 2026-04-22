<?php
require_once 'config/db.php';

try {
    $stmt = $pdo->query("SHOW TABLES LIKE 'pontos_recolha'");
    $table = $stmt->fetch();
    if ($table) {
        echo " A tabela 'pontos_recolha' existe!";

        $stmt = $pdo->query("SELECT COUNT(*) as total FROM pontos_recolha");
        $row = $stmt->fetch();
        echo "\n Total de pontos na base de dados: " . $row['total'];
    } else {
        echo " A tabela 'pontos_recolha' NÃO existe.";
    }
} catch (PDOException $e) {
    echo " Erro: " . $e->getMessage();
}
?>