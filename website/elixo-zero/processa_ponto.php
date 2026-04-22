<?php
require_once 'config/db.php';
require_once 'includes/functions.php';

if (!isLoggedIn())
    redirect('login.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = sanitize($_POST['nome']);
    $freguesia = sanitize($_POST['freguesia']);
    $morada = sanitize($_POST['morada']);
    $lat = filter_var($_POST['latitude'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $lng = filter_var($_POST['longitude'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $tipo = sanitize($_POST['tipo_residuo']);
    $horario = sanitize($_POST['horario']);
    $link = sanitize($_POST['link_oficial']);

    try {
        $stmt = $pdo->prepare("INSERT INTO pontos_recolha (nome, morada, freguesia, latitude, longitude, tipo_residuo, horario, link_oficial) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nome, $morada, $freguesia, $lat, $lng, $tipo, $horario, $link]);


        $stmt_users = $pdo->query("SELECT nome, email FROM utilizadores WHERE email_verificado = 1");
        $users = $stmt_users->fetchAll();

        foreach ($users as $user) {
            $assunto = "Novo Ponto de Recolha Adicionado: $nome";
            $corpo = "<h1>Olá {$user['nome']}!</h1>
                      <p>Um novo ponto de coleta foi adicionado na aplicação E-Lixo Zero.</p>
                      <p><strong>Nome:</strong> $nome<br>
                      <strong>Morada:</strong> $morada<br>
                      <strong>Freguesia:</strong> $freguesia<br>
                      <strong>Tipos de Resíduo:</strong> $tipo</p>
                      <p>Consulte o mapa para saber mais detalhes!</p>";

            enviarEmail($user['email'], $assunto, $corpo);
        }

        redirect('admin.php?status=sucesso');
    } catch (PDOException $e) {
        die("Erro ao salvar: " . $e->getMessage());
    }
}
?>