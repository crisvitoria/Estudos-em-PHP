<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de dados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php
    include 'conexaobanco.php';
    $id = $_GET['id'];
    $query = "SELECT idusuario, nome, sobrenome, sexo, email, endereco, iduf, nome_uf, data_nascimento, ativo FROM usuario, uf WHERE fkuf = iduf AND idusuario = $id";
    $resultado = mysqli_query($conexao,$query);
    $row = mysqli_fetch_assoc($resultado);



    ?>

    <form action="editscript.php" method="post">

        <h1>Edição de Usuário</h1>
        <div class="row g-3">
            <div class="col">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" aria-label="Primeiro Nome" value="<?php echo $row['nome']?>">
            </div>
            <div class="col" >
                <label for="sobrenome" class="form-label">Sobrenome:</label>
                <input type="text" id="sobrenome" name="sobrenome" class="form-control" aria-label="Sobrenome" value="<?php echo $row['sobrenome']?>">
            </div>
        </div>
        <div class="row g-3">
            
            <div class="col">
                <label for="sexo" class="form-label">Sexo:</label>
                <select id="sexo" name="sexo" class="form-select" required>
                    <option selected><?php echo $row['sexo'];?></option>
                    <option value="Feminino">Feminino</option>
                    <option value="Masculino">Masculino</option>
                </select>
            </div>

            <div class="col">
                <label for="Email" class="form-label">E-mail:</label>
                <input type="email" class="form-control" id="Email" name="email" value="<?php echo $row['email']?>">
            </div>
        </div>

        <div>
            <label for="inputAddress" class="form-label">Endereço</label>
            <input type="text" name="endereco" class="form-control" id="inputAddress" value="<?php echo $row['endereco']?>">
        </div>

        <div class="row g-3">
            <div class="col">
                <label for="estados" class="form-label">Selecione um Estado:</label>
                <select id="estados" name="estado" class="form-select" required>
                    <option value="<?php echo $row['iduf'];?>" selected><?php echo $row['nome_uf'];?></option>
                    <option value="1">Acre</option>
                    <option value="2">Alagoas</option>
                    <option value="3">Amapá</option>
                    <option value="4">Amazonas</option>
                    <option value="5">Bahia</option>
                    <option value="6">Ceará</option>
                    <option value="7">Distrito Federal</option>
                    <option value="8">Espírito Santo</option>
                    <option value="9">Goiás</option>
                    <option value="10">Maranhão</option>
                    <option value="11">Mato Grosso</option>
                    <option value="12">Mato Grosso do Sul</option>
                    <option value="13">Minas Gerais</option>
                    <option value="14">Pará</option>
                    <option value="15">Paraíba</option>
                    <option value="16">Paraná</option>
                    <option value="17">Pernambuco</option>
                    <option value="18">Piauí</option>
                    <option value="19">Rio de Janeiro</option>
                    <option value="20">Rio Grande do Norte</option>
                    <option value="21">Rio Grande do Sul</option>
                    <option value="22">Rondônia</option>
                    <option value="23">Roraima</option>
                    <option value="24">Santa Catarina</option>
                    <option value="25">São Paulo</option>
                    <option value="26">Sergipe</option>
                    <option value="27">Tocantins</option>
                </select>

            </div>
            <div class="col">

                <label for="datanascimento" class="form-label">Data de Nascimento:</label>
                <input type="date" class="form-control" id="datanascimento" name="data_nascimento" value="<?php echo $row['data_nascimento']?>">
            </div>
        </div>
            
        <br><br>
        <div>
            <input type="hidden" name="id" value='<?php echo $id;?>'>
            <input class="btn btn-primary" type="submit" value="Atualizar" name="atualizar">
            <a class="btn btn-primary" href="pesquisausuario.html" role="button">Voltar</a>
            <a class="btn btn-primary" href="index.html" role="button">Início</a>
        </div>
    </form>
</body>
</html>