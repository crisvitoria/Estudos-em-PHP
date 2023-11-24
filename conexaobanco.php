<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$database = "livraria";

// Conexão com o banco de dados
$conexao = mysqli_connect($servername, $username, $password, $database);

//Testando a conexão
/*if ($conexao)
{
    echo "Conexão bem sucedida!";
}*/ 

?>