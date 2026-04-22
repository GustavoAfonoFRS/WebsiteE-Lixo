<?php include 'includes/header.php'; ?>


<section class="hero-section hero-lisbon">
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <div class="hero-badge reveal">
            <span class="dot"></span>
            Plataforma de Sustentabilidade · Lisboa
        </div>
        <h1 class="reveal">Lisboa lidera.<br><strong>O futuro é circular</strong>.</h1>
        <p class="lead reveal">
            A maior rede de pontos de reciclagem eletrónica de Lisboa — encontre, recicle e contribua para uma cidade
            mais limpa.
        </p>
        <div class="d-flex justify-content-center gap-3 flex-wrap reveal">
            <a href="mapa.php" class="btn btn-white px-5 py-3 fw-bold">
                <i class="fas fa-map-location-dot me-2"></i>Explorar Mapa
            </a>
            <a href="reee.php" class="btn btn-outline-white px-5 py-3">
                Guia de Resíduos
            </a>
        </div>
    </div>
    <div class="scroll-indicator">
        <div class="line"></div>
        <span>scroll</span>
    </div>
</section>


<div class="marquee-wrap">
    <div class="marquee-track">
        <?php
        $items = ['Reciclagem Responsável', 'Lisboa Circular', 'Resíduos Eletrónicos', 'Economia Circular', 'Sustentabilidade Urbana', 'REEE', 'Ecodesign', 'Zero Desperdício'];
        for ($i = 0; $i < 4; $i++)
            foreach ($items as $item)
                echo "<span class='marquee-item'>$item</span>";
        ?>
    </div>
</div>


<section class="py-5" style="background:#fff; border-bottom:1px solid #ebebeb;">
    <div class="container py-4">
        <div class="row text-center reveal-stagger">
            <div class="col-md-4 stat-item">
                <div class="stat-number">50M</div>
                <p class="text-muted small fw-bold text-uppercase ls-wide mt-2 mb-0">Toneladas de lixo/ano no mundo</p>
            </div>
            <div class="col-md-4 stat-item">
                <div class="stat-number" style="color:#2d7a4f;">45k</div>
                <p class="text-muted small fw-bold text-uppercase ls-wide mt-2 mb-0">Ton. recicladas em Portugal 2025
                </p>
            </div>
            <div class="col-md-4 stat-item">
                <div class="stat-number">200+</div>
                <p class="text-muted small fw-bold text-uppercase ls-wide mt-2 mb-0">Pontos mapeados em Lisboa</p>
            </div>
        </div>
    </div>
</section>


<section class="py-0 overflow-hidden">
    <div class="row g-0">
        <div class="col-lg-6">
            <div style="height:600px; overflow:hidden; position:relative;">
                <img src="beautiful-building-lisbon.webp" alt="Lisboa"
                    style="width:100%; height:100%; object-fit:cover;">
                <div style="position:absolute;inset:0; background:linear-gradient(to right, transparent 60%, #fff);">
                </div>
            </div>
        </div>
        <div class="col-lg-6 d-flex align-items-center" style="background:#fff;">
            <div class="p-5 p-md-6 py-lg-0" style="max-width:520px; padding: 4rem 5rem;">
                <p class="text-uppercase-refined mb-3" style="color:#2d7a4f;">O problema</p>
                <h2 class="display-5 fw-semibold mb-4 tracking-tight">O que é o<br>Lixo Eletrónico?</h2>
                <p class="text-muted mb-5" style="font-weight:300; line-height:1.8; font-size:1.05rem;">
                    REEE — Resíduos de Equipamentos Elétricos e Eletrónicos — representam o fluxo de resíduos com maior
                    crescimento no mundo. Em 2025, Portugal reciclou 45 mil toneladas. O potencial é muito maior.
                </p>
                <div class="row g-4">
                    <div class="col-6">
                        <div class="d-flex gap-3 align-items-start">
                            <div class="feature-icon mt-1" style="background:#2d7a4f;"><i class="fas fa-gem"></i></div>
                            <div>
                                <h6 class="fw-bold mb-1">Metais Raros</h6>
                                <p class="small text-muted mb-0">Ouro, prata e cobre recuperáveis.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex gap-3 align-items-start">
                            <div class="feature-icon mt-1" style="background:#1a4d30;"><i
                                    class="fas fa-shield-halved"></i></div>
                            <div>
                                <h6 class="fw-bold mb-1">Segurança</h6>
                                <p class="small text-muted mb-0">Evita contaminação do solo.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex gap-3 align-items-start">
                            <div class="feature-icon mt-1" style="background:#3a9a64;"><i class="fas fa-leaf"></i></div>
                            <div>
                                <h6 class="fw-bold mb-1">CO₂ Zero</h6>
                                <p class="small text-muted mb-0">Reduz emissões por produto.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex gap-3 align-items-start">
                            <div class="feature-icon mt-1"><i class="fas fa-map-pin"></i></div>
                            <div>
                                <h6 class="fw-bold mb-1">Rede Densa</h6>
                                <p class="small text-muted mb-0">200+ pontos em Lisboa.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <a href="reee.php" class="btn btn-dark px-4 py-2 fw-bold">
                        Ver Guia REEE <i class="fas fa-arrow-right ms-2" style="font-size:.8rem;"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<section
    style="background: linear-gradient(135deg, #1a4d30 0%, #2d7a4f 50%, #3a9a64 100%); padding:80px 0; position:relative; overflow:hidden;">
    <div
        style="position:absolute;inset:0; background-image:linear-gradient(rgba(255,255,255,.03) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.03) 1px,transparent 1px); background-size:50px 50px; pointer-events:none;">
    </div>
    <div class="container position-relative">
        <div class="row align-items-center g-5">
            <div class="col-lg-7 reveal">
                <p class="mb-3"
                    style="font-size:.72rem; font-weight:700; letter-spacing:.18em; text-transform:uppercase; color:rgba(255,255,255,.45);">
                    Porque importa</p>
                <h2 class="fw-bold mb-4 tracking-tight"
                    style="color:#fff; font-size:clamp(1.8rem,4vw,3rem); line-height:1.1;">
                    Uma tonelada de telemóveis contém <span style="color:#a8f5c8;">mais ouro</span> do que uma tonelada
                    de minério.
                </h2>
                <p style="color:rgba(255,255,255,.6); font-size:1.05rem; font-weight:300; max-width:500px;">
                    Reciclar eletrónica não é apenas responsabilidade ambiental — é uma oportunidade económica real.
                    Metais raros valem milhões. Eles estão nas suas gavetas.
                </p>
            </div>
            <div class="col-lg-5 reveal">
                <div class="row g-3 text-center">
                    <div class="col-6">
                        <div
                            style="background:rgba(255,255,255,.1); border:1px solid rgba(255,255,255,.15); border-radius:20px; padding:2rem 1rem; backdrop-filter:blur(10px);">
                            <div style="font-size:2.2rem; font-weight:900; color:#a8f5c8; letter-spacing:-.04em;">50%
                            </div>
                            <p
                                style="font-size:.72rem; font-weight:600; letter-spacing:.1em; text-transform:uppercase; color:rgba(255,255,255,.5); margin:0;">
                                Ferro recuperável</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div
                            style="background:rgba(255,255,255,.1); border:1px solid rgba(255,255,255,.15); border-radius:20px; padding:2rem 1rem; backdrop-filter:blur(10px);">
                            <div style="font-size:2.2rem; font-weight:900; color:#a8f5c8; letter-spacing:-.04em;">7%
                            </div>
                            <p
                                style="font-size:.72rem; font-weight:600; letter-spacing:.1em; text-transform:uppercase; color:rgba(255,255,255,.5); margin:0;">
                                Cobre valioso</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div
                            style="background:rgba(255,255,255,.1); border:1px solid rgba(255,255,255,.15); border-radius:20px; padding:2rem 1rem; backdrop-filter:blur(10px);">
                            <div style="font-size:2.2rem; font-weight:900; color:#a8f5c8; letter-spacing:-.04em;">13%
                            </div>
                            <p
                                style="font-size:.72rem; font-weight:600; letter-spacing:.1em; text-transform:uppercase; color:rgba(255,255,255,.5); margin:0;">
                                Alumínio</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div
                            style="background:rgba(255,255,255,.1); border:1px solid rgba(255,255,255,.15); border-radius:20px; padding:2rem 1rem; backdrop-filter:blur(10px);">
                            <div style="font-size:2.2rem; font-weight:900; color:#a8f5c8; letter-spacing:-.04em;">9%
                            </div>
                            <p
                                style="font-size:.72rem; font-weight:600; letter-spacing:.1em; text-transform:uppercase; color:rgba(255,255,255,.5); margin:0;">
                                Metais raros</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="py-0 overflow-hidden">
    <div class="row g-0">
        <div class="col-lg-6 d-flex align-items-center order-lg-1 order-2" style="background:#f5f5f5;">
            <div class="p-5 p-md-6 py-lg-0" style="max-width:520px; padding: 4rem 5rem;">
                <p class="text-uppercase-refined mb-3" style="color:#2d7a4f;">Como Funciona</p>
                <h2 class="display-5 fw-semibold mb-4 tracking-tight">Três passos.<br>Zero complexidade.</h2>
                <div class="d-flex flex-column gap-4 mt-4">
                    <?php
                    $steps = [
                        ['01', 'Encontre um Ponto', 'Use o mapa para localizar o ecoponto mais próximo, filtrado por tipo de resíduo.', '#2d7a4f'],
                        ['02', 'Entregue o Resíduo', 'Leve o equipamento ao ponto. Sem burocracia nem custo. Simples assim.', '#1a4d30'],
                        ['03', 'O Planeta Agradece', 'Os materiais são recuperados e reintroduzidos no ciclo produtivo.', '#080808'],
                    ];
                    foreach ($steps as $s): ?>
                        <div class="d-flex gap-4 align-items-start">
                            <div
                                style="font-size:2.5rem; font-weight:900; color:<?= $s[3] ?>; opacity:.2; line-height:1; flex-shrink:0; width:3rem; text-align:center;">
                                <?= $s[0] ?></div>
                            <div>
                                <h6 class="fw-bold mb-1"><?= $s[1] ?></h6>
                                <p class="text-muted small mb-0"><?= $s[2] ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="mt-5">
                    <a href="mapa.php" class="btn px-4 py-2 fw-bold"
                        style="background:#2d7a4f; color:#fff; border-radius:999px;">
                        <i class="fas fa-map-location-dot me-2"></i>Ver no Mapa
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 order-lg-2 order-1">
            <div style="height:600px; overflow:hidden; position:relative;">
                <img src="beautiful-garden.webp" alt="Jardim Lisboa" style="width:100%; height:100%; object-fit:cover;">
                <div style="position:absolute;inset:0; background:linear-gradient(to left, transparent 60%, #f5f5f5);">
                </div>
            </div>
        </div>
    </div>
</section>


<section class="py-0 position-relative overflow-hidden" style="min-height:500px;">
    <img src="lisbon-from-above.jpg" alt="Lisboa do ar"
        style="width:100%; height:500px; object-fit:cover; object-position:center 40%; filter:brightness(.6);">
    <div
        style="position:absolute; inset:0; display:flex; align-items:center; justify-content:center; background:rgba(8,8,8,.45);">
        <div class="text-center reveal" style="color:#fff; padding:2rem;">
            <p
                style="font-size:.72rem; font-weight:700; letter-spacing:.2em; text-transform:uppercase; color:rgba(255,255,255,.5); margin-bottom:1rem;">
                Faça parte da mudança</p>
            <h2
                style="font-size:clamp(2rem,5vw,3.5rem); font-weight:700; letter-spacing:-.04em; margin-bottom:1.5rem; line-height:1.1;">
                Junte-se à comunidade<br>de Lisboa sustentável.
            </h2>
            <p
                style="color:rgba(255,255,255,.6); font-size:1.05rem; font-weight:300; max-width:480px; margin:0 auto 2.5rem;">
                Crie uma conta, receba alertas de novos pontos de recolha e acompanhe o impacto ambiental.
            </p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="registo.php" class="btn px-5 py-3 fw-bold"
                    style="background:#2d7a4f; color:#fff; border-radius:999px;">Criar Conta Grátis</a>
                <a href="mapa.php" class="btn btn-outline-white px-5 py-3">Ver Mapa</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<style>
    .hero-lisbon {
        position: relative;
        background: #080808;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .hero-lisbon::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(255, 255, 255, .025) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 255, 255, .025) 1px, transparent 1px);
        background-size: 60px 60px;
        animation: gridMove 20s linear infinite;
        z-index: 1;
    }

    .hero-overlay {
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse at 50% 60%, rgba(45, 122, 79, .18) 0%, transparent 70%);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }


    .feature-icon {
        transition: transform .3s ease;
    }

    .feature-icon:hover {
        transform: rotate(-8deg) scale(1.05);
    }
</style>