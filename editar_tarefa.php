<?php
include './database/config.php';
include './layout/navbar.php';

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário
    $id = $_POST['id'];
    $titulo_da_atividade = $_POST['titulo_da_atividade'];
    $descreva_a_atividade = $_POST['descreva_a_atividade'];

    // Consulta SQL para atualizar os detalhes da tarefa no banco de dados
    $sql = "UPDATE tarefas SET titulo_da_atividade='$titulo_da_atividade', descreva_a_atividade='$descreva_a_atividade' WHERE id=$id";

    // Execute a consulta SQL
    if ($conn->query($sql) === TRUE) {
        echo "Tarefa atualizada com sucesso";
    } else {
        echo "Erro ao atualizar a tarefa: " . $conn->error;
    }
}

// Verifique se foi fornecido um ID válido na URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Consulta SQL para obter os detalhes da tarefa com base no ID
    $sql = "SELECT * FROM tarefas WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Exibir o formulário preenchido com os detalhes da tarefa
?>



        <div class="container d-flex justify-content-center" style="margin-top: 100px;">

            <div class="card" style="width: 30rem;">

                <div class="card-body">
                    <div class="alert alert-warning" role="alert">
                        <strong>Cuidado ao editar a tarefa</strong>
                    </div>
                    <form method="POST" action="">
                        <!-- Campo oculto para armazenar o ID da tarefa -->
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Titulo da atividade</label>
                            <!-- Exibir o título da atividade como texto estático -->
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="titulo_da_atividade" value="<?php echo $row['titulo_da_atividade']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Descreva a atividade</label>
                            <!-- Exibir a descrição da atividade como texto estático e permitir a edição -->
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="descreva_a_atividade" rows="10"><?php echo $row['descreva_a_atividade']; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Editar Tarefa</button>
                    </form>
                </div>
        <?php
    }
}
        ?>