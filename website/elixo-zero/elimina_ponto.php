<?php
require_once 'config/db.php';
require_once 'includes/functions.php';

if (!isLoggedIn()) {
    redirect('login.php');
}

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM pontos_recolha WHERE id = ?");
        $stmt->execute([$id]);
        redirect('admin.php?status=eliminado');
    }
    catch (PDOException $e) {
        redirect('admin.php?erro=db');
    }
}
else {
    redirect('admin.php');
}
?>
