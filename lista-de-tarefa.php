<?php
include './layout/navbar.php';
include './database/config.php';

// Consulta SQL para listar as tarefas
$sql = "SELECT id, titulo_da_atividade, descreva_a_atividade, datatime FROM tarefas";
$result = $conn->query($sql);

// Verifica se houve algum erro na execução da consulta SQL
if (!$result) {
    die("Erro ao executar a consulta: " . $conn->error);
}


?>

<div class="container " style="margin-top: 120px;">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <?php
                // Loop para exibir os dados em cartões
                while ($row = $result->fetch_assoc()) {
                ?>
                    <div class="col-12">
                        <div class="row g-3 needs-validation" novalidate>
                            <div class="col-md-1">
                                <label for="validationCustom01" class="form-label"><strong>Id</strong></label>
                                <p class="card-title"><?php echo $row["id"]; ?></p>
                            </div>
                            <div class="col-md-3">
                                <label for="validationCustom01" class="form-label"><strong>Titulo da tarefa</strong></label>
                                <p class="card-title"><?php echo $row["titulo_da_atividade"]; ?></p>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom02" class="form-label"><strong>Descreva a Atividade</strong></label>
                                <p class="card-text"><?php echo $row["descreva_a_atividade"]; ?></p>
                            </div>
                            <div class="col-md-2">
                                <label for="validationCustomUsername" class="form-label"><strong>Data e hora</strong></label>
                                <p class="card-text"><?php echo $row["datatime"]; ?></p>
                            </div>

                            <div class="col-12">
                                <button type="button" class="btn btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                    Fazer tarefa
                                </button>
                                <a href="editar_tarefa.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Editar</a>
                                <a href="excluir_tarefa.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Excluir</a> 
                            </div>

                        </div>
                    </div>  
                    <hr class="row" style="margin-top: 10px;">


                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<br>