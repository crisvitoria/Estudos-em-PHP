<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Autores</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <?php
    include "conexaobanco.php";

    if(isset($_POST['cadastrar']))
    {
        $nome = ucwords($_POST['nome']);
        $email = strtolower($_POST['email']);
        $data_nascimento = $_POST['data_nascimento'];

        $query = "INSERT INTO `autores` (`nome`, `email`, `data_nascimento`)
        VALUES ('$nome', '$email', '$data_nascimento')";
        $result = mysqli_query($conexao, $query);
        
        if ($result)
        {
            echo '<div class="w3-panel w3-pale-green">
                    <p>Cadastro realizado com sucesso!</p>
                  </div>';
            echo '<a class="w3-btn w3-blue-grey" href="cadautores.php">Novo Cadastro</a>';
            echo ' <a class="w3-btn w3-blue-grey" href="index.php">Página Inicial</a>';
        }
        else
        {
            echo '<div class="w3-panel w3-pale-red">
                    <p>Cadastro não realizado!</p>
                  </div>';
            echo '<a class="w3-btn w3-blue-grey" href="index.php">Página Inicial</a>';
        }

    }
  
    
    ?>
</body>
</html>