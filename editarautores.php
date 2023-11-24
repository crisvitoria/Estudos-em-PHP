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

    <div class="w3-container w3-teal">
        <h2>Editar Autores</h2>
    </div>

    <form method="post" class="w3-container">
        <br>
        <label class="w3-text-teal"><b>Nome</b></label>
        <input class="w3-input w3-border w3-light-grey" type="text" name="nome">
        <br>
        <label class="w3-text-teal"><b>E-mail</b></label>
        <input class="w3-input w3-border w3-light-grey" type="email" name="email">
        <br>
        <label class="w3-text-teal"><b>Data de Nascimento</b></label>
        <input class="w3-input w3-border w3-light-grey" type="date" name="data_nascimento">

        <br><br>
        <button class="w3-btn w3-blue-grey" name="consultar">Consultar</button>
        <button class="w3-btn w3-blue-grey" type = "reset">Limpar</button>
        <a class="w3-btn w3-blue-grey" href="index.php" target="_self" rel="prev">Página Inicial</a>

    </form>


    <?php

    if(isset($_POST['consultar']) || isset($_GET['pagina']) != null)
    {
    
        include "conexaobanco.php";

        
        // Número de resultados por página
        $resultados_por_pagina = 8;

        // Página atual (caso não esteja definida, é a primeira página)
        $pagina_atual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
        
        // Calcula o offset
        $offset = ($pagina_atual - 1) * $resultados_por_pagina;

        //Construição da query com base nos filtros
        if(!empty($_POST['nome']))
        {
            $filtro[] = "nome LIKE '%".$_POST['nome']."%'";
        }
        if(!empty($_POST['e-mail']))
        {
            $filtro[] = "e-mail = '%".$_POST['e-mail']."%'";
        }
        if(!empty($_POST['data_nascimento']))
        {
            $filtro[] = "data_nascimento LIKE '".$_POST['data_nascimento']."'";
        }

        $query = "SELECT *
                FROM autores";
        
        if(!empty($filtro))
        {
            $query .= " WHERE ".implode(" AND ", $filtro);
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
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Data de Nascimento</th>
                        <th>Ação</th>
                    </tr>
                    </thead>";
        
            while ($row = mysqli_fetch_assoc($result))
            {
                $nome = $row['nome'];
                $email = $row['email'];
                $data_nascimento = new DateTimeImmutable($row['data_nascimento']);
                $id = $row['id_autor'];

                echo "<tr>
                        <td>$nome</td>
                        <td>$email</td>
                        <td>".$data_nascimento->format('d-m-Y')."</td>
                        <td><a class='w3-button w3-black w3-round-large' href='editautorscript.php?id=$id' role='button'>Editar</a></td>
                    </tr>";
            }

            echo "</table></div>";
            echo "</div><br>";

            $query_count = "SELECT COUNT(*) AS total FROM autores";

            if (!empty($filtro)) 
            {
                $query_count .= " WHERE " . implode(" AND ", $filtro);
            }

            $total_resultados = mysqli_fetch_assoc(mysqli_query($conexao, $query_count))['total'];

            // Número total de páginas
            $num_paginas = ceil($total_resultados / $resultados_por_pagina);

            // Exibindo a numeração das páginas
            echo "<div class='w3-container'>";
            echo "<div class='w3-bar w3-center'>";
            for ($i = 1; $i <= $num_paginas; $i++) 
            {
                echo "<a href='editarautores.php?pagina=$i' class='w3-button w3-circle w3-teal'>$i</a> ";
            }
            echo "</div></div>";

        }
        else
        {
            echo "<div class='w3-panel w3-blue-grey'>
                <h3>Não há resultados!</h3>
                <p>Não há resultados a ser exibidos para os termos informados.</p>
            </div>";
        }

    
    }
    


    ?>
</body>
</html>