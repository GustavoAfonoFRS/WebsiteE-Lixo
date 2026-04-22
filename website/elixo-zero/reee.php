<?php include 'includes/header.php'; ?>

<style>
.reee-hero {
    background: #080808;
    color: #fff;
    padding: 120px 0 80px;
    position: relative;
    overflow: hidden;
}
.reee-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(rgba(255,255,255,.025) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,.025) 1px, transparent 1px);
    background-size: 60px 60px;
    animation: gridMove 20s linear infinite;
}
.reee-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse at 50% 100%, rgba(45,122,79,.25) 0%, transparent 65%);
}
@keyframes gridMove {
    from { background-position: 0 0, 0 0; }
    to   { background-position: 60px 60px, 60px 60px; }
}
.reee-hero .container { position: relative; z-index: 2; }

.cat-card {
    border-radius: 24px;
    overflow: hidden;
    background: #fff;
    border: 1px solid #eee;
    transition: all .35s cubic-bezier(.4,0,.2,1);
}
.cat-card:hover {
    border-color: transparent;
    box-shadow: 0 20px 60px rgba(0,0,0,.12);
    transform: translateY(-5px);
}
.cat-card img {
    height: 180px;
    width: 100%;
    object-fit: cover;
    transition: transform .5s ease;
}
.cat-card:hover img { transform: scale(1.02); }

.impact-tag {
    display: inline-flex;
    align-items: center;
    gap: .4rem;
    background: rgba(45,122,79,.1);
    color: #1a4d30;
    border: 1px solid rgba(45,122,79,.2);
    border-radius: 999px;
    padding: .3rem .8rem;
    font-size: .72rem;
    font-weight: 700;
    letter-spacing: .08em;
    text-transform: uppercase;
}

.chart-card {
    background: #fff;
    border-radius: 28px;
    border: 1px solid #ebebeb;
    padding: 2rem 2.5rem;
    height: 100%;
    transition: box-shadow .3s ease;
}
.chart-card:hover { box-shadow: 0 12px 40px rgba(0,0,0,.08); }
.chart-card.dark {
    background: #080808;
    border-color: transparent;
    color: #fff;
}
.chart-card.green {
    background: linear-gradient(135deg, #1a4d30, #2d7a4f);
    border-color: transparent;
    color: #fff;
}
</style>

<section class="reee-hero">
    <div class="container text-center">
        <div class="hero-badge reveal d-inline-flex" style="margin-bottom:2rem;">
            <span class="dot" style="background:#6effa0;"></span>
            Guia de Resíduos Eletrónicos
        </div>
        <h1 class="reveal" style="font-size:clamp(2.5rem,6vw,4.5rem); font-weight:300; letter-spacing:-.04em; color:#fff; line-height:1.1; margin-bottom:1.5rem;">
            Tudo sobre <strong style="font-family:'Playfair Display',serif; font-style:italic;">REEE</strong>
        </h1>
        <p class="reveal mx-auto" style="color:rgba(255,255,255,.55); font-size:1.1rem; font-weight:300; max-width:580px; line-height:1.8; margin-bottom:2.5rem;">
            Resíduos de Equipamentos Elétricos e Eletrónicos — categorias, impactos, dados e como agir correctamente.
        </p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="#categorias" class="btn px-4 py-2 fw-bold" style="background:#2d7a4f; color:#fff; border-radius:999px;">
                <i class="fas fa-list me-2" style="font-size:.8rem;"></i>Ver Categorias
            </a>
            <a href="#dados" class="btn btn-outline-white px-4 py-2">Ver Dados & Gráficos</a>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 reveal">
                <span class="impact-tag mb-3 d-inline-block"><i class="fas fa-circle-info"></i> Definição</span>
                <h2 class="display-5 fw-semibold tracking-tight mb-4">O que são<br>Resíduos Eletrónicos?</h2>
                <p class="text-muted mb-4" style="font-weight:300; line-height:1.9; font-size:1.05rem;">
                    REEE engloba qualquer equipamento que necessite de energia elétrica ou bateria para funcionar, que chegou ao fim da sua vida útil. Desde um telemóvel a um frigorífico, passando por lâmpadas e cabos.
                </p>
                <p class="text-muted mb-5" style="font-weight:300; line-height:1.9; font-size:1.05rem;">
                    O problema: estes resíduos contêm substâncias perigosas — chumbo, mercúrio, cádmio — que, em aterro, contaminam solos e lençóis freáticos. A solução existe: reciclagem especializada.
                </p>
                <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="text-center p-3 rounded-4" style="background:#f5f5f5;">
                            <div style="font-size:1.8rem; font-weight:900; color:#2d7a4f; letter-spacing:-.04em;">62M</div>
                            <p class="small text-muted mb-0" style="font-size:.72rem; font-weight:600; text-transform:uppercase; letter-spacing:.08em;">Ton em 2022</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-center p-3 rounded-4" style="background:#f5f5f5;">
                            <div style="font-size:1.8rem; font-weight:900; color:#2d7a4f; letter-spacing:-.04em;">82M</div>
                            <p class="small text-muted mb-0" style="font-size:.72rem; font-weight:600; text-transform:uppercase; letter-spacing:.08em;">Est. 2030</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-center p-3 rounded-4" style="background:#f5f5f5;">
                            <div style="font-size:1.8rem; font-weight:900; color:#2d7a4f; letter-spacing:-.04em;">20%</div>
                            <p class="small text-muted mb-0" style="font-size:.72rem; font-weight:600; text-transform:uppercase; letter-spacing:.08em;">Reciclado</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 reveal">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="p-4 rounded-4" style="background: linear-gradient(135deg,#1a4d30,#2d7a4f); color:#fff;">
                            <i class="fas fa-triangle-exclamation mb-3" style="font-size:1.5rem; opacity:.7;"></i>
                            <h6 class="fw-bold mb-2">Impacto Ambiental</h6>
                            <p class="small mb-0" style="color:rgba(255,255,255,.7); line-height:1.8;">O descarte incorreto liberta chumbo, mercúrio e cádmio, causando danos irreversíveis aos ecossistemas, lençóis freáticos e saúde pública.</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-4 rounded-4" style="background:#080808; color:#fff;">
                            <i class="fas fa-coins mb-3" style="font-size:1.5rem; color:#6effa0; opacity:.8;"></i>
                            <h6 class="fw-bold mb-2">Oportunidade Económica</h6>
                            <p class="small mb-0" style="color:rgba(255,255,255,.6); line-height:1.8;">Uma tonelada de telemóveis contém mais ouro do que uma tonelada de minério. Os REEE valem globalmente mais de 57 mil milhões de euros em materiais recuperáveis.</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-4 rounded-4" style="background:#f5f5f5;">
                            <i class="fas fa-recycle mb-3" style="font-size:1.5rem; color:#2d7a4f;"></i>
                            <h6 class="fw-bold mb-2">Legislação Europeia</h6>
                            <p class="small text-muted mb-0" style="line-height:1.8;">A Diretiva REEE da UE obriga produtores e distribuidores a garantir sistemas de recolha e reciclagem acessíveis. Em Portugal, o sistema Electrão gere este processo.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="categorias" class="py-5" style="background:#f5f5f5; border-top:1px solid #e8e8e8;">
    <div class="container py-4">
        <div class="text-center mb-5 reveal">
            <span class="impact-tag mb-3 d-inline-block"><i class="fas fa-layer-group"></i> Categorias</span>
            <h2 class="display-6 fw-semibold tracking-tight">Categorias de REEE</h2>
            <p class="text-muted mt-3 mx-auto" style="max-width:500px; font-weight:300;">
                Como identificar e onde depositar cada tipo de equipamento eletrónico.
            </p>
        </div>

        <div class="row g-4 reveal-stagger">
            <?php
            $categorias = [
                [
                    "titulo"   => "Pequenos Eletrodomésticos",
                    "icone"    => "fa-blender",
                    "img"      => "assets/images/eletronicos domesticos.webp",
                    "desc"     => "Torradeiras, máquinas de café, secadores, ferros de engomar, aspiradores.",
                    "instrucao"=> "Pontos Eletrão em lojas especializadas ou ecocentros municipais.",
                    "cor"      => "#2d7a4f"
                ],
                [
                    "titulo"   => "Grandes Eletrodomésticos",
                    "icone"    => "fa-temperature-low",
                    "img"      => "assets/images/grande eletrodomesticos.jpg",
                    "desc"     => "Frigoríficos, máquinas de lavar, fogões, ar condicionado.",
                    "instrucao"=> "Agendar recolha gratuita via CML ou entregar em centros de reciclagem.",
                    "cor"      => "#1a4d30"
                ],
                [
                    "titulo"   => "Equipamentos Informáticos",
                    "icone"    => "fa-laptop",
                    "img"      => "assets/images/equipamentos informaticos.png",
                    "desc"     => "Portáteis, desktops, telemóveis, tablets, impressoras.",
                    "instrucao"=> "Doação (se funcional) ou Ponto Eletrão em lojas de tecnologia.",
                    "cor"      => "#3a9a64"
                ],
                [
                    "titulo"   => "TV e Monitores",
                    "icone"    => "fa-tv",
                    "img"      => "assets/images/TV.jpg",
                    "desc"     => "Ecrãs CRT, monitores LCD, TVs Plasma e OLED.",
                    "instrucao"=> "Ecocentros municipais ou lojas na compra de equipamento novo.",
                    "cor"      => "#080808"
                ],
                [
                    "titulo"   => "Pilhas e Baterias",
                    "icone"    => "fa-battery-full",
                    "img"      => "assets/images/pilhas.jpg",
                    "desc"     => "Pilhas alcalinas, baterias de lítio, chumbo-ácido.",
                    "instrucao"=> "Pilhão — contentores presentes na maioria das lojas e supermercados.",
                    "cor"      => "#333"
                ],
                [
                    "titulo"   => "Lâmpadas",
                    "icone"    => "fa-lightbulb",
                    "img"      => "assets/images/lampadas.jpg",
                    "desc"     => "Fluorescentes, LED, lâmpadas de descarga e halogénio.",
                    "instrucao"=> "Contentores específicos em lojas de ferragens e ecocentros.",
                    "cor"      => "#555"
                ],
            ];
            foreach ($categorias as $cat): ?>
            <div class="col-md-6 col-lg-4">
                <div class="cat-card h-100">
                    <div style="position:relative;">
                        <img src="<?= $cat['img'] ?>" alt="<?= $cat['titulo'] ?>">
                        <div style="position:absolute; top:1rem; left:1rem;">
                            <div style="width:38px;height:38px; background:<?= $cat['cor'] ?>; border-radius:10px; display:flex; align-items:center; justify-content:center;">
                                <i class="fas <?= $cat['icone'] ?> text-white" style="font-size:.8rem;"></i>
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <h5 class="fw-bold mb-2"><?= $cat['titulo'] ?></h5>
                        <p class="small text-muted mb-3" style="line-height:1.7;"><?= $cat['desc'] ?></p>
                        <div class="pt-3" style="border-top:1px solid #f5f5f5;">
                            <p class="small mb-0" style="color:#444; line-height:1.6;">
                                <span style="color:<?= $cat['cor'] ?>; font-weight:700;">↳</span> <?= $cat['instrucao'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section id="dados" class="py-5 bg-white">
    <div class="container py-5">
        <div class="text-center mb-5 reveal">
            <span class="impact-tag mb-3 d-inline-block"><i class="fas fa-chart-line"></i> Estatísticas</span>
            <h2 class="display-6 fw-semibold tracking-tight">Portugal em Números</h2>
            <p class="text-muted mt-3 mx-auto" style="max-width:520px; font-weight:300;">
                Dados que revelam a escala do problema e o progresso alcançado.
            </p>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-lg-5 reveal">
                <div class="chart-card">
                    <span class="impact-tag mb-3 d-inline-block"><i class="fas fa-circle-dot"></i> Portugal 2025</span>
                    <h5 class="fw-bold mb-1 tracking-tight">Tipos de Equipamento Recolhido</h5>
                    <p class="text-muted small mb-4">Toneladas por categoria de REEE</p>
                    <div class="position-relative" style="max-width:260px; margin:0 auto;">
                        <canvas id="donutChart" height="260"></canvas>
                        <div style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);text-align:center;pointer-events:none;">
                            <div style="font-size:1.5rem;font-weight:900;letter-spacing:-.04em;line-height:1;">~44k</div>
                            <div style="font-size:.65rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:#aaa;">Toneladas</div>
                        </div>
                    </div>
                    <div id="donut-legend" class="mt-4" style="display:grid;grid-template-columns:1fr 1fr;gap:.5rem .8rem;"></div>
                </div>
            </div>

            <div class="col-lg-7 d-flex flex-column gap-4">
                <div class="chart-card reveal">
                    <span class="impact-tag mb-3 d-inline-block"><i class="fas fa-person"></i> Comparativo</span>
                    <h5 class="fw-bold mb-1 tracking-tight">Lixo Eletrónico por Habitante</h5>
                    <p class="text-muted small mb-4">Kg / pessoa / ano — Portugal abaixo da média UE</p>
                    <canvas id="barKgChart" height="120"></canvas>
                </div>

                <div class="chart-card dark reveal">
                    <p class="text-uppercase-refined mb-1" style="color:rgba(255,255,255,.3);">Lisboa</p>
                    <div class="d-flex align-items-baseline gap-3 flex-wrap mb-1">
                        <h5 class="fw-bold mb-0 tracking-tight">Pontos de Recolha Ativos</h5>
                        <span style="background:rgba(110,255,160,.15);color:#6effa0;font-size:.7rem;font-weight:700;letter-spacing:.08em;padding:.25rem .7rem;border-radius:999px;border:1px solid rgba(110,255,160,.25);">+34% em 1 ano</span>
                    </div>
                    <p class="small mb-4" style="color:rgba(255,255,255,.35);">Crescimento 2024 → 2025</p>
                    <canvas id="barGrowthChart" height="100"></canvas>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-lg-6 reveal">
                <div class="chart-card">
                    <span class="impact-tag mb-3 d-inline-block"><i class="fas fa-chart-line"></i> Evolução Nacional</span>
                    <h5 class="fw-bold mb-1 tracking-tight">Toneladas Recicladas em Portugal</h5>
                    <p class="text-muted small mb-4">Crescimento expressivo desde 2019</p>
                    <canvas id="linePortugalChart" height="200"></canvas>
                </div>
            </div>
            <div class="col-lg-6 reveal">
                <div class="chart-card dark">
                    <p class="text-uppercase-refined mb-1" style="color:rgba(255,255,255,.3);">Escala Mundial</p>
                    <h5 class="fw-bold mb-1 tracking-tight">Crescimento Global do Lixo Eletrónico</h5>
                    <p class="small mb-4" style="color:rgba(255,255,255,.35);">Milhões de toneladas produzidas (2030 = estimativa)</p>
                    <canvas id="lineGlobalChart" height="200"></canvas>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-5 reveal">
                <div class="chart-card">
                    <span class="impact-tag mb-3 d-inline-block"><i class="fas fa-earth-europe"></i> Europa</span>
                    <h5 class="fw-bold mb-1 tracking-tight">Lixo Eletrónico por País</h5>
                    <p class="text-muted small mb-4">Kg / pessoa / ano — Comparativo europeu</p>
                    <canvas id="barCountryChart" height="200"></canvas>
                </div>
            </div>
            <div class="col-lg-4 reveal">
                <div class="chart-card">
                    <span class="impact-tag mb-3 d-inline-block"><i class="fas fa-house"></i> Hábitos</span>
                    <h5 class="fw-bold mb-1 tracking-tight">Equipamentos Guardados em Casa</h5>
                    <p class="text-muted small mb-3">Em vez de reciclados</p>
                    <div style="max-width:200px; margin:0 auto 1rem;">
                        <canvas id="pieHomeChart" height="200"></canvas>
                    </div>
                    <div id="home-legend" style="display:flex;flex-direction:column;gap:.4rem;"></div>
                </div>
            </div>
            <div class="col-lg-3 reveal">
                <div class="chart-card">
                    <span class="impact-tag mb-3 d-inline-block"><i class="fas fa-atom"></i> Composição</span>
                    <h5 class="fw-bold mb-1 tracking-tight">Materiais Valiosos</h5>
                    <p class="text-muted small mb-3">Dentro do lixo eletrónico</p>
                    <div style="max-width:180px; margin:0 auto 1rem;">
                        <canvas id="pieMaterialsChart" height="180"></canvas>
                    </div>
                    <div id="materials-legend" style="display:flex;flex-direction:column;gap:.4rem;"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background:#f5f5f5; border-top:1px solid #e8e8e8;">
    <div class="container py-4">
        <div class="text-center mb-5 reveal">
            <span class="impact-tag mb-3 d-inline-block"><i class="fas fa-scale-balanced"></i> Impacto</span>
            <h2 class="display-6 fw-semibold tracking-tight">O que está em jogo</h2>
        </div>
        <div class="row g-4 reveal-stagger">
            <div class="col-md-4">
                <div class="chart-card" style="border-left:3px solid #c0392b;">
                    <h6 class="fw-bold mb-3" style="color:#c0392b;"><i class="fas fa-skull-crossbones me-2"></i>Riscos do Descarte Errado</h6>
                    <ul class="small text-muted mb-0" style="line-height:2; padding-left:1.1rem;">
                        <li>Chumbo nos lençóis freáticos</li>
                        <li>Mercúrio no solo e na cadeia alimentar</li>
                        <li>Cádmio tóxico acumulado na natureza</li>
                        <li>Dioxinas libertadas por queima ilegal</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="chart-card" style="border-left:3px solid #2d7a4f;">
                    <h6 class="fw-bold mb-3" style="color:#2d7a4f;"><i class="fas fa-leaf me-2"></i>Benefícios da Reciclagem</h6>
                    <ul class="small text-muted mb-0" style="line-height:2; padding-left:1.1rem;">
                        <li>Redução do CO₂ na extração mineira</li>
                        <li>Recuperação de materiais escassos</li>
                        <li>Criação de emprego verde local</li>
                        <li>Menores emissões industriais</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="chart-card" style="border-left:3px solid #080808;">
                    <h6 class="fw-bold mb-3"><i class="fas fa-scale-unbalanced me-2"></i>Portugal vs Europa</h6>
                    <p class="small text-muted mb-3" style="line-height:1.8;">Portugal recicla <strong>4,5 kg</strong> per capita. A média europeia é <strong>11,6 kg</strong>.</p>
                    <div style="background:#f5f5f5; border-radius:12px; padding:.8rem; font-size:.8rem;">
                        <div class="d-flex justify-content-between fw-bold mb-1">
                            <span>Portugal</span><span style="color:#2d7a4f;">4,5 kg</span>
                        </div>
                        <div style="background:#e0e0e0; border-radius:4px; height:6px; margin-bottom:.8rem;">
                            <div style="width:38.8%; background:#2d7a4f; height:6px; border-radius:4px;"></div>
                        </div>
                        <div class="d-flex justify-content-between fw-bold mb-1">
                            <span>Média UE</span><span>11,6 kg</span>
                        </div>
                        <div style="background:#e0e0e0; border-radius:4px; height:6px;">
                            <div style="width:100%; background:#080808; height:6px; border-radius:4px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
(function () {
    const GREEN  = '#2d7a4f';
    const GREENS = ['#1a4d30','#2d7a4f','#3a9a64','#5ab87a','#a8f5c8'];
    const GRAYS  = ['#080808','#2e2e2e','#555','#888','#aaa'];
    const lt = { backgroundColor:'#080808', titleColor:'#fff', bodyColor:'rgba(255,255,255,.7)', padding:10, cornerRadius:8, displayColors:false };
    const dt = { backgroundColor:'#1a4d30', titleColor:'#fff', bodyColor:'rgba(255,255,255,.7)', padding:10, cornerRadius:8, displayColors:false };

    function buildLegend(id, labels, colors, values) {
        const el = document.getElementById(id);
        if (!el) return;
        const tot = values.reduce((a, b) => a + b, 0);
        labels.forEach((label, i) => {
            const pct = ((values[i] / tot) * 100).toFixed(1);
            el.innerHTML += `<div style="display:flex;align-items:center;gap:.5rem;">
                <div style="width:9px;height:9px;border-radius:2px;background:${colors[i]};flex-shrink:0;"></div>
                <span style="font-size:.72rem;color:#555;line-height:1.2;">${label} <strong style="color:#111;">${pct}%</strong></span>
            </div>`;
        });
    }

    function init() {
        const C = window.Chart;
        C.defaults.font.family = "'Inter', sans-serif";
        C.defaults.plugins.legend.display = false;

        const dc = document.getElementById('donutChart');
        if (dc) {
            const dLabels = ['Grandes Eletrodomésticos','Pequenos Eletrodomésticos','Equip. de Frio','Informática & Telecom','Ecrãs & TV','Lâmpadas & Outros'];
            const dValues = [22909, 10000, 6000, 3000, 2000, 1000];
            const dColors = ['#1a4d30','#2d7a4f','#3a9a64','#5ab87a','#888','#bbb'];
            new C(dc, {
                type: 'doughnut',
                data: { labels: dLabels, datasets: [{ data: dValues, backgroundColor: dColors, borderWidth: 3, borderColor: '#fff', hoverOffset: 8 }] },
                options: {
                    cutout: '68%',
                    animation: { animateRotate: true, duration: 1200, easing: 'easeOutQuart' },
                    plugins: { tooltip: { ...lt, callbacks: { label: ctx => ` ${ctx.label}: ${ctx.parsed.toLocaleString('pt-PT')} ton` } } }
                }
            });
            buildLegend('donut-legend', dLabels, dColors, dValues);
        }

        const bk = document.getElementById('barKgChart');
        if (bk) {
            new C(bk, {
                type: 'bar',
                data: {
                    labels: ['Portugal', 'Média UE'],
                    datasets: [{ data: [4.5, 11.6], backgroundColor: [GREEN, '#ccc'], borderRadius: 8, borderSkipped: false, barThickness: 44 }]
                },
                options: {
                    indexAxis: 'y',
                    animation: { duration: 1000, easing: 'easeOutQuart' },
                    scales: {
                        x: { grid: { display: false }, border: { display: false }, ticks: { color: '#aaa', font: { size: 11 }, callback: v => v + ' kg' }, max: 14 },
                        y: { grid: { display: false }, border: { display: false }, ticks: { color: '#333', font: { size: 13, weight: '700' } } }
                    },
                    plugins: { tooltip: { ...lt, callbacks: { label: ctx => ` ${ctx.parsed.x} kg / pessoa / ano` } } }
                }
            });
        }

        const bg = document.getElementById('barGrowthChart');
        if (bg) {
            new C(bg, {
                type: 'bar',
                data: {
                    labels: ['2024', '2025'],
                    datasets: [{ data: [457, 613], backgroundColor: ['rgba(255,255,255,.15)', 'rgba(110,255,160,.7)'], borderRadius: 8, borderSkipped: false, barThickness: 52 }]
                },
                options: {
                    animation: { duration: 1000, easing: 'easeOutQuart' },
                    scales: {
                        y: { grid: { color: 'rgba(255,255,255,.05)' }, border: { display: false }, ticks: { color: 'rgba(255,255,255,.3)', font: { size: 11 } }, min: 0, max: 700 },
                        x: { grid: { display: false }, border: { display: false }, ticks: { color: 'rgba(255,255,255,.6)', font: { size: 14, weight: '700' } } }
                    },
                    plugins: { tooltip: { ...dt, callbacks: { label: ctx => ` ${ctx.parsed.y} pontos ativos` } } }
                }
            });
        }

        const lp = document.getElementById('linePortugalChart');
        if (lp) {
            new C(lp, {
                type: 'line',
                data: {
                    labels: ['2019', '2022', '2024', '2025'],
                    datasets: [{ data: [13000, 32000, 36383, 45000], borderColor: GREEN, backgroundColor: 'rgba(45,122,79,.08)', borderWidth: 2.5, pointBackgroundColor: GREEN, pointRadius: 5, pointHoverRadius: 7, fill: true, tension: 0.35 }]
                },
                options: {
                    animation: { duration: 1200, easing: 'easeOutQuart' },
                    scales: {
                        y: { grid: { color: '#f0f0f0' }, border: { display: false }, ticks: { color: '#aaa', font: { size: 11 }, callback: v => (v / 1000).toFixed(0) + 'k' } },
                        x: { grid: { display: false }, border: { display: false }, ticks: { color: '#555', font: { size: 12, weight: '600' } } }
                    },
                    plugins: { tooltip: { ...lt, callbacks: { label: ctx => ` ${ctx.parsed.y.toLocaleString('pt-PT')} toneladas` } } }
                }
            });
        }

        const lg = document.getElementById('lineGlobalChart');
        if (lg) {
            new C(lg, {
                type: 'line',
                data: {
                    labels: ['2014', '2019', '2022', '2030 (est.)'],
                    datasets: [{ data: [44, 53, 62, 82], borderColor: 'rgba(110,255,160,.85)', backgroundColor: 'rgba(110,255,160,.07)', borderWidth: 2.5, pointBackgroundColor: '#6effa0', pointBorderColor: '#080808', pointBorderWidth: 1.5, pointRadius: 5, pointHoverRadius: 7, fill: true, tension: 0.35 }]
                },
                options: {
                    animation: { duration: 1200, easing: 'easeOutQuart' },
                    scales: {
                        y: { grid: { color: 'rgba(255,255,255,.05)' }, border: { display: false }, ticks: { color: 'rgba(255,255,255,.3)', font: { size: 11 }, callback: v => v + 'M' } },
                        x: { grid: { display: false }, border: { display: false }, ticks: { color: 'rgba(255,255,255,.5)', font: { size: 11, weight: '600' } } }
                    },
                    plugins: { tooltip: { ...dt, callbacks: { label: ctx => ` ${ctx.parsed.y} milhões de toneladas` } } }
                }
            });
        }

        const bc = document.getElementById('barCountryChart');
        if (bc) {
            new C(bc, {
                type: 'bar',
                data: {
                    labels: ['Portugal', 'Espanha', 'França', 'Média UE'],
                    datasets: [{ data: [4.5, 7.3, 9.7, 11.6], backgroundColor: [GREEN, '#3a9a64', '#5ab87a', '#ccc'], borderRadius: 7, borderSkipped: false, barThickness: 32 }]
                },
                options: {
                    indexAxis: 'y',
                    animation: { duration: 1000, easing: 'easeOutQuart' },
                    scales: {
                        x: { grid: { color: '#f0f0f0' }, border: { display: false }, ticks: { color: '#aaa', font: { size: 11 }, callback: v => v + ' kg' }, max: 14 },
                        y: { grid: { display: false }, border: { display: false }, ticks: { color: '#222', font: { size: 12, weight: '700' } } }
                    },
                    plugins: { tooltip: { ...lt, callbacks: { label: ctx => ` ${ctx.parsed.x} kg / pessoa / ano` } } }
                }
            });
        }

        const ph = document.getElementById('pieHomeChart');
        if (ph) {
            const hLabels = ['Telemóveis', 'Cabos', 'Computadores', 'Tablets', 'Outros'];
            const hValues = [42, 25, 15, 8, 10];
            const hColors = ['#1a4d30','#2d7a4f','#3a9a64','#888','#bbb'];
            new C(ph, {
                type: 'doughnut',
                data: { labels: hLabels, datasets: [{ data: hValues, backgroundColor: hColors, borderWidth: 3, borderColor: '#fff', hoverOffset: 6 }] },
                options: { cutout: '60%', animation: { animateRotate: true, duration: 1200 }, plugins: { tooltip: { ...lt, callbacks: { label: ctx => ` ${ctx.label}: ${ctx.parsed}%` } } } }
            });
            buildLegend('home-legend', hLabels, hColors, hValues);
        }

        const pm = document.getElementById('pieMaterialsChart');
        if (pm) {
            const mLabels = ['Ferro', 'Plástico', 'Alumínio', 'Cobre', 'Metais raros'];
            const mValues = [50, 21, 13, 7, 9];
            const mColors = ['#1a4d30','#2d7a4f','#3a9a64','#888','#bbb'];
            new C(pm, {
                type: 'doughnut',
                data: { labels: mLabels, datasets: [{ data: mValues, backgroundColor: mColors, borderWidth: 3, borderColor: '#fff', hoverOffset: 6 }] },
                options: { cutout: '55%', animation: { animateRotate: true, duration: 1200 }, plugins: { tooltip: { ...lt, callbacks: { label: ctx => ` ${ctx.label}: ${ctx.parsed}%` } } } }
            });
            buildLegend('materials-legend', mLabels, mColors, mValues);
        }
    }

    if (!window.Chart) {
        const s = document.createElement('script');
        s.src = 'https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js';
        s.onload = init;
        document.head.appendChild(s);
    } else { init(); }
})();
</script>

<?php include 'includes/footer.php'; ?>
