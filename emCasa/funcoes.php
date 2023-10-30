<?php 

function inss($valor){
$desc_inss = 0;

if($valor <= 1320.01)
{
	$desc_inss = $valor * (7.5/100); 
}else if($valor >=1320.01 && $valor <=2571.29)
{
	$desc_inss = $valor * (9/100);
}else if($valor >= 2571.30 && $valor <= 3856.94)
{
	$desc_inss = $valor * (12/100);
}else if($valor >= 3856.95)
{
	if($valor >= 7507.49)
	{
		$desc_inss = 1051.05;//teto do inss
	}else{
		$desc_inss = $valor * (14/100);
	}
}

return $desc_inss;

}//fim da funcao inss

/**********************************************/

function ir($base_ir, $total_dep)
{
	$desc_ir = 0;
	$pre_dep = 0;
	
	if($base_ir <= 1903.98)
	{
	   return $desc_ir;
	}else if($base_ir >= 1903.99 && $base_ir <= 2826.65)
	{
		$pre_dep = $base_ir * (7.5/100) - 142.80;
		
	}else if($base_ir >= 2826.66 && $base_ir <= 3751.05){
		$pre_dep = $base_ir * (15/100) - 354.80;
	}else if($base_ir >=3551.06 && $base_ir <=4664.68)
	{
		$pre_dep = $base_ir * (22.5/100) - 636.13;
	}else if($base_ir > 4664.68)
	{
		$pre_dep = $base_ir * (27.5/100) - 869.36;
	}
	//Já tenho o valor para aplicar a dedução por dependente
	if($pre_dep > 0)
	{
		if($total_dep > 0)
		{
		   $desc_ir = 	$pre_dep - ($total_dep * 189.59);
		}else{
			$desc_ir = $pre_dep;
		}
	}
	
	//antes do retorno
	if($desc_ir > 0)
	{
		return $desc_ir;
	}else{
		return 0;
	}
}
?>