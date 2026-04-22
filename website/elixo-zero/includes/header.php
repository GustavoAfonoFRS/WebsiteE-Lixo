<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Plataforma de reciclagem de resíduos eletrónicos em Lisboa. Encontre pontos de recolha de REEE perto de si.">
    <title>Lisbon E-Waste — Reciclagem Eletrónica em Lisboa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&family=Playfair+Display:ital,wght@0,700;0,900;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">

        <a class="navbar-brand d-flex align-items-center gap-2" href="index.php">
            <div style="
                width:32px; height:32px;
                background:#080808;
                border-radius:8px;
                display:flex;
                align-items:center;
                justify-content:center;
            ">
                <i class="fas fa-recycle text-white" style="font-size:.75rem;"></i>
            </div>
            <span>LISBON <strong>E-WASTE</strong></span>
        </a>

        <button class="navbar-toggler border-0 shadow-none" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center gap-1">
                <li class="nav-item"><a class="nav-link" href="index.php">Início</a></li>
                <li class="nav-item"><a class="nav-link" href="mapa.php">Mapa</a></li>
                <li class="nav-item"><a class="nav-link" href="reee.php">Guia REEE</a></li>
                <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>

                <?php if (isLoggedIn()): ?>
                    <li class="nav-item dropdown ms-lg-2">
                        <a class="nav-link dropdown-toggle fw-semibold" href="#"
                           id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span style="
                                display:inline-flex;
                                align-items:center;
                                gap:.5rem;
                                background:#f5f5f5;
                                padding:.35rem .85rem .35rem .5rem;
                                border-radius:999px;
                                font-size:.78rem;
                            ">
                                <span style="
                                    width:26px; height:26px;
                                    background:#080808;
                                    color:#fff;
                                    border-radius:50%;
                                    display:inline-flex;
                                    align-items:center;
                                    justify-content:center;
                                    font-size:.7rem;
                                    font-weight:700;
                                "><?php echo strtoupper(substr($_SESSION['user_name'], 0, 1)); ?></span>
                                <?php echo htmlspecialchars($_SESSION['user_name']); ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end mt-2">
                            <?php if (isAdmin()): ?>
                                <li><a class="dropdown-item" href="admin.php">
                                    <i class="fas fa-sliders me-2 opacity-40"></i>Painel Admin
                                </a></li>
                                <li><hr class="dropdown-divider" style="border-color:#eee;"></li>
                            <?php endif; ?>
                            <li><a class="dropdown-item text-danger" href="logout.php">
                                <i class="fas fa-arrow-right-from-bracket me-2 opacity-40"></i>Sair
                            </a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item ms-lg-1">
                        <a class="nav-link" href="login.php">Entrar</a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a class="btn-nav-action" href="registo.php">Registar-se</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<main>
