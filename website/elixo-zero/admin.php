<?php
include 'includes/header.php';
if (!isLoggedIn())
    redirect('login.php');
?>

<section class="py-5 min-vh-100" style="background:#f5f5f5; border-top:1px solid #e8e8e8;">
    <div class="container py-lg-4">

        <?php if (isset($_GET['status'])): ?>
            <div class="alert alert-dark d-flex align-items-center gap-3 mb-5 p-4">
                <i class="fas fa-check-circle fa-lg opacity-75"></i>
                <span class="fw-semibold">
                    <?php
                    if ($_GET['status'] == 'sucesso')
                        echo 'Ponto de recolha guardado com sucesso.';
                    if ($_GET['status'] == 'eliminado')
                        echo 'Ponto de recolha removido do sistema.';
                    ?>
                </span>
            </div>
        <?php endif; ?>

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-5 gap-4">
            <div>
                <p class="text-uppercase-refined mb-1">Painel de Controlo</p>
                <h1 class="display-5 fw-bold mb-0 tracking-tight">Gestão de Rede</h1>
            </div>
            <div class="d-flex gap-3 flex-wrap">
                <button class="btn btn-dark px-4 py-2 fw-bold" data-bs-toggle="modal" data-bs-target="#addPointModal">
                    <i class="fas fa-plus me-2" style="font-size:.75rem;"></i>Novo Ponto
                </button>
                <a href="#mensagens" class="btn btn-outline-dark px-4 py-2 fw-bold">
                    Mensagens
                </a>
            </div>
        </div>


        <h2 class="fw-semibold mb-4 h4">Pontos de Recolha</h2>
        <div class="card border-0 shadow-sm p-2 mb-5 overflow-hidden" style="border-radius: 30px;">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead>
                        <tr>
                            <th class="ps-4 py-3">NOME / MORADA</th>
                            <th>FREGUESIA</th>
                            <th>RESÍDUO</th>
                            <th class="text-end pe-4">AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once 'config/db.php';
                        $stmt = $pdo->query("SELECT * FROM pontos_recolha ORDER BY data_criacao DESC");
                        while ($row = $stmt->fetch()):
                            ?>
                            <tr>
                                <td class="ps-4">
                                    <span class="fw-bold d-block text-dark"><?php echo $row['nome']; ?></span>
                                    <small class="text-muted"><?php echo $row['morada']; ?></small>
                                </td>
                                <td class="small opacity-75"><?php echo $row['freguesia']; ?></td>
                                <td><span class="badge bg-dark rounded-pill px-3 py-2 fw-semibold"
                                        style="font-size: 0.7rem;"><?php echo $row['tipo_residuo']; ?></span></td>
                                <td class="text-end pe-4">
                                    <a href="elimina_ponto.php?id=<?php echo $row['id']; ?>"
                                        class="text-danger fw-bold small text-decoration-none px-2"
                                        onclick="return confirm('TEM A CERTEZA?');">
                                        ELIMINAR
                                    </a>
                                </td>
                            </tr>
                            <?php
                        endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>


        <h2 id="mensagens" class="fw-semibold mb-4 h4">Mensagens Recebidas</h2>
        <div class="card border-0 shadow-sm p-2 mb-5 overflow-hidden" style="border-radius: 30px;">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead>
                        <tr>
                            <th class="ps-4 py-3">REMETENTE</th>
                            <th>ASSUNTO</th>
                            <th>MENSAGEM</th>
                            <th class="text-end pe-4">DATA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stmtMsg = $pdo->query("SELECT * FROM mensagens ORDER BY data_envio DESC");
                        if ($stmtMsg->rowCount() == 0):
                            ?>
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted small opacity-50">Sem mensagens novas.
                                </td>
                            </tr>
                            <?php
                        endif;
                        while ($msg = $stmtMsg->fetch()):
                            ?>
                            <tr>
                                <td class="ps-4">
                                    <span class="fw-bold d-block text-dark"><?php echo $msg['nome']; ?></span>
                                    <small class="text-muted"><?php echo $msg['email']; ?></small>
                                </td>
                                <td><span class="small fw-bold opacity-75"><?php echo strtoupper($msg['assunto']); ?></span>
                                </td>
                                <td>
                                    <p class="small text-muted mb-0 text-truncate" style="max-width: 300px;">
                                        <?php echo $msg['mensagem']; ?></p>
                                </td>
                                <td class="text-end pe-4 small text-muted">
                                    <?php echo date('d M, Y', strtotime($msg['data_envio'])); ?></td>
                            </tr>
                            <?php
                        endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="addPointModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0 shadow-lg rounded-5 overflow-hidden">
            <div class="modal-header border-bottom border-light p-4 bg-soft">
                <h5 class="modal-title fw-bold">Novo Ponto de Recolha</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="processa_ponto.php" method="POST">
                <div class="modal-body p-4 p-md-5">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="fw-bold small text-muted mb-2 px-1">NOME DO LOCAL</label>
                            <input type="text" name="nome" class="form-control" placeholder="Ex: Ecocentro Monsanto"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold small text-muted mb-2 px-1">FREGUESIA</label>
                            <select name="freguesia" class="form-select border-0 bg-soft rounded-4 p-3 fw-semibold"
                                required>
                                <option value="">Selecione...</option>
                                <?php
                                $freguesias = ["Alcântara", "Areeiro", "Arroios", "Avenidas Novas", "Beato", "Belém", "Benfica", "Campo de Ourique", "Campolide", "Carnide", "Estrela", "Lumiar", "Marvila", "Misericórdia", "Olivais", "Parque das Nações", "Penha de França", "Santa Clara", "Santa Maria Maior", "Santo António", "São Domingos de Benfica", "São Vicente"];
                                foreach ($freguesias as $f)
                                    echo "<option value='$f'>$f</option>";
                                ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="fw-bold small text-muted mb-2 px-1">MORADA COMPLETA</label>
                            <input type="text" name="morada" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold small text-muted mb-2 px-1">LATITUDE</label>
                            <input type="text" name="latitude" class="form-control" placeholder="38.XXXXXX" required>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold small text-muted mb-2 px-1">LONGITUDE</label>
                            <input type="text" name="longitude" class="form-control" placeholder="-9.XXXXXX" required>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold small text-muted mb-2 px-1">TIPO DE RESÍDUO</label>
                            <input type="text" name="tipo_residuo" class="form-control"
                                placeholder="Pequenos, Grandes, TI..." required>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold small text-muted mb-2 px-1">HORÁRIO</label>
                            <input type="text" name="horario" class="form-control" placeholder="09:00 - 18:00">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4">
                    <button type="button" class="btn btn-outline-dark px-4 rounded-pill"
                        data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-dark px-5 rounded-pill shadow-sm">Guardar Ponto</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>