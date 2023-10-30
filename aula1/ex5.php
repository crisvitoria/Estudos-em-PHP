<html>
<head>
	<title>Formulario HTML</title>
</head>
<body>
	<form method=post>  <!--aqui vc define a forma que os dados são colhidos*/ -->
		<text>Informe seu nome:</text></br>
		<input type=text name=seunome></br>
		<text>Informe sua idade:</text></br>
		<input type=number name=idade>
		<input type=submit name=enviar value=Ok>
	</form>
</body>
</html>

<?php
if(isset($_POST['enviar'])) //somente vai imprimir quando o dado já foi enviado, por meio do input, submit, enviar
{
	echo $_POST['seunome']; //lendo informações da html
}


?>