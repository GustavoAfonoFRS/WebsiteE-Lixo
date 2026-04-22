<?php include 'includes/header.php'; ?>

<section class="py-5 bg-soft min-vh-100 d-flex align-items-center">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5">
                <div class="card p-0 shadow-lg border-0 overflow-hidden" style="border-radius: 40px;">
                    <div class="card-body p-4 p-md-5">
                        
                        <div class="text-center mb-5">
                            <div class="bg-dark d-inline-flex align-items-center justify-content-center mb-4 rounded-circle shadow-sm" style="width: 80px; height: 80px;">
                                <i class="fas fa-sign-in-alt fa-2x text-white"></i>
                            </div>
                            <h1 class="h3 fw-bold mb-3">Bem-vindo</h1>
                            <p class="text-muted small px-3">Bem-vindo de volta à plataforma de sustentabilidade urbana.</p>
                        </div>

                        <?php if (isset($_SESSION['msg_sucesso'])): ?>
                            <div class="alert alert-dark rounded-4 shadow-sm mb-4 border-0 p-3 small">
                                <i class="fas fa-check-circle me-2"></i>
                                <?php echo $_SESSION['msg_sucesso'];
    unset($_SESSION['msg_sucesso']); ?>
                            </div>
                        <?php
endif; ?>

                        <?php if (isset($_GET['erro'])): ?>
                            <div class="alert alert-danger rounded-4 shadow-sm mb-4 border-0 p-3 small">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <?php 
                                if($_GET['erro'] == 'email_nao_verificado') echo "O SEU E-MAIL AINDA NÃO FOI VALIDADO. POR FAVOR, VERIFIQUE A SUA CAIXA D'ENTRADA.";
                                elseif($_GET['erro'] == 'token_invalido') echo "LINK DE VALIDAÇÃO INVÁLIDO OU EXPIRADO.";
                                else echo "CREDENCIAIS INVÁLIDAS. TENTE NOVAMENTE.";
                                ?>
                            </div>
                        <?php endif; ?>

                        <form action="processa_login.php" method="POST">
                            <div class="mb-4">
                                <label class="fw-bold small text-muted mb-2 px-1">E-MAIL</label>
                                <input type="email" name="email" class="form-control" placeholder="exemplo@email.com" required>
                            </div>

                            <div class="mb-5">
                                <div class="d-flex justify-content-between mb-2">
                                    <label class="fw-bold small text-muted px-1">PASSWORD</label>
                                    <a href="#" class="small text-dark fw-bold text-decoration-none opacity-50">ESQUECEU?</a>
                                </div>
                                <input type="password" name="password" class="form-control" placeholder="Sua password" required>
                            </div>

                            <button type="submit" class="btn btn-dark btn-lg w-100 py-3 shadow-sm rounded-pill fw-bold">
                                ENTRAR
                            </button>

                            <div class="text-center mt-5 pt-3 border-top">
                                <p class="small text-muted mb-0">NÃO TEM CONTA? <a href="registo.php" class="fw-bold text-dark text-decoration-none">REGISTE-SE</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
