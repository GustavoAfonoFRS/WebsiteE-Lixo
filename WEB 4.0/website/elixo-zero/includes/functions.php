<?php
// Funções utilitárias do projeto

/**
 * Sanitiza dados de entrada
 */
function sanitize($data)
{
    return htmlspecialchars(strip_tags(trim($data)));
}

/**
 * Verifica se o utilizador está logado
 */
function isLoggedIn()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return isset($_SESSION['user_id']);
}

/**
 * Verifica se o utilizador é administrador
 */
function isAdmin()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1;
}

/**
 * Redireciona para uma página
 */
function redirect($url)
{
    header("Location: $url");
    exit();
}

/**
 * Gera um código de verificação numérico de 6 dígitos
 */
function generateToken($length = 6)
{
    return str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
}

/**
 * Formata a data para padrão português
 */
function formatDate($date)
{
    return date('d/m/Y H:i', strtotime($date));
}
/**
 * Envia um e-mail (Usando script Python para ambiente local no Windows)
 */
function enviarEmail($para, $assunto, $corpo)
{
    // Log básico local
    $log = "[" . date('Y-m-d H:i:s') . "] Preparando envio para: $para | Assunto: $assunto" . PHP_EOL;
    file_put_contents(__DIR__ . '/../log_email.txt', $log, FILE_APPEND);

    // Criar um ficheiro JSON temporário (mais seguro para evitar erros de escape no HTML)
    $temp_data = [
        'recipient' => $para,
        'subject' => $assunto,
        'body' => $corpo
    ];
    $temp_file = __DIR__ . '/../scripts/temp_' . uniqid() . '.json';
    file_put_contents($temp_file, json_encode($temp_data));

    $python_path = "python"; // Certifique-se que o python está no PATH
    $script_path = __DIR__ . "/../scripts/mail_generic.py";

    // Executa em background
    // No Windows, usamos start /B para não abrir janela do console
    $command = "start /B $python_path \"$script_path\" \"$temp_file\"";
    pclose(popen($command, "r"));

    return true;
}
?>
