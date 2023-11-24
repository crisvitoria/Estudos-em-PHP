<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Livros</title>
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
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
        <h2>Consulta de Livros</h2>
    </div>

    <form method="post" class="w3-container">
        <br>
        <label class="w3-text-teal"><b>Titulo</b></label>
        <input class="w3-input w3-border w3-light-grey" type="text" name="titulo">

        
        <br>

        <label class="w3-text-teal"><b>Data de Publicação</b></label>
        <input class="w3-input w3-border w3-light-grey" type="date" name="data_publicacao">
        <br>
        <label class="w3-text-teal"><b>Gênero</b></label>
        <select class="w3-select" name="genero">
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
        <select class="w3-select" name="autor">
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
        <button class="w3-btn w3-blue-grey" name="consultar">Consultar</button>
        <button class="w3-btn w3-blue-grey" type = "reset">Limpar</button>
        <a class="w3-btn w3-blue-grey" href="index.php" target="_self" rel="prev">Página Inicial</a>

    </form>

    <!--Resultado da pesquisa-->
    <?php
    
    if(isset($_POST['consultar']) || isset($_GET['pagina']) != null)
        {
        include "conexaobanco.php";
        

        // Número de resultados por página
        $resultados_por_pagina = 6;

        // Página atual (caso não esteja definida, é a primeira página)
        $pagina_atual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
        
        // Calcula o offset
        $offset = ($pagina_atual - 1) * $resultados_por_pagina;



        //Construição da query com base nos filtros
        if(!empty($_POST['titulo']))
        {
            $filtro[] = "titulo LIKE '%".$_POST['titulo']."%'";
        }
        if(!empty($_POST['data_publicacao']))
        {
            $filtro[] = "data_publicacao = '".$_POST['data_publicacao']."'";
        }
        if(!empty($_POST['genero']))
        {
            $filtro[] = "id_genero LIKE '".$_POST['genero']."'";
        }
        if(!empty($_POST['autor']))
        {
            $filtro[] = "fk_autor = ".$_POST['autor'];
        }

        $query = "SELECT *
                FROM livros,
                    genero,
                    autores
                WHERE id_genero = fk_genero
                AND fk_autor = id_autor";
        
        if(!empty($filtro))
        {
            $query .= " AND ".implode(" AND ", $filtro);
        }
        
        // Construção da consulta com LIMIT
        $query .= " LIMIT $offset, $resultados_por_pagina";


        $result = mysqli_query($conexao, $query);

        if ($result && mysqli_num_rows($result) > 0)
        {
            echo "<div class='w3-container'>";
            echo "<h2>Autores Cadastrados</h2>";
            echo "<table class='w3-table-all w3-hoverable'>
                    <thead>
                    <tr class='w3-light-grey'>
                        <th>Título</th>
                        <th>Data da Publicação</th>
                        <th>Autor</th>
                        <th>Gênero</th>
                    </tr>
                    </thead>";
        
            while ($row = mysqli_fetch_assoc($result))
            {
                $titulo = $row['titulo'];
                $data_publicacao = $row['data_publicacao'];
                $autor = $row['nome'];
                $genero = $row['nome_genero'];

                echo "<tr>
                        <td>$titulo</td>
                        <td>$data_publicacao</td>
                        <td>$autor</td>
                        <td>$genero</td>
                    </tr>";
            }

            echo "</table></div>";
            echo "</div><br>";


            $query_count = "SELECT COUNT(*) AS total FROM livros, genero, autores
            WHERE id_genero = fk_genero
            AND fk_autor = id_autor";

            if (!empty($filtro)) 
            {
                $query_count .= " AND " . implode(" AND ", $filtro);
            }

            $total_resultados = mysqli_fetch_assoc(mysqli_query($conexao, $query_count))['total'];

            // Número total de páginas
            $num_paginas = ceil($total_resultados / $resultados_por_pagina);

            // Exibindo a numeração das páginas
            echo "<div class='w3-container'>";
            echo "<div class='w3-bar w3-center'>";
            for ($i = 1; $i <= $num_paginas; $i++) 
            {
                echo "<a href='consultalivros.php?pagina=$i' class='w3-button w3-circle w3-teal'>$i</a> ";
            }
            echo "</div></div>";

        }
        else
        {
            echo "<br><div class='w3-panel w3-blue-grey'>
                    <h3>Não há resultados!</h3>
                    <p>Não há resultados a ser exibidos para os termos informados.</p>
                </div>";

        }

    }
    ?>
</body>
</html>