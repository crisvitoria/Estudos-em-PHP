<?php

class Pessoa
{
	private $nome;
	private $idade;
	
	function setNome ($name)
	{
		$this->nome = $name;
	}
	function getNome ()
	{
		return $this->nome;
	}

	function Andar ()
	{
		echo "Andei!";
	}
}

$aluno = new Pessoa;
//$aluno->andar();
$aluno->setNome("José da Silva");
echo $aluno->getNome();
?>