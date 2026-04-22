<?php
require_once 'includes/functions.php';
require_once 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = sanitize($_POST['nome']);
    $email = sanitize($_POST['email']);
    $assunto = sanitize($_POST['assunto']);
    $mensagem = sanitize($_POST['mensagem']);


    try {
        $stmt = $pdo->prepare("INSERT INTO mensagens (nome, email, assunto, mensagem) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nome, $email, $assunto, $mensagem]);
    } catch (PDOException $e) {
        error_log("Erro ao salvar mensagem no DB: " . $e->getMessage());
    }

    $nome_esc = escapeshellarg($nome);
    $email_esc = escapeshellarg($email);
    $assunto_esc = escapeshellarg($assunto);
    $msg_esc = escapeshellarg($mensagem);

    $python_path = "python";
    $script_path = "scripts/send_email.py";


    $command = "start /B $python_path $script_path $nome_esc $email_esc $assunto_esc $msg_esc";
    pclose(popen($command, "r"));

    redirect('contacto.php?status=sucesso');
} else {
    redirect('contacto.php');
}
?>