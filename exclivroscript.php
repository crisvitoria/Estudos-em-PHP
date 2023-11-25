<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Livros</title>
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <?php
        include "conexaobanco.php";

        $id = $_GET['id'];     
        $query = "SELECT *
                FROM livros,
                    genero,
                    autores
                WHERE id_genero = fk_genero
                AND fk_autor = id_autor
                AND id_livro = $id";
        $result = mysqli_query($conexao,$query);
        $row = mysqli_fetch_assoc($result);


        //Query para trazer os generos
        $querygenero = "SELECT * FROM genero ORDER BY nome_genero";
        $resultgenero = mysqli_query($conexao,$querygenero);

        //Query para trazer os autores
        $secquery = "SELECT id_autor, nome FROM autores ORDER BY nome";
        $secresult = mysqli_query($conexao,$secquery);
     
    ?>

    <div class="w3-container w3-red">
        <h2>Excluir Livros</h2>
    </div>

    <form method="post" class="w3-container">
        <br>
        <label class="w3-text-red"><b>Título</b></label>
        <input class="w3-input w3-border w3-light-grey" type="text" name="titulo" value="<?php echo $row['titulo']?>">
        <br>
        <label class="w3-text-red"><b>Data de Publicação</b></label>
        <input class="w3-input w3-border w3-light-grey" type="date" name="data_publicacao" value="<?php echo $row['data_publicacao']?>">

        <label class="w3-text-red"><b>Gênero</b></label>
        <select class="w3-select" name="genero">
            <option value="<?php echo $row['id_genero']?>"><?php echo $row['nome_genero']?></option>
            <?php
                while ($rowgenero = mysqli_fetch_assoc($resultgenero)) 
                {
                    $idgenero = $rowgenero['id_genero'];
                    $nomegenero = $rowgenero['nome_genero'];
                    echo '<option value='.$idgenero.'>'.$nomegenero.'</option>';
                }
            ?>
        </select>
        <br><br>

        <label class="w3-text-red"><b>Autor</b></label>
        <select class="w3-select" name="autor">
            <option value="<?php echo $row['id_autor']?>"><?php echo $row['nome']?></option>
            <?php
                while ($secrow = mysqli_fetch_assoc($secresult)) 
                {
                    $id_autor = $secrow['id_autor'];
                    $nome = $secrow['nome'];
                    echo '<option value='.$id_autor.'>'.$nome.'</option>';
                }
            ?>
        </select>
       

        <br><br>
        <button class="w3-btn w3-blue-grey" name="excluir">Excluir</button>
        <a class="w3-btn w3-blue-grey" href="excluirlivros.php" target="_self" rel="prev">Nova Pesquisa</a>
        <a class="w3-btn w3-blue-grey" href="index.php" target="_self" rel="prev">Página Inicial</a>
        <br><br>

    </form>

    

    <?php
        if(isset($_POST['excluir']))
        {
            
            $titulo = $_POST['titulo'];
            $data_publicacao = $_POST['data_publicacao'];
            $autor = $_POST['autor'];
            $genero = $_POST['genero'];

            $query2 = "UPDATE livros SET titulo = '$titulo', data_publicacao = '$data_publicacao', fk_autor = $autor, fk_genero = $genero WHERE id_livro = $id";
            
            $result2 = mysqli_query($conexao,$query2);

            if ($result2)
            {
                echo '<div class="w3-panel w3-pale-green w3-border">
                        <h3>Sucesso</h3>
                        <p>Livro alterado com sucesso!</p>
                      </div>';
            }
            else
            {
                echo '<div class="w3-panel w3-pale-red w3-border">
                            <h3>Atenção</h3>
                            <p>Erro ao atualizar o livro!</p>
                        </div>';

            }
            

        }    
    
    ?>
</body>
</html>