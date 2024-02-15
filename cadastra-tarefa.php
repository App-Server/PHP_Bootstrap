<?php

include './layout/navbar.php';
include './database/config.php';

?>

<div class="container d-flex justify-content-center" style="margin-top: 200px;">
    <form method="POST" action="">
        <?php
        // Verifica se os dados foram enviados via POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verifica se os campos foram preenchidos
            if (empty($_POST['titulo_da_atividade']) || empty($_POST['descreva_a_atividade'])) {
                preenchaCampos('Por favor, preencha todos os campos.');
            } else {
                $titulo_da_atividade = $_POST['titulo_da_atividade'];
                $descreva_a_atividade = $_POST['descreva_a_atividade'];

                // Executa a consulta SQL para inserir os dados na tabela
                $sql = "INSERT INTO tarefas (titulo_da_atividade, descreva_a_atividade) VALUES ('$titulo_da_atividade', '$descreva_a_atividade')";

                if ($conn->query($sql) === true) {
                    alertSucess('Cadastro realizado com sucesso!');
                } else {
                    erroCadastro('Erro ao cadastrar: ' . $conn->error);
                }
            }
        }

        // Função para exibir alerta de campos não preenchidos
        function preenchaCampos($mensagem)
        {
            echo '<div class="alert alert-danger" role="alert">' . $mensagem . '</div>';
        }

        // Função para exibir alerta de sucesso
        function alertSucess($mensagem)
        {
            echo '<div class="alert alert-success" role="alert">' . $mensagem . '</div>';
        }

        // Função para exibir alerta de erro no cadastro
        function erroCadastro($mensagem)
        {
            echo '<div class="alert alert-danger" role="alert">' . $mensagem . '</div>';
        }

        ?>
        <div class="card" style="width: 50rem;">
            <div class="card-body">


                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Titulo da atividade</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="titulo_da_atividade">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Descreva a atividade</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="descreva_a_atividade" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Cadastra Tarefa</button>
    </form>

</div>