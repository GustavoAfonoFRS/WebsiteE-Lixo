<?php include 'includes/header.php'; ?>

<section class="py-5 bg-white min-vh-100">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-5">
                <h6 class="text-uppercase-refined mb-3">Linha Direta</h6>
                <h1 class="display-5 fw-bold mb-4">Como podemos ajudar?</h1>
                <p class="lead text-muted mb-5">Tem alguma dúvida sobre onde reciclar ou quer propor um novo ponto de recolha? Estamos aqui para colaborar.</p>
                
                <div class="pt-4 mb-4">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-dark p-3 me-3 d-flex align-items-center justify-content-center rounded-circle" style="width: 50px; height: 50px;">
                            <i class="fas fa-location-dot text-white small"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0">ESCRITÓRIO</h6>
                            <p class="text-muted small mb-0 opacity-75">Rua da Prata, 123, Lisboa</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-dark p-3 me-3 d-flex align-items-center justify-content-center rounded-circle" style="width: 50px; height: 50px;">
                            <i class="fas fa-phone text-white small"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0">TELEFONE</h6>
                            <p class="text-muted small mb-0 opacity-75">+351 210 000 000</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="bg-dark p-3 me-3 d-flex align-items-center justify-content-center rounded-circle" style="width: 50px; height: 50px;">
                            <i class="fas fa-envelope text-white small"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0">EMAIL</h6>
                            <p class="text-muted small mb-0 opacity-75">ajuda@lisbon-ewaste.pt</p>
                        </div>
                    </div>
                </div>

                <div class="mt-5 p-4 bg-soft" style="border-radius: 20px;">
                    <h6 class="fw-bold mb-2">Horário Atendimento</h6>
                    <p class="small text-muted mb-0">Seg - Sex: 09:00 - 18:00</p>
                    <p class="small text-muted mb-0">Sábados: 10:00 - 13:00</p>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card p-4 p-md-5 shadow-lg border-0" style="border-radius: 40px;">
                    <?php if (isset($_GET['status']) && $_GET['status'] == 'sucesso'): ?>
                        <div class="alert alert-dark rounded-4 shadow-sm mb-4 border-0 p-3 small">
                            <i class="fas fa-check-circle me-2"></i>
                            <strong>SUCESSO!</strong> Mensagem enviada com sucesso.
                        </div>
                    <?php
elseif (isset($_GET['status']) && $_GET['status'] == 'erro'): ?>
                        <div class="alert alert-danger rounded-4 shadow-sm mb-4 border-0 p-3 small">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>ERRO!</strong> Ocorreu um problema, tente novamente.
                        </div>
                    <?php
endif; ?>

                    <form id="contactForm" action="processa_contacto.php" method="POST">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="fw-bold small text-muted mb-2 px-1">NOME COMPLETO</label>
                                <input type="text" name="nome" class="form-control" placeholder="Seu nome" required>
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold small text-muted mb-2 px-1">E-MAIL</label>
                                <input type="email" name="email" class="form-control" placeholder="email@exemplo.com" required>
                            </div>
                            <div class="col-12">
                                <label class="fw-bold small text-muted mb-2 px-1">ASSUNTO</label>
                                <select name="assunto" class="form-select border-0 bg-soft rounded-4 p-3 fw-semibold" required>
                                    <option value="">Selecione um assunto</option>
                                    <option value="Dúvida Geral">Dúvida Geral</option>
                                    <option value="Proposta de Ponto">Proposta de Novo Ponto</option>
                                    <option value="Erro no Mapa">Erro de Informação no Mapa</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="fw-bold small text-muted mb-2 px-1">MENSAGEM</label>
                                <textarea name="mensagem" class="form-control" rows="5" placeholder="Como podemos ajudar?" required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-dark btn-lg w-100 py-3 shadow-sm rounded-pill fw-bold">ENVIAR MENSAGEM</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
