<?php

//funçao que irá calcular a quantidade de litros de combustivel
function totLitros ($dist,$cons)
{
	return round(($dist/$cons),2);
}
//funçao para calcular o valor que será gasto na viagem
function gastoDinheiro ($dist,$cons,$prec)
{
	return round((($dist/$cons)*$prec),2);
}
//funçao para calcular a quantidade de tanques Gastos
function tanques ($cap,$dist,$cons)
{
	return round((($dist/$cons)/$cap),2);
}
//funcao para calcular tempo gasto
function tempoGasto ($dist)
{
	$minutos = 0;
	$horas = 0;
	$dias = 0;
	$tempo = $dist/1.5;
	echo ("<br><b>Tempo Gasto:</b> Considerando uma velocidade média de 90 km/h, ");
	if ($tempo < 60)
	{
		return ("o tempo a ser gasto é de: ".round ($tempo,0)." minutos");
	}
	else if ($tempo >= 60 && $tempo < 1440)
	{
		$minutos = ($tempo%60);
		$horas = intdiv ($tempo,60);
		return ("o tempo a ser gasto é de ".$horas." hora(s) e ".$minutos." minuto(s).");
	}
	else
	{
		$minutos = $tempo%60;
		$horas = intdiv ($tempo,60);
		$dias = intdiv ($horas,24);
		$horas = $horas%24;
		return ("o tempo a ser gasto é de ".$dias." dia(s), ".$horas." hora(s) e ".$minutos." minuto(s).");
	}
}

?>