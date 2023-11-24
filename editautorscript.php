<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Autores</title>
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <?php
        include "conexaobanco.php";

        $id = $_GET['id'];     
        $query = "SELECT * FROM autores WHERE id_autor = $id";
        $result = mysqli_query($conexao,$query);
        $row = mysqli_fetch_assoc($result);
    ?>

    <div class="w3-container w3-teal">
        <h2>Editar Autores</h2>
    </div>

    <form method="post" class="w3-container">
        <br>
        <label class="w3-text-teal"><b>Nome</b></label>
        <input class="w3-input w3-border w3-light-grey" type="text" name="nome" value="<?php echo $row['nome']?>">
        <br>
        <label class="w3-text-teal"><b>E-mail</b></label>
        <input class="w3-input w3-border w3-light-grey" type="email" name="email" value="<?php echo $row['email']?>">
        <br>
        <label class="w3-text-teal"><b>Data de Nascimento</b></label>
        <input class="w3-input w3-border w3-light-grey" type="date" name="data_nascimento" value="<?php echo $row['data_nascimento']?>">

        <br><br>
        <button class="w3-btn w3-blue-grey" name="alterar">Alterar</button>
        <a class="w3-btn w3-blue-grey" href="editarautores.php" target="_self" rel="prev">Nova Pesquisa</a>
        <a class="w3-btn w3-blue-grey" href="index.php" target="_self" rel="prev">Página Inicial</a>
        <br><br>

    </form>

    <?php
        if(isset($_POST['alterar']))
        {
            
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $data_nascimento = $_POST['data_nascimento'];

            $query2 = "UPDATE autores SET nome = '$nome', email = '$email', data_nascimento = '$data_nascimento' WHERE id_autor = $id";
            
            $result2 = mysqli_query($conexao,$query2);

            if ($result2)
            {
                echo '<div class="w3-panel w3-pale-green w3-border">
                        <h3>Sucesso</h3>
                        <p>Usuário alterado com sucesso!</p>
                      </div>';
            }
            else
            {
                echo '<div class="w3-panel w3-pale-red w3-border">
                            <h3>Atenção</h3>
                            <p>Erro ao atualizar o usuário!</p>
                        </div>';

            }
            

        }    
    
    ?>
</body>
</html>