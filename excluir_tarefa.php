<?php
include './database/config.php';
include './layout/navbar.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    // Consulta SQL para excluir a tarefa com base no ID
    $sql = "DELETE FROM tarefas WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        // Exclusão bem-sucedida
        echo "Tarefa excluída com sucesso";
    } else {
        // Se houver algum erro
        echo "Erro ao excluir tarefa: " . $conn->error;
    }
}

?>

<div class="container d-flex justify-content-center" style="margin-top: 250px;">
    <div class="card text-center d-flex justify-content-center">
        <div class="card-header">
            Excluido com Sucesso
        </div>
        <div class="card-body">
            <div class="d-grid gap-2 col-12 mx-auto">
            <a href="/lista-de-tarefa.php"><button class="btn btn-primary" type="button">Voltar a lista de tarefas</button></a>
        </div>
    </div>
    <div class="card-footer text-body-secondary">

    </div>
</div>
 