<html>
	<head>
		<title>Calculadora de Média</title>
	</head>
	<body>
		<form method=post>
			<label><h2>Calculadora de Média</h2></label>
			<label>Informe o 1º número:</label><br>
			<input type=number name=numero1 required></input><br>
			<label>Informe o 2º número:</label><br>
			<input type=number name=numero2 required></input><br>
			<label>Informe o 3º número:</label><br>
			<input type=number name=numero3 required></input><br>

<!--			<label>Informe o tipo da média que deseja calcular</label><br>
			<input type=radio name=tipoMedia value=1>Aritimética</input><br>
			<input type=radio name=tipoMedia value=2>Harmônica</input><br>
			<input type=radio name=tipoMedia value=3>Ponderada</input><br>
-->
			<label>Informe o tipo da média que deseja calcular</label><br>
			<select name=tipoMedia>
				<option value="1">Média Aritmética</option>
				<option value="2">Média Harmônica</option>
				<option value="3">Média Ponderada</option>
			</select>
			<div id="pesoField" style="display: none;">
            <label>Peso da Nota 1: </label><br>
            <input type="number" name="peso1" step="0.01"><br>
			<label>Peso da Nota 2: </label><br>
            <input type="number" name="peso2" step="0.01"><br>
			<label>Peso da Nota 3: </label><br>
            <input type="number" name="peso3" step="0.01"><br>
			</div>
			<br>
			<script>
				document.querySelector("select[name='tipoMedia']").addEventListener("change", function() 
				{
					var pesoField = document.getElementById("pesoField");
					if (this.value == '3')
					{
						pesoField.style.display = "block";
					}
					else
					{
						pesoField.style.display = "none";
					}
				});
			</script>
			<input type=reset value=Limpar></input>
			<input type=submit name=calcular value=Calcular></input>
        </div>
		</form>
	</body>
	
	<?php
	if(isset($_POST['calcular']))
	{
		if (!empty (trim($_POST ['numero1'])) && !empty (trim($_POST ['numero2'])) && !empty (trim($_POST ['numero3'])))
		{
			include ("funcoes.php");
			if (!empty ($_POST ['tipoMedia']))
			{
				$escolha = $_POST['tipoMedia'];
				$nota1 = $_POST['numero1'];
				$nota2 = $_POST['numero2'];
				$nota3 = $_POST['numero3'];
				$media = 0;
				switch($escolha)
				{
					case 1:
						$media = mediaAritimetica ($nota1, $nota2, $nota3);
						echo ("<br>A média Aritiméca é: ".$media);
						break;
					case 2:
						$media = mediaHarmonica ($nota1, $nota2, $nota3);
						echo ("<br>A média Harmônica é: ".$media);
						break;
					case 3:
						$peso1 = 0;
						$peso2 = 0;
						$peso3 = 0;
//						echo "<form method=post>";
//						echo "<label>Informe o peso da 1ª nota:</label><br>";
//						echo "<input type=number name=p1 required></input><br>";
//						echo "<label>Informe o peso da 2ª nota:</label><br>";
//						echo "<input type=number name=p2 required></input><br>";
//						echo "<label>Informe o peso da 3ª nota:</label><br>";
//						echo "<input type=number name=p3 required></input><br>";
//						echo "<input type=reset value=Limpar></input>";
//						echo "<input type=submit name=calcular2 value=Calcular></input>";
//						echo "</form>";
//						if(isset($_POST['calcular2']))
//						{
							$peso1 = $_POST['peso1'];
							$peso2 = $_POST['peso2'];
							$peso3 = $_POST['peso3'];
							$media = mediaPonderada ($nota1, $nota2, $nota3, $peso1, $peso2, $peso3);
							echo ("<br>A média ponderada é: ".$media);
//						}//fechamento da confirmacao do envio do formulario
				}//fechamento do switch case
			}
			else
			{
				echo ("Selecione um tipo de média a ser calculada!");
			}//fechamento da confirmação do tipo de media
		}
		else
		{
			echo ("Infome números válidos!");
		}//fechamento de verifacao se os número foram informados
	}//fechamento da verificação do envio de formulario
	
	?>
</html>