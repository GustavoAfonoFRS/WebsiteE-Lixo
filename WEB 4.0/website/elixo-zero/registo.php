<?php include 'includes/header.php'; ?>

<section class="py-5 bg-soft min-vh-100 d-flex align-items-center">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-5">
                <!-- Card Principal Premium Minimalist -->
                <div class="card p-0 shadow-lg border-0 overflow-hidden" style="border-radius: 40px;">
                    <div class="card-body p-4 p-md-5">
                        
                        <!-- Cabeçalho -->
                        <div class="text-center mb-5">
                            <div class="bg-dark d-inline-flex align-items-center justify-content-center mb-4 rounded-circle shadow-sm" style="width: 80px; height: 80px;">
                                <i class="fas fa-user-plus fa-2x text-white"></i>
                            </div>
                            <h1 class="h3 fw-bold mb-3">Criar Conta</h1>
                            <p class="text-muted small px-lg-5">Faça parte da rede de sustentabilidade urbana de Lisboa.</p>
                        </div>

                        <!-- Erros -->
                        <?php if (isset($_GET['erro'])): ?>
                            <div class="alert alert-dark rounded-4 shadow-sm mb-4 border-0 p-3 small">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <?php
    switch ($_GET['erro']) {
        case 'email_existe':
            echo 'Este e-mail já está registado.';
            break;
        case 'password_mismatch':
            echo 'As passwords não coincidem.';
            break;
        case 'campos_vazios':
            echo 'Preencha todos os campos.';
            break;
        default:
            echo 'Erro no registo.';
    }
?>
                            </div>
                        <?php
endif; ?>

                        <form action="processa_registo.php" method="POST">
                            <div class="mb-4">
                                <label class="fw-bold small text-muted mb-2 px-1">NOME COMPLETO</label>
                                <input type="text" name="nome" class="form-control" placeholder="Ex: Maria Silva" required>
                            </div>

                            <div class="mb-4">
                                <label class="fw-bold small text-muted mb-2 px-1">ENDEREÇO E-MAIL</label>
                                <input type="email" name="email" class="form-control" placeholder="exemplo@email.com" required>
                            </div>

                            <div class="mb-4">
                                <label class="fw-bold small text-muted mb-2 px-1">PASSWORD</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Mínimo 8 caracteres" required minlength="8">
                            </div>

                            <div class="mb-4">
                                <label class="fw-bold small text-muted mb-2 px-1">CONFIRMAR PASSWORD</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Repita a sua password" required>
                                <div id="passMatchMessage" class="small mt-2 d-none"></div>
                            </div>

                            <div class="mb-5">
                                <label class="fw-bold small text-muted mb-2 px-1">CÓDIGO ADMIN (OPCIONAL)</label>
                                <input type="text" name="admin_code" class="form-control" placeholder="Introduza o código se for administrador">
                            </div>

                            <button type="submit" id="submitBtn" class="btn btn-dark btn-lg w-100 py-3 shadow-sm rounded-pill fw-bold">
                                CRIAR CONTA
                            </button>

                            <div class="text-center mt-5 pt-3 border-top">
                                <p class="small text-muted mb-0">JÁ É MEMBRO? <a href="login.php" class="fw-bold text-dark text-decoration-none">LOGIN</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const password = document.getElementById('password');
    const confirm = document.getElementById('confirm_password');
    const message = document.getElementById('passMatchMessage');

    function checkPasswords() {
        if (confirm.value.length === 0) {
            message.classList.add('d-none');
            return;
        }
        message.classList.remove('d-none');
        if (password.value === confirm.value) {
            message.textContent = 'As passwords coincidem.';
            message.className = 'small mt-2 fw-semibold text-success';
        } else {
            message.textContent = 'As passwords não coincidem.';
            message.className = 'small mt-2 fw-semibold text-danger';
        }
    }
    password.addEventListener('input', checkPasswords);
    confirm.addEventListener('input', checkPasswords);
});
</script>

<?php include 'includes/footer.php'; ?>
