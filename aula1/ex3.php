<?php


function soma($n1, $n2) //função para somar dois valores
{
	return $n1 + $n2;
}


function imprimir($m) // função para imprimir um dado
{
	echo $m;
}

function impar($n) //função para verificar se o número é impar
{
	if ($n%2<>0)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function primo ($x) //função para verificar se o número é primo
{
	$contador = 0;
	for ($i=1;$i<=$x;$i++)
	{
		if ($x%$i==0)
		{
			$contador++;
			if ($contador==3)
			{
				$i=$x;
			}
		}
		$i++;
	}
	if ($contador == 2)
	{
		return true;
	}
	else
	{
		return false;
	}

}

function diaAtual() //função que retorna a data
{
	return date();
}

function ola()
{
	echo ("Bom dia!");
}

function trataNumeros ($x,$y)
{
	$dividendo=0;
	$soma=0;
	$result=0;
	if ($x>$y)
	{
		$dividendo= $x - $y;
		for ($i=$x;$i>=$y;$i--)
		{
			$soma = $soma + $i;
		}
		$result = $soma / $dividendo;
		return "A média dos números desse intevalo é igual a ".$result;
	}
	else if ($x<$y)
	{
		for ($i=$y;$i>=$x;$i--)
		{
			if ($i % 2 == 0)
			{
				$result++;
			}
		}
		return "A quantidade de números pares no intervalo informado é de ".$result;
	}
	else
	{
		return "Os números informados são iguais.";
	}
}
?>