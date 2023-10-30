<html>
<head>
	<title>Calcular Viagem</title>
</head>
<body>
	<form method=post>
		<label><h3>Gastos com Viagem</h3></label>
		<label>Informe a distância a ser percorrida em quilômetros (KM): </label>
		<br><input type=number name=distancia min=0 required></input>
		<br><label>Informe o valor do combustível em reais (R$): </label>
		<br><input type=number name=precoComb min=0 step=0.01 required></input>
		<br><label>Informe a capacidade do tranque de combustivel do seu carro em litros:</label>
		<br><input type=number name=capTanque min=0 required></input>
		<br><label>Informe o consumo médio de quilometros (KM) por litro do combustível ultilizado:</label>
		<br><input type=number name=consumo min=0 required></input>
		<br><input type=reset value=Limpar></input>
		<input type=submit name=calcular value=Calcular></input>
	</form>
</body>

<?php
if(isset($_POST['calcular']))
{
	if (!empty (trim ($_POST['distancia'])) && !empty (trim ($_POST['precoComb'])) && !empty (trim ($_POST['capTanque'])) && !empty (trim ($_POST['consumo'])))
	{
		include ('funcoes.php');
		$distPerc = $_POST['distancia'];
		$precoCombustivel = $_POST['precoComb'];
		$capacidadeTq = $_POST['capTanque'];
		$consMedio = $_POST['consumo'];

		echo "<hr><br><b>Valor a ser gasto com combustível:</b> R$".gastoDinheiro($distPerc,$consMedio,$precoCombustivel);
		echo "<br><b>Total de litros a serem consumidos:</b> ".totLitros($distPerc,$consMedio)." Litros";
		echo "<br><b>Total de tanques a serem consumidos:</b> ".tanques($capacidadeTq,$distPerc,$consMedio)." Tanques";
		echo tempoGasto($distPerc);
	}
	else
	{
		echo "Informe dados válidos!";
	}//Fechamento da validação dos valores informados
	
}

?>


</html>