
<html>
<head>
	<title>Exercício de Casa</title>
</head>
<body>
	<form method=post>  <!--aqui vc define a forma que os dados são colhidos*/ -->
		<text>Informe o primeiro número:</text></br>
		<input type=number name=primeiro></br>
		<text>Informe o segundo número:</text></br>
		<input type=number name=segundo>
		<input type=submit name=enviar value=Ok>
	</form>
</body>
</html>

<?php
include ("ex3.php");

if(isset($_POST['enviar'])) //somente vai imprimir quando o dado já foi enviado, por meio do input, submit, enviar
{
	imprimir (trataNumeros ($_POST['primeiro'],$_POST['segundo']));
}

?>