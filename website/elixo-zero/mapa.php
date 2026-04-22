<?php
require_once 'config/db.php';

if (isset($_GET['ajax']) && $_GET['ajax'] == 1) {
    header('Content-Type: application/json');
    $query = "SELECT id, nome, morada, freguesia, latitude, longitude, tipo_residuo, horario, link_oficial FROM pontos_recolha WHERE 1=1";
    $params = [];
    if (!empty($_GET['freguesia'])) {
        $query .= " AND freguesia LIKE ?";
        $params[] = "%" . $_GET['freguesia'] . "%";
    }
    if (!empty($_GET['tipo'])) {
        $query .= " AND tipo_residuo LIKE ?";
        $params[] = "%" . $_GET['tipo'] . "%";
    }
    if (!empty($_GET['search'])) {
        $query .= " AND (nome LIKE ? OR morada LIKE ?)";
        $params[] = "%" . $_GET['search'] . "%";
        $params[] = "%" . $_GET['search'] . "%";
    }
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    echo json_encode($stmt->fetchAll());
    exit;
}

include 'includes/header.php';
?>

<div class="container-fluid p-0" style="background:#fff;">
    <div class="row g-0" style="height:calc(100vh - 130px);">

        <div class="col-lg-3 map-sidebar p-4 d-flex flex-column">

            <div class="mb-4">
                <p class="text-uppercase-refined mb-1">Explorar</p>
                <h5 class="fw-bold mb-0 tracking-tight" style="font-size:1.3rem;">Filtrar Locais</h5>
            </div>

            <form id="filterForm" class="flex-grow-1">
                <div class="mb-3">
                    <label class="text-uppercase-refined d-block mb-2">Pesquisa</label>
                    <div class="position-relative">
                        <i class="fas fa-magnifying-glass position-absolute"
                            style="left:1rem; top:50%; transform:translateY(-50%); color:#aaa;"></i>
                        <input type="text" id="search" name="search" class="form-control ps-4"
                            placeholder="Nome ou morada...">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="text-uppercase-refined d-block mb-2">Freguesia</label>
                    <select id="freguesia" name="freguesia" class="form-select">
                        <option value="">Todas as Freguesias</option>
                        <?php
                        $freguesias = ["Alcântara", "Areeiro", "Arroios", "Avenidas Novas", "Beato", "Belém", "Benfica", "Campo de Ourique", "Campolide", "Carnide", "Estrela", "Lumiar", "Marvila", "Misericórdia", "Olivais", "Parque das Nações", "Penha de França", "Santa Clara", "Santa Maria Maior", "Santo António", "São Domingos de Benfica", "São Vicente"];
                        foreach ($freguesias as $f)
                            echo "<option value='$f'>$f</option>";
                        ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="text-uppercase-refined d-block mb-2">Tipo de Resíduo</label>
                    <select id="tipo" name="tipo" class="form-select">
                        <option value="">Todos os Tipos</option>
                        <option value="Pequenos">Pequenos Eletrodomésticos</option>
                        <option value="Grandes">Grandes Eletrodomésticos</option>
                        <option value="Informática">Informática</option>
                        <option value="Pilhas">Pilhas e Baterias</option>
                        <option value="TV">TV e Monitores</option>
                    </select>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-dark py-2 fw-bold rounded-pill">
                        <i class="fas fa-filter me-2" style="font-size:.75rem;"></i>Aplicar Filtros
                    </button>
                    <button type="button" id="resetFilters"
                        class="btn btn-outline-dark py-2 fw-bold rounded-pill opacity-50">
                        Limpar
                    </button>
                </div>
            </form>

            <div id="resultsInfo" class="mt-4 pt-4 border-top d-none"
                style="flex-shrink:0; overflow:hidden; display:flex; flex-direction:column;">
                <p class="text-uppercase-refined mb-2">
                    <span id="count">0</span> locais encontrados
                </p>
                <div id="listResults" class="overflow-auto flex-grow-1"
                    style="max-height:300px; scrollbar-width:thin; scrollbar-color:#ebebeb transparent;">
                </div>
            </div>
        </div>

        <div class="col-lg-9 p-4">
            <div id="map" class="h-100"></div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>