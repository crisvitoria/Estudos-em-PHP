<?php

$v1 = 10000;
$primos = array();
$contador=0;

for($n=2;$n<=$v1;$n++) //Faz a repetição até o numero informado em v1
{
	for($x=1;$x<=$n;$x++)//Testa se o número é primo
	{
		if ($n%$x==0)
		{
			$contador++;
		}
	}
	if ($contador==2)//armazena o numero primo no array
	{
		array_push ($primos,$n); //Sempre adiciona o valor no final do array
	}
	$contador=0; //zera o contador para testar o próximo numero
}

foreach($primos as $n)//comando para leitura de arrays
{
	echo $n."<br>";
}




/*
$nomes = array();
$i=10;

while ($i<5000){//inserir valores no array
	array_push ($nomes,$i);
	$i++;
}

foreach($nomes as $n)//comando para leitura de arrays
{
	echo $n."<br>";
}

-------------------
$nomes = ["ANA","JOSE","JOAO","MARIA"];

foreach($nomes as $n)//comando para leitura de arrays
{
	echo $n."<br>";
}/*
/*
echo "<br>";
for ($x=0;$x<count($nomes);$x++)
{
	echo $nomes[$x]."<br>";
}
*/

?>