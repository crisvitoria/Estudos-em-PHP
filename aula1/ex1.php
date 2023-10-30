<?php
/*
Programa para realizar a verificação se o número é primo ou não
*/
$n1=30;
$i=1;
$contador=0;

while ($i<=$n1)
{
	if ($n1%$i==0)
	{
		$contador++;
		if ($contador==3)
		{
			$i=$n1;
		}
	}
	$i++;
}
if ($contador == 2)
{
	echo "O número $n1 é primo.";
}
else
{
	echo "O número $n1 não é primo.";
}
echo "<br> $contador";
?>