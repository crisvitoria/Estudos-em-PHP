<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Autores</title>
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <?php
    include "conexaobanco.php";

    //Query para trazer os generos
    $query = "SELECT * FROM genero ORDER BY nome_genero";
    $result = mysqli_query($conexao,$query);


    //Query para trazer os autores
    $secquery = "SELECT id_autor, nome FROM autores ORDER BY nome";
    $secresult = mysqli_query($conexao,$secquery);
    
    ?>

    <!--id_livro	id_autor	titulo	fk_genero	data_publicacao	-->
    <div class="w3-container w3-teal">
        <h2>Cadastro de Livros</h2>
    </div>

    <form action="cadlivrosscript.php" method="post" class="w3-container">
        <br>
        <label class="w3-text-teal"><b>Titulo</b></label>
        <input class="w3-input w3-border w3-light-grey" type="text" name="titulo" required>

        
        <br>

        <label class="w3-text-teal"><b>Data de Publicação</b></label>
        <input class="w3-input w3-border w3-light-grey" type="date" name="data_publicacao" required>
        <br>
        <label class="w3-text-teal"><b>Gênero</b></label>
        <select class="w3-select" name="genero" required>
            <option value="" disabled selected>Selecione</option>
            <?php
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id_genero = $row['id_genero'];
                    $nome_genero = $row['nome_genero'];
                    echo '<option value='.$id_genero.'>'.$nome_genero.'</option>';
                }
            } else {
                echo "Erro na consulta: " . mysqli_error($conexao);
            }
            
            ?>>
        </select>
        <br><br>
        <label class="w3-text-teal"><b>Autor</b></label>
        <select class="w3-select" name="autor" required>
            <option value="" disabled selected>Selecione</option>
            <?php
            if ($result) {
                while ($secrow = mysqli_fetch_assoc($secresult)) {
                    $id_autor = $secrow['id_autor'];
                    $nome = $secrow['nome'];
                    echo '<option value='.$id_autor.'>'.$nome.'</option>';
                }
            } else {
                echo "Erro na consulta: " . mysqli_error($conexao);
            }
            
            ?>>
        </select>

        <br><br>
        <button class="w3-btn w3-blue-grey" name="cadastrar" target="_self" rel="next">Cadastrar</button>
        <button class="w3-btn w3-blue-grey" type = "reset">Limpar</button>
        <a class="w3-btn w3-blue-grey" href="index.php" target="_self" rel="prev">Página Inicial</a>

    </form>

</body>
</html>