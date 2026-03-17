<?php
include 'includes/header.php';
require_once 'config/db.php';

// Se não houver email na sessão para verificar, redireciona para o login
if (!isset($_SESSION['verify_email']) && !isset($_POST['email'])) {
    redirect('login.php');
}

$email_verificar = $_SESSION['verify_email'] ?? $_POST['email'];
$erro = "";

if (isset($_GET['erro']) && $_GET['erro'] == 'nao_verificado') {
    $erro = "Esta conta ainda não foi verificada. Introduza o código que recebeu por e-mail.";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['codigo'])) {
    $codigo = sanitize($_POST['codigo']);
    $email = sanitize($_POST['email']);

    try {
        $stmt = $pdo->prepare("SELECT id FROM utilizadores WHERE email = ? AND token_verificacao = ? AND email_verificado = 0");
        $stmt->execute([$email, $codigo]);
        $user = $stmt->fetch();

        if ($user) {
            $stmt = $pdo->prepare("UPDATE utilizadores SET email_verificado = 1, token_verificacao = NULL WHERE id = ?");
            $stmt->execute([$user['id']]);

            unset($_SESSION['verify_email']);
            $_SESSION['msg_sucesso'] = "E-mail validado com sucesso! Agora pode fazer login.";
            redirect('login.php?status=validado');
        } else {
            $erro = "Código de verificação inválido ou expirado.";
        }
    } catch (PDOException $e) {
        $erro = "Erro ao processar validação.";
    }
}
?>

<section class="py-5 bg-soft min-vh-100 d-flex align-items-center">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5">
                <div class="card p-0 shadow-lg border-0 overflow-hidden" style="border-radius: 40px;">
                    <div class="card-body p-4 p-md-5">
                        <div class="text-center mb-5">
                            <div class="bg-dark d-inline-flex align-items-center justify-content-center mb-4 rounded-circle shadow-sm" style="width: 80px; height: 80px;">
                                <i class="fas fa-key fa-2x text-white"></i>
                            </div>
                            <h1 class="h3 fw-bold mb-3">Validar Conta</h1>
                            <p class="text-muted small px-3">Introduza o código de 6 dígitos enviado para <strong><?php echo $email_verificar; ?></strong></p>
                        </div>

                        <?php if ($erro): ?>
                            <div class="alert alert-danger rounded-4 shadow-sm mb-4 border-0 p-3 small">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <?php echo $erro; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['msg_sucesso'])): ?>
                            <div class="alert alert-dark rounded-4 shadow-sm mb-4 border-0 p-3 small">
                                <i class="fas fa-info-circle me-2"></i>
                                <?php echo $_SESSION['msg_sucesso']; unset($_SESSION['msg_sucesso']); ?>
                            </div>
                        <?php endif; ?>

                        <form action="validar_email.php" method="POST">
                            <input type="hidden" name="email" value="<?php echo $email_verificar; ?>">
                            <div class="mb-5">
                                <label class="fw-bold small text-muted mb-2 px-1 text-uppercase">Código de Verificação</label>
                                <input type="text" name="codigo" class="form-control text-center fw-bold display-6 py-3" 
                                       placeholder="000000" maxlength="6" pattern="\d{6}" required 
                                       style="letter-spacing: 10px; font-size: 2rem;">
                            </div>

                            <button type="submit" class="btn btn-dark btn-lg w-100 py-3 shadow-sm rounded-pill fw-bold">
                                VERIFICAR AGORA
                            </button>

                            <div class="text-center mt-5 pt-3 border-top">
                                <p class="small text-muted mb-0">NÃO RECEBEU O CÓDIGO? <br>
                                <a href="registo.php" class="fw-bold text-dark text-decoration-none">TENTE REGISTAR NOVAMENTE</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
