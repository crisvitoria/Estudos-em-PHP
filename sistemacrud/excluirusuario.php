<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Excluir</title>
</head>
<body>
    <h1>Exclusão de Usuários</h1>
    <?php
        include 'conexaobanco.php';
        $id = $_GET['id'];

        $query = "DELETE FROM usuario WHERE idusuario = '$id'";
        $result = mysqli_query($conexao,$query);
        
        if ($result)
        {
            echo '<div class="alert alert-success" role="alert">
                    Usuário excluído com sucesso!
                 </div>';
            echo '<a class="btn btn-primary" href="pesquisausuario.html" role="button">Nova pesquisa de usuários</a> <a class="btn btn-primary" href="index.html" role="button">Início</a>';
        }
        else
        {
            echo 'Erro ao cadastrar o usuário!';
            echo '<a class="btn btn-primary" href="pesquisausuario.html" role="button">Nova pesquisa de usuários</a> <a class="btn btn-primary" href="index.html" role="button">Início</a>';
        }
        
    ?>
</body>
</html>