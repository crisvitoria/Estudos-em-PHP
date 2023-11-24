<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pesquisa</title>`
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
       
    </head>

    <body>
    <!--idusuario, nome, sobrenome, sexo, email, endereco, data_nascimento, ativo, fkuf-->
        <?php
            include 'conexaobanco.php';
            if (isset($_POST["pesquisar"]))
            {

                $filtro = array();
                
                // Verifica se os campos do formulário foram preenchidos e adiciona condições ao filtro
                if (!empty($_POST['nome'])) 
                {
                    $filtro[] = "nome LIKE '" . $_POST['nome'] . "%'";
                }
                if (!empty($_POST['sobrenome'])) 
                {
                    $filtro[] = "sobrenome LIKE '%" . $_POST['sobrenome'] . "%'";
                }
                if (!empty($_POST['sexo'])) 
                {
                    $filtro[] = "sexo LIKE '" . $_POST['sexo'] . "'";
                }
                if (!empty($_POST['estado'])) 
                {
                    $filtro[] = "fkuf = '" . $_POST['estado'] . "'";
                }
                if (!empty($_POST['ativo'])) 
                {
                    $filtro[] = "ativo = '" . $_POST['ativo'] . "'";
                }
                
                // Constrói a consulta SQL baseada nos filtros
                $query = "SELECT idusuario, nome, sobrenome, sexo, email, endereco, nome_uf, data_nascimento, ativo FROM usuario, uf WHERE fkuf = iduf";

                if (!empty($filtro)) 
                {
                    $query .= " AND ".implode(" AND ", $filtro);
                }

                // Executa a consulta
                $resultado = mysqli_query($conexao, $query);
            }
        ?>

    
        <table class="table table-striped">
            <thead>
                <tr class="table table-dark table-striped">
                    <th scope="col">Nome</th>
                    <th scope="col">Sobrenome</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Status</th>
                    <th scope="col">Opções</th>
                </tr>
                <?php
                $i = 0;
                while ($dados = mysqli_fetch_assoc($resultado))
                {
                    $nome = $dados['nome'];
                    $sobrenome = $dados['sobrenome'];
                    $sexo = $dados['sexo'];
                    $email = $dados['email'];
                    $endereco = $dados['endereco'];
                    $estado = $dados['nome_uf'];
                    $datanascimento = $dados['data_nascimento'];
                    $status = $dados['ativo'];
                    $idusuario = $dados['idusuario'];

                    if ($i % 2 == 0)
                    {
                        echo '<tr class="table-active"><td>'.$nome.'</td>';
                        echo "<td>".$sobrenome."</td>";
                        echo "<td>".$sexo."</td>";
                        echo "<td>".$email."</td>";
                        echo "<td>".$endereco."</td>";
                        echo "<td>".$estado."</td>";
                        echo "<td>".$datanascimento."</td>";
                        if ($status == 0)
                        {
                            echo "<td>Inativo</td>";
                        }
                        else
                        {
                            echo "<td>Ativo</td>";
                        }
                        echo "<td>
                                <a class='btn btn-primary' href='editusuario.php?id=$idusuario' role='button'>Editar</a>
                                <a class='btn btn-primary' role='button' onclick = 'confirmacao($idusuario)'>Excluir</a>";
                        if ($status)
                        {
                        echo " <a class='btn btn-primary' role='button' onclick = 'confirmarinativar($idusuario, $status)'>Inativar</a>";
                        }
                        else
                        {
                            echo " <a class='btn btn-primary' role='button' onclick = 'confirmarinativar($idusuario, $status)'>Ativar</a>";
                        }
                        echo "</td></tr>";
                        
                    }
                    else
                    {
                        echo '<tr><td>'.$nome.'</td>';
                        echo "<td>".$sobrenome."</td>";
                        echo "<td>".$sexo."</td>";
                        echo "<td>".$email."</td>";
                        echo "<td>".$endereco."</td>";
                        echo "<td>".$estado."</td>";
                        echo "<td>".$datanascimento."</td>";
                        if ($status == 0)
                        {
                            echo "<td>Inativo</td>";
                        }
                        else
                        {
                            echo "<td>Ativo</td>";
                        }
                        echo "<td>
                                <a class='btn btn-primary' href='editusuario.php?id=$idusuario' role='button'>Editar</a>
                                <a class='btn btn-primary' role='button' onclick = 'confirmacao($idusuario)'>Excluir</a>";
                        if ($status)
                        {
                        echo " <a class='btn btn-primary' role='button' onclick = 'confirmarinativar($idusuario, $status)'>Inativar</a>";
                        }
                        else
                        {
                            echo " <a class='btn btn-primary' role='button' onclick = 'confirmarinativar($idusuario, $status)'>Ativar</a>";
                        }
                        echo "</td></tr>";
                    }
                    $i += 1;                    
                }

                ?>

                <script>
                function confirmacao(idusuario)
                {
                    // Exibe a caixa de confirmação
                    var resultado = confirm("Deseja realmente excluir o usuário?");

                    // Verifica se o usuário clicou em "OK"
                    if (resultado) {
                        window.location.href = "excluirusuario.php?id=" + idusuario; 
                    }
                }

                function confirmarinativar(idusuario, status)
                {
                    // Exibe a caixa de confirmação
                    if (status)
                    {
                        var resultado = confirm("Deseja realmente inativar o usuário?");
                    }
                    else
                    {
                        var resultado = confirm("Deseja realmente ativar o usuário?");
                    }

                    // Verifica se o usuário clicou em "OK"
                    if (resultado) {
                        window.location.href = "alterarstatus.php?id=" + idusuario; 
                    }
                }
                </script>
            </thead>
        </table>
        <br>
        <a class="btn btn-primary" href="pesquisausuario.html" role="button">Nova pesquisa de usuários</a>
        <a class="btn btn-primary" href="index.html" role="button">Início</a>
                
    </body>
</html>