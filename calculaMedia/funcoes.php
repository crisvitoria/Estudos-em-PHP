<?php


function mediaAritimetica ($n1,$n2,$n3)
{
	$media = 0;
	$media = ($n1 + $n2 + $n3)/3;
	return $media;
}

function mediaHarmonica ($n1,$n2,$n3)
{
	$media = 0;
	$media = round (3/(1/$n1 + 1/$n2 + 1/$n3),2);
	return $media;
}

function mediaPonderada ($n1,$n2,$n3,$p1,$p2,$p3)
{
	$media = 0;
	$media = ($n1*$p1 + $n2*$p2 + $n3*$p3) / ($p1 + $p2 + $p3);
	return $media;
}

?>