<?php
require_once 'config/db.php';
require_once 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = sanitize($_POST['nome']);
    $email = sanitize($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'] ?? '';


    if (empty($nome) || empty($email) || empty($password)) {
        redirect('registo.php?erro=campos_vazios');
    }

    if ($password !== $confirm_password) {
        redirect('registo.php?erro=password_mismatch');
    }


    $stmt = $pdo->prepare("SELECT id FROM utilizadores WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        redirect('registo.php?erro=email_existe');
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $token = generateToken();
    $admin_code_input = $_POST['admin_code'] ?? '';
    $is_admin = ($admin_code_input === ADMIN_REGISTRATION_CODE) ? 1 : 0;

    try {
        $stmt = $pdo->prepare("INSERT INTO utilizadores (nome, email, password, token_verificacao, is_admin) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nome, $email, $password_hash, $token, $is_admin]);


        $assunto = "Código de Verificação - E-Lixo Zero";
        $corpo = "<h1>Bem-vindo ao E-Lixo Zero, $nome!</h1>
                  <p>A sua conta foi pré-registada. Para a ativar, utilize o seguinte código de verificação:</p>
                  <h2 style='letter-spacing: 5px; background: 
                  <p>Introduza este código na página de verificação para concluir o seu registo.</p>";

        enviarEmail($email, $assunto, $corpo);

        session_start();
        $_SESSION['verify_email'] = $email; 
        $_SESSION['msg_sucesso'] = "Registo efetuado com sucesso! Introduza o código que enviámos para o seu e-mail.";
        redirect('validar_email.php');

    } catch (PDOException $e) {
        redirect('registo.php?erro=db');
    }
} else {
    redirect('registo.php');
}
?>