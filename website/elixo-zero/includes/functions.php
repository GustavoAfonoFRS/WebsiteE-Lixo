<?php

function sanitize($data)
{
    return htmlspecialchars(strip_tags(trim($data)));
}


function isLoggedIn()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return isset($_SESSION['user_id']);
}


function isAdmin()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1;
}


function redirect($url)
{
    header("Location: $url");
    exit();
}


function generateToken($length = 6)
{
    return str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
}

function formatDate($date)
{
    return date('d/m/Y H:i', strtotime($date));
}

function enviarEmail($para, $assunto, $corpo)
{

    $log = "[" . date('Y-m-d H:i:s') . "] Preparando envio para: $para | Assunto: $assunto" . PHP_EOL;
    file_put_contents(__DIR__ . '/../log_email.txt', $log, FILE_APPEND);


    $temp_data = [
        'recipient' => $para,
        'subject' => $assunto,
        'body' => $corpo
    ];
    $temp_file = __DIR__ . '/../scripts/temp_' . uniqid() . '.json';
    file_put_contents($temp_file, json_encode($temp_data));

    $python_path = "python";
    $script_path = __DIR__ . "/../scripts/mail_generic.py";


    $command = "start /B $python_path \"$script_path\" \"$temp_file\"";
    pclose(popen($command, "r"));

    return true;
}
?>