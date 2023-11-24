<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário Cadastrado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    
<?php

include "conexaobanco.php";

if (isset($_POST['cadastrar']))
{
    $nome = ucwords($_POST['nome']);
    $sobrenome = ucwords($_POST['sobrenome']);
    $sexo = $_POST['sexo'];
    $email = strtolower($_POST['email']);
    $endereco = $_POST['endereco'];
    $estado = $_POST['estado'];
    $datanascimento = $_POST['datanascimento'];

    $query = mysqli_query($conexao,"INSERT INTO `usuario` (`nome`, `sobrenome`, `sexo`, `email`, `endereco`,  `data_nascimento`, `ativo`,`fkuf`) VALUES ('$nome', '$sobrenome', '$sexo', '$email', '$endereco', '$datanascimento', '1', '$estado')");

    if ($query)
    {
        echo '<div class="alert alert-success" role="alert">
                Usuário cadastrado com sucesso!
             </div>';
        echo '<a class="btn btn-primary" href="cadastroUsuario.html" role="button">Cadastrar novo usuário</a> <a class="btn btn-primary" href="index.html" role="button">Início</a>';
    }
    else
    {
        echo 'Erro ao cadastrar o usuário!';
        echo '<a class="btn btn-primary" href="cadastroUsuario.html" role="button">Cadastrar novo usuário</a> <a class="btn btn-primary" href="index.html" role="button">Início</a>';
    }
}
?>
</body>
</html>
