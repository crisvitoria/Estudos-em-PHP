<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Dados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php
    include 'conexaobanco.php';
    if (isset($_POST['atualizar']))
    {

        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $sexo = $_POST['sexo'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        $estado = $_POST['estado'];
        $data_nascimento = $_POST['data_nascimento'];
        $idusuario = $_POST['id'];


        $query = "UPDATE usuario SET nome = '$nome', sobrenome = '$sobrenome', sexo = '$sexo', email = '$email', endereco = '$endereco', data_nascimento = '$data_nascimento' WHERE idusuario = '$idusuario'";


        // Executa a consulta
        $result = mysqli_query($conexao, $query);

        if ($result)
        {
            echo '<div class="alert alert-success" role="alert">
                    Usuário alterado com sucesso!
                  </div>';
            echo '<a class="btn btn-primary" href="pesquisausuario.html" role="button">Nova pesquisa de usuários</a> <a class="btn btn-primary" href="index.html" role="button">Início</a>';
        }
        else
        {
            echo '<div class="alert alert-danger" role="alert">
                    Erro ao atualizar o usuário!
                    </div>';
            echo '<a class="btn btn-primary" href="pesquisausuario.html" role="button">Nova pesquisa de usuários</a> <a class="btn btn-primary" href="index.html" role="button">Início</a>';
        }

    }

?>    



</body>
</html>